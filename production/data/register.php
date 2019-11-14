
<?php
	include_once("connection.php");	
	
	class DataClass 
    {
        protected $conn;
        protected $data = array();
        public $postData;
        function __construct() {
            $db = new dbObj();
            $this->conn = $db->getConnection();
        }

        function __destruct() {
            $this->conn->close();
        }

        public function insert($postData)
        {
            if( isset($postData['email']) && isset($postData['password']) && isset($postData['name'])) 
            {

                $name=$postData['name'];
                $email=$postData['email'];
                $password=$postData['password'];

                $sql = "INSERT INTO login(name,email,password) VALUES('$name','$email','$password')";
                $result = mysqli_query($this->conn, $sql);

                header("Location: ../../index.php");
                die();
            }
             
        }
        
    }
	
	$obj = new DataClass();
    $obj->insert($_POST);
?>
	