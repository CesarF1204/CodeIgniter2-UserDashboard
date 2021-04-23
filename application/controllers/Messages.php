<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {
	/*	DOCU: This is an autoload function for every functions  
	Owner: Cesar Francisco
	*/
    public function __construct() {
        parent::__construct();
		// $this->output->enable_profiler();
		$this->load->view('templates/header');
		// $this->load->view('templates/footer');
		
    }
	/*	DOCU: This function is responsible for showing all messages and comments from any users
	Owner: Cesar Francisco
	*/
	public function index($id){
		$this->load->model("Message");
		$this->load->model("Comment");
		$get_this_user = $this->Message->get_user_by_id($id);
		$get_this_message = $this->Message->get_all_messages();
		$get_this_comment = $this->Comment->get_all_comments();
		$this->load->view('messages/index.php', array('user' => $get_this_user, 'messages' => $get_this_message, 'comments' => $get_this_comment));
		$this->load->view('templates/footer');
	}
	/*	DOCU: This function is responsible to validate and add a message to any user from the current user that is logged-in
	Owner: Cesar Francisco
	*/
	public function message_sent() {
		$user_id = $this->session->userdata('user_id');
		$receiver_id = $this->input->post('receiver_id');
		$this->load->model("Message");
		$this->load->library('form_validation');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', '<span class="errors">'.validation_errors().'</span>');
			redirect(base_url().'users/show/'.$receiver_id);
        } else {
		$message_details = array("user_id" => $user_id, "receiver_id" => $receiver_id, "message" => $this->input->post('message'));
		$message_details = $this->security->xss_clean($message_details);
		$message_sent = $this->Message->message_sent($message_details);
			if($message_sent === TRUE) {
				$this->session->set_flashdata('success', '<p class="success">Your message was successfully posted!</p>');
			}
		}
		redirect(base_url().'users/show/'.$receiver_id);
	}
}
