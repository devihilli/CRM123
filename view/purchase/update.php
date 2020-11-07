<?php
include('../../include/header.php');
include('../../include/navbar.php');

require_once  '../../controller/PurchaseController.php';
$APIController = new PurchaseController();

if(isset($_POST['update']))
{
  
  $response =  $APIController->Update($_POST['id'], $_POST['item_code'], $_POST['date_of_purchase'],  $_POST['quantity']);
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
$response = $APIController->find_purchase($id);
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
                  <h4 class="card-title">Purchase Update</h4>
                  
                  <div class="table-responsive">

                  <form  method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <?php
                      foreach($list  as $key=>$value){
                    ?>
		               <div>
                      <label for="item_code"></label>
                      <input type="hidden" class="form-control" name="id"  value="<?php echo $list[$key]["id"];?>" required="true">
                    </div>
                    <div>
                      <label for="item_code">Item Code</label>
                      <input type="text" class="form-control" name="item_code" id="item_code" value="<?php echo $list[$key]["item_code"];?>" required="true">
                    </div>
                  
                    <div class="form-group">
                      <label for="date_of_purchase">Date Of Purchase</label>
                      <input type="date" class="form-control" name="date_of_purchase" id="date_of_purchase" value="<?php echo $list[$key]["date_of_purchase"];?>" >                   
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