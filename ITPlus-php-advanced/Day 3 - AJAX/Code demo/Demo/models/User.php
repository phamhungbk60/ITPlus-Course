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

    public function delete()
    {
        $sql = sprintf("DELETE FROM users WHERE id = %d", $_GET['id']);
        $result = $this->dbConnection->query($sql);
        return $result;
    }
}