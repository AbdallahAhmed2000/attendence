<?php
$title = 'Veiw Records';
require_once 'includes/header.php';
require_once 'db/conn.php';

if (!isset($_GET['id'])) {

    include 'includes/erorrmessage.php';
} else {
    $id = $_GET['id'];
    $result = $crud->getAttendeeDetailes($id);
?>

    <div class="card" style="width: 30rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $result['firstname'] . ' ' . $result['lastname']; ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $result['name']; ?>
            </h6>

            <p class="card-text">Date Of Birth:<?php echo $result['birthofdate']; ?></p>
            <p class="card-text">Email:<?php echo $result['emailaddress']; ?></p>
            <p class="card-text">Contact Number:<?php echo $result['contactnumber']; ?></p>

        </div>
    </div>
    <br />

    <a href="viewrecords.php" class="btn btn-info">back to list</a>
    <a href="edit.php?id=<?php echo $result["attendence_id"] ?>" class="btn btn-warning">Edit</a>
    <a onclick="return confirm('Are You Sure You Want to Delete This Record?');" href="delete.php?id=<?php echo $result["attendence_id"] ?>" class="btn btn-danger">Delete</a>


<?php } ?>
<br />
<br />
<br />
<?php require_once 'includes/footer.php'; ?>