<div class="container remove-user">
        <h1>Are you sure you want to delete this user?</h1>
        <form action="/admins/delete" method="post">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
            <br>
            <h2>Name: <span><?= $user['first_name'].' '.$user['last_name'] ?></span></h2>
            <h2>Email: <span><?= $user['email'] ?></span></h2>
            <button type="submit" class='remove-yes' name="user_id" value="<?= $user['id'] ?>">Yes! I want to delete this.</button> 
        </form>
        <a class='remove-no' href=<?= base_url().'dashboard' ?>>No!</a>
</div>