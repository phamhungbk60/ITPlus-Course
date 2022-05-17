<?php 

class Model 
{
    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = 'root';
    const DB = 'mvc';

    static $dbStaticInstance = null;
    protected $db;

    protected $table;

    public function __construct()
    {
        $this->db = self::getInstance();
    }

    public static function getInstance()
    {
        if (self::$dbStaticInstance == null) {
            self::$dbStaticInstance = new mysqli(self::HOST, self::USER, self::PASSWORD, self::DB);
        }

        return self::$dbStaticInstance;
    }

    //lấy tất cả record của user ra
    public function all()
    {
        $sql = "SELECT * FROM {$this->table}";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function create($data)
    {
        unset($data['submit']);
        $keys = implode(',', array_keys($data));
        $values = implode(',', array_map(function ($item) {
            return "'$item'";
        }, array_values($data)));

        $sql = "INSERT INTO {$this->table}($keys) VALUES ($values)";
        return $this->db->query($sql);
    }

    public function update($id, $data)
    {

    }

    public function delete($id)
    {
        //SQL 
        //Perform query
        //Result
        //...
    }
}