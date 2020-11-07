<?php
include('../../include/header.php');
include('../../include/navbar.php');

require_once  '../../controller/CustomerController.php';
$CustomerController = new CustomerController();
$response = $CustomerController->List();
$responseData = json_decode($response, true);

$list = $responseData["list"];

if(isset($_GET['delid']))
{
  $id = $_GET['delid'];
$response = $CustomerController->Delete($id);
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
                  <h4 class="card-title">Customer Details</h4>
                  
                  <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SI NO</th>
                            <th>State Name</th> 
                            <th>District Name</th>   
                            <th>Taluka Name</th>                          
                            <th>First name</th>  
                            <th>Last Name</th>  
                            <th>Address</th>
                            <th>Mobile</th>
                            <th>City name</th>
                            <th>Email</th>
                            <th>Date Of birth</th>
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
                          <td><?php echo $list[$key]["state"];?></td>                       
                          <td><?php echo $list[$key]["district"];?></td>
                          <td><?php echo $list[$key]["taluq"];?></td>                       
                          <td><?php echo $list[$key]["firstname"];?></td>                       
                          <td><?php echo $list[$key]["lastname"];?></td>  
                          <td><?php echo $list[$key]["caddress"];?></td>
                          <td><?php echo $list[$key]["mobile"];?></td>                       
                          <td><?php echo $list[$key]["city"];?></td>
                          <td><?php echo $list[$key]["email"];?></td>                       
                          <td><?php echo $list[$key]["dateofbirth"];?></td>
                          
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
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php 
        include('../../include/footer.php');
        include('../../include/scripts.php');
        ?>
       