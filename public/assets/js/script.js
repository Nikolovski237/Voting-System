document.getElementById('voteForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent form submission

    const formData = new FormData(this);

    fetch('process_vote.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok: ' + response.statusText);
        }
        return response.text(); // Receive as text first (before parsing as JSON)
    })
    .then(data => {
        try {
            const jsonData = JSON.parse(data); // Try parsing as JSON
            const voteMessage = document.getElementById('voteMessage');
            if (jsonData.success) {
                voteMessage.innerHTML = `<p>${jsonData.message}</p>`;
                document.getElementById('voteForm').reset();
            } else {
                voteMessage.innerHTML = `<p>Error: ${jsonData.message}</p>`;
            }
        } catch (error) {
            console.error('Error parsing JSON:', error);
            document.getElementById('voteMessage').innerHTML = `<p>Error: Invalid response received from the server.</p>`;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('voteMessage').innerHTML = `<p>An error occurred: ${error.message}</p>`;
    });
});
