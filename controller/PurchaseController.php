<?php
class PurchaseController{


    function __construct()
    {
        require_once '../../config/DBConnect.php';

        $db = new DbConnect();
 
        $this->conn = $db->connect();
	
    }


    function Insert($item_code, $date_of_purchase){

        $response = array();

        $stmt_insert = $this->conn->prepare("INSERT INTO tbl_purchase (item_code, date_of_purchase) 
        VALUES (?, ?)");
        
        $stmt_insert->bind_param("sd",$item_code, $date_of_purchase);
        
                if($stmt_insert->execute()){
                
                    $response['error'] = false; 
                    $response['message'] = 'Product Created successfully'; 
                
                } else {
                    $response['error'] = true; 
                    $response['message'] = 'Error: ';
                }
        
                 return json_encode($response);
    }

    function List(){

        $response = array();
        
                $query = "SELECT id, item_code, date_of_purchase FROM  tbl_purchase ORDER BY id DESC";
                $stmt = $this->conn->prepare($query);

              	$stmt->execute();
                $stmt->store_result();
        
                 if($stmt->num_rows > 0){
					$stmt->bind_result($id, $item_code, $date_of_purchase);
					
                    $list = array(); 
        
                    while($stmt->fetch()){
                        $user  = array();
                        
                            $user['id'] = $id;
                            $user['item_code'] = $item_code;
                            $user['date_of_purchase'] = $date_of_purchase;
                            //$user['quantity'] = $quantity;
                            
                         
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
    
    
    function Delete($id){
		$response = array();
		$stmt = $this->conn->prepare("DELETE FROM tbl_purchase WHERE id = ?");
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
    

    function Update($id, $item_code, $date_of_purchase,  $quantity ){		
        $response = array();	
            $stmt_update = $this->conn->prepare("UPDATE tbl_purchase set item_code = ?, date_of_purchase = ? WHERE id = ?");
            $stmt_update->bind_param("sdi", $item_code,  $date_of_purchase, $id);
            if($stmt_update->execute()){
                $response['error'] = false; 
                $response['message'] =  'updated successfully'; 
            } else {
                $response['error'] = true; 
                $response['message'] = $stmt_update->error.' Error in  updation. Try again'; 
            }
            return json_encode($response);
}


function find_purchase($id){
    $response = array();
    $query = "SELECT id, item_code, date_of_purchase FROM tbl_purchase WHERE id = $id ORDER BY id DESC";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      $stmt->store_result();
      if($stmt->num_rows > 0){
                $stmt->bind_result($id, $item_code, $date_of_purchase);
                $list = array(); 
        while($stmt->fetch()){
              $user  = array();
                $user['id'] = $id;
                $user['item_code'] = $item_code;
                $user['date_of_purchase'] = $date_of_purchase;
                //$user['quantity'] = $quantity;
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