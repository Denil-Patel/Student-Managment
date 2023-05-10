<!DOCTYPE html>
<html>
<head>
	<title>Edit Student Data</title>
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
			font-size: 50px;
			color: navy;
		}
		form {
			width: 50%;
			background-color: #fff;
			border-radius: 20px;
			box-shadow: 10px 10px 10px 1px #dcdcdc;
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
			border-radius: 20px;
			cursor: pointer;
			transition: background-color 0.3s ease-in-out;
		}
		form input[type="submit"]:hover {
			background-color: #2e8b57;
			border-radius: 20px;
		}
	</style>
	<script>
		window.onload = function() {
			// Get the 'Field to edit' dropdown menu
			var fieldSelect = document.getElementById("field");
			
			// Get the 'New value' input field
			var newValueInput = document.getElementById("new_value");
			
			// Add an event listener to the dropdown menu that triggers when the user selects an option
			fieldSelect.addEventListener("change", function() {
				// If the selected option is 'Date of Birth'
				if (fieldSelect.value === "dob") {
					// Set the input type of the 'New value' field to 'date'
					newValueInput.type = "date";
				} else {
					// Set the input type of the 'New value' field back to 'text'
					newValueInput.type = "text";
				}
			});
		};
	</script>
</head>
<body>
	<header>
		<h1>Edit Student Data</h1>
	</header>

	<form action="update_data.php" method="post">
		<label for="rollno">Roll No.:</label>
		<input type="text" id="rollno" name="rollno" required>

		<label for="field">Field to edit:</label>
		<select id="field" name="field">
			<option value="" disabled selected>Select field to edit</option>
			<option value="name">Name</option>
			<option value="dob">Date of Birth</option>
			<option value="address">Address</option>
			<option value="course">Course</option>
		</select>

		<label for="new_value">New value:</label>
		<input type="text" id="new_value" name="new_value" required>

		<input type="submit" value="Submit">
	</form>
	
</body>
</html>
