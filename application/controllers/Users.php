<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	/*	DOCU: This is an autoload function for every functions  
	Owner: Cesar Francisco
	*/
    public function __construct() {
        parent::__construct();
		// $this->output->enable_profiler();
		$this->load->view('templates/header');
    }
	/*	DOCU: This function is responsible for showing all users
	Owner: Cesar Francisco
	*/
	public function index(){
		$this->load->view('users/index.php');
		$this->load->view('templates/footer');
	}
    /*	DOCU: This function is responsible for showing the signin form
	Owner: Cesar Francisco
	*/
    public function signin_form() {
        $this->load->view('users/signin.php');
		$this->load->view('templates/footer');
    }
	/*	DOCU: This function is responsible to validate and sign-in a user that is registered from the database
	Owner: Cesar Francisco
	*/
	public function signin() {
		$this->load->model("User");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', '<span class="errors">'.validation_errors().'</span>');
		} else {
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$this->load->model('User');
			$users = $this->User->signin($email);
			if($users && $users['password'] == $password){
				$user = array(
					'user_id' => $users['id'],
					'first_name' => $users['first_name'],
					'last_name' => $users['last_name'],
					'user_email' => $users['email'],
					'user_fullname' => $users['first_name'].' '.$users['last_name'],
					'is_logged_in' => true,
					'user_level' => $users['user_level_id']
				);
			$user = $this->security->xss_clean($user);
			$this->session->set_userdata($user);
			redirect(base_url());
			}
		}
        $this->session->set_flashdata('login-errors', '<p class="errors">Invalid email or password! Please try again.</p>');
        redirect(base_url().'signin');
    }
	/*	DOCU: This function is responsible for loggin-out a current user
	Owner: Cesar Francisco
	*/
	public function logout() {
		$this->session->sess_destroy();
        redirect(base_url());
	}
    /*	DOCU: This function is responsible for showing the register form
	Owner: Cesar Francisco
	*/
    public function register_form() {
		$this->load->view('users/register.php');
		$this->load->view('templates/footer');
    }
	/*	DOCU: This function is responsible to validate and register/add a user to the database
	Owner: Cesar Francisco
	*/
	public function register() {
		$this->load->model('User');
		$this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
        if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', '<span class="errors">'.validation_errors().'</span>');
			redirect(base_url().'register');
        } else {
		$password = md5($this->input->post('password'));
		//count all the user if 0 then user will be an admin if there is a user in the db then the next will be a normal
		if(count($this->User->get_all_users()) === 0) {
			$user_level_id = 0;
		} else {
			$user_level_id = 9;
		}
		$user_details = array("first_name" => $this->input->post('first_name'), "last_name" => $this->input->post('last_name'), "email" => $this->input->post('email'), "password" => $password, "user_level_id" => $user_level_id);
		$user_details = $this->security->xss_clean($user_details);
		$register_user = $this->User->register_user($user_details);
			if($register_user === TRUE) {
				$this->session->set_flashdata('success', '<p class="success">User "'.$this->input->post('first_name').' '.$this->input->post('last_name').'" was successfully registered!</p>');
			}
		}
		redirect(base_url().'register');
	}
	/*	DOCU: This function is responsible to render all users from the database
	Owner: Cesar Francisco
	*/
	public function dashboard() {
		$this->load->model('User');
		$get_each_users = $this->User->get_all_users();
		$this->load->view('admins/index.php', array('get_each_users' => $get_each_users));
		$this->load->view('templates/footer');	
	}
	/*	DOCU: This function is responsible for showing details of current users for editing/updating
	Owner: Cesar Francisco
	*/
	public function edit_profile($id) {
		$id = $this->session->userdata('user_id');
		$this->load->model("Admin");
		$get_this_user = $this->Admin->get_user_by_id($id);
		$this->load->view('/users/edit_profile.php', array('user' => $get_this_user));
		$this->load->view('templates/footer');
	}
	/*	DOCU: This function is responsible to validate and update the current user
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
			redirect(base_url().'users/edit/');
		} else {
			$values = array('first_name' => $this->input->post('first_name'), 'last_name' => $this->input->post('last_name'), 'email' => $this->input->post('email'), 'user_level_id' => $this->input->post('user_level_id'));
			$values = $this->security->xss_clean($values);
			$result = $this->Admin->update_user($id, $values);
			$this->session->set_flashdata('success', '<p class="success">Your account has been updated.</p>');
		}
		redirect(base_url().'dashboard');
	}
	/*	DOCU: This function is responsible to validate and update the password of the current user
	Owner: Cesar Francisco
	*/
	public function update_password($id) {
		$this->load->model('Admin');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', '<span class="errors">'.validation_errors().'</span>');
			redirect(base_url().'users/edit/');
		} else {
			$password = md5($this->input->post('password'));
			$values = array('password' => $password);
			$values = $this->security->xss_clean($values);
			$result = $this->Admin->update_user($id, $values);
			$this->session->set_flashdata('success', '<p class="success">Your password has been updated.</p>');
		}
		redirect(base_url().'dashboard');
	}
	/*	DOCU: This function is responsible to validate and update the description of the current user
	Owner: Cesar Francisco
	*/
	public function update_description($id) {
		$this->load->model('Admin');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', '<span class="errors">'.validation_errors().'</span>');
			redirect(base_url().'users/edit/');
		} else {
			$values = array('description' => $this->input->post('description'));
			$values = $this->security->xss_clean($values);
			$result = $this->Admin->update_user($id, $values);
			$this->session->set_flashdata('success', '<p class="success">Your description has been updated.</p>');
		}
		redirect(base_url().'dashboard');
	}
}
