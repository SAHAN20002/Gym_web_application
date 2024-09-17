document.getElementById('studentForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    alert("Student information updated.");
});

function goBack() {
    window.history.back();
}
