<?php
	include_once("connection.php");	
	
	class DataClass 
    {
        protected $conn;
        function __construct() {
            $db = new dbObj();
            $this->conn = $db->getConnection();
        }

        function __destruct() {
            $this->conn->close();
        }

        
          public function checkChesisNo ()
        {
               $isAvailable = true;
            $chassisNo = $_POST['chassisNo'];
            $sql = "SELECT vehChassisNo FROM vehicle WHERE vehChassisNo LIKE '$chassisNo'";
            $result=mysqli_query($this->conn, $sql) or die("error to fetch tot employees data");
           // $rows=mysqli_num_rows($result);
            if(mysqli_num_rows($result)>0){
                $isAvailable = false;
            }
            // Check its existence (for example, execute a query from the database) ...
         // or false

            // Finally, return a JSON
            echo json_encode(array(
                'valid' => $isAvailable,
            ));
        }
    }
    $obj = new DataClass();
    $obj->checkChesisNo();