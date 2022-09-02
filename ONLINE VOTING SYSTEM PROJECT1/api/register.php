<?php
include("connect.php");//import 

//for data collection
$name=$_POST['name'];
$mobile=$_POST['mobile'];
$pwd=$_POST['pwd'];
$cpwd=$_POST['cpwd'];
$address=$_POST['address'];
//for image==>2 variables
$image=$_FILES['photo']['name'];
$tmp_name=$_FILES['photo']['tmp_name'];

$role=$_POST['role'];
if($pwd==$cpwd)
{
//move img to uplaod folder
move_uploaded_file($tmp_name,"../uploads/$image");
$insert=mysqli_query($connect,"INSERT INTO user(name,mobile,address,password,photo,role,status,votes) VALUES('$name','$mobile','$address','$pwd','$image','$role',0,0)");
if($insert)
{
    echo '
    <script>
    alert("Registration successful");
    //to return to registartion page
    window.location="../front/HomePage.html";
    </script>
    ';
}

}
else
{
    echo '
    <script>
    alert("Password and Confirm password doesnot match");
    //to return to registartion page
    window.location="../front/RegistrationPage.html";

    </script>
    ';
}


?>