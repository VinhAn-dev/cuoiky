<?php
session_start();
require_once '../config/auth.php';
require_once '../models/AdminModel.php';

checkLogin();

if (!isAdmin()) {
    header("Location: ../views/home.php");
    exit();
}

$adminModel = new AdminModel();

$users = $adminModel->getAllUsers();       
$services = $adminModel->getAllServices();

include '../views/admin/dashboard.php';
