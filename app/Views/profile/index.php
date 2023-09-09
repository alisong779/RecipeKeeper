<?= $this->extend('layouts/application'); ?>
<?= $this->section('content'); ?>


<div class="row">
    <div class="col-12">
        <?php if (session()->get('success')) : ?>
            <div class="alert alert-success">
                <?= session()->get('success') ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-11">
                <h5 style="color:midnightblue"><i class="fa-solid fa-bowl-food"></i> Welcome <?php echo $first_name; ?>!</h5>
            </div>
            <div class="col-1">
                <img src="<?php echo $img_location; ?>" class="rounded float right" width="100" height="100">
            </div>
        </div>
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <label for="profile_pic" class="form-label">Upload Image</label>
                        <input class="form-control" type="file" name="profile_pic" id="profile_pic">
                    </div>
                </div>
            </div>
            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger">
                    <?= validation_list_errors() ?>
                </div>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</div>



<?= $this->endSection() ?>