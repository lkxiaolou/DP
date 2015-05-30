<?php
//抽象父类
abstract class P {
    
    public function run(){
        $this->step1();
        $this->step2();
    }
    
    abstract protected function step1();
    abstract protected function step2();
}

//子类
class C extends P{

    protected function step1()
    {
        echo "step1<br>";
    }

    protected function step2()
    {
        echo "step2<br>";
    }
}

//测试
$test = new C();
$test->run();