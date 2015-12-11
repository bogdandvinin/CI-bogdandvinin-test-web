<?php
session_start();
if ( ! defined('BASEPATH'))  exit('No direct script access allowed');
class Admin extends CI_Controller{
    public function Admin_user() {
        if (!isset($_SESSION['user'])){                 //условие на доступ
            $_SESSION['info'] = 'Зарегистрируйтесь';
            redirect('','refresh');
        }
        /*if(($_SESSION['user']['access'] != 1)||($_SESSION['user']['access'] == 1)){           //условие на доступ
            $_SESSION['info'] = 'У вас нет прав';
            redirect('','refresh');
        }*/
        if($_SESSION['user']['access'] == 1){         //умеет доступ только тот у кого access == 2
            $_SESSION['info'] = 'У вас нет прав';
            redirect('','refresh');
        }
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url')); //для работы формы
        $this->load->library('pagination');
        $this->load->library('email'); //отправка на почту
        $config['upload_path'] = './upload/';          //указываем путь куда сохранять
        $config['allowed_types'] = 'gif|jpg';       //указываем формат картинок которые можно загружать
        $this->load->library('upload',$config);       //загрузили библиотеку загрузки файлов и указали настройки к ней
        $this->load->model('comments_model');       //загружаем класс для работы с таблицей comments
        $this->load->model('rules_models');      //загружаем класс для работы с правиласи проверки формы
        if(isset($_POST['add'])){
            //$this->load->model('comments_model');       //загружаем класс для работы с таблицей comments
            //$this->load->model('rules_models');      //загружаем класс для работы с правиласи проверки формы
            $this->form_validation->set_rules($this->rules_models->addcomments_rules); //зашружаем класс проверки данных формы и загружаем модель правил проверки данных формы)
            $check = $this->form_validation->run();
            if($check == true){
                if( ! $this->upload->do_upload('uf')) {           //загружаем из поля формы uf файл в папку
                    $_SESSION['info'] = 'не правельный формат картинки'; //если ошибка при загрузке то выводим следущее
                    $this->load->view('admin_view'); //загружаем вид страници
                    // redirect('/First/admin/','refresh');
                }else {                                                            //если нет ошибки то все данные загружаем в таблицу comments
                    $date = $_POST['date']; //переменная с датой новости из формы
                    $name = $_POST['name']; //переменная с названием новости
                    $description = $_POST['desc']; // переменная с описанием новости
                    $imgpath = $this->upload->data('file_name'); //путь к файлу и имени который мы загрузили показывает системный хелпер data()
                    $this->comments_model->add_comments($date, $name, $description, $imgpath); //добавляем данный в БД с помошью метода add_comments класса comments_model
                    $_SESSION['info'] = 'Данные успешно добавлены';
                    date_default_timezone_set('America/New_York');  //set time zone
                    $this->load->view('admin_view'); //загружаем вид страници
                }
            }
        }else {
            $this->load->view('admin_view');    //загружаем вид страници
        }
        if(isset($_POST['delete'])){                    //условие удаления контента
            $id = $_POST['check'];
            echo $id;
            $this->comments_model->dell_comments($id);
            $_SESSION['info'] = 'запись удалена';
            redirect('First/admin'); //переадресация на страницу администратора
        }
    }
}