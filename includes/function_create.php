<?php
	
	// USER LOGIN
	class Userlogin extends DatabaseConnection {
	    public function login($email, $password) {
	        $conn = $this->getConnection();

	        // Prepare the query to select the user by email
	        $sql = "SELECT * FROM users WHERE email=?";
	        $stmt = $conn->prepare($sql);
	        $stmt->bind_param("s", $email);

	        // Execute the query
	        if ($stmt->execute()) {
	            // Retrieve the user record
	            $result = $stmt->get_result();
	            $row = $result->fetch_assoc();

	            // Verify if the user exists and the password is correct
	            if ($row && password_verify($password, $row['password'])) {
	                $position = $row['user_type'];

	                $log_ID = $row['user_Id'];
	                $login_time = date("Y-m-d h:i A");
	                $login = mysqli_query($this->conn, "INSERT INTO log_history (user_Id, login_time) VALUES ('$log_ID', '$login_time')");

	                if ($position == 'Admin') {
	                    $_SESSION['login_attempts'] = 0;
	                    $_SESSION['last_login_attempt'] = time();
	                    $_SESSION['admin_Id'] = $row['user_Id'];
	                    $_SESSION['login_time'] = $login_time;
	                    header("Location: Admin/admin.php");
	                    exit();
	                } else {
	                    $_SESSION['login_attempts'] = 0;
	                    $_SESSION['last_login_attempt'] = time();
	                    $_SESSION['user_Id'] = $row['user_Id'];
	                    $_SESSION['login_time'] = $login_time;
	                    header("Location: User/profile.php");
	                    exit();
	                }
	            } else {
	                // Invalid email or password
	                displayErrorMessage("Invalid email or password", "login.php");
	            }
	        } else {
	            // Query execution error
	            error_log("Error: " . $stmt->error);
	            displayErrorMessage("An error occurred while processing your request", "login.php");
	        }
	    }
	}

	

	// CREATE NEW USERS
	class UserCreator extends DatabaseConnection {
	    public function createUser($firstname, $middlename, $lastname, $suffix, $dob, $age, $birthplace, $gender, $civilstatus, $occupation, $religion, $email, $contact, $house_no, $street_name, $purok, $zone, $barangay, $municipality, $province, $region, $password, $image, $date_registered) {
	        $conn = $this->getConnection();

	       
	        // Encrypt the password
    		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

	        $sql = "INSERT INTO users (firstname, middlename, lastname, suffix, dob, age, birthplace, gender, civilstatus, occupation, religion, email, contact, house_no, street_name, purok, zone, barangay, municipality, province, region, password, image, date_registered) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

	        $stmt = $conn->prepare($sql);
	        $stmt->bind_param("ssssssssssssssssssssssss", $firstname, $middlename, $lastname, $suffix, $dob, $age, $birthplace, $gender, $civilstatus, $occupation, $religion, $email, $contact, $house_no, $street_name, $purok, $zone, $barangay, $municipality, $province, $region, $hashedPassword, $image, $date_registered);

	        if ($stmt->execute()) {
			    // Call the displaySaveMessage() function with success status and target page
			    displaySaveMessage(true, "register.php");
			} else {
			    // Print the error message for debugging purposes
			    echo "Error: " . $stmt->error;
			    // Call the displaySaveMessage() function with error status and target page
			    displaySaveMessage(false, "register.php");
			    return false;
			}
	    }


	    public function checkEmailExists($email) {
	        $conn = $this->getConnection();

	        $sql = "SELECT email FROM users WHERE email = ?";
	        $stmt = $conn->prepare($sql);
	        $stmt->bind_param("s", $email);
	        $stmt->execute();
	        $stmt->store_result();
	        $numRows = $stmt->num_rows;
	        $stmt->close();

	        return $numRows > 0;
	    }
	}



	

	
?>
