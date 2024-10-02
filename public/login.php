<?php

namespace App;

require_once '../src/Database.php';
require_once '../src/User.php';

Use PDO;

session_start();

$database = new Database();
$db = $database->connect();

$user = new User($db);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $user->email = $_POST['email'];

        if($user->login()){
            $_SESSION['id'] = $user->id;
            $_SESSION['username'] = $user->username;
    
            echo 'Welcome' . $user->username;
        }else{
            echo 'Failed';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="POST">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>