<?php
session_start();
if ( ! defined('BASEPATH'))  exit('No direct script access allowed');
class Config extends CI_Controller {
    public function config_user(){//Контролер вида config.view
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url')); //для работы формы
        $this->load->library('pagination');
        $this->load->library('email'); //отправка на почту
        if (!isset($_SESSION['user'])) {                 //условие на доступ
            $_SESSION['info'] = 'Зарегистрируйтесь';
            redirect('', 'refresh');
        }
        if(($_SESSION['user']['access'] == 1)&&($_SESSION['user']['access'] == 2)){  //условие пускает только зарегистрированных юзеров и администратора
            if (($_SESSION['user']['access'] !== 1)&&($_SESSION['user']['access'] !== 2)) {           //условие на доступ
                $_SESSION['info'] = 'У вас нет прав';
                redirect('', 'refresh');
            }
        }
        $this->load->helper(array('form', 'url')); //для работы формы если форма создана в стиле CI echo form_open();
        if (isset($_POST['submit'])) {
            $this->load->model('rules_models'); //загружаем класс с методом правил для проверки формы
            $this->form_validation->set_rules($this->rules_models->config_rules); //загружаем метод с проверкой формы
            $check = $this->form_validation->run(); //запускаем проверку данных формы
            if ($check == TRUE) {
                if ($_POST['pass'] == $_POST['pass1']) {    //если пароли совпадают
                    $email = $_POST['email'];
                    $this->load->model('capons_model'); //загружаем модель с функциями для БД
                    $query = $this->capons_model->passback_emailcheck($email); //(на проверку email c БД подходит єта функция)отправляем email из форму в функцию которая проверит соотвецтвием указаного эмайла с ебайлом в БД
                    if ($query->num_rows() > 0) {    //если запрос не пуст  (значит указанный эмейл совпадает )
                        foreach ($query->result() as $row) { //запрос из БД помещаем в цикл что-бы вытащить нужное поле
                            $pass = md5($_POST['pass1']);  //пароль помещаем в переменную
                            $emailtrue = $row->email;      // емайл который вытащили из БД помещаем в переменную
                            $this->capons_model->change_pass($emailtrue, $pass); // вызываем функцию смены пароля и помещаем в нее нужные переменные
                            //отсылаем новый пароль на емейл пользователя
                            $to = $emailtrue;
                            $subject = 'Вам новый пароль';
                            $message = 'Спасибо что воспользывались нашей услуной' . "\r\n";
                            $message .= 'Вам новый пароль' . ' ' . $_POST['pass'];
                            $headers = 'From: webmaster@example.com' . "\r\n" .
                                'Reply-To: webmaster@example.com' . "\r\n" .
                                'X-Mailer: PHP/' . phpversion();
                            mail($to, $subject, $message, $headers);
                            $_SESSION['info'] = 'Пароль успешно изменен';
                        }
                    } else {
                        $_SESSION['email'] = 'Неверный email';
                    }
                } else {
                    $_SESSION['info'] = 'Пароли должны совпадать';
                }
            }
        }
        if(isset($_POST['logout'])){       //условие на выход user
            unset ($_SESSION['user']);
            $_SESSION['info'] = 'Вы вышли';
            session_destroy();
            redirect('First','refresh');
        }
        $this->load->view('config_view');
    }
}