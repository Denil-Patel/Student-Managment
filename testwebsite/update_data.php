<!DOCTYPE html>
<html>
<head>
	<title>Updated Student Information</title>
	<style>
		body {
			background-color: #f2f2f2;
			display: flex;
			flex-direction: column;
			align-items: center;
		}

		table {
			border-collapse: collapse;
			margin-top: 1.3rem;
			width: 100%;
			font-size: 1.4em;
		}

		th, td {
			padding: 1.3rem;
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

		$rollno = $_POST['rollno'];
		$field = $_POST['field'];
		$new_value = $_POST['new_value'];

		// Update data in the MySQL database
		$sql = "UPDATE students SET $field='$new_value' WHERE rollno='$rollno'";

		if (mysqli_query($conn, $sql)) {
			// Query to retrieve updated data from students table
			$select_query = "SELECT * FROM students WHERE rollno='$rollno'";
			$result = mysqli_query($conn, $select_query);

			// Check if query was successful
			if ($result) {
				// Display the updated data in a table
				echo "<h2>Updated Student Information</h2>";
				echo "<table border='1'>";
				echo "<tr><th>Roll No.</th><th>Name</th><th>DOB</th><th>Address</th><th>Course</th></tr>";
				$row = mysqli_fetch_assoc($result);
				echo "<tr>";
                echo "<td>" . $row['rollno'] . "</td>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['dob'] . "</td>";
				echo "<td>" . $row['address'] . "</td>";
				echo "<td>" . $row['course'] . "</td>";
				echo "</tr>";
				echo "</table>";
			} else {
				echo "Error retrieving updated data: " . mysqli_error($conn);
			}
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}

		mysqli_close($conn);
	?>
</body>
</html>
