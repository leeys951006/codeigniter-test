<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->library(['form_validation', 'session']);

		$this->load->model('Board_model', 'board');

		if(!$this->session->userdata('mb_email')) {
			redirect('/members/login');
		}
	}

	public function index() 
	{
		// $this->load->view('Header');
		$this->load->library('pagination');

		$config['base_url'] = '/board';
		$config['total_rows'] = $this->board->getAll('count', 0, 0);
		$config['per_page'] = 10;
		$config['uri_segment'] = 2;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(2)) ? ($this->uri->segment(2)) : 0; 

		$data['pages'] = $this->pagination->create_links();
		$data['list'] = $this->board->getAll('all', $config['per_page'], $page);

		$this->load->view('board/list', $data);
	}

	public function create() 
	{
		$this->load->view('board/create');
	}

	public function make() 
	{
			$this->form_validation->set_rules('cont_title', 'Title', 'required');
			$this->form_validation->set_rules('cont_detail', 'Contents', 'required');
	
			if ($this->form_validation->run()) {
					$result = $this->board->make();
					redirect('/board');
					echo json_encode(['success' => true, 'message' => '글이 성공적으로 저장되었습니다.']);
			} else {
					echo json_encode(['success' => false, 'message' => '필수 항목을 채워주세요.']);
			}
	}

	public function show($cont_id)
	{
		$data['view'] = $this->board->get($cont_id);
		$data['comments'] = $this->board->getComments($cont_id);
		$this->load->view("board/show", $data);
	}

	public function edit($cont_id)
	{
		$postOwnerEmail = $this->board->getPostOwnerEmail($cont_id);
		$currentUserEmail = $this->session->userdata('me_email');

		if ($postOwnerEmail !== $currentUserEmail) {
			show_error('수정 권한이 없습니다.', 403, 'Forbidden');
		}


		$data['edit'] = $this->board->get($cont_id);
		$this->load->view("board/edit", $data);
	}

	public function update($cont_id) 
	{
    $this->form_validation->set_rules('cont_title', 'Title', 'required');
    $this->form_validation->set_rules('cont_detail', 'Contents', 'required');

    if ($this->form_validation->run()) {
        $result = $this->board->update($cont_id);
				redirect('/board');
        echo json_encode(['success' => true, 'message' => '글이 성공적으로 수정되었습니다.']);
    } else {
        echo json_encode(['success' => false, 'message' => '수정에 실패했습니다.']);
    }
	}

	public function delete($cont_id)
	{
    $result = $this->board->delete($cont_id);

    if ($result) {
        echo json_encode(['success' => true, 'message' => '글이 삭제되었습니다.']);
    } else {
        echo json_encode(['success' => false, 'message' => '삭제에 실패했습니다.']);
    }
	}

		

	public function comments()
	{
		$cont_id = $this->input->post('cont_id');
		$this->form_validation->set_rules('com_detail', 'Comment', 'required');

		if($this->form_validation->run())
		{
			$this->board->comments($cont_id);
			redirect('/board/show/'.$cont_id);
		} else {
			echo "Error";
		}
	}


}