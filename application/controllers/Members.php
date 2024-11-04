<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper( array('form', 'url'));
		$this->load->library(['form_validation', 'session']);
		$this->load->database();
	}

	public function join()
	{
		$this->load->view('login/join');
	}

	public function make()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('login/join');
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$data = [
					'mb_email' => $email,
					'mb_password' => hash('sha256', $password),
					'mb_created_at' => date("Y-m-d H:i:s"),	
			];

			$this->db->insert('member', $data);

			$sess_data = array( 'email' => $email);

			$this->session->set_userdata($sess_data);
			redirect('members/list');
		}
	}

	public function list() 
	{
		$this->load->library('pagination');

		$config['base_url'] = '/members/list/';
		$config['total_rows'] = $this->db->query('select mb_email from member')->num_rows();
		$config['per_page'] = 3;
		$config['uri_segment'] = 3;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0; 

		$data['pages'] = $this->pagination->create_links();

		$data['list'] = $this->db->query('select * from member order by mb_id desc limit '. $page .', '. $config['per_page'])->result();
		
		$this->load->view('login/list', $data);
	}

	public function login()
	{
		if($this->session->userdata('email')) {
			redirect('/');
		}

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('login/login');
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$members = $this->db->get_where('member', ['mb_email' => $email])->row();

			if(!$members) {
				echo "맴버가 존재하지 않습니다.";
			} 

			if(!hash('sha256', $password) == $members->mb_password) {
				echo "잘못된 계정 정보 입니다. 다시 입력해주세요.";
			}

			$data = array(
				'mb_email' => $members->mb_email
			);

			$this->session->set_userdata($data);
			redirect('/');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('members/login');
	}
}