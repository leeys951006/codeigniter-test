<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board2 extends CI_Controller {

  public function __construct() 
	{
		parent::__construct();
		$this->load->library('form_validation');

		$this->load->model('Board2_model', 'board2');
	}

  public function index()
  {
		$this->load->library('pagination');

		$config['base_url'] = '/board';
		$config['total_rows'] = $this->board2->getAll('count', 0, 0);
		$config['per_page'] = 3;
		$config['uri_segment'] = 2;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(2)) ? ($this->uri->segment(2)) : 0; 

		$data['pages'] = $this->pagination->create_links();
		$data['list'] = $this->board2->getAll('all', $config['per_page'], $page);
		$this->load->view('board/list', $data);
  }

  public function create()
  {
    $this->load->view('board2/create');
  }

  public function make() 
	{
		$this->form_validation->set_rules('cont_title', 'Title', 'required');
		$this->form_validation->set_rules('cont_detail', 'Contents', 'required');

		if($this->form_validation->run())
		{
			$this->board2->make();
			redirect('/board2');
		} else {
			echo "Error";
		}
	}

	public function show($cont_id)
	{
		$data['view'] = $this->board2->get($cont_id);
		$data['comments'] = $this->board2->getComments($cont_id);
		$this->load->view("board2/show", $data);
	}

	public function edit($cont_id)
	{
		$data['edit'] = $this->board2->get($cont_id);

		$this->load->view("board2/edit", $data);
	}

	public function update($cont_id)
	{
		$this->form_validation->set_rules('cont_title', 'Title', 'required');
		$this->form_validation->set_rules('cont_detail', 'Contents', 'required');

		if($this->form_validation->run())
		{
			$this->board2->update($cont_id);
			redirect('/board2');
		} else {
			echo "Error";
		}
	}

	public function delete($cont_id)
	{
		$item = $this->board2->delete($cont_id);

		redirect("/board2");
	}

	public function comments()
	{
		$cont_id = $this->input->post('cont_id');
		$this->form_validation->set_rules('com_detail', 'Comment', 'required');

		if($this->form_validation->run())
		{
			$this->board2->comments($cont_id);
			redirect('/board2/show/'.$cont_id);
		} else {
			echo "Error";
		}
	}
}