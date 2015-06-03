<?php
//人穿衣服的例子

//人类
class Person{
    
    private $name;
    
    public function Person($name = null)
    {
        if($name){
            $this->name = $name;
        }
    }
    
    public function show()
    {
        echo "装扮的", $this->name, "<br>";
    }
}

//服饰类
class Finery extends Person{
    
    public $person = null;
    
    //打扮
    public function decorate(Person $person)
    {
        $this->person = $person;
    }
    
    public function show()
    {
        if($this->person){
            $this->person->show();
        }
    }
}

//T恤装饰
class Tshirts extends Finery{
    
    public function show()
    {
        echo "T恤 ";
        parent::show();
    }
}

//帽子装饰
class Hats extends Finery{

    public function show()
    {
        echo "帽子 ";
        parent::show();
    }
}

//测试
$person = new Person('lkxiaolou');
$tshirt = new Tshirts();
$hat = new Hats();

$tshirt->decorate($person);
$hat->decorate($tshirt);

$hat->show();