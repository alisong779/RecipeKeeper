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
            <h1>Add Directions</h1>
        </div>
        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger">
                <?= validation_list_errors() ?>
            </div>
        <?php endif; ?>

        <form class="form" action="/recipes/add_directions/<?php echo $recipe_id; ?>" method="post">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <label for="instructions" class="form-label">Instructions</label>
                        <input type="text" class="form-control" id="instructions" name="instructions" value="<?= set_value('instructions') ?>" aria-describedby="nameHelp">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="card-header">Step Ingredients</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <?php
                            foreach ($ingredients as $i) {
                                echo '<p>' . $i->ing_name . ' <i class="fa fa-plus"></i></p>';
                            } ?>

                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add</button>
                <a href="/recipes/edit_recipe/<?php echo $recipe_id ?>" class="btn btn-primary my-2">Done</a>
            </div>
        </form>


        <div class="card-body">
            <div class="card-header">Steps Added</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <?php $i = 1;
                        foreach ($steps as $s) {
                            echo '<p> Step ' . $i . ' - ' . $s->instructions . '</p>';
                            $i++;
                        } ?>

                    </div>
                </div>
            </div>

        </div>
    </div>


</div>

</div>
<?= $this->endSection() ?>


</div>
<?= $this->endSection() ?>