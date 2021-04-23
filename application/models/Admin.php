<?php
    class Admin extends CI_Model {
        /*	DOCU: This function is responsible for getting the user details from users table from the database
        Owner: Cesar Francisco
        */
        public function get_user_by_id($user_id){
            return $this->db->query("SELECT users.id, first_name, last_name, email, user_level_id FROM users LEFT JOIN user_levels ON users.user_level_id = user_levels.id WHERE users.id = ?", array($user_id))->row_array();
        }
        /*	DOCU: This function is responsible for updating a user from the database
        Owner: Cesar Francisco
        */
        public function update_user($user_id, $user_updates){
            $where = "id = ". $user_id; 
            return $this->db->update('users', $user_updates, $where);
        }
        /*	DOCU: This function is responsible for deleting a user from the database
        Owner: Cesar Francisco
        */
        public function delete_user($id){
            $query = "DELETE FROM users WHERE users.id = $id";
            return $this->db->query($query);
        }
    }
?>