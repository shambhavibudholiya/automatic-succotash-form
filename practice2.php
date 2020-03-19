<!DOCTYPE html>
<html>
<head>
    <title>Database</title>
    <style>
        body,html{
            margin: 30px;
            padding: 5px;
        }
        table{
            border-collapse: collapse;
            width: 100%;
            color: #114268;
            font-family: monospace;
            font-size: 15px;
            text-align: left;
            margin left: 30%;
        }
        th{
            background-color: #49900F;
            color: white;
            text-align:center;
            height: 30px;
            border-radius:10px
        }
        tr:nth-child(odd){background-color:#f2f2f2}
        p{
            text-align: center;
            color: #49900F;
            font-size: 30px;

        }
        .button {
  background-color: #49900F;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: hand;
  border-radius: 10px;
}
    </style>
</head>
<body>
    
    <p><b>Tabular Representation of Data</b></p><br>
    <br>
    <a href="practice.php" class="button">Add</a>
    <br>
    <br>
    <table>
        <tr>
            <th>Id</th>
            <th>Fname</th>
            <th>lname</th>
            <th>Gender</th>
            <th>Age</th>
            <th>City</th>
            <th>Image</th>
            <th>Resume</th>
        </tr>
        <?php
$conn = mysqli_connect("localhost","root","","form");
if ($conn-> connect_error){
    die("connection failed:" . $conn-> connect_error);
}
$sql = "SELECT * from practice ORDER BY id DESC" ;
$result = $conn-> query($sql);

    while($row = mysqli_fetch_array($result)){
    echo "<tr><td>". $row["id"] . "</td><td>" .
    $row["fname"] . "</td><td>". $row["lname"] .
    "</td><td>". $row["gender"] . "</td><td>".
    $row["age"] . "</td><td>". $row["city"] .
    "</td><td>";?>
    <img src="image_folder/<?php print $row["image"];?>"height="50" width="50">
    <?php echo "</td><td>". $row["pdfFile"] . "</td></tr>";
    }
    echo "</table>";

$conn-> close();
?>
    </table>
</body>
</html>