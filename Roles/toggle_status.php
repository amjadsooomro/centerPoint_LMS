<?php
include_once 'functions.php';

include_once '..\Database\connect.php';
if (!isset($_GET['id']) || !isset($_GET['status'])) {
    die('Invalid request');
}

$id = (int) $_GET['id'];
$status = (int) $_GET['status'];

$exam = new Examination();
if ($exam->toggleStatus($id, $status)) {
    header('Location: exam.php?status=success');
    exit;
} else {
    echo 'Failed to update status.';
}
?>
