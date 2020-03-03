
<!DOCTYPE html>
<html>
<head>
<script>
    function reset(){
    document.getElementById("o").value="";
    document.getElementById(“d”).value="";
    )


</script>
</head>
<body>
<div id="first" >
<form  method="post">

    <label>Origin:</label> <input type="text" name="o" placeholder="Enter Origin location" required> <br><br>
    <label>Drop-off location:</label> <input type="text" name="d" placeholder="Enter Destination location" required> <br><br>
    <tr border=0>
        <tr><td>
    <input type="submit" value="Submit" name="submit" class="submit"> </td>
        <td><input type = "submit" value="Reset" onclick="return reset();"></td></tr>
        <br><br><br><tr></tr>  <td></td> <td></td><td></td><td><a href="Home.php">Home</a></td></tr>

</table>
</form>
</div>

<?php

if(isset($_POST['submit'])){
    #echo '<script>$(document).ready(function() { $(\'#submit\').hide(); });</script>';
    include 'database_conn.php';
    $GOOGLE_API_KEY="";
    $origin = $_POST['o']; $destination = $_POST['d'];
    $api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$origin."&destinations=".$destination."&key=".$GOOGLE_API_KEY);
    $data = json_decode($api);
    $distance = $data['rows'][0]['elements'][0]['distance']['value'];
    $time=$data['rows'][0]['elements'][0]['duration']['value'];





    $sql = "INSERT INTO order_details (distance, status)
    VALUES ($distance, 'UNASSIGNED')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


    $sql2 = "SELECT * FROM order_details ORDER BY order_id DESC LIMIT 1";
    $result = mysqli_query($conn,$sql2);

    $json_array=array();
if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $json_array[] = $row;
    }
    echo '<pre>';
    array_push($json_array, array('response code' => 200));
    $jsonformat = json_encode($json_array);

    echo $jsonformat;
}
else{
    echo "asdad";
}
    echo '</pre>';
    mysqli_close($conn);
    ?>

    <label><b>Distance: </b></label> <span><?php echo ((int)$data->rows[0]->elements[0]->distance->value / 1000).' Km'; ?></span> <br><br>
    <label><b>Total Time: </b></label> <span><?php echo $data->rows[0]->elements[0]->duration->text; ?></span>


<?php } ?>

</body>
</html>