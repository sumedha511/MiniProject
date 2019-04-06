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
body
{
background-image:url("th.jpeg");
background-repeat:no-repeat ;
background-size:1500px 1000px;
}
form {

  position:fixed;
   
   left:30%;
   width:450px;

}

table, th, td {
    background-color:#f9e79f;
    border: 1px solid black;
    
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
    padding: 2px; font-weight: bold ;color:#7d6608 ; 
}
h3 { font-size: 200%; 
    padding: 2px; font-weight: bold ;color:#7d6608 ; }

</style>
<body>

<?php
$sub_name=$_POST['sub_name'];
//$dept=$_POST['department'];
//echo $year;
//echo $dept;
//$dept=stripslashes($dept);
//$year=stripslashes($year);
//$dept=mysqli_real_escape_string($conn,$dept);
//$year=mysqli_real_escape_string($conn,$year);
mysqli_select_db($conn,$db_name);
$sql="select * from subject where sub_name='$sub_name' ";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);

if($count>0)
{
?>
<center><h2>SEARCHED DATA</h2><center>
<center><table style="width:30%">
  <tr>
    <th>YEAR</th>
    <th>Sem</th> 
    
    <th>Department</th>
<th>Sub_id</th>    
 <th>Year</th>
  </tr>
 

  <?php  while ($row=mysqli_fetch_array($result)) {
  
             ?>
        
        <tr>
            <td><?php echo $row['year']; ?></td> 
            <td><?php echo $row['sem']; ?></td> 
            
            <td><?php echo $row['dept_name']; ?></td> 
            <td><?php echo $row['sub_id']; ?></td>            
            <td><?php echo $row['sub_name']; ?></td>
        </tr>
     
        <?php


}


?>
</table>
<br>

<h2>AFTER UPDATION </h2>


<?php
$subname=$_POST['subname'];
//$year1=$_POST['year1'];
//$year1=mysqli_real_escape_string($conn,$year1);
//$year1=stripslashes($year1);
//$year=mysqli_real_escape_string($conn,$year);
//$year=stripslashes($year);
mysqli_select_db($conn,$db_name);
$sql="update subject set sub_name='$subname' where sub_name='$sub_name' ";
$result=mysqli_query($conn,$sql);
if($result=="TRUE")
{
	   ?><br><center><h3> <?php echo "Updated Successfully";
	    ?></h3></center><?php
	$sql1="select * from subject ";
	$result1=mysqli_query($conn,$sql1);
	$count=mysqli_num_rows($result1);

	if($count>0)
	{
	?><center><table style="width:30%">
  <tr>
    <th>YEAR</th>
    <th>Sem</th> 
    
    <th>Department</th>
<th>Sub_id</th>    
 <th>Year</th>
  </tr>
 

  <?php  while ($row=mysqli_fetch_array($result1)) {
  
             ?>
        
        <tr>
            <td><?php echo $row['year']; ?></td> 
            <td><?php echo $row['sem']; ?></td> 
            
            <td><?php echo $row['dept_name']; ?></td> 
            <td><?php echo $row['sub_id']; ?></td>            
            <td><?php echo $row['sub_name']; ?></td>
        </tr>
     
        <?php


}
?>
				?>
	</table>
	<?php
}
	else
	{
	      ?><br><h3> <?php echo "Not found";
	}


	}
else
{

    echo "Updation Unsuccessful";
}
?>
<?php
}
else
{
      ?><br><h3><?php echo 'Not Found';
}
?>
</table>
</body>
