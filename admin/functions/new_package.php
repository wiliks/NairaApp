
<?php 

require_once "db.php";


  // session_start();

  // // If session variable is not set it will redirect to login page

  // if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
  //     header('Location:../login.php');
  //   exit;

  // }

  // $email = $_SESSION['email'];
  $ID = $_POST['ID'];
  $name = $_POST['name'];
  $location = $_POST['location'];
  $firstlocation = $_POST['firstlocation'];
  $maplocation = $_POST['maplocation'];
  $destination = $_POST['destination'];
  

  $target_dir = "uploads/";
$target_file = $target_dir . $ID.".png";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 // $sql = "SELECT id FROM admin WHERE email = ?";
 // $stmt = $db->prepare($sql);
 // $stmt->execute([$email]);


 // if ($stmt->rowCount()>0) {
      // email already EXISTS
  //      echo "Oops...This email already exists!";
        // die();
//  }
  

  if (isset($_POST["submit"])) {
    // Add task to DB
    $sql = "INSERT INTO package(ID, name, location,maplocation,destination,firstlocation)
    VALUES (?,?,?,?,?,?)";

    $stmt = $db->prepare($sql);
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

    if($check !== false) {
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      } 
      if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      } 
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
} 
      
      $uploadOk = 1;
  } else {
      echo "File is not an image.";
      $uploadOk = 0;
  }
    
  }
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      try {
        $stmt->execute([$ID, $name, $location,$maplocation,$destination,$firstlocation]);
        header('Location:../packages.php?posted');
    
        }
    
       catch (Exception $e) {
          $e->getMessage();
          echo "Error";
      }
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }













?>