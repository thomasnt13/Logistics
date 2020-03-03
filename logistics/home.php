<?php
$page=1;
$limit=6;

?>
<!DOCTYPE html>
<html>
<body>
<div id="first" >
    <FORM>
        <table border=0>

            <tr>
                <a href="place_order.php">Order</a> </tr><br><br>
            <tr> <a href="orders.php?page=<?=$page?>&limit=<?=$limit?>">List Orders</a> </tr> <br><br>
            <tr> <a href="update_orders.php">Take Order</a> </tr><br><br></tr>


        </table>

    </FORM>
</div>
</body>
</html>
