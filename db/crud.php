
<?php

class crud
{
    //private database object
    private $db;
    //constructor to intialize private variable to the database connection
    function __construct($conn)
    {
        $this->db = $conn;
    }
    //function to insert a new record into the attendence database
    public function insertAttendees($fname, $lname, $dob, $email, $contact, $specailty)
    {

        try {
            // define sql statement to be executed
            $sql = "INSERT INTO attendence(firstname,lastname,birthofdate,emailaddress,contactnumber,specailty_id) 
            VALUES (:fname,:lname,:dob,:email,:contact,:specailty)";
            // prepare sql statement for execution
            $stmt = $this->db->prepare($sql);
            // bind all placeholders to the actual values
            $stmt->bindparam(':fname', $fname);
            $stmt->bindparam(':lname', $lname);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $contact);
            $stmt->bindparam(':specailty', $specailty);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function editAttendees($id, $fname, $lname, $dob, $email, $contact, $specailty)
    {

        try {
            // define sql statement to be executed
            $sql = "UPDATE `attendence` SET `firstname`=:fname,`lastname`=:lname,`birthofdate`=:dob,`emailaddress`=:email,
            `contactnumber`=:contact,`specailty_id`=:specailty WHERE attendence_id = :id ";
            $stmt = $this->db->prepare($sql);
            // bind all placeholders to the actual values
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':fname', $fname);
            $stmt->bindparam(':lname', $lname);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $contact);
            $stmt->bindparam(':specailty', $specailty);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAttendees()
    {
        $sql = "SELECT * FROM `attendence` a inner join specailty s on a.specailty_id = s.specailty_id;";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getAttendeeDetailes($id)
    {

        try {

            $sql = "SELECT * FROM attendence a inner join specailty s on a.specailty_id = s.specailty_id where attendence_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function deleteAttendee($id)
    {

        try {

            $sql = "DELETE FROM `attendence` WHERE `attendence`.`attendence_id` = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {

            echo $e->getMessage();
            return false;
        }
    }

    public function getSpecialties()
    {
        $sql = "SELECT * FROM `specailty`;";
        $result = $this->db->query($sql);
        return $result;
    }
}
?>