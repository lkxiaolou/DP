<?php
//产品类
class Product{
    public $des = null;
    
    public function add($str){
        $this->des .= $str . '<br>';
    }
}

//抽象建造者类
abstract class Builder{
    //两部分构成
    public abstract function build1();
    public abstract function build2();
    
    public abstract function getResult();
}

//具体建造类1
class RealBuilder1 extends Builder{
    
    public $product=null;
    
    public function __construct(){
        $this->product = new Product();
    }
    
    public function build1(){
        $this->product->add('部件1');
    }
    public function build2(){
        $this->product->add('部件2');
    }
    
    public function getResult(){
        echo $this->product->des;
    }
}

//具体建造类2
class RealBuilder2 extends Builder{

    public $product=null;

    public function __construct(){
        $this->product = new Product();
    }

    public function build1(){
        $this->product->add('部件a');
    }
    public function build2(){
        $this->product->add('部件b');
    }

    public function getResult(){
        echo $this->product->des;
    }
}

//指挥类
class Director{
    
    public function run($builder){
        $builder->build1();
        $builder->build2();
    }
}

//测试
$b1 = new RealBuilder1();
$b2 = new RealBuilder2();
$director = new Director();
$director->run($b1);
$director->run($b2);
echo $b1->product->des;
echo $b2->product->des;