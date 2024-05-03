<?php

$conn = mysqli_connect("localhost", "root", "", "agencydb");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$select_sql = "SELECT * FROM destination ";
$result = mysqli_query($conn, $select_sql);

if ($result && mysqli_num_rows($result) > 0) {
  
 

  
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row['DestinationName']."</td>
                <td>" . $row['DestinationInfo'] . "</td>
                <td>" . $row['DestinationPrice'] . "</td>
                <td>" . $row['Type'] . "</td>      
                <td>" . $row['Revenue'] ."</td>
            </tr>" ;
         

          
    }

    echo "</tbody></table>";

    

    mysqli_free_result($result);
} else {
    echo "<script>alert('No data found')</script>";
}

mysqli_close($conn);
?>