<?= $this->extend('layouts/application'); ?>
<?= $this->section('content'); ?>

<section class="py-5 text-center container">
    <?php if (session()->get('success')) : ?>
        <div class="alert alert-success">
            <?= session()->get('success') ?>
        </div>
    <?php endif; ?>
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light" style="color:#0b5ed7">Welcome <?php echo $first_name; ?>!</h1>
            <p class="lead text-muted">Create, Share, View and Rate Recipes!</p>
            <p>
                <a href="recipes/add" class="btn btn-primary my-2">Add a Recipe</a>
                <a href="recipes" class="btn btn-secondary my-2">View Your Recipes</a>
            </p>
        </div>
        <div class="col-1">
            <img src="<?php echo $img_location; ?>" class="img-thumbnail rounded float-end">
        </div>

    </div>
</section>
<div class="row mb-2">
    <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary">Social</strong>
                <h3 class="mb-0">Featured Recipes</h3>
                <p class="card-text mb-auto">View the latest Featured Recipes.</p>
                <a href="#" class="stretched-link">View Recipes</a>
                <hr>
                <h3 class="mb-0">Friend Recipes</h3>
                <p class="card-text mb-auto">View the latest Friend Recipes.</p>
                <a href="#" class="stretched-link">View Friend Recipes</a>
            </div>


        </div>
    </div>
    <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-success">Design</strong>
                <h3 class="mb-0">Profile Picture</h3>
                <form method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="profile_pic" class="form-label">Change Profile Pic</label>
                        <input class="form-control" type="file" name="profile_pic" id="profile_pic">
                    </div>

                    <?php if (isset($validation)) : ?>
                        <div class="alert alert-danger">
                            <?= validation_list_errors() ?>
                        </div>
                    <?php endif; ?>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-auto d-none d-lg-block">

            </div>
        </div>
    </div>
</div>

</div>



<?= $this->endSection() ?>