<?php

$conn = mysqli_connect("localhost", "root", "", "agencydb");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$select_sql = "SELECT * FROM Client WHERE Type='employee' or Type='manager'";
$result = mysqli_query($conn, $select_sql);

if ($result && mysqli_num_rows($result) > 0) {
  
 

  
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row['ClientName'] . " " . $row['ClientSurname'] . "</td>
                <td>" . $row['Username'] . "</td>
                <td>" . $row['Email'] . "</td>
                <td>" . $row['Gender'] . "</td>      
                <td>" . $row['Type'] ."</td>
                <td><input type='submit' id='delete-staff' onclick='return confirmDelete(". $row['ClientID'].")' value='Delete'></input>
            </tr>" ;
         

          
    }

    echo "</tbody></table>";

    

    mysqli_free_result($result);
} else {
    echo "<script>alert('No data found')</script>";
}

mysqli_close($conn);
?>
<script>
    function confirmEdit(){
        return confirm("Are you sure you want to edit this staff member?");
    }

    function confirmDelete(userID) {
        if(confirm("Are you sure you want to delete this staff member?")){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert("User deleted successfully!");
                    location.reload();
                }
            };
            xhttp.open("GET", "deleteUser.php?id=" + userID, true);
            xhttp.send();
        }
        };
</script>