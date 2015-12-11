<?php
session_start();
if ( ! defined('BASEPATH'))  exit('No direct script access allowed');
class About extends CI_Controller{
    public function about_me(){                          //Страница about_me
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url')); //для работы формы
        $this->load->library('email'); //отправка на почту
        if(isset($_POST['login1'])){
            $this->load->model('rules_models'); //загружаем модель для проверки полей формы
            $this->form_validation->set_rules($this->rules_models->login_rules); // загружаем метод для проверки формы
            $check = $this->form_validation->run();
            if($check == TRUE){      //если проверка прошла хорошо то проверяем наши полученные данные с данными в таблице
                $login = $_POST['name1'];
                $pass  = $_POST['pass1'];
                $this->load->model('capons_model');
                $data = $this->capons_model->check_login_in($login,$pass);   //$data это многомерный массив с данными из таблици MySQl
                if(!empty($data)){
                    $_SESSION['user']=$data[0];                         //приравниваем многомерный массив к переменной и переменную помещаем в SESSION['user'] по этой переменной будем проверять условия на логин пользователей
                    $_SESSION['info'] = 'Вы вошли успешно';
                }else{
                    $_SESSION['info'] = 'Неверный логин или пароль';    // в случае несуществования соотвецтвий в БД выводим надпись
                }
            }
        }
        if(isset($_POST['logout'])){
            unset ($_SESSION['user']);
            $_SESSION['info'] = 'Вы вышли';
        } //---------------------------------------------
        $this->load->view('about_view');
    }
}