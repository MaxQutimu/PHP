document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('myForm');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        const formData = new FormData(form);

        fetch('php.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Assuming the PHP response is an array of cars
            load(data);
        })
        .catch(error => console.error('Error:', error));
    });
})