<?php
if(isset($_FILES['image'])){
  require_once  '../../controller/StaffController.php';
  $StaffController = new StaffController();
  $response =  $StaffController->Insert($_POST['staffname'], $_POST['mobile'], $_POST['email'], $_POST['userid'], $_POST['dateofbirth'], $_POST['image'],$_POST['tpassword'],$_POST['role_id']);

  //echo $response;
  $responseData = json_decode($response, true);
  if(!$responseData["error"]){ //if false
  header('Location: list.php');
  } else {
    echo $responseData["message"];
  }
}
?>

<?php
  include('../../include/header.php');      
  include('../../include/navbar.php');   
?>   

    <!-- partial:partials/_navbar.html -->
    
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
        
        <div class="col-md-12 grid-margin stretch-card">
              <div class="card shadow mb-4">
                <div class="card-body">
                  <h4 class="card-title">Staff form</h4>
                 
                  <form class="forms-sample" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="staffname">Staff name</label>
                      <input type="text" class="form-control" name="staffname" id="staffname" placeholder="staffname">
                    </div>

                    <div>
                      <label for="mobile">Mobile</label>
                      <input type="text" class="form-control" name="mobile" id="mobile" placeholder="mobile">
                    </div>

                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="email">
                    </div>

                    
                    <input type="hidden" class="form-control" name="userid" id="userid" value=2>

                     
                   <div class="form-group">
                    <label for="tpassword">Password</label>
                      <input type="text" class="form-control" name="tpassword" id="tpassword" placeholder="password">
                    </div>


                    <input type="hidden" class="form-control" name="role_id" id="role_id" value=2>
                      

                    
                    <div class="form-group">
                      <label for="dateofbirth">Date Of Birth</label>
                      <input type="date" class="form-control" name="dateofbirth" id="dateofbirth" placeholder="dateofbirth">
                    </div>
                      
                   
                    <div class="form-group">
                      <label for="image">Image</label>
                      <input type="file" class="form-control" name="image" id="image" placeholder="image">
                      <input type="submit" value="submit" name="submit" class="btn btn-primary mr-2">
                    </div>
                   
                  </form>
                </div>
              </div>
            </div>
         </div>
     </div>
          
      <!--end of partial-->  
  <?php
  include('../../include/footer.php');      
  include('../../include/scripts.php');   
  ?>   
      

  
  
  


