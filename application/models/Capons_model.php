<?php
if ( ! defined('BASEPATH'))  exit('No direct script access allowed');
class Capons_model extends CI_Model{
    function get_capons($id,$hash){
        //$this->db->limit('2'); //условие на то что-бы вывести 2 записи первые из всего запроса
        $this->db->where('id',$id); //из всего запроса делает выборку по полю date которое равно дате указаной
        $this->db->where('hash',$hash); // выводим все где id > 1
        //$this->db->order_by('id','DESC'); //сортировка запроса от большего к меньшему по ID
        $query =  $this->db->get('capons'); //используем готовые функции CI (get функция делает выборку по всей таблице БД)
        return $query->result_array(); //возвращаем значение запроса в виде массива в функцию
    }
    function update_capons($id){ //модель для активации аккаунта пользователей
        $active = 1;
        $access = 1;
        $data = array(
          'active'=>$active,
          'access'=>$access
        );
        $this->db->where('id',$id);
        $this->db->update('capons',$data);
    }
    function check_login($login){
        $this->db->where('login',$login);
        $query = $this->db->get('capons');
        return $query->result_array();
    }
    function check_email($email){                   //функция проверки email пользывателей
        $this->db->where('email',$email);
        $query = $this->db->get('capons');
        return $query->result_array();
    }
    function check_login_in($login,$pass){                //функция на проверку при логине на сайт логина и пароля
        $this->db->where('login',$login);
        $this->db->where('pass',$pass);
        $query = $this->db->get('capons');
        return $query->result_array();
    }
    function passback_emailcheck($email){        //функция проверки email в БД на возврат пароля
        $this->db->where('email',$email);
        $query = $this->db->get('capons');                //выделяем таблицу из которой берез запрос
        return $query;
    }
    function change_pass($email,$pass){         //функция изменения пароля пользывателя по email
        $this->db->where('email',$email);
        $data = array (
            'pass'=>$pass
        );
        $this->db->update('capons',$data);
    }

}