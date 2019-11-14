

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
            $sql = "SELECT vehID, vehVehicleNo FROM vehicle WHERE vehVehicleNo LIKE '%{$query}%' ORDER BY vehVehicleNo";
            $result=mysqli_query($this->conn, $sql) or die("error to fetch tot employees data");

            $array = array();
            while ($row = mysqli_fetch_array($result)) {
                $array[] = array (
                    'lable' => $row['vehID'],
                    'value' => $row['vehVehicleNo'],
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