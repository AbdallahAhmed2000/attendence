<?php
require_once 'db/conn.php';

//Get values from post operation

if (isset($_POST['submit'])) {
    //Extract values from the $_post array
    $id = $_POST['id'];
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $specailty = $_POST['specailty'];

    //Call Crud Function
    $result = $crud->editAttendees($id, $fname, $lname, $dob, $email, $contact, $specailty);

    //Redirect to index.php
    if ($result) {
        header("Location: viewrecords.php");
    } else {
        include 'includes/erorrmessage.php';
    }
} else {

    include 'includes/erorrmessage.php';
}
