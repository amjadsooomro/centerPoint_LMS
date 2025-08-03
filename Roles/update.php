<?php

require_once __DIR__ . '/functions.php';

$exam = new Examination();
 if ($exam->update(
        $id,
        $subject,
        $semester,
        $instructor,
        $lab,
        $date_time,
        $time_slot,
        $message,
        $link_share
    )) {
        header('Location: dashboard.php?status=success');
        exit;
    } else {
        echo '<div class="alert alert-danger">Failed to update record.</div>';
        exit;
    }


?>