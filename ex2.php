<?php
ini_set('display_errors',1);
$host="localhost";
$username="root";
$password="root123";
$db_name="exam";
$tbl_name="login";

$conn=mysqli_connect("$host","$username","$password","$db_name")or die("cannot connect");
?>



<?php
if(isset($_POST['usr']) )
{
?>


<?php


//if($conn)
//{
//	echo"connection successful";
//}
//else
//{
//	echo"connection unsuccessful";
//}
//mysqli_select_db($conn,"$db_name")or die("cannot select db");
$myusername=$_POST[ 'usr' ];
$mypassword=$_POST[ 'pwd' ];

$myusername=stripslashes($myusername);
$mypassword=stripslashes($mypassword);
$myusername=mysqli_real_escape_string($conn,$myusername);
$mypassword=mysqli_real_escape_string($conn,$mypassword);
$sql="select * from $tbl_name where password='$mypassword' AND username='$myusername'";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
if($count==1)
{
echo"\nConnected";
header('Location:adminpage1.php');
}
else
{

?>
<html><style>
h4 {  color:red }</style>
<head><h4>Not Connected please fill correct username or password</h4></head>
</html>
<?php

}










}
?>
<html>
<head>
<style>
form {

  position:fixed;
   
   left:30%;
   width:450px;

}

button {
    background-color:#f4f6f6;
   width: 150px;
    color: black ;
    padding: 15px 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
  box-shadow: 0 20px 200px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
button:hover {
    background-color: LightBlue; 
    color: blue;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

button1 {
    background-color:#f4f6f6;
   width: 80px;
    color: black ;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
  box-shadow: 0 20px 200px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
button1:hover {
    background-color:#f4f6f6 ; 
    color:black;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
legend {

  text-shadow: 2px 2px 3px rgba(150, 150, 150, 0.75);

  font-family:Verdana, Geneva, sans-serif;

  font-size:1em;

  border-top: 1px solid #009;

  border-left: 1px solid #009;

  border-right:  1px solid #009;

  border-radius: 7px;

  -webkit-box-shadow: 4px 4px 5px rgba(50, 50, 50, 0.75);

  -moz-box-shadow: 4px 4px 5px rgba(50, 50, 50, 0.75);

  box-shadow: 4px 4px 5px rgba(50, 50, 50, 0.75);

  padding: 3px;
  
background:#f4f6f6; 
}

div.border11 {
padding: 12px;
  border: 2px #5C8C2B;

  -webkit-border-radius: 10px;

  -moz-border-radius: 10px;

  border-radius: 10px;

  -webkit-box-shadow: 4px 4px 5px rgba(50, 50, 50, 0.75);

  -moz-box-shadow: 4px 4px 5px rgba(50, 50, 50, 0.75);

  box-shadow: 4px 4px 5px rgba(50, 50, 50, 0.75);
background: #f4f6f6;

}
h2 { background-color:Lightblue; font-size: 200%;
    padding: 2px; font-weight: bold ;color:blue ; }

body
{
background-image:url(th.jpeg);
background-repeat:no-repeat ;
background-size:1500px 1000px;
}
</style>
<center><h2>Admin Login</h2></center>
</head>
<body>
<button1 onclick="history.back()" >PREVIOUS</button1>
<form method="post" action="ex2.php" >

   


    <fieldset>

    <legend>Login in:</legend>
    <div class="border11"><br>
Username:<br><input type="text" name="usr" pattern=".{6,}"  title="Six or more characters " required><br>
Password: <br><input type="password" name="pwd" pattern=".{6,}" title="Six or more characters" required><br><br>
</div>
</fieldset>
<br>
  <center><button>Login</button></center>
  
 
  

</fieldset>
</form> 
</center>
</body>
</html>
