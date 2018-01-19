<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Session.php');
include_once('../config/Config.php');
include_once('../lib/Format.php');
Session::checkLogin();
?>

<?php

class LoginStaf
{
    private $db;
    private $fm;


    public function __construct()
    {
        $this->db = new Config();
        $this->fm = new Format();
    }


    public function login($email, $password)
    {
        $email = $this->fm->validation($email);
        $password = $this->fm->validation($password);

        $email = mysqli_real_escape_string($this->db->link, $email);
        $password = mysqli_real_escape_string($this->db->link, $password);

        $query = "SELECT * FROM staf WHERE email='$email' AND password='$password'";
        $result = $this->db->excute($query);
        $value = $result->fetch_assoc();
        if ($value['email'] == $email && $value['password'] == $password) {
            Session::set("login", true);
            Session::set("id", $value['id']);
            Session::set("foto", $value['foto']);
            Session::set("nama", $value['nama']);
            Session::set("email", $value['email']);
            Session::set("alamat", $value['alamat']);
            Session::set("nohp", $value['nohp']);
            Session::set("role", $value['role']);
            header("location: index.php");
        } else {
            $msg = "<span style='color:red;'>Username dan Password Salah</span>";
            return $msg;
        }

    }
}

?>