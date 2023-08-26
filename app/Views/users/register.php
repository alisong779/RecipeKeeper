<?= $this->extend('layouts/application'); ?>
<?= $this->section('content'); ?>

<div class="container">

    <div class="row">
        <div class="col-8">
            <div class="container">
                <h1><span class="text-warning">Register </span><i class="fa-solid fa-utensils"></i></h1>
                <hr>
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger">
                        <?= validation_list_errors() ?>
                    </div>
                <?php endif; ?>


                <form class="" action="/register" method="post">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="first_nameHelp" value="<?= set_value('first_name') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" aria-describedby="last_nameHelp" value="<?= set_value('last_name') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?= set_value('email') ?>">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirm" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm">
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                        <div class="col-4">
                            <a href="/">Have an account? Login</a>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>

</div>


<?= $this->endSection() ?>