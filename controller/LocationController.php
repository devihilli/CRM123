<?php
class LocationController
{
    private $conn;
  
    
    function __construct()
    {
        require_once '../config/DBConnect.php';

        $db = new DbConnect();
 
        $this->conn = $db->connect();
	
    }
	
    

	function StateList(){

        $response = array();
        
                $query = "select id, name from tbl_state order by name asc";
                $stmt = $this->conn->prepare($query);

              	$stmt->execute();
                $stmt->store_result();
                //s $stmt->num_rows;
                 if($stmt->num_rows > 0){
					$stmt->bind_result($id, $name);
					
                    $list = array(); 
        
                    $location['id'] = 0;
                     $location['name'] = "Select state";
                            
                    while($stmt->fetch()){
                        $location  = array();
                        
                            $location['id'] = $id;
                            $location['name'] = $name;
                            
                        array_push($list, $location); 
                     }
                    
                        $response['error'] = false; 
                        $response['message'] = 'Success';
                        $response['count'] = $stmt->num_rows; 
                        $response['list'] = $list; 
                     
                 } else {
                    $response['error'] = true; 
                    $response['message'] = 'No Records Found?.';
                }

         return json_encode($response);
     
    }
    
    function DistrictList($state_id){

        $response = array();
        
                $query = "select id, name from tbl_district where id = ? order by name asc";
                $stmt = $this->conn->prepare($query);
                $stmt ->bind_param("i",$state_id);
              	$stmt->execute();
                $stmt->store_result();
                 //echo $stmt->num_rows;
                 if($stmt->num_rows > 0){
					$stmt->bind_result($id, $name);
					
                    $list = array(); 
        
                    $location['id'] = 0;
                     $location['name'] = "Select District";
                            
                    while($stmt->fetch()){
                        $location  = array();
                        
                            $location['id'] = $id;
                            $location['name'] = $name;
                            
                            
                         
                        array_push($list, $location); 
                     }
                    
                        $response['error'] = false; 
                        $response['message'] = 'Success';
                        $response['count'] = $stmt->num_rows; 
                        $response['list'] = $list; 
                     
                 } else {
                    $response['error'] = true; 
                    $response['message'] = 'No Records Found?.';
                }

         return json_encode($response);
     
    }
    
    function TaluqList($district_id){

        $response = array();
        
                $query = "select id, name from tbl_taluq where id = ? order by name asc";
                $stmt = $this->conn->prepare($query);
                $stmt ->bind_param("i",$district_id);
              	$stmt->execute();
                $stmt->store_result();
                 //echo $stmt->num_rows;
                 if($stmt->num_rows > 0){
					$stmt->bind_result($id, $name);
					
                    $list = array(); 
        
                    $location['id'] = 0;
                     $location['name'] = "Select taluq";
                            
                    while($stmt->fetch()){
                        $location  = array();
                        
                            $location['id'] = $id;
                            $location['name'] = $name;
                            
                            
                         
                        array_push($list, $location); 
                     }
                    
                        $response['error'] = false; 
                        $response['message'] = 'Success';
                        $response['count'] = $stmt->num_rows; 
                        $response['list'] = $list; 
                     
                 } else {
                    $response['error'] = true; 
                    $response['message'] = 'No Records Found?.';
                }

         return json_encode($response);
     
    }
    
   

  
}
if(isset($_POST['locationType'])){
$locationType = $_POST['locationType'];
$parentID = $_POST['parentID'];
switch($locationType){
    case 'State':
        $stateList = new  LocationController();
        echo  $stateList->StateList();
    break;

    case 'District':
        $districtList = new  LocationController();
        echo  $districtList->DistrictList($parentID);
    break;

    case 'Taluq':
        $taluqList = new  LocationController();
        echo  $taluqList->TaluqList($parentID);
    break;
    
  }
}

//$stateList = new  LocationController();
//echo  $stateList->StateList();

?>