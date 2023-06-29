<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	
	public function index()
	{	
		$query = $this->db->query("SELECT * FROM `articles` ORDER BY id DESC");
		$data['result'] = $query->result_array();
		$this->load->view('admin/viewblog',$data);
	}
	public function addblog(){
		$this->load->view('admin/addblog');
	}
	public function addblog_post(){
		//print_r($_POST);
		//print_r($_FILES);

		if($_FILES){
			//image is passed for upload

				$config['upload_path']          = './assests/upload/blogimg/';
                $config['allowed_types']        = 'gif|jpg|png';
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('blogimg'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        die('Error');
                        //$this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        // echo "<pre>";
                        // print_r($data);
                        // echo $data['upload_data']['file_name'];

                        //$this->load->view('upload_success', $data);

                        $fileurl1 = "assests/upload/blogimg/".$data['upload_data']['file_name'];
                        $blog_title = $_POST['blog_title'];
                        $blog_desc = $_POST['desc'];
                        $query = $this->db->query("INSERT INTO `articles`(`blog_title`, `blog_desc`,`blog_img`) VALUES ('$blog_title','$blog_desc','$fileurl1')");

                        	if($query){
                        		$this->session->set_flashdata('inserted', 'yes');
							redirect('admin/blog/addblog');
                        	}else{
                        		$this->session->set_flashdata('inserted', 'no');
                        	}
                }
		}else{
			//image is not passed
		}
	}
	public function editblog($blog_id){
		//print_r($blog_id);
		 $query = $this->db->query("SELECT `blog_title`, `blog_desc`, `blog_img`,`status` FROM `articles` WHERE `id`='$blog_id'");
		 $data['result'] = $query->result_array();
		 $data['blog_id'] = $blog_id;

		$this->load->view('admin/editblog',$data);
	}

	public function editblog_post(){
		//print_r($_POST); die();
		//print_r($_FILES);
		if ($_FILES['blogimg']['name']) {
			//die("Update File");
			//update img

				$config['upload_path']          = './assests/upload/blogimg/';
                $config['allowed_types']        = 'gif|jpg|png';
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('blogimg'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        die('Error');
                        //$this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        // echo "<pre>";
                        // print_r($data['upload_data']['file_name']);

                        $filename_location = "assests/upload/blogimg/".$data['upload_data']['file_name'];

                        $blog_title = $_POST['blog_title'];
                        $desc = $_POST['desc'];
                        $blog_id = $_POST['blog_id'];
                        $publish_unpublish = $_POST['publish_unpublish'];

                        $query = $this->db->query("UPDATE `articles` SET `blog_title`='$blog_title',`blog_desc`='$desc',`blog_img`='$filename_location',`status`='$publish_unpublish' WHERE `id`='$blog_id'");
                        if($query){
                        	$this->session->set_flashdata('updated','yes');
                        	redirect("admin/blog");
                        }else{
                        	$this->session->set_flashdata('updated','no');
                        	redirect("admin/blog");
 
                        }
                    }

		}else{
			
			//die("Update without file");
			$blog_title = $_POST['blog_title'];
			$desc = $_POST['desc'];
			$blog_id = $_POST['blog_id'];
			$publish_unpublish = $_POST['publish_unpublish'];


			$query = $this->db->query("UPDATE `articles` SET `blog_title`='$blog_title',`blog_desc`='$desc',`status`='$publish_unpublish' WHERE `id`='$blog_id'");
			if($query){
				$this->session->set_flashdata('updated','yes');
				redirect("admin/blog");
			}else{
				$this->session->set_flashdata('updated','no');
				redirect("admin/blog");

			}


		}
	}

	public function deleteblog() {
		//print_r($_POST);
	   $delete_id = $_POST['delete_id'];
	   $query = $this->db->query("DELETE FROM `articles` WHERE `id`='$delete_id'");
	  
	  	if ($query) {
	     echo "deleted";
	   } else {
	     echo "Not Deleted";
	   }
	}


		
}
?>


