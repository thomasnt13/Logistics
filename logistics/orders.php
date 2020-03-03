
<!DOCTYPE html>
<html>

<body>

<?php

include 'database_conn.php';
$limit=(int)$_GET['limit'];
$page=(int)$_GET['page'];


if (is_int($limit))

{
$sql = "SELECT * FROM order_details LIMIT ".$limit ."," . $page;
$result = mysqli_query($conn,$sql);

$json_array=array();
if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $json_array[] = $row;
    }
    echo '<pre>';
    array_push($json_array, array('Response Code' => 200));
    $jsonformat = json_encode($json_array);

    echo $jsonformat;
}
else{

    $jsonformat = array("Response Code" => 404, "Error message" => "no data found");

    echo json_encode($jsonformat);

    }
} else{
    $jsonformat = array("Response Code" => 404, "Error message" => "page number or limit is not an integer");

    echo json_encode($jsonformat);
}

echo '</pre>';
mysqli_close($conn);
?>
<form>
    <table>
        <br><br><br><tr></tr>  <td></td> <td><a href="Home.php">Home</a></td></tr>
    </table>
</form>
</body>
</html>
