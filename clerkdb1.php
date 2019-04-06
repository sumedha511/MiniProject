<?php
ini_set('display_errors',1);
$host="localhost";
$username="root";
$password="root123";
$db_name="exam";
$tbl_name="clerk";

$conn=mysqli_connect("$host","$username","$password","$db_name")or die("cannot connect");
?>
<html>
<style>
.alert {
    padding: 20px;
    background-color: LightGrey;
    color: black;
}

</style>
<?php
if($conn)
{
	//echo"connection successful";
}
else
{
	//echo"connection unsuccessful";
}
//mysqli_select_db($conn,"$db_name")or die("cannot select db");
$myusername=$_POST[ 'usr' ];
$mypassword=$_POST[ 'pwd' ];

$myusername=stripslashes($myusername);
$mypassword=stripslashes($mypassword);
$myusername=mysqli_real_escape_string($conn,$myusername);
$mypassword=mysqli_real_escape_string($conn,$mypassword);
$sql="select * from $tbl_name where pass='$mypassword' AND user='$myusername'";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
if($count==1)
{
echo"\nConnected";
header('Location:stu.php');
}
else
{?>
<div class="alert">
   
  <strong>Please Enter Correct username or password...</strong>
</div>
<?php
}



mysqli_close($conn);


?>

</html>
