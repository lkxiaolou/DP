# prototype 
原型设计模式 

###说明
* 使用clone技术来复制实例化对象
* PHP clone不会启动构造函数
* PHP clone是一种浅拷贝，所有的引用属性仍然指向原对象
* 可以通过重写clone来实现深度拷贝