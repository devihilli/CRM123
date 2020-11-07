<?php
class StaffController
{
    private $conn;
    //$response = array();
    
    function __construct()
    {
        require_once  '../../config/DBConnect.php';

        $db = new DbConnect();
 
        $this->conn = $db->connect();
	
    }
	
    function Insert($staffname, $email, $mobile, $userid, $dateofbirth, $image, $tpassword, $role_id)
    {
        
      $response = array();
  
    
    $stmt_insert_user = $this->conn->prepare("INSERT INTO tbl_user (username, tpassword) 
    VALUES (?, ?)");

      $stmt_insert_user->bind_param("ss", $staffname, $tpassword);

           
        if($stmt_insert_user->execute()){

      $image = $_FILES['image']['name'];
     
      $file_tmp  = $_FILES['image']['tmp_name']; //actually holding your file data
     
     move_uploaded_file($file_tmp, '../../upload/'.$image); 
//insert data
			$stmt_insert = $this->conn->prepare("INSERT INTO tbl_staff( staffname, mobile, email, userid, dateofbirth, image)
                VALUES (?, ?, ?, ?, ?,?)");
                
                $stmt_insert->bind_param("sssids",$staffname, $mobile, $email, $userid, $dateofbirth, $image);
                
				        if($stmt_insert->execute()){
						
							$response['error'] = false; 
							$response['message'] = 'Staff Created successfully'; 
						
						} else {
							$response['error'] = true; 
							$response['message'] = 'Error: ';
						}
          
          }
		return json_encode($response);
	}

	function Delete($id){
		$response = array();
		$stmt = $this->conn->prepare("DELETE FROM tbl_staff WHERE id = ?");
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
      $query = "SELECT id, staffname, email, mobile, dateofbirth FROM  tbl_staff ORDER BY id DESC";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      $stmt->store_result();
      if($stmt->num_rows > 0){
				$stmt->bind_result($id, $staffname, $email, $mobile,$dateofbirth);
				$list = array(); 
        while($stmt->fetch()){
        $user  = array();
          $user['id'] = $id;
          $user['staffname'] = $staffname;
          $user['email'] = $email;
          $user['mobile'] = $mobile;
          
          $user['dateofbirth'] = $dateofbirth;
                            
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
    
    function Update($id, $staffname, $mobile, $email,  $dateofbirth ){		
		    $response = array();	
				$stmt_update = $this->conn->prepare("UPDATE tbl_staff  set 	staffname = ?, mobile = ?, email = ?, 	dateofbirth = ? WHERE id = ?");
				$stmt_update->bind_param("sssdi", $staffname,  $mobile, $email, $dateofbirth, $id);
				if($stmt_update->execute()){
					$response['error'] = false; 
					$response['message'] =  'updated successfully'; 
				} else {
					$response['error'] = true; 
					$response['message'] = $stmt_update->error.' Error in  updation. Try again'; 
				}
				return json_encode($response);
  }


 function find_staff($id){
		$response = array();
        $query = "SELECT id, staffname, mobile, email, userid, dateofbirth FROM tbl_staff WHERE id = $id ORDER BY id DESC";
          $stmt = $this->conn->prepare($query);
          $stmt->execute();
          $stmt->store_result();
          if($stmt->num_rows > 0){
					$stmt->bind_result($id, $staffname, $mobile,$email, $userid, $dateofbirth);
					$list = array(); 
            while($stmt->fetch()){
                  $user  = array();
                    $user['id'] = $id;
                    $user['staffname'] = $staffname;
                    $user['mobile'] = $mobile;
                    $user['email'] = $email;
                    $user['userid'] = $userid;
                    $user['dateofbirth'] = $dateofbirth;
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