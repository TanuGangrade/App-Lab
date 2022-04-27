<?php
include "config.php";

$userid = 0;
if(isset($_POST['userid'])){
   $userid = mysqli_real_escape_string($con,$_POST['userid']);
}
$query = "select * from book where bid=".$userid;
$result = mysqli_query($con,$query);

$response = "<table border='0' width='100%'>hi".$userid;
while( $row = mysqli_fetch_array($result) ){

 $bid = $row['bid'];
  $bname = $row['bname'];
  $bauthor = $row['bauthor'];
  $sid = $row['sid'];
  $sname = $row['sname'];
 
 $response = "<tr>";
 $response = "<td>Book id : </td><td>".$bid."</td>";
 $response = "</tr>";

 $response .= "<tr>";
 $response .= "<td>Book Name : </td><td>".$bname."</td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Book Author : </td><td>".$bauthor."</td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Student Id : </td><td>".$sid."</td>";
 $response .= "</tr>";

 $response .= "<tr>"; 
 $response .= "<td>Student Name : </td><td>".$sname."</td>"; 
 $response .= "</tr>";

}
$response .= "</table>";

echo $response;
exit;
