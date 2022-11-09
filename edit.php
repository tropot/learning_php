<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title> loplo</title>
    </head>
    <body>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "testing";
            $conn = new mysqli($servername,$username,$password,$dbname);
            
            if (isset($_GET['editNumber']) && isset($_GET['id'])) {
                echo "Number that you are editing :".$_GET['editNumber']."</br>";
                echo "id :".$_GET['id']."</br>";
            }
            
            
            if (isset($_POST['submit'])) {
                $editNr = $_POST['editedNumber'];
                $id= $_GET['id']; 
                $sql = "UPDATE numeros SET input_number= '$editNr' WHERE id='$id'";
                if ($conn->query($sql) === TRUE) {
                    echo "Record updated successfully";
                  } else {
                    echo "Error updating record: " . $conn->error;
                  }
                $conn->close();
            }
        ?>
        <form action="" method="POST">
            <p><input type="number" name="editedNumber" value="value"></p>
            <p><input type="submit" name="submit" value="Submit"></p>
        </form> 
       
    </body>
</html> 