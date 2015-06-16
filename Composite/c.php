<?php
    //抽象统一类
    abstract class Component{
        protected $name;
        public function __construct($name){
            $this->name = $name;
        }
        
        public abstract function add($component);
        public abstract function remove($component);
        public abstract function display($depth);
    }

    //叶子类
    class leaf extends Component{
        //禁止叶子没有的方法
        public function add($component){
            echo "leaf can not add a leaf<br>";
        }
        
        public function remove($component){
            echo "leaf can not remove a leaf<br>";
        }

        public function display($depth){
            echo str_repeat('-', $depth), $this->name, "<br>";     
        }
    }

    //节点类
    class node extends Component{
        
        private $node = null;
        
        public function __construct($name){
            parent::__construct($name);
            $this->node = array();    
        }
        
        public function add($component){
            return array_push($this->node, $component);
        }

        public function remove($component){
            foreach($this->node as $k => $v){
                if($component === $v){
                    unset($this->node[$k]);
                }
            }
        }
        
        public function display($depth){
            echo str_repeat('-', $depth), $this->name, "<br>";
            foreach($this->node as $v){
                $v->display($depth + 2);   
            } 
        }
    }

    //测试
    $root = new node("root");
    $root->add(new leaf("leaf1"));
    $root->add(new leaf("leaf2"));
    $root2 = new node("comx");
    $root2->add(new leaf("leaf3"));
    $root->add($root2);
    $root->display(1);
    echo "<br><br>delete the node 'comx':<br><br>";
    $root->remove($root2);
    $root->display(1);

?>
