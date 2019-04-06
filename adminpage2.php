<html>
<head>
<style>
form {

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
<center><h2>Timetable creation</h2></center>
</head>



<?php
ini_set('display_errors',1);
$host="localhost";
$username="root";
$password="root123";
$db_name="exam";
$tbl_name="student";

$conn=mysqli_connect("$host","$username","$password","$db_name")or die("cannot connect");



?>

<button1 onclick=" location.href='logout.php'" >SIGNOUT</button1>
<button1 onclick="history.back()" >PREVIOUS</button1>

<center>
<body>



<form method="post" action="adminpage3.php">
<br>

<fieldset>

<legend>ALLOCATE</legend>
<div class="border11"><br>
<?php

mysqli_select_db($conn,$db_name);

?> <br>
<table>
<tr><td>year:</td>
<td>
<select name="year">
<option>FY</option>
<option>SY</option>
<option>TE</option>
<option>BE</option>
</select>
</td>
</tr>

<br>
<?php
$query = "SELECT dept_name FROM department "; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);
?>
 <tr><td>Department:</td>
<?php
$option = '';

 while($row = mysqli_fetch_array($result))
{
  $option .= '<option value = "'.$row['dept_name'].'">'.$row['dept_name'].'</option>';
}
?>
<td>
<select name= "department">
<?php echo $option; 
?>

</select>
</td>
</tr>

<br>



 <tr><td>Sem:</td>

<td>
<select name="sem">
<option>1</option>
<option>2</option>
</select>
</td>
</tr>
</table><br>

</p>

<center><button>submit</button></center>

</div>
</fieldset>
<br>
</form> 

</body>
</center>
