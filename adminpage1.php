<!DOCTYPE html>
<?php
?>
<html>
<head>
<style>
abc {

  position:fixed;
   
   left:30%;
   width:450px;

}

button {
 background-color: #f4f6f6;
    color:MediumBlue ;
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
  
background-color: #f4f6f6;
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



}
h2 { background-color: #f4f6f6; font-size: 200%;
    padding: 2px; font-weight: bold ;color:MediumBlue ; }
button1 {
   position:relative;
 width: auto;
 color:MediumBlue ;
 text-decoration:none;
 border-radius:5px;
 border:solid 1px black;
 background: #f4f6f6;
 padding:16px 18px 14px;

 
 -webkit-transition: all 0.1s;
 -moz-transition: all 0.1s;
 transition: all 0.1s;
 
 -webkit-box-shadow: 0px 6px 0px #D3D3D3;
 -moz-box-shadow: 0px 6px 0px #D3D3D3;
 box-shadow: 0px 6px 0px #D3D3D3;
}
button1:hover {
    background-color:lightblue; 
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

<center><h2>WELCOME ADMIN</h2></center>

<br>
<button1 onclick=" location.href='logout.php'" >SIGNOUT</button1>
<button1 onclick="history.back()" >PREVIOUS</button1>
</head>


<body>



<abc >
<br>
<fieldset>

<div class="border11"><br>

<center><button onclick ="location.href='adminpage2.php'">prepare schedule</button></center><br>
<center><button onclick ="location.href='viewsdl.php'">View schedule</button></center>

</div>
</fieldset>


</abc> 
</center>
</body>
</html>
<?php

ini_set('display_errors',1);
$host="localhost";
$username="root";
$password="root123";
$db_name="exam";
$tbl_name="student";

$conn=mysqli_connect("$host","$username","$password","$db_name")or die("cannot connect");


?>

<?php
$query = "delete FROM backup2  "; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);

$query = "delete FROM backup  "; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);

?>
