

<?php

ini_set('display_errors',1);
$host="localhost";
$username="root";
$password="root123";
$db_name="exam";
$tbl_name="student";

$conn=mysqli_connect("$host","$username","$password","$db_name")or die("cannot connect");


?>






<!DOCTYPE html>
<?php
ini_set('display_errors',1);
$host="localhost";
$username="root";
$password="root123";
$db_name="exam";
$tbl_name="student";

$conn=mysqli_connect("$host","$username","$password","$db_name")or die("cannot connect");

?>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}

abc {

  
   
   left:30%;
   width:500px;

}

button {
    background-color:#f9e79f;
   
    color: #7d6608 ;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
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
  
background:#f9e79f; 
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
background: #f9e79f;

}
h2 { background-color: #f9e79f; font-size: 200%;
    padding: 2px; font-weight: bold ;color:#7d6608 ; }

button1 {
   position:relative;
 width: auto;
 color:MediumBlue ;
 text-decoration:none;
 border-radius:5px;
 border:solid 1px black;
 background:LightGrey ;
 padding:16px 18px 14px;

 
 -webkit-transition: all 0.1s;
 -moz-transition: all 0.1s;
 transition: all 0.1s;
 
 -webkit-box-shadow: 0px 6px 0px #D3D3D3;
 -moz-box-shadow: 0px 6px 0px #D3D3D3;
 box-shadow: 0px 6px 0px #D3D3D3;
}
button1:hover {
    background-color:#dddddd; 
    color: black;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
body
{
background-image:url("th.jpeg");
background-repeat:no-repeat ;
background-size:1500px 1000px;
}
</style>
<br>
<button1 onclick=" location.href='logout.php'" >SIGNOUT</button1>

<button1 onclick=" location.href='adminpage1.php'">MENU</button1>

<?php
$query = "delete FROM backup2  "; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);

$query = "delete FROM backup  "; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);

$query = "delete FROM timetable  "; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);
if($result=='TRUE')
{?>
 <h2>deleted successufully</h2><?php  
}
?>

</head>


<body>

 
</center>
</body>
</html>

