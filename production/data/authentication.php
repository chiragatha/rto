<?php session_start(); ?>
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

        public function select($postData)
        {
            if( isset($postData['email']) && isset($postData['password'])) 
            {

                $email=$postData['email'];
                $password=$postData['password'];
                $passwordO="";
                $name="";
                $uid="";

                $sql="select * from login where email='$email'";
                $result = mysqli_query($this->conn, $sql);
              
                while($row = mysqli_fetch_array($result))
                {
                  $passwordO=$row['password'];
                  $name=$row['name'];
                  $uid=$row['id'];
                }

                if( $passwordO==$password)
                {
                  $_SESSION['loginok']=true;
                  $_SESSION['name']=$name;
                  $_SESSION['uid']=$uid;
                  header('location:../index.php');
                }
                else
                {
                    $_SESSION['loginok']=false;
                    header('location:../../index.php?message=2');  
                }                   
                die();
            } 
            else
            {
              $_SESSION['loginok']=false;
              header('location:../../index.php?message=1');
              
              die();
            }           
        }
        
    }
  
    $obj = new DataClass();
    $obj->select($_POST);
?>

