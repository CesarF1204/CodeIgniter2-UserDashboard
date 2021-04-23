<div class='register'>
<?php if($this->session->flashdata('errors')) { ?>
        <?= $this->session->flashdata('errors'); ?>
<?php } else if($this->session->flashdata('success')) { ?>
        <?= $this->session->flashdata('success'); ?>
<?php }?>
    <div class="col-lg-4 mt-5">
        <div class="card bg-primary text-center card-form">
            <div class="card-body">
                <h3>Sign Up Today</h3>
                <p>Please fill out this form to register</p>
                <form action="/users/register" method="post">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                    <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-lg" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" name="first_name" class="form-control form-control-lg" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="last_name" class="form-control form-control-lg" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirm_password" class="form-control form-control-lg" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Register" class="btn btn-outline-light btn-block">
                    </div>
                </form>
                <a href="<?= base_url().'signin' ?>">Already have an account? Login Now!</a>
            </div>
        </div>
    </div>
</div>