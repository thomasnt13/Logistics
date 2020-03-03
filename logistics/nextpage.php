<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#se").hide();
            $(".btn1").click(function(){
                $("#first").hide();
                $("#se").show();

            });
            $(".btn2").click(function(){
                $("p").show();
            });
        });
    </script>
</head>
<body>
<div id="first" >
    <FORM  method=post>
        <table border=0>

            <tr>
                <td>Starting location</td>
                <td align="center"><input type="text" name="qtybases" ></td>
            </tr>
            <tr>
                <td>Drop-off point</td>
                <td align="center"><input type="text" name="qtystems" ></td>
            </tr>


        </table>
    </form>
</div>
<div id ="se">
    <form><table>
    <tr>
        <td>Starting location</td>

    </tr>
    <tr>
        <td>Drop-off point</td>

    </tr>
        </table>
    </form>
</div>


<button class="btn1">Submit</button>
<button class="btn2">Reset</button>

</body>
</html>
