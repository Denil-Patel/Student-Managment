<!DOCTYPE html>
<html>
<head>
	<title>Delete Student Data</title>
    <style>
        body {
			font-family: Arial, sans-serif;
			display: flex;
			flex-direction: column;
			align-items: center;
			margin: 0;
			padding: 0;
			background-color: #f4f4f4;
		}
		h1 {
			text-align: center;
			margin: 2rem 0;
			font-size: 45px;
			color: navy;
		}
		form {
			width: 50%;
			background-color: #fff;
			border-radius: 20px;
			box-shadow: 10px 15px 10px 1px gainsboro;
			padding: 2rem;
			display: flex;
			flex-direction: column;
			align-items: center;
		}
		form label {
			font-size: 1.2rem;
			margin-bottom: 0.5rem;
		}
		form input, form textarea, form select {
			width: 100%;
			padding: 0.5rem;
			border-radius: 10px;
			border: 1px solid #ccc;
			margin-bottom: 1rem;
			font-size: 1.2rem;
		}
		form select {
			height: 3rem;
		}
		form input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			border: none;
			padding: 0.8rem;
			font-size: 1.2rem;
			
			cursor: pointer;
			border-radius: 20px;
			transition: background-color 0.3s ease-in-out;
		}
		form input[type="submit"]:hover {
			background-color: #2e8b57;
			border-radius: 20px;
		}
		footer {
			margin-top: 2rem;
			text-align: center;
			font-size: 1.5rem;
			color: #666;
		}
    </style>
</head>
<body>
	<header>
		<h1>Delete Student Data</h1>
	</header>

	<form method="post">
		<label for="rollno">Enter Roll Number:</label>
		<input type="text" id="rollno" name="rollno" required>
		<input type="submit" name="delete" value="Delete">
	</form>

	<?php
		// check if form has been submitted
		if (isset($_POST['delete'])) {
			// get roll number input
			$rollno = $_POST['rollno'];

			// connect to MySQL server
			$conn = mysqli_connect('localhost', 'root', '', 'test');

			// check connection
			if (!$conn) {
				die('Connection failed: ' . mysqli_connect_error());
			}

			// prepare SQL query to delete row with specified roll number
			$sql = "DELETE FROM students WHERE rollno='$rollno'";

			// execute query and check for errors
			if (mysqli_query($conn, $sql)) {
				echo "<p>Record deleted successfully.</p>";
			} else {
				echo "<p>Error deleting record: " . mysqli_error($conn) . "</p>";
			}

			// close database connection
			mysqli_close($conn);
		}
	?>

	<footer>
		<p>&copy; 2023 Student Information System</p>
	</footer>
	
</body>
</html>
