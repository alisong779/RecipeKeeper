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
                <a href="/recipes/add_ingredients/<?php echo $recipe['id'] ?>" class="btn btn-primary my-2">Add Ingredients</a>
                <a href="/recipes/add_directions/<?php echo $recipe['id'] ?>" class="btn btn-primary my-2">Add Directions</a>

            </div>
        </form>

        <div class="card card-dark">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <card-header>
                            List of Ingredients
                            <a href="/recipes/edit_ingredients/<?php echo $recipe['id'] ?>" class="btn btn-success my-2">Edit Ingredients</a>
                        </card-header>
                        <table class="table table-bordered table-responsive ">

                            <thead>
                                <tr>
                                    <th>Ingredient</th>
                                    <th>Amount</th>
                                    <th>Measure</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ingredients as $i) {
                                    echo '<tr><td>' . $i->ing_name . '</td>';
                                    echo '<td>' . $i->qty . '</td>';
                                    echo '<td>' . $i->measure . '</td></tr>';
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>