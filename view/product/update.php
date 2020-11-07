<?php
include('../../include/header.php');
include('../../include/navbar.php');

require_once  '../../controller/ProductController.php';
$APIController = new ProductController();

if(isset($_POST['update']))
{
  
  $response =  $APIController->Update($_POST['id'],$_POST['pname'], $_POST['category'], $_POST['price']);
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
$response = $APIController->find_product($id);
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
                  <h4 class="card-title">Product Update</h4>
                  
                  <div class="table-responsive">

                  <form  method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <?php
                      foreach($list  as $key=>$value){
                    ?>
		               <div>
                      <label for="pname"></label>
                      <input type="hidden" class="form-control" name="id"  value="<?php echo $list[$key]["id"];?>" required="true">
                    </div>

                   <div class="form-group">
                      <label for="pname">Product name</label>
                      <input type="text" class="form-control" name="pname" id="pname" value="<?php echo $list[$key]["pname"];?>"placeholder="pname">
                      </div>

                      <div class="form-group">

                      <label for="category">Category</label>
                      <input type="text" class="form-control" name="category" id="category" value="<?php echo $list[$key]["category"];?>" placeholder="category">
                      </div>
                    
                      <div class="form-group">
                      <label for="price">Price</label>
                      <input type="text" class="form-control" name="price" id="price"  value="<?php echo $list[$key]["price"];?>"placeholder="price">
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