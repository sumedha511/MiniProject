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
background: #f4f6f6;

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
h2 { background-color: #f4f6f6  ; font-size: 200%;
    padding: 2px; font-weight: bold ;color:blue ; }
body
{
background-image:url(th.jpeg);

background-repeat:no-repeat ;
background-size:1500px 1000px;
}

</style>

<center><h2>Student Data</h2></center>
</head>

<body >
<button1 onclick=" location.href='logout.php'" style="float:right"; >Signout</button1>
<button1 onclick="history.back()" >Previous</button1>
<button1 onclick=" location.href='page1.html'">Home</button1>

<br><br>
<br>
<br>
<div class="border12"><br>
<button1 onclick ="location.href='dept.php'">Department Information</button1><br><br><br><br>
<button1 onclick ="location.href='subject.php'">Subject Information</button1><br><br><br><br>
<button1 onclick ="location.href='room.php'">Room Information</button1><br><br><br><br>
<button1 onclick=" location.href='search.php'">Search information</button1><br><br><br><br>
<button1 onclick=" location.href='update.php'">Update information</button1><br><br><br><br>


</div>
<button1 onclick=" location.href='clerksee.php'" style="float:right";>See data</button1>
<form method="post" action="stu.php">      
<fieldset><legend>Year and Department</legend>
<div class="border11">
<center>Year:
<select name="year">
<option>FY</option>
<option>SY</option>
<option>TE</option>
<option>BE</option>
</select>
<?php
$query = "SELECT dept_name FROM department "; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);
?>
Department:
<?php
$option = '';
while($row = mysqli_fetch_array($result))
{
  $option .= '<option value = "'.$row['dept_name'].'">'.$row['dept_name'].'</option>';
}
?>
<select name= "deptid">
<?php echo $option; 
?>

</select>

<input type="submit" value="add" ></center>
   <br>
</div>
</form>
</fieldset>
<br>

<?php
if(isset($_POST['deptid'],$_POST['year']))
{

$year=$_POST['year'];
$dept=$_POST['deptid'];
$dept=stripslashes($dept);
$year=stripslashes($year);
$dept=mysqli_real_escape_string($conn,$dept);
$year=mysqli_real_escape_string($conn,$year);
mysqli_select_db($conn,$db_name);
$max=0;
$sql1="select max(exam_id) from student where dept_name='$dept' and year='$year'";
$result1=mysqli_query($conn,$sql1);
$row = mysqli_fetch_row($result1);
$max=$row[0]+1;

if($max==1)
{
  if($year=='FY')
  {
    $x=1;
   }
  else
  {
	if($year=='SY')
	{
    	$x=2 ;
	}
	else
	{
		if($year=='TE')
		{
		$x=3;
		}
		else
		{

			if($year=='BE')
				{
				$x=4;
				}
                         else
				{
				}
		}
	}
}

	  
		    $sql2="select dept_id from department where dept_name='$dept' ";
		    $result2=mysqli_query($conn,$sql2);
                    $row1 = mysqli_fetch_row($result2);
	            $y=$row1[0];
 $max=(1000*$x)+(100*$y)+1;

?>

<?php
}
else
{
 

}

?>


<br><br><br>
<br><br>
<form method="post" action="studentadd.php">      
<fieldset><legend>Add information</legend>
<div class="border11">

Exam ID:
<input type="text"  name= examid value="<?php echo $max ?>" readonly">
<br><br>
 Student's first name:
  <input type="text" name="firstname1" required>
  <br><br>

 Student's last name:
  <input type="text" name="lastname1" required>
  <br><br>
   
 Department Name:
    <input type="text" name="deptid1" value="<?php echo $dept ;?>" readonly>
  <br><br>
  Year:
    <input type="text" name="year1" value="<?php echo $year ;?>"  readonly>
  <br><br>
<input type="submit" value="submit"   >
</div>
</form>
</fieldset>
</center>  




<?php
}
else
{
}
?>
</body>
</html>




