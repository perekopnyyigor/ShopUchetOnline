<?php
//tiwyru1_shop
//i23pBh#0

class Database
{

    var $conn;

    public function connect()
    {

        $servername = "srv-pleskdb41.ps.kz:3306";
        $username = "tiwyru1_shop";
        $password = "i23pBh#0";
        $dbname = "tiwyru1_shop";

        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        mysqli_set_charset($this->conn, "utf8");
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function select($colum, $tab, $parametr = "")
    {
        $this->connect();

        $sql = "SELECT " . $colum . " FROM " . $tab . " " . $parametr;
        $result = $this->conn->query($sql);
        $i = 0;


        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sel[$i] = $row[$colum];
                $i++;
            }

        }

        return $sel;

    }
}

