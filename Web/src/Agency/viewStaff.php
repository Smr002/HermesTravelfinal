<!DOCTYPE html>
<html>
<head>
    <title>View</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
    <link rel="stylesheet" href="css/styles1.css">
</head>
<body>
    <table id='example' class='table table-striped' style='width:100%'>
        <thead>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Type</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php include_once 'showStaff.php'; ?>
        </tbody>
    </table>

    <script>
      $(document).ready(function () { 
            $('#example').DataTable({ 
                searching: true
            }); 
        }); 
    </script>
</body>
</html>
