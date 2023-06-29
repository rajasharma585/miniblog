<?php $this->load->view('admin/header.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <h2>View Blog</h2>
      
      <?php
      // echo "<pre>";
      //   print_r($result); die();
      ?>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Id</th>
              <th>Title</th>
              <th>Description</th>
              <th>Image</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if ($result) {
              $counter = 1;
                foreach ($result as $key => $value) {
                echo "<tr>
                  <td>".$counter."</td>
                  <td>".$value['blog_title']."</td>
                  <td>".$value['blog_desc']."</td>
                  <td><img src='".base_url().$value['blog_img']."' class='img-fluid' width='100'></td>
                  
                  <td><a class=\"btn btn-info\" href='".base_url().'admin/blog/editblog/'.$value['id']."'>Edit</a></td>
                  <td><a class=\"btn delete btn-danger\" href='#.' data-id='".$value['id']."'>Delete</a></td>


                </tr>";
              $counter++;
                }
              } else {
               echo "<tr><td colspan='6'>No Records Found</td></tr>";
              }
            ?>

            
                        
          </tbody>
        </table>
      </div>
    </main>
  


    <?php $this->load->view('admin/footer.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

<script type="text/javascript">
  
    $(".delete").click(function() {
        var delete_id = $(this).attr('data-id');
        var bool = confirm('Are you sure you want to delete the blog forever?');
        console.log(bool);
        
        if(bool){
          //alert("Move to delete functionality using Ajax");

          $.ajax({
           url: '<?= base_url().'admin/blog/deleteblog/'?>',
           type: 'POST',
           data: {'delete_id': delete_id},
           success: function(response) {
              console.log(response);
              if (response == "deleted") {
              location.reload();
             } else if (response == "Not deleted") {
               alert("Something went wrong");
             }
            }
          });

        }else{
          alert("Your Blog is Safe");
        }
        
      });

    <?php
      if(isset($_SESSION['updated'])){
        if($_SESSION['updated'] =="yes"){
         echo 'alert("Data has been updated");';
        }else if($_SESSION['updated'] =="no"){
          echo 'alert("Some error occured & data not updated");';
        }
      }
    ?>
      
   
</script>

