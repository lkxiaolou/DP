<?php
//算法A
class A{
    public function run()
    {
        return "算法A";
    }
}

//算法B
class B{
    public function run()
    {
        return "算法B";
    }
}

//环境
class Context{
    
    public $obj = null;//算法
    
    public function __construct($obj)
    {
        $this->obj = $obj;
    }
    
    public function getResult()
    {
        return $this->obj->run();
    }
}
//测试
$context = new Context(new A());
echo $context->getResult(), "<br>";

$context = new Context(new B());
echo $context->getResult(), "<br>";