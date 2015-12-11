<?php
if ( ! defined('BASEPATH'))  exit('No direct script access allowed');
class Comments_model extends CI_Model{ //файл с маленькой буквы а класс вызываем с большой (такое же название пишем что и сам файл)
    function add_comments ($date,$name,$description,$imgpath) {
        $data = array (
            'date' => $date,
            'name' => $name,
            'description' => $description,
            'imgpath' => $imgpath
        );
        $this->db->insert('comments',$data);  //помещаем содержимое формы которое принесла функция в своих значениях в таблицу
    }
    function all_comments($num,$offset){
        $this->db->select('id, date, name, description, imgpath'); //какие поля выделяем из таблици
        $this->db->order_by("id","desc");                   //по какому полю сортируем - последнюю запись выводим наверх
        $query = $this->db->get('comments',$num,$offset);                        //из какой таблици
        return $query->result_array();   //возвращаем запрос в функцию
    }
    function all_commentsusers($id){    //принимаем значения из файла ($num - сколько полей отображать на странице, offset после какого сигмента в адресной строке указывать номер пагинации ) main_view для пагинации - Пагинация инициализирована в контролере First/main
        $this->db->select('*');
        $this->db->where('comment_id',$id);
        $this->db->order_by('id','desc');
        $query = $this->db->get('comments_comm');
        return $query->result_array();
    }
    function dell_comments($id){                //функция удаления контента
        $this->db->where('id',$id);
        $this->db->delete('comments');
    }
}