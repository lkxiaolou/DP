<?php
//简单的例子-计算器

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

//工厂
class Factory{
    
    public function getOpObj($op)
    {
        switch($op)
        {
            case "+":
                return new AddOp();
                break;
            case "-":
                return new SubOp();
                break;
            default:
                return null;
        }
    }
}

//测试
$factory = new Factory();
$addop = $factory->getOpObj("+");
echo " 1 + 2 = ", $addop->getResult(1, 2), "<br>";
$subop = $factory->getOpObj("-");
echo "1 - 2 = ", $subop->getResult(1, 2), "<br>";