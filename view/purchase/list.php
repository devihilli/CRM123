<?php
include('../../include/header.php');
include('../../include/navbar.php');

require_once  '../../controller/PurchaseController.php';
$PurchaseController = new PurchaseController();
$response = $PurchaseController->List();
$responseData = json_decode($response, true);

$list = $responseData["list"];

if(isset($_GET['delid']))
{
  $id = $_GET['delid'];
$response = $PurchaseController->Delete($id);
$responseData = json_decode($response, true);
 header('Location: list.php');
  } else {
    //echo $responseData["message"];
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
                  <h4 class="card-title">Product Details</h4>
                  
                  <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SI NO</th>
                            <th>Item Code</th>                       
                            <th>Date Of Purchase</th>
                                                    
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    if(!$responseData["error"]){ 
                      $cnt=1;
                      foreach($list  as $key=>$value){
                        
                    ?>
                      <tr>
                          <td><?php echo $cnt;?></td>
                          <td><?php echo $list[$key]["item_code"];?></td>                       
                          <td><?php echo $list[$key]["date_of_purchase"];?></td>
                                           
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="update.php?id=<?php echo $list[$key]["id"];?>"><p class="fa fa-edit"></p></a> 
                          <a href="list.php?delid=<?php echo $list[$key]["id"];?>"><p class="fa fa-trash"></p></a></td>
                        </tr>

                     <?php 
                        $cnt=$cnt+1;
                        } } else {?>
                        <tr>
                        <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
                        </tr>
                        <?php } ?>   

                    </tbody>
                  </table>
           
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
       