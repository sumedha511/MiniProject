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
form {

  position:fixed;
   left:30%;
   width:450px;

}
button {
    background-color:#f4f6f6;
   
    color: #7d6608 ;
    padding: 16px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    margin: 4px 2px;
    cursor: pointer;
}

button:hover{
    background-color:LightBlue; 
    color: white;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);

}
input[type=submit]:hover {
    background-color:blue; 
    color: white;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

input[type=submit] {
    
   position:relative;
 width: auto;
 color:MediumBlue ;
 text-decoration:none;
 border-radius:5px;
 border:solid 1px black;
 background:LightGrey ;
 padding:20px 20px 20px;

 
 -webkit-transition: all 0.1s;
 -moz-transition: all 0.1s;
 transition: all 0.1s;
 
 -webkit-box-shadow: 0px 6px 0px #D3D3D3;
 -moz-box-shadow: 0px 6px 0px #D3D3D3;
 box-shadow: 0px 6px 0px #D3D3D3;
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
  
background:LightGrey; 
}

div.border12 {
padding: 9px;
  border: 3px #5C8C2B;
   float:left;
 
  -webkit-border-radius: 10px;

  -moz-border-radius: 10px;

  border-radius: 10px;

  -webkit-box-shadow: 4px 4px 5px rgba(50, 50, 50, 0.75);

  -moz-box-shadow: 4px 4px 5px rgba(50, 50, 50, 0.75);

  box-shadow: 4px 4px 5px rgba(50, 50, 50, 0.75);


}

div.border11 {
padding-bottom:3px;
border-color:black;
color:black;


}

button1 {
   position:relative;
 width: auto;
 color:MediumBlue ;
 text-decoration:none;
 border-radius:5px;
 border:solid 1px black;
 background:#f4f6f6 ;
 padding:16px 16px 16px;

 
 -webkit-transition: all 0.1s;
 -moz-transition: all 0.1s;
 transition: all 0.1s;
 
 -webkit-box-shadow: 0px 6px 0px #D3D3D3;
 -moz-box-shadow: 0px 6px 0px #D3D3D3;
 box-shadow: 0px 6px 0px #D3D3D3;
}
button1:hover {
    background-color:#f4f6f6; 
    color: black;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
h2 { background-color:#F4F6F6; font-size: 200%;
    padding: 2px; font-weight: bold ;color:blue; }
h3 { font-size: 200%;
    padding: 2px; font-weight: bold ;color:blue; }

body
{
background-image:url(th.jpeg);
background-repeat:no-repeat ;
background-size:1500px 1000px;
}
</style>

<center><h2>Room Info</h2></center>
</head>
<button1 onclick=" location.href='logout.php'" >SIGNOUT</button1>
<button1 onclick="history.back()" >PREVIOUS</button1>

<body>

<form id="form1" method="post" action="">  

<fieldset>

    <legend>Room Information:</legend>
    <div class="border11"><br>

 Room:
  <input type="text" name="room" placeholder="Enter room number" required>
  <br><br>

 Address:
  <input type="text" name="address" placeholder="Enter building name and floor of room" required>
  <br><br>

  

 
</div>
</fieldset>
<center><input type="submit" value="ADD" formaction=''></center>
   
   
   
<br>


</form >
   <?php
if(isset($_POST['room'],$_POST['address']))
{
$room=$_POST[ 'room' ];
$address=$_POST[ 'address' ];

$sql1="insert into room(room,address) values('$room','$address');";
$result1=mysqli_query($conn,$sql1);

if($result1=='TRUE')
{
   ?><center>
   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <h3 font color="Green">Added Successfully</h3>
</center>
<?php
header('Location:stu.php');

}
else
{
?><center>
   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <h3>Addition Failed</h3>
</center>
<?php
}



}
else
{
}
?>
</body>

</html>
