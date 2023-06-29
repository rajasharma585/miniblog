<?php $this->load->view('admin/header.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <h2>Add Blog</h2>
      <form action="<?php echo base_url().'admin/blog/addblog_post'?>"method="post" enctype="multipart/form-data">
      
      <div class="form-group">
        <input type="text" class="form-control" name="blog_title" placeholder="Title">
      </div>

      <div class="form-group">
        <textarea class="form-control" name="desc" placeholder="Blog Desc"></textarea>
      </div>

      <div class="form-group">
        <input type="file" class="form-control" name="blogimg">
      </div>

      <button type="submit" class="btn btn-primary">Add Blog</button>
      </form>
    </main>
  


    <?php $this->load->view('admin/footer.php'); ?>

    <script type="text/javascript">
    <?php
      if(isset($_SESSION['inserted'])){
        if ($_SESSION['inserted']=="yes") {}
        echo "alert('Data Inserted Successfull');";
      }else{
        echo "alert('Not Inserted')";
      }
    ?>
    </script>

    <!-- CKEDITOR CODE -->
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
      CKEDITOR.replace( 'desc' );
    </script>
