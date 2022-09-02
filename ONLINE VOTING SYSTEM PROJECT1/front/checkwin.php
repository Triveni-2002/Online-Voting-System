<?php
session_start();
include("../api/connect.php");
$groups=mysqli_query($connect,"SELECT name,photo FROM user where role=2 and votes=(select max(votes) from user where role=2) ");


$res=mysqli_query($connect,"SELECT photo,name,votes FROM user where role=2 ");



?>
<html>
    <head>
        <style>
            body
            {
                background-color:Aqua;
            }
            p
            {
                font-size:50px;
            }
            div{
    height:50px;
    }
    ul
    {
    background-color:grey;
    width:800px;
    
    height:35px;
    border-radius:50px;
    }
    li
    {
    list-style-type:None;
    display:inline;
    padding:50px;
    
    }
    a{
    text-decoration:none;
    font-size:30px;
    color:white;
    }
    ul:hover
    {
    border:solid blue;
    }
    a:hover
    {
    background-color:black;;
    }
    .active
    {
    background-color:green;
    }
    
            </style>
</head>
    <body>
    <center><h1> NATIONAL ELECTION COMMISSION</h2></center>
    <center>
    <div>
    <ul>
    <li><a href="HomePage.html" class="active">HOME</a></li>
    <li><a href="LoginPage.html">LOGIN</a></li>
    <li><a href="Admin.html">CEC</a></li>
    <li><a href="about.html">ABOUTUS</a></li>
    </ul>
    </div>
    </center>
    <br>
    <br>
    <h2 font-size="100px" >
    <center><bold>
    LET<sup>'</sup>S VOTE TOGETHER TO CHANGE THE SOCIETY</bold>
    </h2>
    <br>
    
     </center>
    <?php
    while($row = mysqli_fetch_array($groups,MYSQLI_ASSOC)) {
    $p=$row['name'];
    $img=$row['photo'];
    

echo "<center><p>The winner is: $p </p><img src='../uploads/$img' height='200px' width='200px'>  </center>";

echo "<hr>";
}
while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)){
    $img= $row['photo'];
    echo "<img src='../uploads/$img' height='200px' width='200px' >";
    echo "Votes:".$row['votes'];
    
}

?>
</body>
</html>
