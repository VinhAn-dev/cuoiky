<?php
session_start();
require_once '../config/auth.php';
require_once '../models/BookingModel.php';

checkLogin();

$bookingModel = new BookingModel();
$orders = $bookingModel->getUserBookings($_SESSION['user']['id']);

include '../views/orders.php';
