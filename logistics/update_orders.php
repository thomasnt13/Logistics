<?php
include 'database_conn.php';
$result = mysqli_query($conn,"SELECT * FROM order_details");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<table>
    <tr>
        <td>Order Id</td>
        <td>Status</td>

    </tr>
    <?php
    $i=0;
    while($row = mysqli_fetch_array($result)) {

        ?>
        <tr>
            <td><?php echo $row["order_id"]; ?></td>
            <td><?php echo $row["status"]; ?></td>

            <td><a href="update_status.php?order_id=<?php echo $row["order_id"]; ?>">Update</a></td>
        </tr>
        <?php
        $i++;
    }
    ?>

    <form>
        <table>
            <br><br><br><tr></tr>  <td><a href="Home.php">Home</a></td></tr>
        </table>
    </form>
</table>
</body>
</html>