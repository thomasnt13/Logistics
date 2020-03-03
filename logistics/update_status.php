<?php

include 'database_conn.php';

$query1=mysqli_query($conn,"SELECT status FROM order_details WHERE order_id='" . $_GET['order_id'] . "'");

$value = mysqli_fetch_object($query1);
$value=$value->status;
if ($value!=='TAKEN') {

    $query2 = mysqli_query($conn, "UPDATE order_details set  status='TAKEN' WHERE order_id='" . $_GET['order_id'] . "'");
    $message = "Status Modified to TAKEN Successfully";

    if ($query2) {
        $jsonformat = array("Response Code" => 200, "status" => "SUCCESS", "Message" => "Order status changed to 'Taken'");

        echo json_encode($jsonformat);

    } else {
        $jsonformat = array("Error message" => "FAILED");

        echo json_encode($jsonformat);
    }
}
else if($value=='TAKEN')
{
    $jsonformat = array("Response Code" => 200, "Message" => "The order is already taken");

    echo json_encode($jsonformat);

}


?>
<html>
<form>
    <table>
        <br><br><br><tr></tr>  <td><a href="Home.php">Home</a></td></tr>
    </table>
</form>
</html>
