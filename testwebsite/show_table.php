<!DOCTYPE html>
<html>
<head>
	<title>Student Information</title>
	<style>
		body {
			background-color: #f5f5f5;
			display: flex;
			flex-direction: column;
			align-items: center;
			
            /* background-image: linear-gradient(rgb(233, 247, 113),rgb(255, 255, 255)) ;
            background-repeat: no-repeat;
            background-size: 100% 5000px; */
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
		table td:hover {
			padding: 1.3rem; /* changed */
			border: 1.3px solid #ccd;
			text-align: left;
			background-color: antiquewhite;
			color:blue;
			}

	</style>
</head>

<body>
	<h1>Student Information</h1>

	<table>
		<tr>
			<th style="color:red" > Roll No.</th>
			<th>Name</th>
			<th>DOB</th>
			<th>Address</th>
			<th>Course</th>
		</tr>
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

			// Query to retrieve all data from students table
			$select_query = "SELECT * FROM students";
			$result = mysqli_query($conn, $select_query);

			// Display the data in a table
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['rollno'] . "</td>";
				echo "<td>" . $row['name'] . "</td>";

				echo "<td>" . $row['dob'] . "</td>";
				echo "<td>" . $row['address'] . "</td>";
				echo "<td>" . $row['course'] . "</td>";
				echo "</tr>";
			}

			mysqli_close($conn);
		?>
	</table>

</body>
</html>
