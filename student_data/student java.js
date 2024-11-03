document.getElementById('userForm').addEventListener('submit', function(event) {
    const age = document.getElementById('age').value;
    if (age < 18) {
        alert('Age must be 18 or older.');
        event.preventDefault(); // Stop form submission
    }
});
