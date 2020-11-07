<?php
include('../../include/header.php');
include('../../include/navbar.php');

require_once  '../../controller/SaleController.php';
$APIController = new SaleController();

if(isset($_POST['update']))
{
  
  $response =  $APIController->Update($_POST['id'], $_POST['quantity'], $_POST['product_id'], $_POST['customer_id'],$_POST['total']);
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
$response = $APIController->find_sale($id);
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
                  <h4 
                  class="card-title">Sales Update</h4>
                  
                  <div class="table-responsive">

                  <form  method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <?php
                      foreach($list  as $key=>$value){
                    ?>
		            <div>
                      <label for="quantity"></label>
                      <input type="hidden" class="form-control" name="id"  value="<?php echo $list[$key]["id"];?>" required="true">
                    </div>
                    <div>
                      <label for="quantity">Quantity</label>
                      <input type="text" class="form-control" name="quantity" id="quantity" value="<?php echo $list[$key]["quantity"];?>" required="true">
                    </div>
                   
                    <div class="form-group">
                      <label for="product_id">Product Id</label>
                      <input type="text" class="form-control" name="product_id" id="product_id" value="<?php echo $list[$key]["product_id"];?>"  required="true">                   
                    </div>

                   <div class="form-group">
                      <label for="customer_id">Customer Id</label>
                      <input type="text" class="form-control" name="customer_id" id="customer_id" value="<?php echo $list[$key]["customer_id"];?>" required="true" >                   
                    </div>
                    <div class="form-group">
                      <label for="total">Total</label>
                      <input type="text" class="form-control" name="total" id="total" value="<?php echo $list[$key]["total"];?>" >                   
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