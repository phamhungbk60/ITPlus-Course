<?php

require('models/Model.php');
class User extends Model
{
    protected $table = 'users';

    //old way
    // public function create($data)
    // {
    //     $firstName = $data['first_name'];
    //     $lastName = $data['last_name'];
    //     $sql = "INSERT INTO users(first_name, last_name) VALUES ('$firstName', '$lastName')";
    //     return $this->db->query($sql);
    // }
}
