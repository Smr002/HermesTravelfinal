<?php

$conn = mysqli_connect("localhost", "root", "", "agencydb");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$select_sql = "SELECT * FROM Client";
$result = mysqli_query($conn, $select_sql);

if ($result && mysqli_num_rows($result) > 0) {
  
 

  
    while ($row = mysqli_fetch_assoc($result)) {
        if($row['Type'] != "manager" && $row['Type'] != "employee" && $row['Type'] != "admin"){
        echo "<tr>
                <td>" . $row['ClientName'] . " " . $row['ClientSurname'] . "</td>
                <td>" . $row['Username'] . "</td>
                <td>" . $row['Email'] . "</td>
                <td>" . $row['Gender'] . "</td>   
                <td>" . $row['Reviews'] . "</td>   

            </tr>";
         
        }
          
    }

    echo "</tbody></table>";

    

    mysqli_free_result($result);
} else {
    echo "<script>alert('No data found')</script>";
}

mysqli_close($conn);
?>
