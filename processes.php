<?php 

	require_once 'db_connection.php';
	include 'includes/function_create.php';
	
	// USER LOGIN
	if (isset($_POST['login'])) {
	    $email = $_POST['email'];
	    $password = $_POST['password'];

	    // Validate and sanitize input
	    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
	    $password = trim($password);

	    if ($email === false) {
	        // Invalid email format
	        displaySaveMessage(false, "login.php");
	    } else {
	        // Check if the user has attempted to log in before
	        if (!isset($_SESSION['login_attempts'])) {
	            $_SESSION['login_attempts'] = 0;
	        }

	        // Check if the user has reached the maximum number of login attempts
	        if ($_SESSION['login_attempts'] > 3) {
	            // Check if the user has been blocked for 10 minutes
	            if (time() - $_SESSION['last_login_attempt'] <= 600) {
	                // User is still blocked, display an error message and exit
	                displayErrorMessage("You have been blocked for 10 minutes due to multiple failed login attempts.", "login.php");
	            } else {
	                // Block has expired, reset the login attempts counter
	                $_SESSION['login_attempts'] = 0;
	            }
	        }

	        $userLogin = new Userlogin();
	        $userLogin->login($email, $password);
	    }
	}







	// Handle form submission
	if (isset($_POST['create_user'])) {
	    // Create a new instance of UserCreator
	    $userCreator = new UserCreator();

	    // Establish database connection
	    $conn = $userCreator->getConnection();
	    
	    $firstname       = $_POST['firstname'];
	    $middlename      = $_POST['middlename'];
	    $lastname        = $_POST['lastname'];
	    $suffix          = $_POST['suffix'];
	    $dob             = $_POST['dob'];
	    $age             = $_POST['age'];
	    $birthplace      = $_POST['birthplace'];
	    $gender          = $_POST['gender'];
	    $civilstatus     = $_POST['civilstatus'];
	    $occupation      = $_POST['occupation'];
	    $religion        = $_POST['religion'];
	    $email           = $_POST['email'];
	    $contact         = $_POST['contact'];
	    $house_no        = $_POST['house_no'];
	    $street_name     = $_POST['street_name'];
	    $purok           = $_POST['purok'];
	    $zone            = $_POST['zone'];
	    $barangay        = $_POST['barangay'];
	    $municipality    = $_POST['municipality'];
	    $province        = $_POST['province'];
	    $region          = $_POST['region'];
	    $password		 = $_POST['password'];
	    $date_registered = date('Y-m-d h:i:s A');

	    // Check if email already exists
	    $emailExists = $userCreator->checkEmailExists($email);
	    if ($emailExists) {
	        displayErrorMessage("Email already exists.", "register.php");
	        exit(); // Stop further execution
	    }


        $target_dir = 'images-users/';
		$imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
		$uniqueFilename = uniqid() . '.' . $imageFileType;
		$image = $target_dir . $uniqueFilename;
		$uploadOk = 1;
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

		if ($check == false) {
		    displayErrorMessage("File is not an image.", $page);
		    $uploadOk = 0;
		} elseif ($_FILES["fileToUpload"]["size"] > 500000) {
		    displayErrorMessage("File must be up to 500KB in size.", $page);
		    $uploadOk = 0;
		} elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
		    displayErrorMessage("Only JPG, JPEG, PNG & GIF files are allowed.", $page);
		    $uploadOk = 0;
		} elseif ($uploadOk == 0) {
		    displayErrorMessage("Your file was not uploaded.", $page);
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $image)) {
		        // Create a new user
		        $userCreator->createUser($firstname, $middlename, $lastname, $suffix, $dob, $age, $birthplace, $gender, $civilstatus, $occupation, $religion, $email, $contact, $house_no, $street_name, $purok, $zone, $barangay, $municipality, $province, $region, $password, $image, $date_registered);
		    } else {
		        displayErrorMessage("There was an error uploading your profile picture.", $page);
		    }
		}
	    
	}


?>
