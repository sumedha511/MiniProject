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
table, th, td {
    background-color:#f4f6f6;
    border: 1px solid black;
    
}


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
<br>
<button1 onclick=" location.href='logout.php'" >SIGNOUT</button1>
<button1 onclick="history.back()" >PREVIOUS</button1>

<body>

<?php
$year=$_POST['year'];
$dept=$_POST['department'];

$dept=stripslashes($dept);
$year=stripslashes($year);
$dept=mysqli_real_escape_string($conn,$dept);
$year=mysqli_real_escape_string($conn,$year);
mysqli_select_db($conn,$db_name);
$sql="select * from student where year='$year' and dept_name='$dept' ";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);

if($count>0)
{
?>
<center><h2>SEARCHED DATA</h2><center>
<center><table style="width:30%">
  <tr>
    <th>Firstname</th>
    <th>Lastname</th> 
    <th>Exam_id</th>
    <th>Department</th>
     <th>Year</th>
  </tr>
<?php 
    while ($row=mysqli_fetch_array($result)) {
  
             ?>
        
        <tr>
            <td><?php echo $row['fname']; ?></td> 
            <td><?php echo $row['lname']; ?></td> 
            <td><?php echo $row['exam_id']; ?></td>
            <td><?php echo $row['dept_name']; ?></td> 
            <td><?php echo $row['year']; ?></td>
        </tr>
     
        

<?php
}
?>
<?php
}
else
{
}
?>
</table>
<form method="post" action="">
<br><br>
Update Exam ID :
<input type="text" name= examid>
<br><br>
 Student's first name:
  <input type="text" name="firstname1" required>
  <br><br>

 Student's last name:
  <input type="text" name="lastname1" required>
  <br><br>
<input type="submit" value="Update" >
</form>
<?php
if(isset($_POST['examid'],$_POST['firstname1'],$_POST['lastname1']))
{
$firstname1=$_POST[ 'firstname1' ];
$lastname1=$_POST[ 'lastname1' ];
$examid=$_POST[ 'examid' ];


$sql1="update student set fname='$firstname1' , lname='$lastname1' where exam_id=$examid";
$result1=mysqli_query($conn,$sql1);

if($result1=='TRUE')
{
   ?><center>
   <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <h3 font color="Green">Added Successfully</h3>
</center>
<?php
header('Location:stu.php');


}
else
{
?><center>
   <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <h3>Addition Failed Please Enter Correctly</h3>
</center>
<?php
}



}
else
{
}

?>
</body>
