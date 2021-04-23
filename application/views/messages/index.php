<?php if($this->session->userdata('is_logged_in')) { ?>
<div class='container messages-and-comments'>
<?php if($this->session->flashdata('errors')) { ?>
        <?= $this->session->flashdata('errors'); ?>
<?php } else if($this->session->flashdata('success')) { ?>
        <?= $this->session->flashdata('success'); ?>
<?php }?>
    <div class='user-information'>
        <h3><?= $user['first_name'].' '.$user['last_name'] ?></h5>
<?php   $created_at = date_create($user['created_at']); ?>
        <p>Registered at: <?= date_format($created_at,"F jS Y") ?></p>
        <p>User ID: #<?= $user['id'] ?></p>
        <p>Email Address: <?= $user['email'] ?></p>
        <p>Description: <?= $user['description'] ?></p>
    </div>
    <form class='messages-info' action="/messages/message_sent" method="POST">
        <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
        <input type="hidden" name="receiver_id" value="<?= $user['id'] ?>">
        <h5>Leave a message for <?= $user['first_name'] ?></h5>
        <textarea name="message" id="message" cols="30" rows="8" placeholder=" Type here..."></textarea>

        <input type="submit" value='POST'>
    </form>
    <?= $this->session->flashdata('message_errors'); ?>
    <ul class='comments-info'>
<!--message -->
<?php foreach($messages as $message) { ?>
<?php   $created_at = date_create($message['created_at']); ?>
<?php   if($user['id'] == $message['receiver_id']) { ?>
        <li>
            <h5><?= $message['first_name'].' '.$message['last_name'].' wrote'; ?> <?= '- ('.date_format($created_at,"F jS Y h:iA").')' ?> </h5>
        <p class='message-content'><?= $message['message']; ?></p>
        <!--comment -->
<?php   foreach($comments as $comment) { ?>
<?php   $created_at = date_create($comment['created_at']); ?>
<?php       if($comment['message_id'] == $message['id'] ) { ?>
            <ul>
                <li><h6><?= $comment['first_name'].' '.$comment['last_name'].' wrote'; ?> <?= '- ('.date_format($created_at,"F jS Y h:iA").')' ?> </h6>
                <p>-><?= $comment['comment']; ?></p></li>
            </ul>
<?php       } ?>
        </li>
<?php   } ?>
        <form action="/comments/comment_sent" method="POST">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
            <input type="hidden" name="message_id" value="<?= $message['id'] ?>">
            <textarea name="comment" cols="30" rows="5" placeholder=" Type to reply..."></textarea>

            <input type="submit" value="Comment">
        </form>
<?php   } ?>
<?php } ?>
    </ul>
</div>
<?php } else {
    $this->load->view('errors/index.html');
} ?>

