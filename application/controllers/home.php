<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('login/login');
		$this->load->view('templates/footer');
	}

	public function users()
	{
		$this->load->view('templates/header');
		$this->load->view('login/register');
		$this->load->view('templates/footer');
	}

	public function register_user(){
		$this->form_validation->set_rules('fname','First Name','required');
		$this->form_validation->set_rules('lname','Last Name','required');
		$this->form_validation->set_rules('password','Password','required|min_length[8]');
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users_t.email]',
			array(
				'is_unique' => 'Email is taken already'
			)
		);

		$fname   =   $this->input->post('fname');
		$lname  =  $this->input->post('lname');
		$password  = $this->input->post('password');
		$email  =  $this->input->post('email');

		$isValidated  =  $this->form_validation->run();
		if($isValidated){
			//Ready for saving to database
			$this->load->database();
			$this->load->model('user_model');

			$data   =  array(
				'fname' => $fname,
				'lname' => $lname,
				'password' => password_hash($password,PASSWORD_DEFAULT),
				'email' => $email
			);

			$result   = $this->user_model->save($data);
			header('location:'.base_url());
			
		}
		else {
			//Form has errors
			$this->form_validation->set_error_delimiters(null, null);
			$errors  =  array(
				'fname' => form_error('fname'),
				'lname' => form_error('lname'),
				'username' =>form_error('username'),
				'password' => form_error('password'),
				'email' => form_error('email')
			);
			$this->output->set_status_header(422);
			$this->output
        			->set_content_type('application/json')
					->set_output(json_encode($errors));
		}
	}

	public function login_user(){
		$this->load->database();
		$this->load->model('user_model');

		$password  = $this->input->post('password');
		$email  =  $this->input->post('email');

		if($email == "admin@todo.com" && $password == "admin") {
			$newdata = array(
					'admin' => TRUE,
			        'email'     => $email,
			        'logged_in' => TRUE
				);

				$this->session->set_userdata($newdata);
				header('location:'.base_url(). "todo");
		} else {
		$userExists  =  $this->user_model->check_email($email);
		if(!$userExists){
			$this->output->set_status_header(404);
			$this->output
        			->set_content_type('application/json')
					->set_output(json_encode(array('message' =>  'Email does not exist!' )));

		} else {
			$correctLogin = $this->user_model->check_valid($email,$password);

			
			if ($correctLogin) {
				$newdata = array(
			        'email'     => $email,
			        'logged_in' => TRUE
				);

				$this->session->set_userdata($newdata);
				header('location:'.base_url(). "todo");
			} else {
				header('location:'.base_url());
			}
		}
		}
	}

	public function todo(){

		$this->load->model('todo_model');
		if ((isset($_SESSION['admin']))) {
			$data  = array(
			'todos' => $this->todo_model->get_all_todos()
		);
	
			$this->load->view('templates/header');
			$this->load->view('templates/nav.php');
			$this->load->view('todos/todolist',$data);
			$this->load->view('templates/footer');
		}
		else if ((isset($_SESSION['logged_in']))) {
		$data  = array(
			'todos' => $this->todo_model->get_todos($_SESSION['email'])
		);
	
		$this->load->view('templates/header');
		$this->load->view('templates/nav.php');
		$this->load->view('todos/todolist',$data);
		$this->load->view('templates/footer');
		} else {
			header('location:'.base_url());
		}
	}



	public function addtodo(){
		$this->load->view('templates/header');
		$this->load->view('templates/nav.php');
		$this->load->view('todos/todoform');
		$this->load->view('templates/footer');
	}


	public function savetodo(){

		//$_SERVER
		if($this->input->server('REQUEST_METHOD') === 'POST'){


			$todo_title   = $this->input->post('todo_title');
			$todo_description  = $this->input->post('todo_description');
			$todo  = array(
				'title' => $todo_title,
				'description'  => $todo_description,
				'email' => $_SESSION['email']
			);
			$this->load->model('todo_model');
			$result   = $this->todo_model->save_todo($todo);
			if($result > 0){
				//Query is success
				header('Location:  '    . base_url('todo'));
			}else{
				//Data not inserted
			}


		}else{
			echo "You cannot do GET here";
		}
	}

	public function update(){


		if($this->input->post('submit')){
			$id = $this->input->post('id');
			$update_title   = $this->input->post('update_title');
			$update_description  = $this->input->post('update_description');

			$todo  = array(
				
				'title' => $update_title,
				'description'  => $update_description
			);
			$this->load->model('todo_model');
			//$result   = $this->todo_model->fetch_single_data($id);
			$result   = $this->todo_model->update($id,$todo);
			
			if($result > 0){
				//Query is success
				header('Location:  '    . base_url('todo'));
			}else{
				//Data not inserted
			}
		}
	}


	public function edit(){
		$this->load->model('todo_model');
		$id = $this->input->get('id');
		$data['datas'] = $this->todo_model->get_indi($id);
		$this->load->view('templates/header');
		$this->load->view('templates/nav.php');
		$this->load->view('todos/edit_todo',$data);
		$this->load->view('templates/footer');
}	
	public function view(){
		$this->load->model('todo_model');
		$id = $this->input->get('id');
		$data['datas'] = $this->todo_model->get_indi($id);
		$this->load->view('templates/header');
		$this->load->view('templates/nav.php');
		$this->load->view('todos/view',$data);
		$this->load->view('templates/footer');
}	

	public function delete(){
		$id = $this->input->get('id');
		$this->load->model('todo_model');
		$result = $this->todo_model->deleted($id);
		if($result > 0){
				//Query is success
				header('Location:  '    . base_url('todo'));
			}else{
				//Data not inserted
			}
		}

}
