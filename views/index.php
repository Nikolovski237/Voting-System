<?php include "layout/header.php"; ?>
<div id="homeCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../public/assets/images/teamwork.jpg" class="d-block w-100" alt="Teamwork">
            <div class="carousel-caption d-none d-md-block">
                <h5>Recognize Your Team</h5>
                <p>Celebrate achievements and foster a culture of appreciation.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../public/assets/images/appreciation.jpg" class="d-block w-100" alt="Appreciation">
            <div class="carousel-caption d-none d-md-block">
                <h5>Show Your Gratitude</h5>
                <p>Nominate and vote for colleagues who make a difference.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<?php include "layout/footer.php"; ?>
