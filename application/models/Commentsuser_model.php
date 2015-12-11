<?php
if ( ! defined('BASEPATH'))  exit('No direct script access allowed');
class Commentsuser_model extends CI_Model{
    function add_commentsuser ($id_comments,$comments_comm,$date) {  //функция добавления коментария новотей пользователей
        $data = array (
            'comment_id' => $id_comments,
            'comment_user' => $comments_comm,
            'date' => $date
        );
        $this->db->insert('comments_comm',$data);  //помещаем содержимое формы которое принесла функция в своих значениях в таблицу
    }
}