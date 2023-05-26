<?php
class Login
{
    private $error = "";
    public function evaluate($data)
    {
        $email = addslashes($data['email']);
        $password = addslashes($data['password']);
        $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $DB = new Database();
        $result = $DB->read($query);
        if($result)
        {
            $row = $result;
            if($password == $row['password'])
            {
                $_SESSION['userDB'] = $row['userid'];

            }else
            {
                $this->error .= "Wrong Password<br>";
            }

        }else
        {
            $this->error .= "No such email was found<br>";
        }
        return $this->error;
    }
    public function check_login($id)
    {
        $query = "SELECT userid FROM users WHERE userid = '$id' limit 1";

        $DB = new Database();
        $result = $DB->read($query);

        if($result)
        {
            return true;
        }
         
        return false;
    }
}