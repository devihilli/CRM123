<?php
if(isset($_POST['submitbutton']) && $_POST['submitbutton']=="Insert"){
  require_once  '../../controller/ProductController.php';
  $ProductController = new ProductController();
  $response =  $ProductController->Insert($_POST['pname'], $_POST['category'], $_POST['price']);

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
                  <h4 class="card-title">Product form</h4>
                 
                  <form class="forms-sample" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                    <div class="form-group">
                      <label for="pname">Product name</label>
                      <input type="text" class="form-control" name="pname" id="pname" placeholder="pname">
                      </div>

                      <div class="form-group">

                      <label for="category">Category</label>
                      <input type="text" class="form-control" name="category" id="category" placeholder="category">
                      </div>
                    
                      <div class="form-group">
                      <label for="price">Price</label>
                      <input type="text" class="form-control" name="price" id="price" placeholder="price">
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
      

  
  
  


