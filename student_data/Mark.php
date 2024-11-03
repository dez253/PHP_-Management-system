<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Marks</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Add Marks</h2>
        <form id="marksForm" class="mb-4">
            <div class="form-group">
                <label for="course_id">Course ID</label>
                <input type="text" class="form-control" id="course_id" name="course_id" required>
            </div>
            <div class="form-group">
                <label for="mark">Mark</label>
                <input type="number" class="form-control" id="mark" name="mark" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="grade">Grade</label>
                <input type="text" class="form-control" id="grade" name="grade" required>
            </div>
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea class="form-control" id="comment" name="comment"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <h2 class="mt-5">Marks List</h2>
        <table class="table table-bordered mt-3" id="marksTable">
            <thead>
                <tr>
                    <th>Course ID</th>
                    <th>Mark</th>
                    <th>Grade</th>
                    <th>Comment</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        const marksTable = document.getElementById('marksTable').getElementsByTagName('tbody')[0];

        document.getElementById('marksForm').onsubmit = function(e) {
            e.preventDefault(); 

            const courseId = document.getElementById('course_id').value;
            const mark = document.getElementById('mark').value;
            const grade = document.getElementById('grade').value;
            const comment = document.getElementById('comment').value;

            const newRow = marksTable.insertRow();
            const cells = [
                courseId,
                mark,
                grade,
                comment
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
                marksTable.deleteRow(newRow.rowIndex - 1);
            };

            actionCell.querySelector('.edit').onclick = function() {
                document.getElementById('course_id').value = cells[0];
                document.getElementById('mark').value = cells[1];
                document.getElementById('grade').value = cells[2];
                document.getElementById('comment').value = cells[3];
                marksTable.deleteRow(newRow.rowIndex - 1);
            };
        };
    </script>
</body>
</html>
