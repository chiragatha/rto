

<?php
include_once("connection.php");
class SearchVehicles 
    {
        protected $conn;
        function __construct() {
            $db = new dbObj();
            $this->conn = $db->getConnection();
        }
    public function getVehicles(){
            if (isset($_REQUEST['query'])) {
            $query = $_REQUEST['query'];
            $sql = "SELECT rcID,CONCAT(rcTitle, ' ', rcName) as 'full_name' FROM rcholder WHERE CONCAT(rcTitle, ' ', rcName) LIKE '%{$query}%' ORDER BY CONCAT(rcTitle, ' ', rcName)";
            $result=mysqli_query($this->conn, $sql) or die("error to fetch tot employees data");

            $array = array();
            while ($row = mysqli_fetch_array($result)) {
                $array[] = array (
                    'lable' => $row['rcID'],
                    'value' => $row['full_name'],
                );
            }
            //RETURN JSON ARRAY
            echo json_encode ($array);
        }
    }
}
    $searchVehichal = new SearchVehicles();
    $searchVehichal->getVehicles();
?>
