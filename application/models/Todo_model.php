<?php

	class Todo_model extends CI_Model {

		public function __construct(){
			$this->load->database();
		}


		public function save_todo($todo){
			
			$this->db->insert('todo_t',$todo);
			return $this->db->affected_rows();
		}


		public function get_todos($email){
			 $this->db->select('id,title,description');
			 $this->db->where('email',$email);
			$result    =  $this->db->get('todo_t');

			return $result->result_array();
		 }

		 public function get_all_todos(){
			 $this->db->select('id,title,description');
			$result    =  $this->db->get('todo_t');

			return $result->result_array();
		 }
		public function get_indi($id){
		$this->db->where('id', $id);
		$query = $this->db->get('todo_t');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}


		public function update($id,$data){
			 
  			 
			$result    =  $this->db->get('todo_t');
			//$this->db->set($todo);
			$this->db->where('id',$id);		
			$this->db->update('todo_t', $data);
			return $result;

		}
		// public function fetch_single_data($id){
		// 	$this->db->select('*');
		// 	$this->db->from('todo_t');
		// 	$this->db->where('id',$id);
		// 	$query=$this->db->get();
		// 	return $result=$query->row_array();
		// }


		public function deleted($id){
		$this->db->where('id', $id);
		$result=$this->db->delete('todo_t');
		if($this->db->affected_rows() > 0){
			 return $result;
		}else{
			return false;
		}
	}
		// function delete_single_data($id){
		// 	$this->db->select('*');
		// 	$this->db->from('todo_t');
		// 	$this->db->where('id',$id);
		// 	$query=$this->db->get();
		// 	return $result=$query->row_array();
		// }



		public function viewd($id,$data){
			 $this->db->select('id,title,description');
			 $this->db->where('id',$id);
			$result    =  $this->db->get('todo_t',$data);
			$this->load->controllers('todo');
			$this->todo->viewdetails($data);
		}
}