<?php

require_once '../Libraries/Database.php';
require_once '../Models/UserModel.php';
require_once '../Controllers/AuthenticationController.php';

$loginResult = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  // declare a new database connection
  $dbObj = new Database();
  // open database connection
  $dbConnection = $dbObj->openConnection();
  
  $authObj = new AuthenticationController();
  $userModel = new UserModel($dbConnection);
  // declare a new user manager and pass the database connection
  $loginResult = $authObj->login($userModel, $_POST['username'], $_POST['password']);


  }
  

?>

<?php 
$headerTitle = "Login Page";
require_once '../layout/header.php';
?>

<form method="POST">
    <br>
    <input type="text"  name="username" placeholder="username">
    <br> <br>
    <input type="password" name="password" placeholder="password">
    <br> <br>

    <br> <br>
    <input type="reset" value="CLEAR">
    <input type="submit" value="LOGIN">
</form>


<?php
 if(!empty($loginResult)){
    
  echo "<script>";
  echo "alert('{$loginResult['msg']}')";
  echo "</script>";
  echo "<script>window.location.href='Dashboard.php'</script>";
 }

?>


<?php 
require_once '../layout/footer.php';
?>