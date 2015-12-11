<?php
if ( ! defined('BASEPATH'))  exit('No direct script access allowed');
class Commentscomm_model extends CI_Model{ //файл с маленькой буквы а класс вызываем с большой (такое же название пишем что и сам файл)
    function all_comments ($comment_id) {
        $this->db->where('comment_id',$comment_id);
        $this->db->select('id,comment_user,date');
        $this->db->order_by('id','desc');
        $query = $this->db->get('comments_comm');
        return $query; //back query into function
    }
}