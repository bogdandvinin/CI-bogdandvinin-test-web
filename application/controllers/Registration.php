<?php
session_start();
if ( ! defined('BASEPATH'))  exit('No direct script access allowed');
class Registration extends CI_Controller {
    public function registration_user() {                        //страница с регистрацией
        $this->load->library('form_validation'); // библиотека проверки данных формы
        $this->load->helper(array('form', 'url')); //для работы формы
        $this->load->library('email'); //отправка на почту
        if (isset($_POST['submit'])) {
            $login = $_POST['name'];
            $this->load->model('capons_model');
            $data1 = $this->capons_model->check_login($login); //проверка на соотвецтвие логина в БД
            if (!empty($data1)) {                               //условие на проверку логина
                $_SESSION['info'] = 'Логин уже занят';
                redirect('', 'refresh');
            }
            $email = $_POST['email'];
            $data2 = $this->capons_model->check_email($email);
            if (!empty($data2)) {
                $_SESSION['info'] = 'Email уже занял';
                redirect('', 'refresh');
            }

            $this->load->model('rules_models');
            $this->form_validation->set_rules($this->rules_models->reg_rules);
            $check = $this->form_validation->run();
            if ($check == TRUE) {
                $hash = md5($_POST['name']); //формируем hash по которому будем проводить активацию регистрации
                $add['login'] = $this->input->post('name');//post('name');
                $add['pass'] = $this->input->post('pass');
                $add['email'] = $this->input->post('email');
                $add['hash'] = $hash;
                $this->db->insert('capons', $add);
                //отправляем письмо на подтверждение регистрации
                $id = $this->db->insert_id('capons'); //возвращает id последних добавлений в БД
                date_default_timezone_set('America/New_York');      //устанавливаем Тайм зону
                $this->email->from('your@example.com', 'Bogdan');
                $this->email->to($_POST['email']);
                //$this->email->cc('another@another-example.com');
                //$this->email->bcc('them@their-example.com');
                $this->email->subject('Email Test');
                $this->email->message(base_url() . '?hash=' . $hash . '&id=' . $id . '');
                $this->email->send();
                // echo $this->email->print_debugger();
                $_SESSION['info'] = 'Данные успешно отправлены';
                $this->load->view('registration_view');
            } else {
                $_SESSION['info'] = 'Ошибка';
                $this->load->view('registration_view');
            }
        } else {
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
            $this->load->view('registration_view');
        }
    }
}