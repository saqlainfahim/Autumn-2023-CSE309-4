<?php
class Contact {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "db";
    public $mysqli;

    public function __construct() {
        $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);

        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    public function contact_us($data) {
        $fname = $this->mysqli->real_escape_string($data['name']);
        $email = $this->mysqli->real_escape_string($data['email']);
        $message = $this->mysqli->real_escape_string($data['message']);

        $q = "INSERT INTO `contact_us` (`Name`, `email`, `message`) VALUES ('$fname', '$email', '$message')";
        
        if ($this->mysqli->query($q) === true) {
            return true;
        } else {
            echo "Error: " . $this->mysqli->error;
            return false;
        }
    }
}
?>
