<?php
if(isset($_POST['submitbutton']) && $_POST['submitbutton']=="Insert"){
  require_once  '../../controller/SaleController.php';
  $SaleController = new SaleController();
  $response =  $SaleController->Insert($_POST['quantity'], $_POST['product_id'], $_POST['customer_id'],$_POST['total']);

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
                  <h4 class="card-title">Sale form</h4>
                 
                  <form class="forms-sample" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                    <div class="form-group">
                      <label for="quantity">Quantity</label>
                      <input type="text" class="form-control" name="quantity" id="quantity" placeholder="quantity">
                      </div>

                      <div class="form-group">

                      <label for="product_id">Product Name</label>
                      <input type="text" class="form-control" name="product_id" id="pname"  placeholder="pname">
                      </div>
                    
                      <div class="form-group">
                      <label for="customer_id">Customer Name</label>
                      <input type="text" class="form-control" name="customer_id" id="firstname" placeholder="firstname">
                    </div>
                    <div class="form-group">
                      <label for="total">Total</label>
                      <input type="text" class="form-control" name="total" id="total" placeholder="total">
                    </div>

                   <input type="submit" value="Insert" name="submitbutton" class="btn btn-primary mr-2" id="submitbutton">
                   
                  </form>
                </div>
              </div>
            </div>
  
          
      <!--end of partial-->  
  <?php
  include('../../include/footer.php');      
  include('../../include/scripts.php');   
  ?>   
      

  
  
  


