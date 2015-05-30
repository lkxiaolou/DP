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