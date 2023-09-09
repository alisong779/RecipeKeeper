<?= $this->extend('layouts/application'); ?>
<?= $this->section('content'); ?>


<div class="container">
    <?php if (session()->get('success')) : ?>
        <div class="alert alert-success">
            <?= session()->get('success') ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-4">
            <h5 style="color:midnightblue"><i class="fa-solid fa-bowl-food"></i> Welcome <?php echo $first_name; ?>!</h5>
        </div>
        <div class="col-4">
            <a href="<?php base_url() ?>recipes/add" class="btn btn-primary">Add a Recipe</a>
        </div>

    </div>

</div>


<?= $this->endSection() ?>