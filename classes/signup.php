<?php

class Signup
{
   private $error = "";
    public function evaluate($data)
    {
        foreach ($data as $key => $value) {
            if(empty($value))
            {
                $this->error = $this->error . $key . " is empty!<br>";
            }
            if ($key == "email")
            {
                if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$value)) {
                    $this->error = $this->error . $key . "Invalid email!<br>";
                }
            }
            if ($key == "first_name")
            {
                if (is_numeric($value)) {
                    $this->error = $this->error . $key . "First name cant have a number<br>";
                }
                if (strstr($value, " ")) {
                    $this->error = $this->error . $key . "First name cant have a space<br>";
                }
            }
            if ($key == "last_name")
            {
                if (is_numeric($value)) {
                    $this->error = $this->error . $key . "Last name cant be a number<br>";
                }
                if (strstr($value, " ")) {
                    $this->error = $this->error . $key . "Last name cant have a space<br>";
                }
            }
        }
        if($this->error == "")
        {
            $this->create_user($data);
        }else
        {
            return $this->error;
        }
    }
    public function create_user($data)
    {
        $first_name = ucfirst($data['first_name']);
        $last_name = ucfirst($data['last_name']);
        $email = $data['email'];
        $password = $data['password'];
        $userid = $this->create_userid();
        $query = "INSERT INTO users 
        (userid, first_name, last_name, email, password) 
        VALUES 
        ('$userid', '$first_name', '$last_name', '$email', '$password')";

        $DB = new Database();
        $DB->save($query);
    }
    private function create_userid()
    {
        $length = rand(4, 19);
        $number = "";
        for ($i=0; $i < $length; $i++)
        {
            $new_rand = rand(0,9);
            $number = $number . $new_rand;
        }
        return $number;
    }
}
?>