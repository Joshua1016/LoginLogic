<?php

require_once '../Libraries/Database.php';
require_once '../Models/UserModel.php';
require_once '../Controllers/AuthenticationController.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // declare a new database connection
    $dbObj = new Database();
    // open database connection
    $dbConnection = $dbObj->openConnection();

    $userModel = new UserModel($dbConnection);
    // declare a new user manager and pass the database connection
    $userList = $userModel->fetchAll();
}


?>

<?php
$headerTitle = "USER's Table";
require_once '../layout/ulo.php';
?>

<table>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
    </tr>


    <?php
    foreach ($userList as $user) {
        echo "<tr>";
        echo "<td>" . $user['id'] . "</td>";
        echo "<td>" . $user['first_name'] . "</td>";
        echo "<td>" . $user['last_name'] . "</td>";
        echo "<td>" . $user['gender'] . "</td>";
        echo "</tr>";
    }
    ?>

</table>









<?php
require_once '../layout/footer.php';
?>