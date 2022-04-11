<?php
$title = 'Edit Record';

require_once 'includes/header.php';
require_once 'db/conn.php';

$results = $crud->getSpecialties();

if (!isset($_GET['id'])) {

    include 'includes/erorrmessage.php';
    header("Location: viewrecords.php");
} else {
    $id = $_GET['id'];
    $attendee = $crud->getAttendeeDetailes($id);
}
?>

<h1 class='text-center'>Edit Record</h1>

<form method="post" action="editPost.php">


    <div class="form-group">
        <input type="hidden" class="form-control" name="id" value="<?php echo $attendee['attendence_id']  ?>" />
    </div>

    <div class="form-group">
        <label for="firstName" class="col-sm-2 col-form-label">First Name</label>
        <input type="text" class="form-control" id="firstName" value="<?php echo $attendee['firstname']; ?>" name="firstName" placeholder="FirstName">
    </div>

    <div class="form-group">
        <label for="lastName" class="col-sm-2 col-form-label">Last Name</label>
        <input type="text" class="form-control" id="lastName" value="<?php echo $attendee['lastname']; ?>" name="lastName" placeholder="LastName">
    </div>

    <div class="form-group">
        <label for="dop" class="col-sm-2 col-form-label">Date Of Birth</label>
        <input type="text" class="form-control" id="dob" value="<?php echo $attendee['birthofdate']; ?>" name="dob">
    </div>

    <div class="form-group">
        <label for="specailty" class="col-sm-2 col-form-label">Area of Expertise</label>
        <select class="form-select" id="specailty" name="specailty">
            <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value='<?php echo $r['specailty_id'] ?>' <?php if ($r['specailty_id'] == $attendee['specailty_id'])  echo 'selected' ?>>
                    <?php echo $r['name'] ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <input type="Email" class="form-control" id="email" value="<?php echo $attendee['emailaddress']; ?>" name="email" placeholder="email@example.com">
    </div>

    <div class="form-group">
        <label for="phone" class="col-sm-2 col-form-label">Contact Number</label>
        <input type="text" class="form-control" id="phone" value="<?php echo $attendee['contactnumber']; ?>" name="phone">
    </div>
    <br />
    <div class="d-grid gap-2">
        <button type="submit" name="submit" class=" btn btn-success btn-block">Save Changes</button>
    </div>
</form>
<br />
<br />
<br />
<br />


<?php
require_once 'includes/footer.php';
?>