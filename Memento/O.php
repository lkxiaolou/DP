<?php

class Originator{
    public $state;

    public function show(){
        echo "state:", $this->state, "<br>";
    }

    public function CreateMemento(){
        return new Memento($this->state);
    }

    public function setMemento($memento){
        $this->state = $memento->state;
    }
}

class Memento{
    public $state;
    public function __construct($state){
        $this->state = $state;
    }
}

class Caretaker{
    public $memento;
}

//test
$o = new Originator();
$o->state = "On";
$o->show();

$c = new Caretaker();
$c->memento = $o->CreateMemento();
$o->state = "Off";
$o->show();

$o->setMemento($c->memento);
$o->show();
?>
