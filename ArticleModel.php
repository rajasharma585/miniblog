<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArticleModel extends CI_Model {


  public function fetch_all_article()
  {
    $resultQuery = $this->db->query("SELECT `id`, `blog_title`, `blog_desc`, `blog_img`, `status`, `created_on`, `updated_on` FROM `articles` WHERE status='1'");
    return $resultQuery->result_array();
  }
  public function fetch_blog_detail($blog_id){
    $resultQuery = $this->db->query("SELECT `id`, `blog_title`, `blog_desc`, `blog_img`, `status`, `created_on`, `updated_on` FROM `articles` WHERE id ='$blog_id'");
    return $resultQuery->result_array();
  }
}
?>
