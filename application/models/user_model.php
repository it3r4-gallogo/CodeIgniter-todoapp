<?php

	class User_model extends CI_Model {


		public function save($data){


			$this->db->insert('users_t',$data);
			return $this->db->affected_rows();

		}


		public function update_email($id,$data) {

			$this->db->where('id', $id);
			$this->db->update('users_t', $data);
		}

		public function check_email($email){
			$this->db->where('email',$email);
			$query = $this->db->get('users_t');
			return $query->num_rows();
		}

		public function check_valid($email,$password){
			$this->db->select('password');
			$this->db->from('users_t');
			$this->db->where('email', $email);
			$query = $this->db->get();
			$original = "";
			foreach ($query->result() as $row)
			{
			        $original = $row->password;
			}
			$valid = password_verify($password, $original);
			return $valid;
		}

		public function check_user($id){
			$this->db->where('id',$id);
			$query = $this->db->get('users_t');
			return $query->num_rows();
		}

		public function delete_user($id){

			$this->db->where('id', $id);
			$this->db->delete('users_t');
			return $this->db->affected_rows();
		}
	}