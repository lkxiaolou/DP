<?php
//工厂方法模式

//工厂接口
interface IFactory{
    public function Create();
}

//操作接口
interface Operation{
    //得到结果
    public function getResult($a, $b);
}

//加法
class AddOp implements Operation{

    public function getResult($a, $b)
    {
        return $a + $b;
    }
}
//减法
class SubOp implements Operation{

    public function getResult($a, $b)
    {
        return $a - $b;
    }
}

//加法工厂
class AddFactory implements IFactory{
    public function Create(){
        return new AddOp();
    }
}

//减法工厂
class SubFactory implements IFactory{
    public function Create(){
        return new SubOp();
    }
}

//测试代码
$addfactory = new AddFactory();
$op = $addfactory->Create();
echo '1 + 2 = ', $op->getResult(1, 2), '<br>';

$subfactory = new SubFactory();
$op = $subfactory->Create();
echo '1 - 2 = ', $op->getResult(1, 2), '<br>';