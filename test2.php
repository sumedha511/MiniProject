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
   width:450px;

}

button {
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

</style>


</head>


<body style=" background:#fef9e7;">

<abc >
<br>
<fieldset>

<div class="border11"><br>


<table style="width:100%">
  <tr>
    <th>Firstname</th>
    <th>Lastname</th> 
    <th>Exam_id</th>
    <th>Department</th>
     <th>Year</th>
  </tr>
<tr>  
<?php
mysqli_select_db($conn,$db_name);

$query = "SELECT * FROM student"; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);

If (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
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
}
?>
</tr>
</table>
<br>
<table style="width:100%">
  <tr>
    <th>dept_name</th>
    <th>dept_id</th> 
    
  </tr>
<tr>  
<?php
mysqli_select_db($conn,$db_name);

$query = "SELECT * FROM department"; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);

If (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $row['dept_name']; ?></td> 
            <td><?php echo $row['dept_id']; ?></td> 
          
        </tr>
        <?php
    }
}
?>
</tr>
</table>

<br>
<table style="width:100%">
  <tr>
    <th>year</th>
    <th>sem</th> 
    <th>department</th>
    <th>sub_name</th>
     <th>sub_id</th>
  </tr>
<tr>  
<?php
mysqli_select_db($conn,$db_name);

$query = "SELECT * FROM subject"; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);

If (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $row['year']; ?></td> 
            <td><?php echo $row['sem']; ?></td> 
            <td><?php echo $row['dept_name']; ?></td> 
            <td><?php echo $row['sub_name']; ?></td>
             <td><?php echo $row['sub_id']; ?></td>
        </tr>
        <?php
    }
}
?>
</tr>
</table>

</div>
</fieldset>


</abc> 
</center>
</body>
</html>

