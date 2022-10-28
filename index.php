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
            
            if (isset($_POST['submit'])) {
                $numar = 0;
                $nr_random = random_int(1, 25);
                echo "numaru introdus : ".$_POST['nr'].'<br />';
                echo "numaru random : ".$nr_random.'<br />';
                $numar = (int)$_POST['nr'];
                $suma = $numar + $nr_random;
                echo "sume : ".$suma.'<br />';

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                  }
                  $sql = "INSERT INTO numeros (input_number, random_number, number_result)
                    VALUES ($numar, $nr_random, $suma)";
                    if ($conn->query($sql) === TRUE) {
                        echo "numbers are posted to the database";
                      } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                      }
                      $sql = "SELECT * FROM numeros";
                      if($result = mysqli_query($conn, $sql)){
                          if(mysqli_num_rows($result) > 0){
                              echo "<table>";
                              echo "<table border='1'>";
                                  echo "<tr>";
                                      echo "<th>nr introdus  |</th>";
                                      echo "<th>nr random    |</th>";
                                      echo "<th>suma acestora|</th>";
                                  echo "</tr>";
                              while($row = mysqli_fetch_array($result)){
                                  echo "<tr>";
                                      echo "<td>" . $row['input_number'] . "</td>";
                                      echo "<td>" . $row['random_number'] . "</td>";
                                      echo "<td>" . $row['number_result'] . "</td>";
                                  echo "</tr>";
                              }
                              echo "</table>";
                              // Free result set
                              mysqli_free_result($result);
                          } else{
                              echo "No records matching your query were found.";
                          }
                      } else{
                          echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                      }
                    

            }
            else{
                echo "nica introdus";
            }
        ?>
        <form action="" method="POST">
            <p><input type="number" name="nr" value="value"></p>
            <p><input type="submit" name="submit" value="Submit"></p>
        </form> 
       
    </body>
</html> 