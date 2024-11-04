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
    $data['list'] = $this->board2->getAll();
    $this->load->view('board2/list', $data);
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
}