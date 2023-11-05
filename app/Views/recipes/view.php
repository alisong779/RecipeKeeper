<?= $this->extend('layouts/application'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="card card-dark">
        <div class="card-header">
            <h1>Recipe View</h1>
        </div>
        <div class="card-body">

            <p>Recipe Name:<?php echo $recipe['recipe_name'] ?></p>
            <p>Recipe Description:<?php echo $recipe['recipe_desc'] ?></p>
            <p>Created At:<?php echo $recipe['created_at'] ?></p>
            <a class="nav-link" href="/recipes/edit_recipe/<?php echo $recipe['id'] ?>">Edit</a>
            <a class="nav-link" href="/recipes">My Recipes</a>


        </div>

    </div>


</div>

</div>
<?= $this->endSection() ?>