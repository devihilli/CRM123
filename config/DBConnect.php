<?php
 
/**
 * A class file to connect to database
 */
class DBConnect {
 
    private $conn;

    // constructor
    function __construct() {
        // connecting to database
        //$this->connect();
    }
 
    // destructor
    function __destruct() {
        // closing db connection
        //$this->close();
    }
 
    /**
     * Function to connect with database
     */
    function connect() {
        // import database connection variables
        require_once __DIR__ . '/DBConfig.php';
 
        // Connecting to mysql database
        //$con = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die(mysql_error());
        $this->conn = new mysqli(DB_HOSTSERVER, DB_USER, DB_PASS, DB_NAME);
        // Selecing database
        //$db = mysql_select_db(DB_DATABASE) or die(mysql_error()) or die(mysql_error());
 
        //Checking if any error occured while connecting
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }


        // returing connection cursor
        //return $con;
        return $this->conn;
    }
 
    /**
     * Function to close db connection
     */
    function close() {
        // closing db connection
        mysql_close();
    }
 
}
 
?>