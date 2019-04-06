


<?php

ini_set('display_errors',1);
$host="localhost";
$username="root";
$password="root123";
$db_name="exam";
$tbl_name="student";
$x=0;
$conn=mysqli_connect("$host","$username","$password","$db_name")or die("cannot connect");


?>

<?php


if(isset($_POST['room']) )
{

$room=$_POST[ 'room' ];

//echo $room;


 $query = "SELECT * FROM backup WHERE id=(SELECT min(id) FROM backup) "; 
$result = mysqli_query($conn,$query);

If (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        
          $examidfrom=$row['exam_id_from'];
                $examidto=$row['exam_id_to'];
                 $date=$row['date'];
                 $time=$row['time'];
$subname=$row['sub_name'];
                
        
        
    }
}


$query = "SELECT * FROM backup2   "; 
$result = mysqli_query($conn,$query);

If (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        
          $deptid=$row['dept_name'];
                $year=$row['year'];
                  
    }
}

$query = "SELECT sub_id FROM subject where sub_name='$subname'and dept_name='$deptid' "; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);

$row2 = mysqli_fetch_row($result);
//echo $row2[0];

$sql1="insert into timetable(date,time,sub_id,exam_from,exam_to, room) values('$date','$time','$row2[0]','$examidfrom','$examidto','$room')";
$result1=mysqli_query($conn,$sql1);
if($result1=='TRUE')
{
 $query = "SELECT date FROM backup where id=(SELECT min(id) FROM backup)  "; 
$result = mysqli_query($conn,$query);

$row = mysqli_fetch_row($result);
 //echo $row[0] ;
$sql1="insert into check1(room,date) values('$room','$row[0]');";
$result1=mysqli_query($conn,$sql1);

if($result1=='TRUE')
{
   //echo"added successful";
   $query = "SELECT min(id) FROM backup  "; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);

$row = mysqli_fetch_row($result);
//echo $row[0];
$sql1="delete from backup where id='$row[0]'";
$result1=mysqli_query($conn,$sql1);


$sql1="select * from check1";
$result=mysqli_query($conn,$sql1);

If (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        
        
           // echo $row['date']; 
           // echo $row['room'];  
            
        
    }
}

}
else
{
//echo"not successful";
}


}
else
{
header('Location:timnot.php');

}
}
?> 




<html>




<head>
<style>
table, th, td {
    border: 1px solid black;
}

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
<br>


<h2><center>Room Allocation</center></h2>
</head>
<br>
<body>



<center>
 <form action="adminpage6.php" method="post">
<div class="border11"><br>
<?php
mysqli_select_db($conn,$db_name);

 $query = "SELECT date FROM backup where id=(SELECT min(id) FROM backup)  "; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);


 //echo $row[0] ;
if(mysqli_num_rows($result) <= 0)
{
header('Location:adminpage1.php');
}
 else
{
$row = mysqli_fetch_row($result);
//$query = "SELECT room FROM room WHERE room.room NOT IN (select check1.room from check1 where check1.date = '$row[0]')"; //You don't need a ; like you do in SQL
$query = "SELECT room FROM room where room.room not in(select check1.room from check1 where check1.date = '$row[0]' )";
$result = mysqli_query($conn,$query);
If (mysqli_num_rows($result) > 0) {
    

?>
<br>

<?php
$option = '';

 while($row = mysqli_fetch_array($result))
{
  $option .= '<option value = "'.$row['room'].'">'.$row['room'].'</option>';
}
?>

<?php
}

}



?>
<?php
//*******************************************************************************************
 $query = "SELECT * FROM backup WHERE id=(SELECT min(id) FROM backup) "; 
$result = mysqli_query($conn,$query);

If (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        
          $examidfrom1=$row['exam_id_from'];
                $examidto1=$row['exam_id_to'];
                 $date1=$row['date'];
                 $time1=$row['time'];
$subname1=$row['sub_name'];
                
        
        
    }
}

?>
<table style="width:100%">
  <tr>
    <th>Date</th>
    <th>Time</th> 
    <th>Subject</th>
    <th>Exam id from</th>
    <th>Exam id to</th>
     <th>Room</th>
  </tr>
<tr> 


<td><?php echo $date1; ?></td> 
<td><?php echo $time1; ?></td> 
<td><?php echo $subname1; ?></td>
<td><?php echo $examidfrom1; ?></td>
<td><?php echo $examidto1; ?></td> 
  <td><select name= "room">
<?php echo $option; 
?>

</select></td>          

</tr> 
</table>
 <br><center><button>Allocate</button></center>
</div>
</form>
</center>
</body>
</html>









