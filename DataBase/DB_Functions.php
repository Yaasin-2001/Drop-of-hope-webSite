<?php

class DB_Functions {

    private $conn;

    // constructor
    function __construct() {
        require_once 'DataBaseConnected.php';
        // connecting to database
        $db = new DataBaseConnected();
        $this->conn = $db->getConnection();
    }

    // destructor
    function __destruct() {
        
    }

    /**
     * Storing new user
     * returns user details
     */
    public function AddDonor($fullname, $username, $password, $bloodtype, $phone_number, $age, $address, $image) {

        $stmt = $this->conn->prepare("INSERT INTO donor_table(full_name, user_name, password, blood_type, phone_number, address, age, healthy_file, Statuse) VALUES('" . $fullname . "', '" . $username . "', '" . $password . "','" . $bloodtype . "','" . $phone_number . "','" . $address . "'," . $age . ",'" . $image . "',1" . ")");
        $result = $stmt->execute();
        $stmt->close();
        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM donor_table WHERE user_name = '" . $username . "'");
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user;
        } else {
            return false;
        }
    }

    /**
     * Get user by username and password
     */
    public function login($username, $password) {
        $query = $this->conn->prepare(" SELECT * from donor_table where user_name = '" . $username . "' AND " . "password =" . "'" . MD5($password) . "'");
        if ($query->execute()) {
            $user = $query->get_result()->fetch_assoc();
            $query->close();
            return $user;
        } else {
            return NULL;
        }
    }

    /**
     * Get user by username and password
     */
    public function loginAdmin($username, $password) {
        $query = $this->conn->prepare(" SELECT * from admin_table where user_name = '" . $username . "' AND " . "password =" . "'" . $password . "'");
   
        if ($query->execute()) {
            $user = $query->get_result()->fetch_assoc();
            $query->close();
            return $user;
        } else {
            return NULL;
        }
    }

    /**
     * Check user is existed or not
     */
    public function isUserExisted($username) {

        $stmt = $this->conn->prepare("SELECT user_name from donor_table WHERE user_name = '" . $username . "'");
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // user existed 
            $stmt->close();
            return true;
        } else {
            // user not existed
            $stmt->close();
            return false;
        }
    }

    /**
     * Check user is existed or not
     */
    public function showAvalibleDonor() {
        $query = $this->conn->prepare(" SELECT * from donor_table where Statuse =1");
        if ($query->execute()) {
            $donor = $query->get_result();
            $query->close();
            return $donor;
        } else {
            return NULL;
        }
    }

    public function showAllDonor() {
        $query = $this->conn->prepare(" SELECT * from donor_table");
        if ($query->execute()) {
            $donor = $query->get_result();
            $query->close();
            return $donor;
        } else {
            return NULL;
        }
    }

    public function FindDonor($blood_type, $address) {
        $query = $this->conn->prepare(" SELECT * from donor_table where (blood_type ='" . $blood_type . "' AND address='" . $address . "') OR blood_type ='" . $blood_type . "'");
        if ($query->execute()) {
            $donor = $query->get_result();
            $query->close();
            return $donor;
        } else {
            return NULL;
        }
    }

    public function DeleteDonor($donor_id) {
        $query = "Delete FROM donor_table WHERE donor_id =" . $donor_id;
        $stmt = $this->conn->prepare($query);
        $result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function GetDonor($donor_id) {
        $query = $this->conn->prepare(" SELECT * from donor_table where donor_id =" . $donor_id);
        if ($query->execute()) {
            $user = $query->get_result()->fetch_assoc();
            $query->close();
            return $user;
        } else {
            return NULL;
        }
    }

    public function UpdateDonor($donor_id, $Phone_number, $address, $status) {

        $query = "UPDATE donor_table SET phone_number='" . $Phone_number . "',address='" . $address . "',	Statuse=" . $status . " WHERE donor_id = " . $donor_id;
        $stmt = $this->conn->prepare($query);
        $result = $stmt->execute();
        $stmt->close();
        // check for successful store
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    public function ChangePassword($donor_id, $password) {

        $query = "UPDATE donor_table SET password='" . $password ."' WHERE donor_id = " . $donor_id;
        $stmt = $this->conn->prepare($query);
        $result = $stmt->execute();
        $stmt->close();
        // check for successful store
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
     public function ChangeAdminPassword($admin_id, $password) {

        $query = "UPDATE admin_table SET password='" . $password ."' WHERE admin_id = " . $admin_id;
        $stmt = $this->conn->prepare($query);
        $result = $stmt->execute();
        $stmt->close();
        // check for successful store
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

}

?>