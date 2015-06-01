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

//测试
Factory::loadClass("A");
Factory::loadClass("B");
//未引入的类C
Factory::loadClass("C");
