<?= $this->extend('layouts/application'); ?>
<?= $this->section('content'); ?>

<div class="container">

    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h1><span class="text-warning">Login </span><i class="fa-solid fa-utensils"></i></h1>
                </div>
                <?php if (session()->get('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
                <form class="form" action="/" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?= set_value('email') ?>">
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <?php if (isset($validation)) : ?>
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    <?= $validation->listErrors() ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                            <div class="col-4">
                                <a href="/register">Register</a>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>


<?= $this->endSection() ?>