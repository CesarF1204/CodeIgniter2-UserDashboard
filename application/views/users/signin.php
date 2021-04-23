<div class='sign-in'>
<?php if($this->session->flashdata('errors')) { ?>
        <?= $this->session->flashdata('errors'); ?>
<?php } else if($this->session->flashdata('login-errors')) { ?>
        <?= $this->session->flashdata('login-errors'); ?>
<?php }?>
    <div class="col-lg-4 mt-5">
        <div class="card bg-primary text-center card-form">
            <div class="card-body">
                <h3>Sign In</h3>
                <p>Please fill out this form to sign-in</p>
                <form action="users/signin" method="POST">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                    <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-lg" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
                    </div><br>
                    <div class="form-group">
                        <input type="submit" value="Submit" class="btn btn-outline-light btn-block">
                    </div><br>
                </form>
                <a href="<?= base_url().'register' ?>">Don't have an account? Register Now!</a>
            </div>
        </div>
    </div>
</div>