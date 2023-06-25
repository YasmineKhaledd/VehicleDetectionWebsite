<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/Data.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/footer.css">

    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/headers/">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/footers/">

    <style>
        .sty {
            color: rgb(7 61 116 / 75%);
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        .result {
            text-shadow: #4f5995 1px 0 10px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-weight: bolder;
            font-size: 70px;
            margin-left: 240px;
        }
    </style>

    <title>Data</title>
</head>

<body>
    <main>
        <header class="p-3 text-bg-dark">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img src="Logo.PNG" alt="Logo" width="50" height="50" class="me-2">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap" /></svg>
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="Home.php" class="nav-link px-2 text-secondary fw-bold fs-4">Home</a></li>
                        <li><a href="Detection-Page.php" class="nav-link px-2 text-white fw-bold fs-4">Detection</a></li>
                        <li><a href="Vehicle_Data.php" class="nav-link px-2 text-white fw-bold fs-4">Data</a></li>

                    </ul>

                    <a href="logout.php">
                <button type="button" class="btn btn-danger me-3"  >Log out</button>
                </a>  
                </div>
            </div>
        </header>
    </main>

    <div class="content">
        <div class="container">
            <h1 class="mb-5 fw-bold">Table Of Vehicles Attribute</h1>

            <div class="table custom-table">

                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th scope="col">PlatNumber</th>
                            <th scope="col">Violation</th>
                            <th scope="col">ID</th>
                            <th scope="col">Price</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "123123";
                        $dbname = "vehicledetection";

                        // Create a connection
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }


                         if (isset($_POST['add'])) {
                            $newPlatNumber = $_POST['new_platnumber'];
                            $newViolation = $_POST['new_violation'];
                            $newID = $_POST['new_id'];
                            $newPrice = $_POST['new_price'];

                            // Insert the new row into the database
                            $sql = "INSERT INTO vehicle (PlatNumber, Violation, ID, Price) VALUES ('$newPlatNumber', '$newViolation', '$newID', '$newPrice')";

                            $result = $conn->query($sql);
                        }
                        // Update the attributes if a form is submitted
                        if (isset($_POST['update'])) {
                            $PlatNumber = $_POST['platnumber'];
                            $Violation = $_POST['violation'];
                            $ID = $_POST['id'];
                            $Price = $_POST['Price'];

                            // Update the attributes in the database
                            $sql = "UPDATE vehicle SET Violation='$Violation', ID='$ID', Price='$Price' WHERE PlatNumber='$PlatNumber'";

                            $result = $conn->query($sql);
                        }

                        // Delete functionality
                        if (isset($_POST['delete'])) {
                            $PlatNumber = $_POST['platnumber'];

                            // Delete the row from the database
                            $sql = "DELETE FROM vehicle WHERE PlatNumber='$PlatNumber'";
                            $result = $conn->query($sql);
                        }
                        // Select data from the database table
                        $sql = "SELECT * FROM vehicle";
                        $result = $conn->query($sql);

                        // Check if any rows are returned
                        if ($result->num_rows > 0) {
                            // Fetch data and display it
                            while ($row = $result->fetch_assoc()) {
                                // Access individual attributes and display them in the frontend
                                $PlatNumber = $row["PlatNumber"];
                                $Violation = $row["Violation"];
                                $ID = $row["ID"];
                                $Price = $row["Price"];

                                // Generate HTML code to display the data dynamically
                                echo "<tr>";
                                echo "<td>$PlatNumber</td>";
                                echo "<td>$Violation</td>";

                                echo "<td>$ID</td>";
                                echo "<td>$Price</td>";
                                echo "<td>
                                        <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#updateModal$PlatNumber'>Update</button>
                                        <form method='post' action='' class='d-inline'>
                                            <input type='hidden' name='platnumber' value='$PlatNumber'>
                                            <button type='submit' name='delete' class='btn btn-danger'>Delete</button>
                                        </form>
                                    </td>";
                                echo "</tr>";
                                echo "<tr class='spacer'><td colspan='100'></td></tr>";

                                // Modal for update form
                                echo "<div class='modal fade' id='updateModal$PlatNumber' tabindex='-1' aria-labelledby='updateModalLabel' aria-hidden='true'>";
                                echo "<div class='modal-dialog'>";
                                echo "<div class='modal-content'>";
                                echo "<div class='modal-header'>";
                                echo "<h5 class='modal-title' id='updateModalLabel'>Update Vehicle Attributes</h5>";
                                echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                                echo "</div>";
                                echo "<div class='modal-body'>";
                                echo "<form method='post' action=''>";
                                echo "<div class='mb-3'>";
                                echo "<label for='platnumber' class='form-label'>PlatNumber</label>";
                                echo "<input type='text' class='form-control' id='platnumber' name='platnumber' value='$PlatNumber' readonly>";
                                echo "</div>";
                                echo "<div class='mb-3'>";
                                echo "<label for='violation' class='form-label'>Violation</label>";
                                echo "<input type='text' class='form-control' id='violation' name='violation' value='$Violation'>";
                                echo "</div>";
                                echo "<div class='mb-3'>";
                                echo "<label for='id' class='form-label'>ID</label>";
                                echo "<input type='text' class='form-control' id='id' name='id' value='$ID'>";
                                echo "</div>";
                                echo "<div class='mb-3'>";
                                echo "<label for='price' class='form-label'>Price</label>";
                                echo "<input type='text' class='form-control' id='price' name='Price' value='$Price'>";
                                echo "</div>";
                                echo "<button type='submit' class='btn btn-primary' name='update'>Update</button>";
                                echo "</form>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No results found</td></tr>";
                        }

                        // Close the database connection
                        $conn->close();
                        ?>
                         <form method="post" action="">
                            <tr>
                                <td><input type="text" class="form-control" name="new_platnumber" placeholder="PlatNumber" required></td>
                                <td><input type="text" class="form-control" name="new_violation" placeholder="Violation" required></td>
                                <td><input type="text" class="form-control" name="new_id" placeholder="ID" required></td>
                                <td><input type="text" class="form-control" name="new_price" placeholder="Price" required></td>
                                <td>
                                    <button type="submit" name="add" class="btn btn-danger">Add</button>
                                </td>
                            </tr>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>