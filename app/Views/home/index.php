<?= $this->extend('layouts/application'); ?>
<?= $this->section('content'); ?>

<!-- Showcase -->
<section class="bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start">
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between">
            <div class="p-2">
                <h1>Share your <span class="text-warning"> Recipes! </span><i class="bi bi-file-post"></i></h1>
                <p class="lead my-4">
                    A social networking platform for Foodies!
                    Share recipes with Friends, Family and the World.
                </p>
                <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#enroll">
                    Sign Up!
                </button>
            </div>

        </div>
    </div>
</section>
<img src="img/silverware.png" alt="" />

<?= $this->endSection() ?>