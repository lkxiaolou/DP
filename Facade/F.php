<?php
//子系统
class SubSys1{
    public function method1(){
        echo "子系统1方法<br>";
    }
}

class SubSys2{
    public function method2(){
        echo "子系统2方法<br>";
    }
}

class SubSys3{
    public function method3(){
        echo "子系统3方法<br>";
    }
}

//外观类
class Facade{
    
    public $sys1,$sys2,$sys3 = null;
    
    public function __construct(){
        $this->sys1 = new SubSys1();
        $this->sys2 = new SubSys2();
        $this->sys3 = new SubSys3();
    }
    
    public function Method(){
        echo "方法:<br>";
        $this->sys2->method2();
        $this->sys1->method1();
        $this->sys3->method3();
    }
}

//测试
$facade = new Facade();
$facade->Method();
