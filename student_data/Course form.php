<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="Course styles.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow p-4">
            <h2 class="text-center text-primary">Add Course</h2>
            <form method="post" id="courseForm" class="mb-4">
                <div class="form-group">
                    <label for="name">Course Name:</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="code">Course Code:</label>
                    <input type="text" class="form-control" name="code" id="code" required>
                </div>
                <div class="form-group">
                    <label for="year">Year:</label>
                    <input type="number" class="form-control" name="year" id="year" required>
                </div>
                <div class="form-group">
                    <label for="semester">Semester:</label>
                    <input type="text" class="form-control" name="semester" id="semester" required>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

            <h2 class="text-center mt-5">Course List</h2>
            <table class="table table-bordered mt-3" id="courseTable">
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Course Code</th>
                        <th>Year</th>
                        <th>Semester</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Course data will be appended here -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        const courseTable = document.getElementById('courseTable').getElementsByTagName('tbody')[0];

        // Event listener for the form submission
        document.getElementById('courseForm').onsubmit = function(e) {
            e.preventDefault(); // Prevent the form from submitting traditionally

            const courseName = document.getElementById('name').value;
            const courseCode = document.getElementById('code').value;
            const year = document.getElementById('year').value;
            const semester = document.getElementById('semester').value;

            const newRow = courseTable.insertRow();
            const cells = [
                courseName,
                courseCode,
                year,
                semester
            ];

            cells.forEach(cellData => {
                let cell = newRow.insertCell();
                cell.textContent = cellData;
            });

            // Action buttons
            let actionCell = newRow.insertCell();
            actionCell.innerHTML = `
                <button class="btn btn-warning btn-sm edit">Edit</button>
                <button class="btn btn-danger btn-sm delete">Delete</button>
            `;

            // Clear form fields after submission
            this.reset();

            // Add delete functionality
            actionCell.querySelector('.delete').onclick = function() {
                courseTable.deleteRow(newRow.rowIndex - 1);
            };

            // Add edit functionality
            actionCell.querySelector('.edit').onclick = function() {
                document.getElementById('name').value = cells[0];
                document.getElementById('code').value = cells[1];
                document.getElementById('year').value = cells[2];
                document.getElementById('semester').value = cells[3];
                courseTable.deleteRow(newRow.rowIndex - 1);
            };
        };
    </script>
</body>
</html>
