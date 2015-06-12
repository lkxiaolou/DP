<?php
//抽象状态
abstract class State{
    public abstract function Handle($context);
}

//状态A
class StateA extends State{
    public $name = "stateA";
    public function Handle($context){
        $context->state = new StateB();
    }
}

//状态B
class StateB extends State{
    public $name = "stateB";
    public function Handle($context){
        $context->state = new StateA();
    }
}

class Context {
    public $state;
    
    public function __construct($state){
        $this->state = $state;
    }
    
    public function request(){
        $this->state->handle($this);
    }
}

//测试
$context = new Context(new StateA());//初始状态A
echo $context->state->name, "<br>";
//变为状态B
$context->request();
echo $context->state->name, "<br>";
//再变回去
$context->request();
echo $context->state->name, "<br>";