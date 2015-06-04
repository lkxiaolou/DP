<?php
//代理和真实对象的共同接口
interface Request{
    public function dealRequest();
}

//真实对象
class Subject implements Request{
    
    //真实处理请求
    public function dealRequest()
    {
        echo "deal the request<br>";
    }
}

//代理对象
class Proxy implements Request{
    
    public $subject = null;
    
    //代理处理请求
    public function dealRequest()
    {
        $this->subject = new Subject();
        $this->subject->dealRequest();
    }
}

//测试
$proxy = new Proxy();
$proxy->dealRequest();