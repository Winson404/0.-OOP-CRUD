<?php
require_once '../db_connection.php';

class UserCreator extends DatabaseConnection
{
    public function createUser($firstname, $middlename, $lastname, $suffix, $dob, $age, $email, $contact, $birthplace, $gender, $civilstatus, $occupation, $religion, $house_no, $street_name, $purok, $zone, $barangay, $municipality, $province, $region, $image, $password, $user_type, $date_registered)
    {   

        
        
        $sql = "INSERT INTO users (firstname, middlename, lastname, suffix, dob, age, email, contact, birthplace, gender, civilstatus, occupation, religion, house_no, street_name, purok, zone, barangay, municipality, province, region, image, password, user_type, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$dob', '$age', '$email', '$contact', '$birthplace', '$gender', '$civilstatus', '$occupation', '$religion', '$house_no', '$street_name', '$purok', '$zone', '$barangay', '$municipality', '$province', '$region', '$file', '$password', '$user_type', '$date_registered')";

        if ($this->connection->query($sql) === true) {
            return true;
        } else {
            return false;
        }
    }
}

// Handle form submission
if (isset($_POST['submit'])) {
    $userCreator = new UserCreator();

    $name = $_POST['name'];
    $email = $_POST['email'];

    // Create a new user
    $userCreator->createUser($name, $email);
}
?>
