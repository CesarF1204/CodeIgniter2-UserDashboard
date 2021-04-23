<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller {

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

	/*	DOCU: This is an autoload function for every functions  
	Owner: Cesar Francisco
	*/
    public function __construct() {
        parent::__construct();
		// $this->output->enable_profiler();
		$this->load->helper('security');
		$this->load->view('templates/header');
    }
	/*	DOCU: This function is triggered in default to render the homepage 
	Owner: Cesar Francisco
	*/
	public function index(){
		$this->load->view('admins/index.php');
	}
	/*	DOCU: This function is to render the form of new_form page
	Owner: Cesar Francisco
	*/
	public function new_form() {
        $this->load->view('admins/new.php');
		$this->load->view('templates/footer');
    }
	/*	DOCU: This function is responsible to validate and add a user to the database
	Owner: Cesar Francisco
	*/
	public function new_user_added() {
		$this->load->model('User');
		$this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
        if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', '<span class="errors">'.validation_errors().'</span>');
			redirect(base_url().'users/new');
        } else {
		$password = md5($this->input->post('password'));
		$user_level_id = 9;
		$user_details = array("first_name" => $this->input->post('first_name'), "last_name" => $this->input->post('last_name'), "email" => $this->input->post('email'), "password" => $password, "user_level_id" => $user_level_id);
		$user_details = $this->security->xss_clean($user_details);
		$register_user = $this->User->register_user($user_details);
			if($register_user === TRUE) {
				$this->session->set_flashdata('success', '<p class="success">User "'.$this->input->post('first_name').' '.$this->input->post('last_name').'" was successfully added!</p>');
			}
		}
		redirect(base_url().'dashboard');
	}
	/*	DOCU: This function is responsible to show user from database for editing
	Owner: Cesar Francisco
	*/
	public function edit($id) {
		$this->load->model("Admin");
		$get_this_user = $this->Admin->get_user_by_id($id);
		$this->load->view('/admins/edit.php', array('user' => $get_this_user));
		$this->load->view('templates/footer');
	}
	/*	DOCU: This function is responsible to validate and update a user to the database
	Owner: Cesar Francisco
	*/
	public function update($id) {
		$this->load->model('Admin');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');

		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', '<span class="errors">'.validation_errors().'</span>');
			redirect(base_url().'users/edit/'.$id);
		} else {
			$values = array('first_name' => $this->input->post('first_name'), 'last_name' => $this->input->post('last_name'), 'email' => $this->input->post('email'), 'user_level_id' => $this->input->post('user_level_id'));
			$values = $this->security->xss_clean($values);
			$result = $this->Admin->update_user($id, $values);
			$this->session->set_flashdata('success', '<p class="success">User has been updated.</p>');
		}
		redirect(base_url().'dashboard');
	}
	/*	DOCU: This function is responsible to validate and update the password of a user to the database
	Owner: Cesar Francisco
	*/
	public function update_password($id) {
		$this->load->model('Admin');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');

		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', '<span class="errors">'.validation_errors().'</span>');
			redirect(base_url().'users/edit/'.$id);
		} else {
			$password = md5($this->input->post('password'));
			$values = array('password' => $password);
			$values = $this->security->xss_clean($values);
			$result = $this->Admin->update_user($id, $values);
			$this->session->set_flashdata('success', '<p class="success">User password has been updated.</p>');
		}
		redirect(base_url().'dashboard');
	}
	/*	DOCU: This function is responsible for viewing the details and confirming a user for deletion
	Owner: Cesar Francisco
	*/
	public function delete_confirmation($id){
		$this->load->model('Admin');
		$delete_this_user = $this->Admin->get_user_by_id($id);
		$this->load->view('/admins/delete.php', array('user' => $delete_this_user));
		$this->load->view('templates/footer');
	}
	/*	DOCU: This function is responsible success deletion of a user to the database
	Owner: Cesar Francisco
	*/
	public function delete(){
		$this->load->model('Admin');
		$this->Admin->delete_user($this->input->post('user_id'));
		$this->session->set_flashdata('success', '<p class="errors">User has been removed.</p>');
		redirect(base_url().'dashboard');
    }
}
