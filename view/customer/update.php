<?php
include('../../include/header.php');
include('../../include/navbar.php');

require_once  '../../controller/CustomerController.php';
$APIController = new CustomerController();

if(isset($_POST['update']))
{
  
  $response =  $APIController->Update($_POST['id'], $_POST['firstname'], $_POST['lastname'], $_POST['caddress'], $_POST['cuser_id'], $_POST['mobile'], $_POST['city'], $_POST['email'], $_POST['dateofbirth'], $_POST['state_id'],  $_POST['district_id'],  $_POST['taluka_id']);
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
$response = $APIController->find_customer($id);
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
                  <h4 class="card-title">Customer Update</h4>
                  
                  <div class="table-responsive">

                  <form  method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <?php
                      foreach($list  as $key=>$value){
                    ?>
		               <div>
                      <label for="firstname"></label>
                      <input type="hidden" class="form-control" name="id"  value="<?php echo $list[$key]["id"];?>" required="true">
                    </div>
                     <div class="form-group">
                      <label for="firstname">First name</label>
                      <input type="text" class="form-control" name="firstname" id="firstname" placeholder="firstname">
                    </div>

                    <div class="form-group">
                      <label for="lastname">Last Name</label>
                      <input type="text" class="form-control" name="lastname" id="lastname" placeholder="lastname">
                    </div>

                     <input type="hidden" class="form-control" name="userid" id="userid" value=3>

                     <div class="form-group">                       
                    <label for="caddress">Address</label>
                      <input type="text" class="form-control" name="caddress" id="caddress" placeholder="address">
                    </div>

                    <div class="form-group">                       
                    <label for="mobile">Mobile</label>
                      <input type="text" class="form-control" name="mobile" id="mobile" placeholder="mobile">
                    </div>

                    <div class="form-group">
                      <label for="city">City</label>
                      <input type="text" class="form-control" name="city" id="city" placeholder="city">
                    </div>
                    
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="email">
                    </div>

                    
                    <div class="form-group">
                      <label for="dateofbirth">Date Of Birth</label>
                      <input type="date" class="form-control" name="dateofbirth" id="dateofbirth" placeholder="dateofbirth">
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                          <select name="state_id" id="State" class="form-control">
                          </select>
                    
                        </div>
                     </div>
                         <div class="form-group row">
                        <div class="col-sm-12">
                          <select name="district_id" id="District" class="form-control">
                          </select>
                    
                        </div>
                        </div>

                        <div class="form-group row">
                        <div class="col-sm-12">
                          <select name="taluka_id" id="Taluq" class="form-control">
                          </select>
                    
                        </div>
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