
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
type
{
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
<button1 onclick=" location.href='logout.php'" >SIGNOUT</button1>
<button1 onclick="history.back()" >PREVIOUS</button1>


<center><h2> Timetable Creation</h2></center>
</head>
<body>


   


<center><form action='adminpage6.php' method='POST'>

<fieldset>
 <legend>Prepare a Timetable:</legend>
    <div class="border11"><br>
<?php

ini_set('display_errors',1);
$host="localhost";
$username="root";
$password="root123";
$db_name="exam";
$tbl_name="student";

$conn=mysqli_connect("$host","$username","$password","$db_name")or die("cannot connect");



if($conn)
{
	//echo"connection successful";
}
else
{
	//echo"connection unsuccessful";
}
//mysqli_select_db($conn,"$db_name")or die("cannot select db");
$date=$_POST[ 'date' ];
$time=$_POST[ 'time' ];
$examidf=$_POST[ 'examidfrom' ];
$total1=$_POST[ 'total' ];

$subname=$_POST[ 'subname' ];
$date=stripslashes($date);
$time=stripslashes($time);
//$examidto=stripslashes($examidto);

//$examidfrom=stripslashes($examidfrom);
//echo $subname;
$date = date("Y-m-d", strtotime($date));

?>


<?php

$examidt=$examidf-1;
$examidf=$examidf-1 ;

//$examidt=$examidt+10;
//echo $examidt;
$i=0;
$j = 0 ;
while(($total1-$j)>0)
{

  if(($total1-$j)>=3)
{

$examidf=1+$examidt;
$examidt=$examidf+2;
}
else
{
$examidf=1+$examidt;
$examidt=$examidt+($total1-$j);
}
$j = $j+3 ;
$a1[$i]= $examidf;
$a2[$i]= $examidt;
++$i;
}
?>

<?php
for($x = 0; $x < $i; $x++) {

$sql1="insert into backup(date,time,sub_name,exam_id_from,exam_id_to, id) values('$date','$time','$subname','$a1[$x]','$a2[$x]',$x)";
$result1=mysqli_query($conn,$sql1);


//$sql1="insert into backup(date,time,sub_name,exam-id_from,exam_id_to,id) values('$date','$time','$subname','$a1[$x]','$a2[$x]','$x');";
//$result1=mysqli_query($conn,$sql1);




}?>
<center><table>
<th>Allocation</th>
<tr>
<td>id </td>
<td>Date </td>
<td>Time </td>

<td>Exam_id_from</td>
<td>Exam_id_to</td>
<td>Subject </td>

</tr>


<?php
mysqli_select_db($conn,$db_name);
$query = "SELECT * FROM backup "; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);

//$row = mysqli_fetch_row($result);


If (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td> <center><?php echo $row['id']; ?></center></td> 
            <td><?php echo $row['date']; ?></td> 
            <td><?php echo $row['time']; ?></td> 
            <td><?php echo $row['exam_id_from']; ?></td>
            <td><?php echo $row['exam_id_to']; ?></td> 
            <td><?php echo $row['sub_name']; ?></td>

        </tr>


        <?php
    }
}

 ?>


</table>
</center>

<br>

</div>
</fieldset>
<center><button>Allocate</button></center>
</form>


</center>
</body>





