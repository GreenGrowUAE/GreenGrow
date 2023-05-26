<?php
class Store{
    private $error = "";
    
    public function evaluate($data)
    {
        foreach ($data as $key => $value) {
            if(empty($value))
            {
                $this->error = $this->error . $key . " is empty!<br>";
            }
            if ($key == "name")
            {
                if (strstr($value, " ")) {
                    $this->error = $this->error . $key . "No Item <br>";
                }
            }
            if ($key == "quantity")
            {
                if (strstr($value, " ")) {
                    $this->error = $this->error . $key . "empty<br>";
                }
            }
            if ($key == "price")
            {
                if (strstr($value, " ")) {
                    $this->error = $this->error . $key . "empty<br>";
                }
            }
        }
        if($this->error == "")
        {
            $this->create_cart($data);
        }else
        {
            return $this->error;
        }
    }
    public function create_cart($data)
    {
        $name = $data['name'];
        $price = $data['price'];
        $quantity = $data['quantity'];
        $total = $data['price'] * $data['quantity'];
        $query = "INSERT INTO cart 
        (name, price, quantity, total) 
        VALUES 
        ('$name', '$price', '$quantity', '$total')";

        $DB = new Database();
        $DB->save($query);
    }
}
?>