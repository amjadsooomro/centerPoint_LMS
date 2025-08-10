<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');

include_once '../Database/connect.php';
include_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['status'])) {
    $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
    $status = strtolower($_POST['status']) === 'active' ? 'active' : 'inactive';

    if ($id === false || $id <= 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid ID']);
        exit;
    }

    $exam = new Examination();

    if ($exam->toggleStatus($id, $status)) {
        echo json_encode(['success' => true, 'message' => 'Status updated']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update status']);
    }
    exit;
}

echo json_encode(['success' => false, 'message' => 'Invalid request']);
exit;
