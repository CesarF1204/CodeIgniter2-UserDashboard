<?php
    class Comment extends CI_Model{
        /*	DOCU: This function is responsible for adding a comment on comments table from the database
        Owner: Cesar Francisco
        */
        public function comment_sent($user) {
            $query = "INSERT INTO comments (user_id, message_id, comment, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
            $values = array($user['user_id'], $user['message_id'], $user['comment']);
            return $this->db->query($query, $values);
        }
        /*	DOCU: This function is responsible for getting all the comments from comments table from the database
        Owner: Cesar Francisco
        */
        public function get_all_comments() {
            $query = "SELECT *, comments.created_at FROM comments LEFT JOIN messages ON comments.message_id = messages.id LEFT JOIN users ON comments.user_id = users.id";
            return $this->db->query($query)->result_array();
        }
    }
?>