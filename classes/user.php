<?php

class User
{
    public function get_data($id){
        $query = "SELECT * FROM users WHERE userid = '$id' LIMIT 1";
        $DB = new Database();
        $result = $DB->read($query);

        if($result)
        {
            $row = $result;
            return $row;   
        }else{
            return false;
        }
    }
}
?>