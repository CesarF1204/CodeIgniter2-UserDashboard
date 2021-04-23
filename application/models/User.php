<?php
    class User extends CI_Model {
        /*	DOCU: This function is responsible for adding a user to the database
        Owner: Cesar Francisco
        */
        public function register_user($user) {
            $query = "INSERT INTO users (first_name, last_name, email, password, user_level_id, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())";
            $values = array($user['first_name'], $user['last_name'], $user['email'], $user['password'], $user['user_level_id']);
            return $this->db->query($query, $values);
        }
        /*	DOCU: This function is responsible for getting a user from the database for signing-in
        Owner: Cesar Francisco
        */
        public function signin($email) {
            $query = "SELECT * FROM users WHERE email = ?";
            $values = array($email);
            return $this->db->query($query, $values)->row_array();
        }
        /*	DOCU: This function is responsible getting all the users from the users table
        Owner: Cesar Francisco
        */
        public function get_all_users() {
            $query = "SELECT users.id, first_name, last_name, email, users.created_at, user_level_name FROM users LEFT JOIN user_levels ON users.user_level_id = user_levels.id";
            return $this->db->query($query)->result_array();
        }
    }
?>