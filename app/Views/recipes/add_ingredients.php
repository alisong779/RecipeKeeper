<?= $this->extend('layouts/application'); ?>
<?= $this->section('content'); ?>
<?= $this->extend('layouts/application'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <?php if (session()->get('success')) : ?>
        <div class="alert alert-success">
            <?= session()->get('success') ?>
        </div>
    <?php endif; ?>
    <div class="card card-dark">
        <div class="card-header">
            <h1>Add Ingredients</h1>
        </div>
        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger">
                <?= validation_list_errors() ?>
            </div>
        <?php endif; ?>

        <form class="form" action="/recipes/add_ingredients/<?php echo $recipe_id; ?>" method="post">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <label for="ing_name" class="form-label">Ingredient Name</label>
                        <input type="text" class="form-control" id="ing_name" name="ing_name" value="<?= set_value('ing_name') ?>" aria-describedby="nameHelp">
                    </div>
                    <div class="col-6">
                        <label for="measure" class="form-label">Unit of Measure</label>
                        <input type="text" class="form-control" id="measure" name="measure" value="<?= set_value('measure') ?>" aria-describedby="imageHelp">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="qty" class="form-label">Qty / Amount</label>
                        <input type="text" class="form-control" id="qty" name="qty" value="<?= set_value('qty') ?>">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add</button>
                <a href="/recipes/edit_recipe/<?php echo $recipe_id ?>" class="btn btn-primary my-2">Done</a>
            </div>
        </form>





    </div>

</div>
<?= $this->endSection() ?>


</div>
<?= $this->endSection() ?>