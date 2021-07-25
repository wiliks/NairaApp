
<?php 

 
require_once "db.php";

if (isset($_POST["ID"])) {

	$id = $_POST["ID"];

	$sql = "DELETE from package WHERE ID=$id";

$stmt = $db->prepare($sql);


    try {
      $stmt->execute([$id]);
      header('Location:../packages.php?deleted');

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