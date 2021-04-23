<?php if($this->session->userdata('is_logged_in')) { ?>
<div class='container dashboard'>
<?php if($this->session->flashdata('errors')) { ?>
        <?= $this->session->flashdata('errors'); ?>
<?php } else if($this->session->flashdata('success')) { ?>
        <?= $this->session->flashdata('success'); ?>
<?php }?>
<?php if($this->session->userdata('user_level') == 0) { ?>
<h2>Manage Users</h2>
<?php } else { ?>
<h2>All Users</h2>
<?php } ?>

<?php if($this->session->userdata('user_level') == 0) { ?>
        <a class='add-new' href="/users/new">Add New</a>
<?php } ?>
    <table id="myTable" class='display'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created_at</th>
                <th>User_level</th>
<?php   if($this->session->userdata('user_level') == 0) { ?>
                <th>Actions</th>
<?php   } ?>
            </tr>
        </thead>
        <tbody>
<?php   foreach($get_each_users as $user) {
        $created_at = date_create($user['created_at']); ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><a href="users/show/<?= $user['id'] ?>"><?= $user['first_name'].' '.$user['last_name'] ?></a></td>
                <td><?= $user['email'] ?></td>
                <td><?= date_format($created_at,"F jS Y") ?></td>
                <td><?= $user['user_level_name'] ?></td>
<?php   if($this->session->userdata('user_level') == 0) { ?>
                <td>
                    <a class='edit' href="/users/edit/<?= $user['id']; ?>">Edit</a>
                    <a class='remove' href='/admins/delete_confirmation/<?= $user['id'] ?>'>Delete</a>
                </td>
<?php   } ?>
            </form>
            </tr>
<?php  } ?>
        </tbody>
    </table>
</div>
<?php } else {
    $this->load->view('errors/index.html');
} ?>