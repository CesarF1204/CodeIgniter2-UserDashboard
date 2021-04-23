<?php
    class Message extends CI_Model {
        /*	DOCU: This function is responsible for getting the user details from users table from the database
        Owner: Cesar Francisco
        */
        public function get_user_by_id($user_id){
            return $this->db->query("SELECT users.id, first_name, last_name, email, description, users.created_at FROM users WHERE users.id = ?", array($user_id))->row_array();
        }
        /*	DOCU: This function is responsible for getting all the messages from messages table from the database
        Owner: Cesar Francisco
        */
        public function get_all_messages() {
            $query = "SELECT *, messages.id, messages.created_at FROM messages LEFT JOIN users ON messages.user_id = users.id";
            return $this->db->query($query)->result_array();
        }
        /*	DOCU: This function is responsible for adding a message to a any posted comments from messages table from the database
        Owner: Cesar Francisco
        */
        public function message_sent($user) {
            $query = "INSERT INTO messages (user_id, receiver_id, message, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
            $values = array($user['user_id'], $user['receiver_id'], $user['message']);
            return $this->db->query($query, $values);
        }
    }
?>