<?php
$title = 'Success';

    require_once 'includes/header.php';
    require_once 'db/conn.php';


if (isset($_POST['submit'])) {
    //Extract values from the $_post array

    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $specialty = $_POST['specailty'];
    //call function to insert and check of success or not

    $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty);

    if ($isSuccess) {
        
         include 'includes/successmessage.php';
    } else {
        include 'includes/erorrmessage.php';
    }
}
?>
    <br />
    <br />

<!--get values by method ='get' -->
<!--
<div class="card" style="width: 30rem;">
    <div class="card-body">
        <h5 class="card-title">
            <?php // echo $_GET['firstName'] . ' ' . $_GET['lastName']; 
            ?>
        </h5>
        <h6 class="card-subtitle mb-2 text-muted">
            <?php //echo $_GET['specailty']; 
            ?>
        </h6>

        <p class="card-text">Date Of Birth:<?php //echo $_GET['dob']; 
                                            ?></p>
        <p class="card-text">Email:<?php //echo $_GET['email']; 
                                    ?></p>
        <p class="card-text">Contact Number:<?php //echo $_GET['phone']; 
                                            ?></p>

    </div>
</div>
-->
<!-- get values by method = 'post'-->
<div class="card" style="width: 30rem;">
    <div class="card-body">
        <h5 class="card-title">
            <?php echo $_POST['firstName'] . ' ' . $_POST['lastName']; ?>
        </h5>
        <h6 class="card-subtitle mb-2 text-muted">
            <?php echo $_POST['specailty']; ?>
        </h6>

        <p class="card-text">Date Of Birth:<?php echo $_POST['dob']; ?></p>
        <p class="card-text">Email:<?php echo $_POST['email']; ?></p>
        <p class="card-text">Contact Number:<?php echo $_POST['phone']; ?></p>

    </div>
</div>

<?php
require_once 'includes/footer.php';
?>