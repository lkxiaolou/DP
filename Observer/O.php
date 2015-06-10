<?php
//抽象主题类
abstract class Subject{
    //观察者对象数组
    public $observers = array();
    
    //添加观察者
    public function addObserver($observer){
        return array_push($this->observers, $observer);
    }
    
    //通知更新
    public function Notify(){
        foreach($this->observers as $v){
            $v->update();
        }
    }
}

//观察者抽象类
abstract class Observer{
    public abstract function update();
}

//具体主题类
class realSubject extends Subject{
    public $state = 0;
}

//具体观察者类
class realObserver extends Observer{
    public $name;
    public $subject;
    
    public function __construct($name, $subject){
        $this->name = $name;
        $this->subject = $subject;
    }
    //重写更新方法
    public function update(){
        echo "观察者[", $this->name, "]更新状态",$this->subject->state ,"<br>";
    }
}

//测试代码
$subject = new realSubject();
$observer1 = new realObserver('lkxiaolou', $subject);
$observer2 = new realObserver('xx', $subject);
$subject->addObserver($observer1);
$subject->addObserver($observer2);
$subject->state = "SOS";
$subject->Notify();
