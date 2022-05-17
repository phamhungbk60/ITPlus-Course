<?php 

require('./models/Model.php');

class User extends Model
{
    public function all()
    {
        $sql = "SELECT * FROM users";
        $result = $this->dbConnection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function first($id)
    {
        $sql = "SELECT * FROM users where id = {$id}";
        $result = $this->dbConnection->query($sql);
        return $result->fetch_assoc();
    }

    public function create($data)
    {
        $sql = sprintf("INSERT INTO users(first_name,last_name) VALUES ('%s', '%s')", $data['first_name'], $data['last_name']);
        $result = $this->dbConnection->query($sql);
        return $result;
    }

    public function update($data, $id)
    {
        $sql = sprintf("UPDATE users SET first_name = '%s', last_name = '%s' WHERE id=%d", $data['first_name'], $data['last_name'], $id);
        $result = $this->dbConnection->query($sql);
        return $result;
    }

    public function delete()
    {
        $sql = sprintf("DELETE FROM users WHERE id = %d", $_GET['id']);
        $result = $this->dbConnection->query($sql);
        return $result;
    }
}