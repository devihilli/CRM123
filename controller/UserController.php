<?php
class UserController
{
    private $conn;
  
 
    
    function __construct()
    {
        require_once 'config/DBConnect.php';

        $db = new DbConnect();
 
        $this->conn = $db->connect();
	
    }
	
	
	function Login($username, $tpassword){

        $response = array();

            
        $stmt = $this->conn->prepare("SELECT *  FROM  tbl_user WHERE username = ? AND tpassword = ?");
        
		$stmt->bind_param("ss",$username, $tpassword);
        $stmt->execute();
        $stmt->store_result();
		
        
            if($stmt->num_rows > 0){
                
                $stmt->bind_result($id, $username, $email, $tpassword, $role_id);
                $stmt->fetch();
                
                        //if the account is active
                        $user = array();
                        $user['id'] = $id;
                        $user['username'] = $username;
                        $email['email'] = $email;
                        $user['tpassword'] = $tpassword;
                        $user['role_id'] = $role_id;
                      

                   
                    $response['error'] = false; 
                    $response['message'] = 'Login successful'; 
                    $response['user'] = $user; 


    		}
            else {
    		    // User Not Found
    			$response['error'] = true; 
    			$response['message'] = 'User Not Found Or Invalid Login Details?...';
    		}
		
       
		return json_encode($response);
	}

  
}
?>