<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST['admin_name'];
    $user_password = $_POST['admin_password'];

    if ($user_name === 'admin' && $user_password === '1234') {
        $_SESSION['current_user_name'] = $user_name;
        header("location: insert_category.php");
        exit();
    } else {
        echo "Incorrect username or password!";
    }
}
?>
