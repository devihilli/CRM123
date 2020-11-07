<?php
class SaleController
{
    private $conn;
    //$response = array();
    
    function __construct()
    {
        require_once  '../../config/DBConnect.php';

        $db = new DbConnect();
 
        $this->conn = $db->connect();
	
    }
	
    function Insert($quantity, $product_id, $customer_id, $total)
    {
        
       $response = array();
      
			$stmt_insert = $this->conn->prepare("INSERT INTO tbl_sale (quantity, product_id, customer_id, total) 
                VALUES (?, ?, ?, ?)");
                
                $stmt_insert->bind_param("sssi",$quantity, $product_id, $customer_id, $total);
                
				        if($stmt_insert->execute()){
						
							$response['error'] = false; 
							$response['message'] = 'Customer Created successfully'; 
						
						} else {
							$response['error'] = true; 
							$response['message'] = 'Error: ';
						}
				
		
		return json_encode($response);
	}
    
    
    function List(){

        $response = array();

        $query = "SELECT c.firstname, p.pname,  s.quantity,s.total  From tbl_sale s, tbl_product p, tbl_customer c WHERE s.product_id = P.id AND s.customer_id = c.id";
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0){

            $stmt->bind_result($quantity, $product_id, $customer_id, $total);

            $list = array(); 

          while($stmt->fetch()){
          $user  = array();
           
            $user['quantity'] = $quantity;
            $user['pname'] = $product_id;
            $user['firstname'] = $customer_id;
            $user['total'] = $total;
            
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
		$stmt = $this->conn->prepare("DELETE FROM tbl_sale WHERE id = ?");
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
    
    
    function Update($id, $quantity, $product_id, $customer_id, $total){		
        $response = array();	
            $stmt_update = $this->conn->prepare("UPDATE tbl_sale  set quantity = ?, product_id = ?,  customer_id=?, total=?  WHERE id = ?");
            $stmt_update->bind_param("sssii", $quantity,  $product_id, $customer_id, $total, $id);
            if($stmt_update->execute()){
                $response['error'] = false; 
                $response['message'] =  'updated successfully'; 
            } else {
                $response['error'] = true; 
                $response['message'] = $stmt_update->error.' Error in  updation. Try again'; 
            }
            return json_encode($response);
}


function find_sale($id){
    $response = array();
    $query = "SELECT id, quantity, product_id, customer_id, total FROM tbl_sale WHERE id = $id ORDER BY id DESC";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      $stmt->store_result();
      if($stmt->num_rows > 0){
                $stmt->bind_result($id, $quantity, $customer_id, $total);
                $list = array(); 
        while($stmt->fetch()){
              $user  = array();
                $user['id'] = $id;
                $user['quantity'] = $quantity;
                $user['pname'] = $product_id;
                $user['firstname'] = $customer_id;
                $user['total'] = $total;
              
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