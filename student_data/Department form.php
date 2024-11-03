<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Department</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="Department styles.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow p-4">
            <h2 class="text-center text-primary">Add Department</h2>
            <form id="departmentForm" class="mb-4">
                <div class="form-group">
                    <label for="name">Department Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="head">Department Head</label>
                    <input type="text" class="form-control" id="head" name="head" required>
                </div>
                <div class="form-group">
                    <label for="contact">Department Contact</label>
                    <input type="text" class="form-control" id="contact" name="contact" required>
                </div>
                <div class="form-group">
                    <label for="email">Department Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

            <h2 class="text-center mt-5">Department List</h2>
            <table class="table table-bordered mt-3" id="departmentTable">
                <thead>
                    <tr>
                        <th>Department Name</th>
                        <th>Department Head</th>
                        <th>Department Contact</th>
                        <th>Department Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Department data will be appended here -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        const departmentTable = document.getElementById('departmentTable').getElementsByTagName('tbody')[0];

        // Event listener for the form submission
        document.getElementById('departmentForm').onsubmit = function(e) {
            e.preventDefault(); // Prevent the form from submitting traditionally

            const departmentName = document.getElementById('name').value;
            const departmentHead = document.getElementById('head').value;
            const departmentContact = document.getElementById('contact').value;
            const departmentEmail = document.getElementById('email').value;

            const newRow = departmentTable.insertRow();
            const cells = [
                departmentName,
                departmentHead,
                departmentContact,
                departmentEmail
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
                departmentTable.deleteRow(newRow.rowIndex - 1);
            };

            // Add edit functionality
            actionCell.querySelector('.edit').onclick = function() {
                document.getElementById('name').value = cells[0];
                document.getElementById('head').value = cells[1];
                document.getElementById('contact').value = cells[2];
                document.getElementById('email').value = cells[3];
                departmentTable.deleteRow(newRow.rowIndex - 1);
            };
        };
    </script>
</body>
</html>
