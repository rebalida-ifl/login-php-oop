<?php

namespace App;

require_once '../src/Database.php';
require_once '../src/User.php';

$database = new Database();
$db = $database->connect();

$user = new User($db);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user->email = $_POST['email'];
    $user->username = $_POST['username'];
    $user->password = $_POST['password'];

    if($user->emailExist()){
        echo 'Email Already Exists';
    }else{
        if($user->register()){ 
            echo 'Success';
        }else{
            echo 'Failed to register user';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <form action="register.php" method="POST">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>