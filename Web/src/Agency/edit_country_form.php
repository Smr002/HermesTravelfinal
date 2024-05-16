<?php
$conn = mysqli_connect("localhost", "root", "", "agencydb");

if (!$conn) {
  die("Connection Failed : " . mysqli_connect_error());
}

// Check if country ID is received
if (isset($_POST['country_id'])) {
  $countryId = $_POST['country_id'];

  // Retrieve country details from database
  $getCountryQuery = "SELECT * FROM country WHERE CountryID = '$countryId'";
  $result = mysqli_query($conn, $getCountryQuery);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $countryName = $row['CountryName'];
    $description = $row['CountryInfo'];
    $image = $row['CountryImage'];

?>
    <!DOCTYPE html>
    <html>

    <head lang="en">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Country Dashboard</title>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

      <style>
        body {
          margin: 0;
          padding: 0;
          background-color: #1d2634;
          color: #9e9ea4;
          font-family: 'Montserrat', sans-serif;
        }

        .add-form {
          background-color: #f9f9f9;
          padding: 20px;
          border-radius: 5px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          max-width: 500px;
          margin: 0 auto;

        }


        .add-form h3 {
          margin-top: 0;
          color: #333;
        }

        .add-form input[type="text"],
        .add-form select,
        .add-form textarea {
          width: 100%;
          padding: 10px;
          margin-bottom: 10px;
          border: 1px solid #ccc;
          border-radius: 5px;
          box-sizing: border-box;
        }

        .add-form label {
          color: black;
        }

        .add-form textarea {
          height: 100px;
        }

        .add-form input[type="file"] {
          display: block;
          margin-bottom: 10px;
        }

        .add-form button {
          padding: 10px 20px;
          border: none;
          border-radius: 5px;
          cursor: pointer;
        }

        .add-form button.btn-primary {
          background-color: #007bff;
          color: #fff;
        }

        .add-form button.btn-secondary {
          background-color: #6c757d;
          color: #fff;
        }

        .add-form button.btn-primary:hover,
        .add-form button.btn-secondary:hover {
          opacity: 0.8;
        }

        .custom-btn {
          padding: 8px 20px;
          border: none;
          border-radius: 5px;
          background-color: #007bff;
          color: #fff;
          font-size: 16px;
          cursor: pointer;
          transition: background-color 0.3s ease;
        }

        .custom-btn:hover {
          background-color: #0056b3;
        }

        .custom-text {
          padding: 10px;
          border: 1px solid #ccc;
          border-radius: 5px;
          font-size: 16px;
          transition: border-color 0.3s ease;
        }

        .custom-text::placeholder {
          color: #999;
        }
        .custom-text:focus {
          outline: none;
          border-color: #007bff;
          box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
      </style>

    </head>

    <body>
      <div class="add-form" id="add-country-form">
        <h3>Edit Country</h3>
        <form action="edit_country.php" id="country-form" method="post" enctype="multipart/form-data">
          <input type="hidden" name="country_id" value="<?php echo $countryId; ?>">
          <input type="text" class="custom-text" name="country-name" placeholder="Country Name" value="<?php echo $countryName; ?>">
          <textarea name="description" class="custom-text" placeholder="Description"><?php echo $description; ?></textarea>
          <input type="file"  name="image" accept=".jpg, .jpeg, .png" value="<?php echo $countryImage; ?>">
          <input type="submit" class="btn btn-primary custom-btn " name="submitCountryEdit">
          <button type="button" class="btn btn-secondary" id="cancel-country-btn">Cancel</button>
        </form>
      </div>
    </body>

    </html>
<?php
  } else {
    echo "No country found with ID: $countryId";
  }

  // Free result and close connection
  mysqli_free_result($result);
  mysqli_close($conn);
} else {
  echo "No country ID received.";
}
?>
<script>
  document.getElementById('cancel-country-btn').addEventListener('click', function() {
    window.location.href = 'countries.php';
  });
</script>