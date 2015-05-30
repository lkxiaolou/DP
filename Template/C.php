<?php
require 'P.php';
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