document.getElementById('studentForm').addEventListener('submit', function(e) {
    e.preventDefault();
    // Add logic to handle form submission
    alert("Student information updated.");
});

function goBack() {
    window.history.back();
}
