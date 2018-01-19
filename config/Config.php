<?php
include "Database.php";
?>

<?php

class Config
{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;


    public $error;
    public $link;

    function __construct()
    {
        $this->connectDB();
    }

    public function connectDB()
    {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if (!$this->link) {
            $this->error = "Connection fail" . $this->link;
        }
    }

    public function excute($query)
    {
        $result = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
}

?>