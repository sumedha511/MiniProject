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
</head>
<style>
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
form {

  position:fixed;
   
   left:30%;
   width:450px;

}

button,input[type=submit] {
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
h2 { background-color: #f9e79f; font-size: 200%;
    padding: 2px; font-weight: bold ;color:#7d6608 ; }
body
{
background-image:url("th.jpeg");
background-repeat:no-repeat ;
background-size:1500px 1000px;
}
</style>
<head>
<center>
<h2>UPDATE</h2>
</center>
</head>
<body>
<button1 onclick=" location.href='logout.php'" >SIGNOUT</button1>
<button1 onclick="history.back()" >PREVIOUS</button1>
<button1 onclick=" location.href='clerk1.php'">MENU</button1>

<center>
<form method="post" action="">


<fieldset>
<legend>subject to be updated</legend>
<?php
$query = "SELECT sub_name FROM subject "; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);
?>
 Subject:
<?php
$option = '';

 while($row = mysqli_fetch_array($result))
{
  $option .= '<option value = "'.$row['sub_name'].'">'.$row['sub_name'].'</option>';
}
?>
<select name= "sub_name">
<?php echo $option; 
?>
</select>
<br>
<br>
Update with subject:
<input type="text" name="subname">
</fieldset>

<input type="submit" value='search' formaction="updates1.php">

 
<?php
?>
</form>
</body>

