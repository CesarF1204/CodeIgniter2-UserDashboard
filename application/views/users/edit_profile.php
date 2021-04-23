<?php if($this->session->userdata('is_logged_in')) { ?>
<div class='container profile'>
<?= $this->session->flashdata('errors'); ?>
<h2>Edit Profile</h2>
<form class='edit-information' action="/users/update/<?= $user['id'] ?>" method='POST'>
    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
    <h5>Edit Information:</h5>
    <label for="email">Email Address: </label>
    <input type="email" id='email' name='email' value="<?= $user['email'] ?>">

    <label for="first_name">First Name: </label>
    <input type="text" id='first_name' name='first_name' value="<?= $user['first_name'] ?>">

    <label for="last_name">Last Name: </label>
    <input type="text" id='last_name' name='last_name' value="<?= $user['last_name'] ?>">
    
    <input type="submit" value="Update">
</form>

<form class='change-password' action="/users/update_password/<?= $user['id'] ?>" method='POST'>
    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
    <h5>Change Password:</h5>
    <label for="password">Password: </label>
    <input type="password" id='password' name='password'>

    <label for="confirm_password">Confirm Password: </label>
    <input type="password" id='confirm_password' name='confirm_password'>

    <input type="submit" value="Update Password">
</form>

<form class='edit-description' action="/users/update_description/<?= $user['id'] ?>" method='POST'>
    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
    <h5>Edit Description:</h5>
    <textarea name="description" id="description" cols="70" rows="10"></textarea>

    <input type="submit" value="Save">
</form>

<?php if($this->session->flashdata('update-errors')) {
        echo $this->session->flashdata('update-errors');
} else if($this->session->flashdata('update_password-errors')) {
        echo $this->session->flashdata('update_password-errors');
} else if($this->session->flashdata('update_description-errors')) {
        echo $this->session->flashdata('update_description-errors');
}?>
</div>
<br>
<a class='return-dashboard' href="<?= base_url().'dashboard' ?>">Return to Dashboard</a>
<?php } else {
    $this->load->view('errors/index.html');
} ?>