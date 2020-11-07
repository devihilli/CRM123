<?php
class CustomerController
{
    private $conn;
    //$response = array();
    
    function __construct()
    {
        require_once  '../../config/DBConnect.php';

        $db = new DbConnect();
 
        $this->conn = $db->connect();
	
    }
	
	

    function Insert($firstname, $lastname, $caddress, $cuser_id, $mobile, $city, $email, $dateofbirth, $state_id, $district_id, $taluq_id)
    {
           
       
		    $response = array();
      
			$stmt_insert = $this->conn->prepare("INSERT INTO tbl_customer (firstname, lastname, caddress, cuser_id, mobile, city, email, dateofbirth, state_id, district_id, taluq_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                
                $stmt_insert->bind_param("sssisssdiii",$firstname, $lastname, $caddress,  $cuser_id, $mobile, $city, $email, $dateofbirth, $state_id, $district_id, $taluq_id );
                
				        if($stmt_insert->execute()){
						
							$response['error'] = false; 
							$response['message'] = 'Customer Created successfully'; 
						
						} else {
							$response['error'] = true; 
							$response['message'] = 'Error: ';
						}
				
		
        return json_encode($response);
    }

    function Delete($id){
		$response = array();
		$stmt = $this->conn->prepare("DELETE FROM tbl_customer WHERE id = ?");
		$stmt->bind_param("i", $id);
		if($stmt->execute()){
			$response['error'] = false; 
			$response['message'] = 'deleted successfully';
		} else {
			$response['error'] = true; 
			$response['message'] = $stmt->error.' Error  Try again'; 
		}
		return json_encode($response);
	}
    
	function List(){

        $response = array();
        
                $query = "SELECT c.firstname,c.lastname,c.caddress,c.mobile,c.city,c.email,c.dateofbirth,s.name as 'state', d.name as 'district',t.name as 'taluq' from tbl_customer c inner join tbl_state s on s.id=c.state_id inner join tbl_district d on d.id=c.district_id inner join tbl_taluq t on t.id= c.taluq_id";
                $stmt = $this->conn->prepare($query);

              	$stmt->execute();
                $stmt->store_result();
        
                 if($stmt->num_rows > 0){
                    $stmt->bind_result($firstname, $lastname, $caddress, $mobile, $city, $email, $dateofbirth, $state_id, $district_id, $taluq_id);					
                    $list = array(); 
        
                    while($stmt->fetch()){
                        $user  = array();
                        
                            //$user['id'] = $id;

                            $user['firstname'] = $firstname;

                            $user['lastname'] = $lastname;

                            $user['caddress'] = $caddress;

                            $user['mobile'] = $mobile;

                            $user['city'] = $city;

                            $user['email'] = $email;

                            $user['dateofbirth'] = $dateofbirth;

                            $user['state'] = $state_id;

                            $user['district'] = $district_id;

                            $user['taluq'] = $taluq_id;

                        
                            
                         
                        array_push($list, $user); 
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
    
   
	
	function Update($id, $firstname, $lastname, $caddress, $mobile, $city, $email, $dateofbirth, $state_id, $district_id, $taluq_id){
			
		$response = array();
			
	            $stmt_update = $this->conn->prepare("UPDATE tbl_customer set firstname, lastname, caddress, mobile, city, email, dateofbirth, state_id, district_id, taluq_id WHERE id = ?");
				$stmt_update->bind_param("ssssssssiii",$firstname, $lastname, $caddress, $mobile,  $city, $email, $dateofbirth, $state_id, $district_id, $taluq_id );
				if($stmt_update->execute()){
					$response['error'] = false; 
					$response['message'] =  'updated successfully'; 
				} else {
					$response['error'] = true; 
					$response['message'] = $stmt_update->error.' Error in user updation. Try again'; 
				}
		
				return json_encode($response);
	 
	}


	function find_customer($id){
		$response = array();
        $query = "SELECT id, firstname, lastname, caddress, mobile, city, email, dateofbirth, state_id, district_id, taluq_id FROM  tbl_customer where id=$id";
                $stmt = $this->conn->prepare($query);

              	$stmt->execute();
                $stmt->store_result();
        
                 if($stmt->num_rows > 0){
					$stmt->bind_result($id, $firstname, $lastname, $caddress, $mobile, $city, $email, $dateofbirth, $state_id, $district_id, $taluq_id);
					
                    $list = array(); 
        
                    while($stmt->fetch()){
                        $user  = array();
                        
                            $user['id'] = $id;
                            $user['firstname'] = $firstname;
                            $user['lastname'] = $lastname;
                            $user['caddress'] = $caddress;
                            $user['mobile'] = $mobile;
                            $user['city'] = $city;
                            $user['email'] = $email;
                            $user['dateofbirth'] = $dateofbirth;
                            $user['name'] = $name;
                            $user['name'] = $name;
                            $user['name'] = $name;
                          
                            
                        array_push($list, $user); 
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
?>