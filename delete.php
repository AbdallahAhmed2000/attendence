<?php

require_once 'db/conn.php';

if (!isset($_GET['id'])) {

    include 'includes/erorrmessage.php';
    header("Location: viewrecords.php");
} else {
    $id = $_GET['id'];

    $result = $crud->deleteAttendee($id);

    if ($result) {
        header('Location: viewrecords.php');
    } else {
        include 'includes/erorrmessage.php';
    }
}
