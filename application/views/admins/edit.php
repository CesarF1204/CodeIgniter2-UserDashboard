<?php if($this->session->userdata('user_level') == 0 && $this->session->userdata('is_logged_in')) { ?>
<div class='container edit-form'>
<?= $this->session->flashdata('errors'); ?>
    <h2>Edit user#<?= $user['id'] ?></h2>
    <form class='edit-information' action="/admins/update/<?= $user['id'] ?>" method='POST'>
    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
        <h5>Edit Information:</h5>
        <label for="email">Email Address: </label>
        <input type="email" id='email' name='email' value="<?= $user['email'] ?>">

        <label for="first_name">First Name: </label>
        <input type="first_name" id='first_name' name='first_name' value="<?= $user['first_name'] ?>">

        <label for="last_name">Last Name: </label>
        <input type="last_name" id='last_name' name='last_name' value="<?= $user['last_name'] ?>">

        <label for="user_level">User Level:</label>
        <select name="user_level_id" id="user_level">
            <option value="0">Admin</option>
            <option value="9">Normal</option>
        </select>
        
        <input type="submit" value="Update">
    </form>
    <form class='change-password' action="/admins/update_password/<?= $user['id'] ?>" method='POST'>
    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
        <h5>Change Password:</h5>
        <label for="password">Password: </label>
        <input type="password" id='password' name='password'>

        <label for="confirm_password">Confirm Password: </label>
        <input type="password" id='confirm_password' name='confirm_password'>
        
        <input type="submit" value="Update Password">
    </form>
</div>
<br>
<a class='return-dashboard' href="<?= base_url().'dashboard' ?>">Return to Dashboard</a>
<?= $this->session->flashdata('update-errors'); ?>
<?= $this->session->flashdata('update_password-errors'); ?>
<?php } else {
    $this->load->view('errors/index.html');
} ?>
