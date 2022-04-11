 <?php
    $title = 'Index';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();
    ?>

 <h1 class='text-center'>Regsiteration For IT Conference</h1>

 <form method="post" action="success.php">

     <div class="form-group">
         <label for="firstName" class="col-sm-2 col-form-label">First Name</label>
         <input required type="text" class="form-control" id="firstName" name="firstName" placeholder="FirstName">
     </div>

     <div class="form-group">
         <label for="lastName" class="col-sm-2 col-form-label">Last Name</label>
         <input required type="text" class="form-control" id="lastName" name="lastName" placeholder="LastName">
     </div>

     <div class="form-group">
         <label for="dop" class="col-sm-2 col-form-label">Date Of Birth</label>
         <input type="text" class="form-control" id="dob" name="dob">
     </div>

     <div class="form-group">
         <label for="specailty" class="col-sm-2 col-form-label">Area of Expertise</label>
         <select class="form-select" id="specailty" name="specailty">
             <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                 <option value='<?php echo $r['specailty_id'] ?>'><?php echo $r['name'] ?></option>
             <?php } ?>
         </select>
     </div>

     <div class="form-group">
         <label for="email" class="col-sm-2 col-form-label">Email</label>
         <input required type="Email" class="form-control" id="email" name="email" placeholder="email@example.com">
     </div>

     <div class="form-group">
         <label for="phone" class="col-sm-2 col-form-label">Contact Number</label>
         <input type="text" class="form-control" id="phone" name="phone">
     </div>
     <br />
     <div class="d-grid gap-2">
         <button type="submit" name="submit" class=" btn btn-primary btn-block">Submit</button>
     </div>
 </form>
 <br />
 <br />
 <br />
 <br />


 <?php
    require_once 'includes/footer.php';
    ?>