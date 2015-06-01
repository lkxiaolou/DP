<?php
//PHP框架中常用的载入类的一个例子

//测试类A
class A{
    public function __construct(){
        echo "new Class A<br>";
    }
}

//测试类B
class B{
    public function __construct(){
        echo "new Class B<br>";
    }
}

//工厂
class Factory{
    
    public static function loadClass($class_name)
    {
        return new $class_name();
    }
}

function __autoload($class_name)
{
    if(!class_exists($class_name)){
        exit("$class_name is not defined!");
    }
}

//测试
Factory::loadClass("A");
Factory::loadClass("B");
//未引入的类C，会触发autoload
Factory::loadClass("C");
