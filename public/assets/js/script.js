$(document).ready(function () {
    $('#voteForm').on('submit', function (e) {
        e.preventDefault();

        const formData = $(this).serialize();
        $.ajax({
            url: '../controllers/VoteController.php',
            type: 'POST',
            data: formData,
            success: function (response) {
                const result = JSON.parse(response);
                const messageContainer = $('#voteMessage');

                if (result.success) {
                    messageContainer.text('Vote submitted successfully!').css('color', 'green');
                    $('#voteForm')[0].reset();
                } else {
                    messageContainer.text(result.message).css('color', 'red');
                }
            },
            error: function () {
                $('#voteMessage').text('An error occurred. Please try again.').css('color', 'red');
            }
        });
    });
});
