<?php
include('../../include/header.php');      
include('../../include/navbar.php'); 
//include('../dropdown_call.php');


if(isset($_POST['submitbutton']) && $_POST['submitbutton']=="Insert"){
require_once  '../../controller/CustomerController.php';
$CustomerController = new CustomerController();
$response =  $CustomerController->Insert($_POST['firstname'], $_POST['lastname'], $_POST['caddress'], $_POST['cuser_id'], $_POST['mobile'], $_POST['city'], $_POST['email'], $_POST['dateofbirth'], $_POST['state_id'],  $_POST['district_id'],  $_POST['taluka_id']);
  
  //echo $response;
  $responseData = json_decode($response, true);
  if(!$responseData["error"]){ //if false
  header('Location: list.php');
  } else {
    echo $responseData["message"];
  }
}
?>


    <!-- partial:partials/_navbar.html -->
    
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
        
        <div class="col-md-12 grid-margin stretch-card">
              <div class="card shadow mb-4">
                <div class="card-body">
                  <h4 class="card-title">Customer form</h4>
                 <form class="forms-sample" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
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

                    <input type="submit" value="Insert" name="submitbutton" class="btn btn-primary mr-2" id="submitbutton">
                      </div>
              </div>
            </div>
         </div>
     </div>
          
      <!--end of partial-->  
  <?php
  include('../../include/footer.php');      
  include('../../include/scripts.php');   
  ?>   
      
<script src="http://localhost/CRM/js/jquery-3.5.1.min.js"></script>

<script>


    $(document).ready(

        function(){


            
            //The ajaxStart() method specifies a function to be run when an AJAX request starts.
            //Note: As of jQuery version 1.8, this method should only be attached to document.
            $(document).ajaxStart(
                function(){
                    $("#ajaxLoader").css("display","block");
                }
            );

            //the ajaxComplete() method specifies a function to be run when an AJAX request completes.
            $(document).ajaxComplete(
                function(){
                    $("#ajaxLoader").css("display","none");
                }
            );

                $("#State").change(
                    function(){
                        //alert($(this).val());
                        loadLocation($(this).val(),'District');
                    }
                );
                $("#District").change(
                    function(){
                        //alert($(this).val());
                        loadLocation($(this).val(),'Taluq');
                    }
                );
               
        }
    );

   
</script>

<script>

    function loadLocation(parentID_, locationType_){
            //alert(parentID_ + locationType_)
        $.post("../../controller/LocationController.php", 
                {
                    locationType : locationType_,
                    parentID: parentID_

                },
                
                
        function(data, status){

            if(status=="success"){
                //alert(data);
                var rootJsonObject = jQuery.parseJSON( data );
                var errorStatusObject = rootJsonObject.error;
                //alert(errorStatusObject);
                if(!errorStatusObject){ //false menas no error
                    $("#"+locationType_).empty();


                var locationArrayObject = rootJsonObject.list;

                

                $("#"+locationType_).append('<option value="0">Select '+ locationType_ +'</option>');
                for(var i = 0; i < locationArrayObject.length; i++){

                    var option = $("<option />");

                    //Set label of option
                    option.html(locationArrayObject[i].name);

                    //Set value of option
                    option.val(locationArrayObject[i].id);

                    $("#"+locationType_).append(option);


                    }


                } else {
                    $("#"+locationType_).empty();
                    $("#"+locationType_).append('<option value="0">Select Location</option>');
                }
                
                //alert(data);
                
                } else {
                    alert("Some Error");
                }
                

                } 
            );

        }

    //by default load State
    loadLocation(0, 'State');

</script>  

  


