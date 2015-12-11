<?php
if( ! defined('BASEPATH'))  exit('No direct script access allowed'); // BASEPATH путь к корневой папке мы указали в файле config
class Add_articles_models extends CI_Model {
    public $add_rules = array( //создаем многомерный массив в котором укажем поля формы для проверки ( 1 масив это одно поле формы)
        array(
            'field' => 'title', //название поля формы
            'label' => 'Название статьи',//название строки title в форме
            'rules' => 'required|min_length[5]|max_length[50]|trim' //кроме функций CI можно указывать и функции PHP       //правила на проверку находяться в разделе Form Validation в низу таблица
        ),
        array(
            'field' => 'text', //название поля формы
            'label' => 'Текст статьи',//название строки title в форме
            'rules' => 'required|max_length[2000]|trim'
        )
    );
}