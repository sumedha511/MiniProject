<?php
ini_set('display_errors',1);
$host="localhost";
$username="root";
$password="root123";
$db_name="exam";
$tbl_name="login";

$conn=mysqli_connect("$host","$username","$password","$db_name")or die("cannot connect");
?><html>
<style>
.alert {
    padding: 20px;
    background-color: LightGrey;
    color: black;
}

</style>

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
//echo"\n Not Connected please fill correct username or password:(";
?><center>
<div class="alert">
   
  <strong>Addition Failed Please check Fields...!!!</strong>
<?php header('Location:ex2.html'); ?>
</div>
</center>
<?php

}



mysqli_close($conn);


?>
