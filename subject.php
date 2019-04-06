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
<center><h2>Subject Data</h2></center>
</head>
<body>
<button1 onclick=" location.href='logout.php'" >SIGNOUT</button1>
<button1 onclick="history.back()" >PREVIOUS</button1>


<form method="post" action="" >

   
<fieldset>

    <legend>Subject Info:</legend>
    <div class="border11"><br>


<?php
mysqli_select_db($conn,$db_name);
$query = "SELECT dept_name FROM department "; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);
?>
Select Department:
<?php
$option = '';

 while($row = mysqli_fetch_array($result))
{
  $option .= '<option value = "'.$row['dept_name'].'">'.$row['dept_name'].'</option>';
}
?>
<select name='dept' >
<?php echo $option; 
?>

</select>
<br><br>

year:
  <select name="year">
    <option value="FY">FY</option>
    <option value="SY">SY</option>
    <option value="TE">TE</option>
    <option value="BE">BE</option>
  </select><br><br>

sem:
  <select name="sem">
    <option value="1">1</option>
    <option value="2">2</option>
  </select><br><br>
Subject name:
  <input type="text" name="subjectname" required>
  <br><br>
  <?php
$sql1="select count(sub_id) from subject";
$result1=mysqli_query($conn,$sql1);
$row = mysqli_fetch_row($result1);
$max=$row[0]+1;

?>
Subject ID:
  <input type="text" name="sub_id" value="<?php echo $max?>"required>
  <br><br>
</div>
</fieldset>

<br>
    <center><button>submit</button></center>
</form> 
</center>
<?php
if(isset($_POST['year'],$_POST['dept'],$_POST['sem'],$_POST['subjectname'],$_POST['sub_id']))
{
$year1=$_POST[ 'year' ];
$deptid=$_POST[ 'dept' ];
$sem1=$_POST[ 'sem' ];
$sub_id1=$_POST[ 'sub_id' ];
$sub_name=$_POST[ 'subjectname' ];
$sql1="insert into subject(year,sem,sub_name,sub_id,dept_name) values('$year1','$sem1','$sub_name','$sub_id1','$deptid');";
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
