<?php
include_once 'functions.php';

if (!isset($_GET['id'])) {
    die('Invalid request');
}

$id = (int) $_GET['id'];

$exam = new Examination();
$existingRecord = $exam->fetchOne($id);

// if (!$existingRecord) {
//     die('Record not found');
// }

if ($exam->delete($id)) {
    header('Location: dashboard.php?status=success');
    exit;
} else {
    echo 'Failed to delete record.';
}
?>
