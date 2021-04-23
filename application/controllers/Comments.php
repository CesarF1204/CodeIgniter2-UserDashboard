<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	/*	DOCU: This function is responsible to validate and add a comment to a message from any user from the current user that is logged-in
	Owner: Cesar Francisco
	*/
    public function comment_sent() {
		$this->load->model("Comment");
        $user_id = $this->session->userdata('user_id');
		$this->load->library('form_validation');
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required');
        if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', '<span class="errors">'.validation_errors().'</span>');
			redirect(base_url().'dashboard');
        } else {
			$comment_details = array("user_id" => $user_id, "message_id" => $this->input->post('message_id'), "comment" => $this->input->post('comment'));
			$comment_details = $this->security->xss_clean($comment_details);
			$comment_sent = $this->Comment->comment_sent($comment_details);
				if($comment_sent === TRUE) {
					$this->session->set_flashdata('success', '<p class="success">Your comment was successfully posted!</p>');
			}
		}
		redirect(base_url().'dashboard');
    }
}

