<?php
include('../../include/header.php');
include('../../include/navbar.php');

require_once  '../../controller/StaffController.php';
$APIController = new StaffController();

if(isset($_POST['update']))
{
  
  $response =  $APIController->Update($_POST['id'], $_POST['staffname'], $_POST['mobile'], $_POST['email'],  $_POST['dateofbirth']);
   $responseData = json_decode($response, true);
  if(!$responseData["error"]){ //if false
   header('Location: list.php');
  ?>
   
    <?php
  } else {
    echo $responseData["message"];
  }

} else{
$id = $_GET['id'];
$response = $APIController->find_staff($id);
$responseData = json_decode($response, true);

 $list = $responseData["list"];
}
 
?>

<body>
<div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <!-- partial:../../partials/_sidebar.html -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
              <div class="card shadow mb-4">
                <div class="card-body">
                  <h4 class="card-title">Staff Update</h4>
                  
                  <div class="table-responsive">

                  <form  method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <?php
                      foreach($list  as $key=>$value){
                    ?>
		               <div>
                      <label for="staffname"></label>
                      <input type="hidden" class="form-control" name="id"  value="<?php echo $list[$key]["id"];?>" required="true">
                    </div>
                    <div>
                      <label for="staffname">Staff Name</label>
                      <input type="text" class="form-control" name="staffname" id="staffname" value="<?php echo $list[$key]["staffname"];?>" required="true">
                    </div>
                    <div class="form-group">
                      <label for="mobile">Mobile</label>
                      <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $list[$key]["mobile"];?>" required="true">
                    </div>
                    <div>
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" id="email" value="<?php echo $list[$key]["email"];?>" required="true">                    
                      </div>
                  
                    <div class="form-group">
                      <label for="dateofbirth">Date Of Birth</label>
                      <input type="date" class="form-control" name="dateofbirth" id="dateofbirth" value="<?php echo $list[$key]["dateofbirth"];?>" >                   
                      </div>
                         
                 <?php 
                  } ?>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="update" value="update">Update</button>
                     
                    </div>
                 </form>
                </div>
              </div>
            </div>  
          </div>
        </div>
            
      </div>
    </div>
  </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
<?php 
  include('../../include/footer.php');
  include('../../include/scripts.php');
?>