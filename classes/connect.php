<?php
class Database
{

    private $host = "fdb1029.awardspace.net";
    private $username = "4317230_greengrowdb";
    private $password = "GreenGrow123@";
    private $db = "4317230_greengrowdb";
    function connect()
    {
        $connection = mysqli_connect($this->host, $this->username, $this->password, $this->db);
        return $connection;
    }
    function read($query)
    {
        $conn = $this->connect();
        $result = mysqli_query($conn, $query);
        
        if(!$result)
        {
            return false;
        }else
        {
            $data = false;
            while($row = mysqli_fetch_assoc($result))
            {
                $data = $row;
            }
            return $data;
        }
    }
    function save($query)
    {
        $conn = $this->connect();
        $result = mysqli_query($conn, $query);

        if(!$result)
        {
            return false;
        }else
        {
            return true;
        }
    }
}
?>