<?php
include('../../include/header.php');
include('../../include/navbar.php');

require_once  '../../controller/SaleController.php';
$SaleController = new SaleController();
$response = $SaleController->List();
$responseData = json_decode($response, true);

$list = $responseData["list"];

?>


<div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <!-- partial:../../partials/_sidebar.html -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
              <div class="card shadow mb-4">
                <div class="card-body">
                  <h4 class="card-title">Sales Details</h4>
                
                  <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>SI NO</th>
                            <th>Customer Name</th>                       
                            <th>Product Name</th>
                            <th>Qulity</th>
                            <th>Total</th>
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
                          <td><?php echo $list[$key]["quantity"];?></td>                       
                          <td><?php echo $list[$key]["pname"];?></td>
                          <td><?php echo $list[$key]["firstname"];?></td>   
                          <td><?php echo $list[$key]["total"];?></td>                      
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="update.php?id=<?php echo $list[$key]["id"];?>"><p class="fa fa-edit"></p></a> 
                          <a href="list.php?delid=<?php echo $list[$key]["id"];?>"><p class="fa fa-trash"></p></a></td>
                        </tr>

                     <?php 

                        $cnt=$cnt+1;
                        } } else {?>
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
      </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php 
        include('../../include/footer.php');
        include('../../include/scripts.php');
        ?>
       