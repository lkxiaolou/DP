<?php
//用my以示区分，抽象迭代器类
abstract class myIterator{
    public abstract function first();
    public abstract function next();
    public abstract function isDone();
    public abstract function currentItem();
}

//聚集抽象类
abstract class Aggregate{
    public abstract function createIterator();
}

//具体聚集类
class ConcreteAgreegate extends Aggregate{
    private $list = array();
    
    public function createIterator(){
        return new myforeach($this);
    }
    
    public function Count(){
        return count($this->list);
    }
    
    public function get($index){
        return $this->list[$index];
    }
    
    public function set($index, $value){
        $this->list[$index] = $value;
    }
    
    //顺序加入
    public function push($value){
        array_push($this->list, $value);
    }
}

//具体迭代器类
class myforeach extends myIterator{
    private $aggregate;
    private $current = 0;
    public function __construct($aggregate){
        $this->aggregate = $aggregate;
    }
    
    public function first(){
        return $this->aggregate->get(0);
    }
    
    public function next(){
        $this->current++;
        if($this->current < $this->aggregate->Count()){
            return $this->aggregate->get($this->current);
        }
        return null;
    }
    
    public function isDone(){
        return $this->current < $this->aggregate->Count() ? false : true;
    }
    
    public function currentItem(){
        return $this->aggregate->get($this->current);
    }
}

//测试代码
$a = new ConcreteAgreegate();
$a->push('壹');
$a->push('贰');
$a->push('叁');
$a->push('肆');
$a->push('伍');

$i = $a->createIterator();
while(!$i->isDone()){
    echo $i->currentItem(), "<br>";
    $i->next();
}