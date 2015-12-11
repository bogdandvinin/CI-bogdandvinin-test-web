<?php
if( ! defined('BASEPATH'))  exit('No direct script access allowed'); // BASEPATH путь к корневой папке мы указали в файле config
class Add_articles extends CI_Controller {
    public function index(){
        $this->load->library('form_validation'); //обязательно загружаем библиотеку по которой будут работать проверки формы
        if (isset($_POST['add'])){
            $this->load->model('add_articles_models');//теперь при нажатии должна загружаться наша модель с проверками
            $this->form_validation->set_rules($this->add_articles_models->add_rules); //установили правила add_rules которые находяться в модели add_articles_models в папке models
            $check = $this->form_validation->run();//(в переменную поместим) теперь запускаем правила проверки формы
            if($check == TRUE){ // если условие выполняеться значит все прошло ок
               //теперь добавим проверенные данные из формы в БД
               $add['title'] = $this->input->post('name'); //вызываем функцию CI input - создали ячейку массива и указали какую ячейку из массива POST мы туда помещаем
               $add['text'] = $this->input->post('text');
               $add['date'] = date('Y-m-d'); // в поле таблици добавляем время - хотя в форме такого поля у нас нет
                //помещем данные в таблицу БД
                $this->db->insert('articles',$add); //теперь помещаем массив $add с данными формы в таблицу articles
                $this->load->view('info_view'); // если TRUE то выводим что все ок
            }else{
                $this->load->view('add_articles_view'); // а если нет то грузим снова наш вид с формой
            }
            //$this->load->view('info_view'); // просто выводим вид с словом на экран
             //если нажали то запустим вид из views который напишет что все прошло ок
            //тут можно и надпись к сесионной переменной приравнять что-бы ее вывести
        }else{
            $this->load->view('add_articles_view'); //загружаем наш вид с формой
        }
    }
}