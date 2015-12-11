<?php
session_start();
if ( ! defined('BASEPATH'))  exit('No direct script access allowed');
class First extends CI_Controller{
    public function index()
    {                         //основная страница сайта
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url')); //для работы формы
        $this->load->library('pagination');
        $this->load->library('email'); //отправка на почту
        if (isset($_POST['login1'])) {
            $this->load->model('rules_models'); //загружаем модель для проверки полей формы
            $this->form_validation->set_rules($this->rules_models->login_rules); // загружаем метод для проверки формы
            $check = $this->form_validation->run();
            if ($check == TRUE) {      //если проверка прошла хорошо то проверяем наши полученные данные с данными в таблице
                $login = $_POST['name1'];
                $pass = md5($_POST['pass1']);
                $this->load->model('capons_model');
                $data = $this->capons_model->check_login_in($login, $pass);   //$data это многомерный массив с данными из таблици MySQl
                if (!empty($data)) {
                    $_SESSION['user'] = $data[0];                         //приравниваем многомерный массив к переменной и переменную помещаем в SESSION['user'] по этой переменной будем проверять условия на логин пользователей
                    $_SESSION['info'] = 'Вы успешко вошли';
                } else {
                    $_SESSION['info'] = 'Неверный логин или пароль';    // в случае несуществования соотвецтвий в БД выводим надпись
                }
            }
        }
        if (isset($_GET['hash']) && (isset($_GET['id']))) {   //проверка на подтверждение регистрации
            $this->load->model('capons_model');
            $data = $this->capons_model->get_capons($_GET['id'], $_GET['hash']); //запрос поместили в массив
            //$data - многомерный массив из запроса в БД
            //echo $data[0]['id'];
            if (!empty($data)) {
                $ida = $data[0]['id'];
                $this->load->model('capons_model');
                $this->capons_model->update_capons($ida);
                $_SESSION['info'] = 'аккаунт активен';
            }
        }
        if (isset($_POST['logout'])) {       //условие на выход user
            unset ($_SESSION['user']);
            $_SESSION['info'] = 'Вы вышли';
            session_destroy();
        }
        //выводим новости на екран и делаем пагинацию
        $this->load->model('comments_model');     //загружаем модель с классом comments_model что-бы можно было использовать функцию для вывода полей таблици comments в файле main_view
        $config['base_url'] = 'http://bogdandvinin.site88.net/first/index'; //'http://bogdandvinin.site88.net/first/index/'; //путь к функции (например)или файлу где хотим сделать пагинацию класс first функция articles
        $config['total_rows'] = $this->db->count_all('comments'); // число записей в таблице
        $config['per_page'] = '2'; // сколько записей показывать на каждой странице
        $config['full_tag_open'] = '<p style="color: #4b6fd6; font-size: 17px;margin-top: -20px">'; //добавление стилей к пагинации например начало
        $config['full_tag_close'] = '</p>'; // конец
        $this->pagination->initialize($config); // инициализируем класс Пагинации что-бы все работало
        $comments['comments_list'] = $this->comments_model->all_comments($config['per_page'], $this->uri->segment(3)); //(модель comments_model загружена в контролере First/main) вызываем функцию которая отображает все из таблици comments сортируя записи в обратном порядке
        date_default_timezone_set('America/New_York'); 
        $this->load->view('main_view',$comments);               //загружаем вид основной страници
    }
        public function add_comment(){                // action comments_news with modal window $('#modal-comment')
            $this->load->helper(array('form', 'url'));
            if (isset($_POST['com'])) {
                //$this->form_validation->set_rules($_POST['com'], '', 'prep_for_form'|'encode_php_tags');
                //$this->form_validation->run();
                $id_comments = $_POST['id'];
                $comments_comm = trim(stripslashes(strip_tags(htmlspecialchars($_POST['com']))));
                $date = $_POST['date'];
                $this->load->model('commentsuser_model');  //загружаем модель добавления коментариев новостей пользывателями
                $this->commentsuser_model->add_commentsuser($id_comments, $comments_comm, $date);
        }
}
}