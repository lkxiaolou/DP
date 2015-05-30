<?php
//引用测试
class Num{
    
    public $i = 1;
    
    public function run()
    {
        echo "Num running:", $this->i, "<br>";
    }
    
    public function __clone()
    {
        echo "clone Num<br>";
    }
}

//原型
class Pro{
    
    public $i = 0;
    public $num = null;
    public $deep_clone = false;
    
    public function __construct($deep_clone, $num)
    {
        $this->i = 1;
        $this->num = $num;
        $this->deep_clone = $deep_clone;
        //clone时构造方法执行与否的测试
        echo "Pro construct<br>";
    }
    
    public function __clone(){
        //深浅拷贝测试
        if($this->deep_clone){
            $this->num = clone $this->num;
            echo "deep clone Pro<br>";
        }else{
            echo "shallow clone Pro<br>";
        }
    }
}

//浅拷贝测试
$num = new Num();
$pro = new Pro(false, $num);
$pro->num->run();
$clone_pro = clone $pro;
//改变num对象的值
$num->i = 2;
$clone_pro->num->run();

echo "<br><br>";

//深拷贝测试
$num2 = new Num();
$pro2 = new Pro(true, $num2);
$pro2->num->run();
$clone_pro2 = clone $pro2;
//改变num对象的值
$num2->i = 2;;
$clone_pro2->num->run();
