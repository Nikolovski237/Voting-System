<?php include "layout/header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/assets/css/style.css">
    <title>Employee Appreciation Voting</title>
    <style>
        .services {
            background-color: #ffffff;
            padding: 50px 20px;
            text-align: center;
        }

        .services .icon {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .testimonials {
            background-color: #f4f4f9;
            padding: 50px 20px;
        }

        .testimonial {
            margin-bottom: 20px;
        }

        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
        }
    </style>
</head>
<body>
<section class="services">
    <h2 class="mb-4">Our Voting Services</h2>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="icon text-primary">&#9733;</div>
                <h4>Employee Awards</h4>
                <p>Recognize team members with online awards and feedback.</p>
            </div>
            <div class="col-md-4">
                <div class="icon text-success">&#128100;</div>
                <h4>Team Polls</h4>
                <p>Create quick polls for opinions and voting sessions.</p>
            </div>
            <div class="col-md-4">
                <div class="icon text-danger">&#128200;</div>
                <h4>Real-Time Results</h4>
                <p>Get instant results and feedback for all votes cast.</p>
            </div>
        </div>
    </div>
</section>

<section class="testimonials">
    <h2 class="text-center mb-4">What Our Users Say</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-6 testimonial">
                <blockquote class="blockquote text-center">
                    <p>"This system makes voting easy and fun! We loved the simplicity and quick results."</p>
                    <footer class="blockquote-footer">John D., HR Manager</footer>
                </blockquote>
            </div>
            <div class="col-md-6 testimonial">
                <blockquote class="blockquote text-center">
                    <p>"A great way to appreciate our team members and encourage participation."</p>
                    <footer class="blockquote-footer">Sarah W., Team Leader</footer>
                </blockquote>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include "layout/footer.php"; ?>
