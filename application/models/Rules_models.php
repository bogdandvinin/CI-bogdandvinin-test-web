<?php
if( ! defined('BASEPATH'))  exit('No direct script access allowed'); // BASEPATH путь к корневой папке мы указали в файле config
class Rules_models extends CI_Model
{
    public $reg_rules = array( //создаем многомерный массив в котором укажем поля формы для проверки ( 1 масив это одно поле формы)
        array(
            'field' => 'name', //название поля формы
            'label' => 'Login',//название строки title в форме
            'rules' => 'required|min_length[5]|max_length[20]|trim|prep_for_form|encode_php_tags' //кроме функций CI можно указывать и функции PHP       //правила на проверку находяться в разделе Form Validation в низу таблица
        ),
        array(
            'field' => 'pass', //название поля формы
            'label' => 'Password',//название строки title в форме
            'rules' => 'required|matches[passr]|min_length[5]|max_length[20]|trim|prep_for_form|encode_php_tags|md5'
        ),
        array(
            'field' => 'passr', //название поля формы
            'label' => 'rePassword',//название строки title в форме
            'rules' => 'required|min_length[5]|max_length[20]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'email', //название поля формы
            'label' => 'Email',//название строки title в форме
            'rules' => 'required|max_length[30]|trim|valid_email'
        )
    );
    public $login_rules = array(               //правила для формы авторизации пользывателей
        array(
            'field' => 'name1',
            'label' => '',
            'rules' => 'required|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'pass1',
            'label' => '',
            'rules' => 'required|trim|prep_for_form|encode_php_tags'
        )
    );
    public $addcomments_rules = array(
        array(
            'field' => 'name',
            'label' => '',
            'rules' => 'required|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'desc',
            'label' => '',
            'rules' => 'required|trim|prep_for_form|encode_php_tags'
        )
    );
    public $passback_rules = array(     //правила проверки полей формы вида  passback_view
        array(
            'field' => 'email',
            'label' => '',
            'rules' => 'required|trim|prep_for_form|encode_php_tags|valid_email|max_length[30]'
        ),
        array(
            'field' => 'pass',
            'label' => '',
            'rules' => 'required|trim|prep_for_form|encode_php_tags|min_length[5]|max_length[20]'
        ),
        array(
            'field' => 'pass1',
            'label' => '',
            'rules' => 'required|trim|prep_for_form|encode_php_tags|min_length[5]|max_length[20]'
        )
    );
    public $config_rules = array(       //правила проверки полей формы вида config_view
        array(
            'field' => 'email',
            'label' => '',
            'rules' => 'required|trim|prep_for_form|encode_php_tags|valid_email|max_length[30]'
        ),
        array(
            'field' => 'pass',
            'label' => '',
            'rules' => 'required|trim|prep_for_form|encode_php_tags|min_length[5]|max_length[20]'
        ),
        array(
            'field' => 'pass1',
            'label' => '',
            'rules' => 'required|trim|prep_for_form|encode_php_tags|min_length[5]|max_length[20]'
        )
    );
}