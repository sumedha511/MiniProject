<!DOCTYPE html>
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
table, th, td {
    border: 1px solid black;
}

abc {

  position:fixed;
   
   left:30%;
   width:550px;

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
@media print
{
.noprint {display:none;}
}

</style>
<br>


<div class="noprint">
<button1 onclick=" location.href='logout.php'" >SIGNOUT</button1>
<button1 onclick="history.back()" >PREVIOUS</button1>


<button1 onclick=" location.href='test.php'">DELETE</button1>
<center><h2>Timetable</h2></center>
</div>
</head>


<body>



<abc >
<br>
<fieldset>

<div class="border11"><br>


<table style="width:100%">
  <tr>
    <th>Date</th>
    <th>Time</th> 
    <th>sub id</th>
    <th>exam id from</th>
     <th>exam id to</th>
<th>room</th>
  </tr>
 
<?php
mysqli_select_db($conn,$db_name);

$query = "SELECT * FROM timetable"; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);

If (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
           <td><?php echo $row['date']; ?></td> 
            <td><?php echo $row['time']; ?></td> 
<td><?php echo $row['sub_id']; ?></td> 
            <td><?php echo $row['exam_from']; ?></td>
            <td><?php echo $row['exam_to']; ?></td> 
            
          <td><?php echo $row['room']; ?></td> 
        </tr>
        <?php
    }
}
?>

</table>

</table>

</div>
</fieldset>
<br><br>
<center>

<button onClick="window.print()">Print</button>
</center>

</abc> 
</center>
</body>
<br><br>
<br><br>
<br><br>

</html>

