<?php 
	date_default_timezone_set('Asia/Manila');
	session_start();
	class DatabaseConnection {
	    private $host = 'localhost';
	    private $username = 'root';
	    private $password = '';
	    private $database = 'new_template';
	    protected $connection;

	    public function __construct() {
	        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

	        if ($this->connection->connect_error) {
	            die('Connection failed: ' . $this->connection->connect_error);
	        }
	        
	    }

	    public function __destruct() {
	        $this->connection->close();
	    }

	    public function getConnection() {
	        return $this->connection;
	    }
	}

	// Create an instance of the DatabaseConnection class
	$dbConnection = new DatabaseConnection();

	



	// FUNCTION TO HANDLE SUCCESS MESSAGES 
	function displaySaveMessage($saveStatus, $page) {
	    if ($saveStatus) {
	        $_SESSION['message'] = "New record has been added.";
	        $_SESSION['text'] = "Saved successfully!";
	        $_SESSION['status'] = "success";
	        header("Location: $page");
	        exit();
	    } else {
	        $_SESSION['message'] = "Error.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
	        header("Location: $page");
	        exit();
	    }
	}
	


	// FUNCTION TO HANDLE UPDATE MESSAGES 
	function displayUpdateMessage($updateStatus, $message = "Record has been updated.", $page, $urlForError) {
		if ($updateStatus) {
			$_SESSION['message'] = $message;
			$_SESSION['text'] = "Updated successfully!";
			$_SESSION['status'] = "success";
			header("Location: $page");
			exit();
		} else {
			$_SESSION['message'] = "Error.";
			$_SESSION['text'] = "Please try again.";
			$_SESSION['status'] = "error";
			header("Location: $urlForError");
			exit();
		}
	}





	// FUNCTION TO HANDLE ERROR MESSAGES
	function displayErrorMessage($errorMessage, $page) {
		$_SESSION['message'] = $errorMessage;
	    $_SESSION['text'] = "Please try again.";
	    $_SESSION['status'] = "error";
	    header("Location: $page");
		exit();
	}
	

?>