<?php 
ini_set('display_errors',1);
$host="localhost";
$username="root";
$password="root123";
$db_name="exam";
$tbl_name="department";

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
    background-color:#f9e79f;
   
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
    background-color: #7d6608; 
    color: white;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);

}
input[type=submit]:hover {
    background-color: #7d6608; 
    color: white;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

input[type=submit] {
    background-color:#f9e79f;
   
    color: #7d6608 ;
    padding: 17px 17px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
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
body
{
background-image:url("th.jpeg");
background-repeat:no-repeat ;
background-size:1500px 1000px;
}
</style>


<center><h2>Student Data</h2></center>
</head>

<body>
<button1 onclick=" location.href='logout.php'" >SIGNOUT</button1>
<button1 onclick="history.back()" >PREVIOUS</button1>
<button1 onclick=" location.href='clerk1.php'">MENU</button1>
<button onclick='location.href="delete.php"' style="float:right;"> Delete</button>
<button onclick='location.href="update.php"' style="float:right;"> Update</button>
<button onclick='location.href="search.php"' style="float:right;"> Search</button><right>
<form id="form1" method="post" action="">  

<fieldset>

    <legend>Student Information:</legend>
    <div class="border11"><br>

  <br>
 <?php

$deptid=$_POST[ 'deptid' ];
$year=$_POST[ 'year' ];
$max=0;

$sql1="select max(exam_id) from student where dept_name='$deptid' and year='$year'";
$result1=mysqli_query($conn,$sql1);
$row = mysqli_fetch_row($result1);
$max=$row[0]+1;

?>

 Exam ID:<br>
<input type="text"  name= examid value="<?php echo $max ?>" readonly">
 

<br><br>
 Student's first name:
  <input type="text" name="firstname" required>
  <br><br>

 Student's last name:
  <input type="text" name="lastname" required>
  <br><br>
   
 Department Name:<br>
    <input type="text" name="deptid" value="<?php echo $deptid ;?>" readonly>
  <br><br>
  Year:<br>
    <input type="text" name="year" value="<?php echo $year ;?>"  readonly>
  <br><br>


 
</div>
</fieldset>
<center><input type="submit" value="ADD" formaction='studentadd.php'></center>
   
   
   
<br>


</form >
   
</body>

</html>
