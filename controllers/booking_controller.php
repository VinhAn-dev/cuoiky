<?php
session_start();
require_once '../config/auth.php';
require_once '../models/BookingModel.php';

checkLogin();

$bookingModel = new BookingModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $bookingModel->createBooking($_SESSION['user']['id'], $_POST);
    if ($result) {
        $success = "Đặt lịch thành công!";
    } else {
        $error = "Lỗi khi đặt lịch!";
    }
    include '../views/booking.php';
} else {
    $bookings = $bookingModel->getUserBookings($_SESSION['user']['id']);
    include '../views/booking.php';
}
