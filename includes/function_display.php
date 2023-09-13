<?php
    
    // DISPLAY USER RECORDS FROM USER TABLE
	class User {
        private $user_Id;
        private $firstname;
        private $middlename;
        private $lastname;
        private $suffix;
        private $dob;
        private $age;
        private $birthplace;
        private $gender;
        private $civilstatus;
        private $occupation;
        private $religion;
        private $email;
        private $contact;
        private $house_no;
        private $street_name;
        private $purok;
        private $zone;
        private $barangay;
        private $municipality;
        private $province;
        private $region;
        private $image;
        private $user_type;
        private $date_registered;

        public function __construct($user_Id, $firstname, $middlename, $lastname, $suffix, $dob, $age, $birthplace, $gender, $civilstatus, $occupation, $religion, $email, $contact, $house_no, $street_name, $purok, $zone, $barangay, $municipality, $province, $region, $image, $user_type, $date_registered) {

            $this->user_Id         = $user_Id;
            $this->firstname       = $firstname;
            $this->middlename      = $middlename;
            $this->lastname        = $lastname;
            $this->suffix          = $suffix;
            $this->dob             = $dob;
            $this->age             = $age;
            $this->birthplace      = $birthplace;
            $this->gender          = $gender;
            $this->civilstatus     = $civilstatus;
            $this->occupation      = $occupation;
            $this->religion        = $religion;
            $this->email           = $email;
            $this->contact         = $contact;
            $this->house_no        = $house_no;
            $this->street_name     = $street_name;
            $this->purok           = $purok;
            $this->zone            = $zone;
            $this->barangay        = $barangay;
            $this->municipality    = $municipality;
            $this->province        = $province;
            $this->region          = $region;
            $this->image           = $image;
            $this->user_type       = $user_type;
            $this->date_registered = $date_registered;

        }

        public function getUserId() {
            return $this->user_Id;
        }

        public function getFullName() {
            return $this->firstname . ' ' . $this->middlename . ' ' . $this->lastname . ' ' . $this->suffix;
        }

        public function getDOB() {
            return $this->dob;
        }

        public function getAge() {
            return $this->age;
        }

        public function getBrthplace() {
            return $this->birthplace;
        }      

        public function getGender() {
            return $this->gender;
        }

        public function getCivilstatus() {
            return $this->civilstatus;
        }

        public function getOccupation() {
            return $this->occupation;
        }

        public function getReligion() {
            return $this->religion;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getContact() {
            return $this->contact;
        }

        public function getFullAddress() {
            return $this->house_no . ' ' . $this->street_name . ' ' . $this->purok . ' ' . $this->zone. ' ' . $this->barangay. ' ' . $this->municipality. ' ' . $this->province. ' ' . $this->region;
        }

        public function getImage() {
            return $this->image;
        }

        public function getUserType() {
            return $this->user_type;
        }

        public function getDateRegistered() {
            return $this->date_registered;
        }

        
    }
	
?>
