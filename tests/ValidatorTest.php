    public function testUrlValidation(){
<?php
spl_autoload_register(function ($class)
{
    if(file_exists($class.'.php')){
        require($class.'.php');
    }else if(file_exists('../controllers/'.$class.'.php')){
        require('../controllers/'.$class.'.php');
    }else if(file_exists('../core/'.$class.'.php')){
        require('../core/'.$class.'.php');
    }else if(file_exists('../dao/'.$class.'.php')){
        require('../dao/'.$class.'.php');
    }else if(file_exists('../views/'.$class.'.php')){
        require('../views/'.$class.'.php');
    }else if(file_exists('../security/'.$class.'.php')){
        require('../security/'.$class.'.php');
    }
});

class ValidatorTest extends PHPUnit_Framework_TestCase
{
    public function testMailValidation(){
        $this->assertTrue(Validator::isMail('test@user.com'),'Mail Filter Fails for '.'test@user.com');
        $this->assertFalse(Validator::isMail('test@usercom'),'Mail Filter Fails for '.'test@usercom');
        $this->assertTrue(Validator::isMail('te.st@user.com'),'Mail Filter Fails for '.'te.st@user.com');
        $this->assertFalse(Validator::isMail('.test@user.com'),'Mail Filter Fails for '.'.test@user.com');
        $this->assertFalse(Validator::isMail('test@user.com.'),'Mail Filter Fails for '.'test@user.com.');
        $this->assertTrue(Validator::isMail('test@user.co.uk'),'Mail Filter Fails for '.'test@user.co.uk');
        $this->assertFalse(Validator::isMail('test.user.com'),'Mail Filter Fails for '.'test.user.com');
    }
    public function testUrlValidation(){
        $this->assertTrue(Validator::isURL('http://www.example.com:8800'),'URL Filter Fails for '.'http://www.example.com:8800');
        $this->assertTrue(Validator::isURL('http://www.example.com/a/b/c/d/e/f/g/h/i.html'),'URL Filter Fails for '.'http://www.example.com/a/b/c/d/e/f/g/h/i.html');
        $this->assertTrue(Validator::isURL('http://www.test.com?pageid=123&testid=1524'),'URL Filter Fails for '.'http://www.test.com?pageid=123&testid=1524');
        $this->assertTrue(Validator::isURL('http://www.test.com/do.html#A'),'URL Filter Fails for '.'http://www.test.com/do.html#A');
    }
}
