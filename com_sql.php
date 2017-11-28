<?php
$username=$_REQUEST['name'];
$useremail=$_REQUEST['email'];
$subject=$_REQUEST['subject'];
$message=$_REQUEST['message'];
$con=mysqli_connect("localhost:3306","root","jh950925");
if(!$con){
    die("failed to connect the database!");
}
if(mysqli_query($con,"create database com")){
    mysqli_select_db($con,"com");
    mysqli_query($con,"create table coms(
personID int NOT NULL AUTO-INCREMENT,
username VARCHAR (15),
useremail VARCHAR (30),
message_subject VARCHAR (20),
message_content text
)");
    mysqli_select_db($con."com");
    if(
    mysqli_query($con, "INSERT into coms(username,useremail,message_subject,message_content)
values ('$username','$useremail','$subject','$message'); "))
        echo "留言提交成功，点击<a href='gbook.html'>这里</a>返回！";
    else{
        echo "Error:".$con->error."<br/>";
    }
}
else{
    mysqli_select_db($con, "com");
    if(
    mysqli_query($con, "INSERT into coms(username,useremail,message_subject,message_content)
values ('$username','$useremail','$subject','$message'); "))
        echo "留言提交成功，点击<a href='gbook.html'>这里</a>返回！";
    else{
        echo "Error:".$con->error."<br/>";
    }

}
mysqli_close($con);