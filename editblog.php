<?php
  // echo "<pre>";
  // print_r($result); die();
?>

<?php $this->load->view('admin/header.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <h2>Edit Blog</h2>
      <form action="<?php echo base_url().'admin/blog/editblog_post'?>"method="post" enctype="multipart/form-data">

        <select class="custom-select" name="publish_unpublish">
          <option value="1" <?php echo ($result[0]['status']=="1" ? "selected":"");?>>Publish</option>
          <option value="0" <?php echo ($result[0]['status']=="0" ? "selected":"");?>>Unpublish</option>
          
        </select>
        <br>

        <input type="hidden" name="blog_id" value="<?php echo "$blog_id"?>">
      
      <div class="form-group" style="margin-top: 10px;">
        <input type="text" value="<?php echo $result[0]['blog_title'] ?>" class="form-control" name="blog_title" placeholder="Title">
      </div>

      <div class="form-group">
        <textarea class="form-control" name="desc" placeholder="Blog Desc"><?php echo $result[0]['blog_desc'] ?></textarea>
      </div>

      <div class="form-group">
        <img width="100" src="<?php echo base_url().$result[0]['blog_img']?>">
        <input type="file" class="form-control" name="blogimg">
      </div>

      <button type="submit" class="btn btn-primary">Update Blog</button>
      </form>
    </main>
  


    <?php $this->load->view('admin/footer.php'); ?>

    <script type="text/javascript">
    // <?php
    //   if(isset($_SESSION['Updated'])){
    //     if ($_SESSION['Updated']=="yes") {}
    //     echo "alert('Data Updated Successfull');";
    //   }else{
    //     echo "alert('Not Updated')";
    //   }
    // ?>
    </script>

    <!-- CKEDITOR CODE -->
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
      CKEDITOR.replace( 'desc' );
    </script>
