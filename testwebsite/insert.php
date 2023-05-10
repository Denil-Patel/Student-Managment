
<!DOCTYPE html>
<html>
<head>
	<title>Latest Student Information</title>
	<style>

        body {
			background-color: #f2f2f2;
			display: flex;
			flex-direction: column;
			align-items: center;
            background-color: #f3ecec;
		}
        h1{
            font-size: 55px;
            color: navy;

        }

		table {
			border-collapse: collapse;
			margin-top: 1.3rem;
			width: 100%; /* added */
			font-size: 1.4em; /* added */
		}
		th, td {
			padding: 1.3rem; /* changed */
			border: 1.3px solid #ccd;
			text-align: left;
		}
		th {
			background-color: #ddf;
		}
	</style>
</head>
<body>
        <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $rollno = $_POST['rollno'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students (name, rollno, dob, address, course)
            VALUES ('$name', '$rollno', '$dob', '$address', '$course')";

    if (mysqli_query($conn, $sql)) {
        // Query to retrieve latest data from students table
        $select_query = "SELECT * FROM students ORDER BY id DESC LIMIT 1";;
        $result = mysqli_query($conn, $select_query);

        // Check if query was successful
        if ($result) {
            // Display the data in a table
            echo "<h1>Latest Student Information</h1>";
            echo "<table border='1'>";
            echo "<tr><th>Name</th><th>Roll No.</th><th>DOB</th><th>Address</th><th>Course</th></tr>";
            $row = mysqli_fetch_assoc($result);
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['rollno'] . "</td>";
            echo "<td>" . $row['dob'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['course'] . "</td>";
            echo "</tr>";
            echo "</table>";
        } else {
            echo "Error retrieving latest data: " . mysqli_error($conn);
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
    ?>


</body>
</html>





