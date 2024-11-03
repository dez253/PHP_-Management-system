<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="form style.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">User Information Form</h2>
        <form action="Process.php" method="POST" id="userForm" class="p-4 bg-light rounded">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="access_no">Access No:</label>
                <input type="text" id="access_no" name="access_no" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" id="id" name="id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="tel" id="contact" name="contact" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="program">Program:</label>
                <input type="text" id="program" name="program" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="sex">Sex:</label>
                <select id="sex" name="sex" class="form-control" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" class="form-control" min="1" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>

        <h2 class="text-center mt-5">User Data</h2>
        <table class="table table-bordered mt-3" id="userTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Access No</th>
                    <th>ID</th>
                    <th>Contact</th>
                    <th>Program</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Sex</th>
                    <th>Username</th>
                    <th>Age</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- User data will be appended here -->
            </tbody>
        </table>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        const userTable = document.getElementById('userTable').getElementsByTagName('tbody')[0];

        // Event listener for the form submission
        document.getElementById('userForm').onsubmit = function(e) {
            e.preventDefault(); // Prevent the form from submitting

            const newRow = userTable.insertRow();
            const cells = [
                document.getElementById('name').value,
                document.getElementById('access_no').value,
                document.getElementById('id').value,
                document.getElementById('contact').value,
                document.getElementById('program').value,
                document.getElementById('address').value,
                document.getElementById('email').value,
                document.getElementById('sex').value,
                document.getElementById('username').value,
                document.getElementById('age').value,
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

            // Add edit and delete functionality
            actionCell.querySelector('.delete').onclick = function() {
                userTable.deleteRow(newRow.rowIndex - 1);
            };

            actionCell.querySelector('.edit').onclick = function() {
                document.getElementById('name').value = cells[0];
                document.getElementById('access_no').value = cells[1];
                document.getElementById('id').value = cells[2];
                document.getElementById('contact').value = cells[3];
                document.getElementById('program').value = cells[4];
                document.getElementById('address').value = cells[5];
                document.getElementById('email').value = cells[6];
                document.getElementById('sex').value = cells[7];
                document.getElementById('username').value = cells[8];
                document.getElementById('age').value = cells[9];
                userTable.deleteRow(newRow.rowIndex - 1);
            };
        };
    </script>
</body>
</html>
