


<?php
ini_set('display_errors',1);
$host="localhost";
$username="root";
$password="root123";
$db_name="exam";
$tbl_name="subject";

$conn=mysqli_connect("$host","$username","$password","$db_name")or die("cannot connect");





//mysqli_select_db($conn,"$db_name")or die("cannot select db");
$year1=$_POST[ 'year' ];
$deptid=$_POST[ 'department' ];
$sem1=$_POST[ 'sem' ];
$sql1="insert into backup2(dept_name,year) values('$deptid','$year1')";
$result1=mysqli_query($conn,$sql1);

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
<center><h2> Timetable Creation</h2></center>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>
</head>
<body>
<button1 onclick=" location.href='logout.php'" >SIGNOUT</button1>
<button1 onclick="history.back()" >PREVIOUS</button1>
<?php
$query = "SELECT count(exam_id) FROM student where year='$year1'and dept_name='$deptid' "; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);

$row = mysqli_fetch_row($result);

 ?>



<form method="post" action="timetable.php" >  
<fieldset>

    <legend>Prepare a Timetable:</legend>
    <div class="border11"><br>


total student:<input type="text" name="total" value="<?php echo $row[0];?>" readonly="readonly">

 <?php
$total=$row[0];

?> 
<br><br>
 
  <div>
Enter Date:
 <input id="datepicker" type="text" name="date"><br>
</div>
  <br><br>

 Enter Time:
<select name="time">
<option>8:00am</option>
<option>9:00am</option>
<option>10:00am</option>
<option>11:00am</option>
<option>12:00pm</option>
<option>1:00pm</option>
<option>2:00pm</option>
<option>3:00pm</option>
</select>
  
  <br><br>



<?php
$query = "SELECT min(exam_id) FROM student where year='$year1'and dept_name='$deptid' "; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);

$row = mysqli_fetch_row($result);
 ?>


<input type="hidden" name="examidfrom" value="<?php echo $row[0]; ?>" readonly="readonly">

Enter Subject:
<?php
$query = "SELECT sub_name FROM subject where year='$year1'and dept_name='$deptid' "; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);
?>

<?php
$option = '';

 while($row = mysqli_fetch_array($result))
{
  $option .= '<option value = "'.$row['sub_name'].'">'.$row['sub_name'].'</option>';
}
?>
<select name= "subname" >
<?php echo $option; 
?>

</select>

</div>
</fieldset>


    <center><button>submit</button></center>
</form >
</center>
</body>





</html>













