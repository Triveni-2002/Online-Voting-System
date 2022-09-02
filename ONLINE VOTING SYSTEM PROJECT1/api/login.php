<?php
session_start();

include("connect.php");
//collect values from front end
$mobile=$_POST['mobile'];
$pwd=$_POST['pwd'];
$role=$_POST['role'];
//check whether the values exist in database or not

$check=mysqli_query($connect,"SELECT * FROM user WHERE mobile='$mobile' AND  password='$pwd' AND role='$role' ");
if(mysqli_num_rows($check)>0){

$userdata=mysqli_fetch_array($check);
$groups=mysqli_query($connect,"SELECT * FROM user WHERE role=2 ");
$groupsdata=mysqli_fetch_all($groups,MYSQLI_ASSOC);

$_SESSION['userdata']=$userdata;
$_SESSION['groupsdata']=$groupsdata;
echo '
<script>

window.location="../front/dashboard.php";

</script>
';
}
else
{
    echo '
    <script>
    alert("Invalid credentials or user not found!");
    //to return to registartion page
    window.location="../front/LoginPage.html";

    </script>
    ';
}


?>