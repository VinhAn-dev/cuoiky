<?php
require_once '../models/UserModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userModel = new UserModel();
    $result = $userModel->register($_POST);

    if ($result) {
        header("Location: login.php");
    } else {
        $error = "Đăng ký thất bại!";
        include '../views/register.php';
    }
} else {
    include '../views/register.php';
}
