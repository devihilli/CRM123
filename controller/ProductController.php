<?php
class ProductController{


    function __construct()
    {
        require_once '../../config/DBConnect.php';

        $db = new DbConnect();
 
        $this->conn = $db->connect();
	
    }


    function Insert($pname, $category,$price){

        $response = array();

        $stmt_insert = $this->conn->prepare("INSERT INTO tbl_product (pname, category, price) 
        VALUES (?, ?, ?)");
        
        $stmt_insert->bind_param("ssi",$pname, $category, $price);
        
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
        
                $query = "SELECT id, pname, category, price FROM  tbl_product ORDER BY id DESC";
                $stmt = $this->conn->prepare($query);

              	$stmt->execute();
                $stmt->store_result();
        
                 if($stmt->num_rows > 0){
					$stmt->bind_result($id, $pname, $category, $price);
					
                    $list = array(); 
        
                    while($stmt->fetch()){
                        $user  = array();
                        
                            $user['id'] = $id;
                            $user['pname'] = $pname;
                            $user['category'] = $category;
                            $user['price'] = $price;
                            
                         
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
		$stmt = $this->conn->prepare("DELETE FROM tbl_product WHERE id = ?");
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
    

    function Update($id, $pname, $category,  $price ){		
        $response = array();	
            $stmt_update = $this->conn->prepare("UPDATE tbl_product set pname = ?, category = ?, price = ? WHERE id = ?");
            $stmt_update->bind_param("ssii", $pname,  $category,  $price, $id);
            if($stmt_update->execute()){
                $response['error'] = false; 
                $response['message'] =  'updated successfully'; 
            } else {
                $response['error'] = true; 
                $response['message'] = $stmt_update->error.' Error in  updation. Try again'; 
            }
            return json_encode($response);
}


function find_product($id){
    $response = array();
    $query = "SELECT id, pname, category, price FROM tbl_product WHERE id = $id ORDER BY id DESC";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      $stmt->store_result();
      if($stmt->num_rows > 0){
                $stmt->bind_result($id, $pname, $category, $price);
                $list = array(); 
        while($stmt->fetch()){
              $user  = array();
                $user['id'] = $id;
                $user['pname'] = $pname;
                $user['category'] = $category;
                $user['price'] = $price;
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