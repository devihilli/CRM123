<?php
if(isset($_POST['submitbutton']) && $_POST['submitbutton']=="Insert"){
  require_once  '../../controller/PurchaseController.php';
  $PurchaseController = new PurchaseController();
  $response =  $PurchaseController->Insert($_POST['item_code'], $_POST['date_of_purchase']);

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
                  <h4 class="card-title">Purchase form</h4>
                 
                  <form class="forms-sample" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                    <div class="form-group">
                      <label for="item_code">Item Code</label>
                      <input type="text" class="form-control" name="item_code" id="item_code" placeholder="item_code">
                      </div>

                      
                      <div class="form-group">
                      <label for="date_of_purchase">Date Of Purchase</label>
                      <input type="date" class="form-control" name="date_of_purchase" id="date_of_purchase" placeholder="date_of_purchase">
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
      

  
  
  


