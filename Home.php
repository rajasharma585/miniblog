<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


  public function index()
  {
    $this->load->model('ArticleModel');
    $result = $this->ArticleModel->fetch_all_article();
    

    $data['result'] = $result;
    $this->load->view('blog_list_page',$data);
  }
  public function blog_detail($blog_id=0){
    
    $this->load->model('ArticleModel','am');
    $result = $this->am->fetch_blog_detail($blog_id);
    $data['result'] = $result;

    $this->load->view("blog_detail",$data);

  }
}
?>
