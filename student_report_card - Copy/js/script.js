
$(document).ready(function() {
    $('#studentForm').on('submit', function(e) {
        e.preventDefault();
        
        // Simple form validation
        if ($('#studentForm')[0].checkValidity()) {
            $.ajax({
                url: 'php/submit.php',
                type: 'POST',
                data: $('#studentForm').serialize(),
                success: function(response) {
                    if (response === "success") {
                        toastr.success('Form submitted successfully.');
                        setTimeout(function() {
                            window.location.href = 'report.php';
                        }, 2000); // Redirect after 2 seconds
                    } else {
                        toastr.error('Failed to submit form.');
                    }
                },
                error: function() {
                    toastr.error('An error occurred while submitting the form.');
                }
            });
        } else {
            toastr.warning('Please fill all required fields.');
        }
    });

    $('#sendEmail').on('click', function() {
        $.ajax({
            url: 'php/sendEmail.php',
            type: 'POST',
            success: function(response) {
                toastr.success(response);
            },
            error: function() {
                toastr.error('An error occurred while sending the email.');
            }
        });
    });
});
