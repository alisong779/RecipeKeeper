<?= $this->extend('layouts/application'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <?php if (session()->get('success')) : ?>
        <div class="alert alert-success">
            <?= session()->get('success') ?>
        </div>
    <?php endif; ?>
    <div class="card card-dark">

        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger">
                <?= validation_list_errors() ?>
            </div>
        <?php endif; ?>

        <form class="form" action="<?= site_url('recipes/update/' . $recipe['id']) ?>" method="post">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <label for="recipe_name" class="form-label">Recipe Name</label>
                        <input type="text" class="form-control" id="recipe_name" name="recipe_name" aria-describedby="nameHelp" value="<?php echo set_value('recipe_name', isset($recipe['recipe_name']) ? $recipe['recipe_name'] : '') ?>">
                    </div>
                    <div class="col-6">
                        <label for="recipe_img" class="form-label">Recipe Image</label>
                        <input type="text" class="form-control" id="recipe_img" name="recipe_img" value="<?php echo set_value('recipe_img', isset($recipe['recipe_img']) ? $recipe['recipe_img'] : '') ?>" aria-describedby="imageHelp">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="recipe_desc" class="form-label">Recipe Description</label>
                        <input type="text" class="form-control" id="recipe_desc" name="recipe_desc" value="<?php echo set_value('recipe_desc', isset($recipe['recipe_desc']) ? $recipe['recipe_desc'] : '') ?>">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>




    </div>

</div>
<?= $this->endSection() ?>