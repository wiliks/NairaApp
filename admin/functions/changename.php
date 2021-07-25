
<?php 

 
require_once "db.php";

if (isset($_POST["name"])) {

	$name = $_POST["name"];

	$sql = "UPDATE namez SET namez='$name' ";

$stmt = $db->prepare($sql);


    try {
      $stmt->execute([$id]);
      header('Location:../index.php?deleted');

      }

     catch (Exception $e) {
        $e->getMessage();
        echo "Error";
    }

}
else {
	header('Location:../users.php?del_error');
}

	

?>