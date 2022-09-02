<?php
session_start();
if(!isset($_SESSION['userdata'])){
    header("location:../front/HomePage.html");

}
$userdata=$_SESSION['userdata'];
$groupsdata=$_SESSION['groupsdata'];

if($_SESSION['userdata']['status']==0)
{
    $status='<b style="color:red"> Not voted </b>';
}
else
{
    $status='<b style="color:Green" >voted</b>';
}
?>
<html>
    <head>
        <title>Online voting System</title>
        <style>
        body
        {
            background-color:aqua;
        }
    
        #b{
             color:white;
                background-color:green;
                width:70px;
                height:35px;
                font-size:20px;
                float:left;

            }
            #voted
            {
                color:white;
                background-color:red;
                width:70px;
                height:35px;
                font-size:20px;
                float:left;
            }
            #l
            {
                color:white;
                background-color:green;
                width:70px;
                height:35px;
                font-size:20px;
                float:right;

            }
           #profile 
           {
               background-color:white;
               width:30%;
               padding:20px;
               float:left;

           }
           #group 
           {
               background-color:white;
               width:60%;
               padding:20px;
               float:right;
               height:700px;


           }
          
           #votebtn
           {
            color:white;
                background-color:green;
                width:70px;
                height:35px;
                font-size:20px;
                float:left;
           }
            </style>

</head>
<body>
<div id="p">
    <a href="LoginPage.html"> <button id="b">Back</button></a>
    <a href="logout.php"><button id="l">Logout</button></a>
    
    <br><br>
    <center><h1>ONLINE VOTING SYSTEM</h1></center>
</div>
<hr>

<div id="profile">
<center><img src="../uploads/<?php echo $userdata['photo'] ?>" height="200" width="200" >
<br><br>

<b>Name:</b><?php echo $userdata['name']?><br><br>
<b>Mobile:</b><?php echo $userdata['mobile']?><br><br>
<b>Address:</b><?php echo $userdata['address']?><br><br>
<b>Status:</b><?php echo $status ?><br><br></center>

</div>
<div id="group">
<?php
if($_SESSION['groupsdata'])
{

for($i=0;$i<count($groupsdata);$i++){
    ?>
    <div >
        <img style="float:right" src="../uploads/<?php echo $groupsdata[$i]['photo']?>" height="100" width="100">
        <br>
     <b>Group Name:</b><?php echo $groupsdata[$i]['name'] ?><br><br>
    <!-- <b>Votes:</b><?php echo $groupsdata[$i]['votes']?><br><br>-->
     <br>
     <form action="../api/vote.php" method="post">
       <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
        <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
        <?php
       if($_SESSION['userdata']['status']==0)
       {
?>
 <input type="submit" name="votebtn" value="vote" id="votebtn"><br><br>
 
 <?php
       }
       else
       {
        ?>
 <button disabled type="submit" name="votebtn" value="vote" id="voted">Voted</button><br><br>
 
 <?php

       }

?>
       
      </form>
    </div>
    <hr>
    <?php


}
}
else
{

}
?>

<?php  
     $_SESSION['groupsdata']=$groupsdata;


     ?>
</div>



</body>
</html>