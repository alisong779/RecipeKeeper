<?= $this->extend('layouts/application'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="card card-dark">
        <div class="card-header">
            <h1>Add a Recipe</h1>
        </div>
        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger">
                <?= validation_list_errors() ?>
            </div>
        <?php endif; ?>


        <form class="form" action="/recipes/add" method="post">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <label for="recipe_name" class="form-label">Recipe Name</label>
                        <input type="text" class="form-control" id="recipe_name" name="recipe_name" value="<?= set_value('recipe_name') ?>" aria-describedby="nameHelp">
                    </div>
                    <div class="col-6">
                        <label for="recipe_img" class="form-label">Recipe Image</label>
                        <input type="text" class="form-control" id="recipe_img" name="recipe_img" value="<?= set_value('recipe_img') ?>" aria-describedby="imageHelp">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="recipe_desc" class="form-label">Recipe Description</label>
                        <input type="text" class="form-control" id="recipe_desc" name="recipe_desc" value="<?= set_value('recipe_desc') ?>">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Next Step</button>
            </div>
        </form>





    </div>

</div>
<?= $this->endSection() ?>