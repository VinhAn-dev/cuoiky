<?php
session_start();
require_once '../models/UserModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $userModel = new UserModel();
    $user = $userModel->login($username, $password);

    if ($user) {
        $_SESSION['user'] = $user;
        header('Location: ../views/home.php');
    } else {
        $error = "Sai tên đăng nhập hoặc mật khẩu";
        include '../views/login.php'; 
    }
} else {
    include '../views/login.php'; 
}
