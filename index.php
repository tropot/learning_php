<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title> loplo</title>
    </head>
    <body>
        <?php
            if (isset($_POST['submit'])) {
                $numar = 0;
                $nr_random = random_int(1, 25);
                echo "numaru introdus : ".$_POST['nr'].'<br />';
                echo "numaru introdus : ".$nr_random.'<br />';
                $numar = (int)$_POST['nr'];
                $suma = $numar + $nr_random;
                echo "sume : ".$suma.'<br />';
               
            }
        ?>
        <form action="" method="POST">
            <p><input type="number" name="nr" value="value"></p>
            <p><input type="submit" name="submit" value="Submit"></p>
        </form> 
       
    </body>
</html> 