<?php
class Board2_model extends CI_Model {

	public function __construct() 
	{
		$this->load->database();
		$this->load->helper('url');
	}

	public function make()
	{
		$data = [
			'cont_title' => $this->input->post('cont_title'),
			'cont_detail' => $this->input->post('cont_detail'),
			'cont_created_at' => date("Y-m-d H:i:s"),	
		];

		$result = $this->db->insert('content', $data);
		return $result;
	}

	public function get($cont_id)
	{
		$board = $this->db->get_where('content', ['cont_id' => $cont_id])
		->row();
		return $board;
	}

	public function getAll()
	{
		$board = $this->db->get('content')->result();
		return $board;
	}

}