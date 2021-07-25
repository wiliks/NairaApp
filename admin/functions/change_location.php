
<?php 

 
require_once "db.php";

if (isset($_POST["ID"])) {

    $id = $_POST["ID"];
    $location = $_POST["location"];
    $maplocation = $_POST["maplocation"];

	$sql = "UPDATE package SET location='$location', maplocation='$maplocation' WHERE ID='$id';  ";

$stmt = $db->prepare($sql);


    try {
      $stmt->execute([$id]);
      header('Location:../packages.php?changed');

      }

     catch (Exception $e) {
        $e->getMessage();
        echo "Error";
    }

}
else {
	header('Location:../packages.php?del_error');
}

	

?>