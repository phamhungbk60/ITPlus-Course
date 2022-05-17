<?php

//khuôn.
class Person implements Animal
{

    /**
     * THuộc tính (properties)
     *
     * @var [type]
     */
    private $age; //protected/public thì mới đc thừa hưởng
    private $name;
    private $gender;
    //12 thuộc tính nữa cũng đc = 24 methods

    public function __construct($age, $name, $gender)
    {
        $this->age = $age;
        $this->name = $name;
        $this->gender = $gender;
    }

    /**
     * Methods
     *
     * @return void
     */
    public function sleep($hour)
    {
        // $this->eat();
        echo "I'm sleeping for $hour hours";
    }

    protected function walk()
    {
        echo "I'm walking";
    }

    public function eat($bowl)
    {
        echo "I'm eating $bowl bowl";
    }

    public function __set($attribute, $value)
    {
        //Kiểm tra xem $attribute có tồn tại trong class hay không
        if (property_exists($this, $attribute)) {
            $this->$attribute = $value;
        }
    }
    //tông cộng 6 hàm
    public function __get($attribute)
    {
        if (property_exists($this, $attribute)) {
            return $this->$attribute;
        }
    }
}


class Female extends Person
{
    //loại son mà bạn dùng
    private $lipstick;

    public function __construct($age, $name, $gender, $lipstick)
    {
        //Gọi constructor của class Person
        parent::__construct($age, $name, $gender);
        $this->lipstick = $lipstick;
    }

    public function shop()
    {
        echo "{$this->name} going shopping";
    }

    public function getLipstick()
    {
        echo $this->lipstick;
    }
}

$camnh = new Person(31, "camnh", "Nam");
// $camnh->setAge(32);
$camnh->age = 32; //__set == setAge(32)
echo $camnh->age;

// $haiBt = new Female(21, "haibt", "Nu", "3ce");
// $haiBt->shop();
// $haiBt->getLipstick();

// $leAnh = new Female(21, "anhle", "Nu", "mac");
// $leAnh->shop();
// $leAnh->getLipstick();
