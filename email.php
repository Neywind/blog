<?php
$to="mzwang_suda@163.com";
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$message=$_REQUEST['message']."by".$name;
$subject=$_REQUEST['subject'];
$headers="From $email";
class customException extends Exception{ //自定义的异常抛出函数
    public function errorMessage(){
        $errorMsg="Error in line:".$this->getLine()." in ".$this->getFile()." :<b> ".$this.$this->getMessage()
            ." </b>is not a valid Email address.";
        return $errorMsg;
    }
}
try{
    try {
        if (strpos($email, "example") !== false) {
            throw new Exception($email);
        }
    }catch(Exception $e){
        throw new customException($email);
    }
}catch(customException $e){
    echo $e->errorMessage();
}

function myException($exception)
{
    echo "<b>Exception:</b> " , $exception->getMessage();
}
set_exception_handler('myException');       //set_exception_handler可以设置处理所有未捕获异常的用户自定义函数
throw new Exception('Uncaught Exception occurred');
mail($to,$subject,$message,$email);
