<?php

interface DbConnection
{
    public function connect();
}

class MysqlConn implements DbConnection
{
    public function connect()
    {
        echo "Connect using mysql";
    }
}

class SqlServerConn implements DbConnection
{
    public function connect()
    {
        echo "Connect using sqlserver";
    }
}

class MongoServerConn implements DbConnection
{
    public function connect()
    {
        echo "Connect using mongo";
    }
}

class ConnectionClass
{
    private $conn;

    //DBConnection = interface
    public function __construct(DbConnection $conn)
    {
        $this->conn = $conn;
    }

    public function connect()
    {
        return $this->conn->connect();
    }
}

class Connection1Class
{
    private $conn;

    //DBConnection = interface
    public function __construct(DbConnection $conn)
    {
        $this->conn = $conn;
    }

    public function connect()
    {
        return $this->conn->connect();
    }
}

class Connection2Class
{
    private $conn;

    //DBConnection = interface
    public function __construct(DbConnection $conn)
    {
        $this->conn = $conn;
    }

    public function connect()
    {
        return $this->conn->connect();
    }
}

class Connection3Class
{
    private $conn;

    //DBConnection = interface
    public function __construct(DbConnection $conn)
    {
        //$this->conn = DBConnection $conn
        //$this->conn = new SqlServerConn(); ~~ $a = new SqlServer(); $a->connect();
        //
        $this->conn = $conn;
    }

    public function connect()
    {
        //~$a->connect();
        return $this->conn->connect();
    }
}


$db = new SqlServerConn();
// chỉ định DBConnection = MongoDB
$connectionClass = new ConnectionClass($db);
$connectionClass->connect(); //mysql

// chỉ định DBConnection = Mysql
$connectionClass1 = new Connection1Class($db);
$connectionClass1->connect();

// chỉ định DBConnection = Mysql
$connectionClass2 = new Connection2Class($db);
$connectionClass2->connect();
// chỉ định DBConnection = Mysql
$connectionClass3 = new Connection3Class($db);
$connectionClass3->connect();
