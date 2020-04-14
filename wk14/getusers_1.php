
<?php
$host = "127.0.0.1";
$username = "Dharam";
$password ="Abc123";
$dbname="myDatabase";
$char = 'utf8';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <h1>Interact with database</h1>
    <form method="get">
        <input id="inputData" type="text" name="username">
        <button type="submit">Submit</button>
    </form>
    <br>

    <?php

        if(isset($_GET['username'])) {

           
            $conn = mysqli_connect($host, $username, $password, $dbname);
           
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM users WHERE active=0 and firstname='".$_GET["username"]."'" ;
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                echo "<table>";
                echo "<tr>";
                echo "<th>id</th>";
                echo "<th>username</th>";
                echo "<th>first_name</th>";
                echo "<th>last_name</th>";
                echo "<th>email</th>";
                echo "</tr>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>" . $row['id_PK'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['firstname'] . "</td>";
                    echo "<td>" . $row['lastname'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                
                mysqli_free_result($result);
            } else{
                echo "Something went wrong. Please try again.";
            }
            mysqli_close($conn);
        }
    ?>
</body>
</html>
