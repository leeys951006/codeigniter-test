<?php
class Board_model extends CI_Model {

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

	//show부분. 게시글 내용과 댓글 내용 가져오는 부분
	public function get($cont_id) 
	{
		$board = $this->db->get_where('content', ['cont_id' => $cont_id ])->row();
		return $board;
	}

	public function getComments($cont_id)
	{
		$this->db->where('com_cont_id', $cont_id);
		$this->db->order_by('com_created_at', 'asc');
		$comments = $this->db->get('comment')->result();
		return $comments;
	}

	// list를 가져오는 구문, order_by는 db를 역순으로 가져옴.(최신글이 위로올라오게 하고싶을때)
	public function getAll($type="all", $limit=3, $page=1) 
	{
		//전체 게시물을 카운트 하는 것
		//전체 게시물을 가져가는 것
		if($type=="count")
		{
			$board = $this->db->get('content')->num_rows();	
		} else {
			$this->db->limit($limit, $page);
			$this->db->order_by('cont_id', 'desc');
			$board = $this->db->get('content')->result();
		}
		return $board;
		
	}

	//댓글 기능
	public function comments($cont_id)
	{
		$data = [
			'com_detail' => $this->input->post('com_detail'),
			'com_created_at' => date("Y-m-d H:i:s"),
			'com_cont_id' => $cont_id,	
		];

		$result = $this->db->insert('comment', $data);
		return $result;
	}

	public function update($cont_id)
	{
		$data = [
			'cont_title' => $this->input->post('cont_title'),
			'cont_detail' => $this->input->post('cont_detail'),
		];

		$result = $this->db->where('cont_id', $cont_id)->update('content', $data);
		return $result;
	}

	public function delete($cont_id)
	{
		$result = $this->db->delete("content", array('cont_id' => $cont_id));

		return $result;
	}
}