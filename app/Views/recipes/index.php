<?= $this->extend('layouts/application'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="card card-dark">
        <div class="card-header">
            <h1>Your Recipes</h1>
        </div>
        <div class="card-body">
            <?php foreach ($recipes as $r) {
                echo '<a href="recipes/view/' . $r->id . '" class="link">' . $r->recipe_name . '</a><br>';
            } ?>


        </div>

    </div>


</div>

</div>
<?= $this->endSection() ?>