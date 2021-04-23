<?php if($this->session->userdata('user_level') == 0 && $this->session->userdata('is_logged_in')) { ?>
<div class='add-new-form'>
<?php if($this->session->flashdata('errors')) { ?>
        <?= $this->session->flashdata('errors'); ?>
<?php } else if($this->session->flashdata('success')) { ?>
        <?= $this->session->flashdata('success'); ?>
<?php }?>
    <div class="col-lg-4 mt-5">
        <div class="card bg-primary text-center card-form">
            <div class="card-body">
                <h3>Add New Account</h3>
                <p>Please fill out this form to add a new account</p>
                <form action="/admins/new_user_added" method="post">
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
                    </div><br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-light btn-block" value="Create">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <a class='return-dashboard' href="<?= base_url().'dashboard' ?>">Return to Dashboard</a>
</div>
<?php } else {
    $this->load->view('errors/index.html');
} ?>