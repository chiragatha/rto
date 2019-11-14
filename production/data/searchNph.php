
<?php
include_once("connection.php");
class SearchNph
    {
        protected $conn;
        function __construct() {
            $db = new dbObj();
            $this->conn = $db->getConnection();
        }

        public function getNph(){
            if (isset($_REQUEST['query'])) {
            $query = $_REQUEST['query'];
            $sql = "SELECT nphID, nphPermitNo FROM npheader,vehicle WHERE npheader.vehID=vehicle.vehID AND nphPermitNo LIKE '%{$query}%' ORDER BY nphPermitNo";
            $result=mysqli_query($this->conn, $sql) or die("error to fetch tot employees data");

            $array = array();
            while ($row = mysqli_fetch_array($result)) {
                $array[] = array (
                    'lable' => $row['nphID'],
                    'value' => $row['nphPermitNo'],
                );
            }
            //RETURN JSON ARRAY
            echo json_encode ($array);
        }
    }
}
    $searchNph = new SearchNph();
    $searchNph->getNph();
?>