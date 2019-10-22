<?php

require APPPATH . 'libraries/REST_Controller.php';

class User extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();

		// Load the user model
		$this->load->model('UserModel');
	}
	
 /*
  * User Login
  * @Method: POST
  * */
	public function login_post()
	{
		$_POST = json_decode(file_get_contents("php://input"), true);
		$this->form_validation->set_rules('username', 'checkUsername', 'required');
		$this->form_validation->set_rules('password', 'checkPassword', 'required');

		if ($this->form_validation->run() == FALSE) {
			// $this->load->view('');
			$this->response("Something went wrong!.", REST_Controller::HTTP_BAD_REQUEST);

		} else {

			$username = strip_tags($this->post('username'));
			$password = strip_tags($this->post('password'));

			$result = $this->UserModel->loginUser($username, sha1($password));

			if ($result != false) {

				$this->response(array(
						'status' => TRUE,
						'message' => 'User has logged in successfully.',
						'data' => true,
						'user_id' =>  $result->userID,
						'list_name' => $result->listname,
						'list_description'=> $result->listdes
					)
					, REST_Controller::HTTP_OK);
			} else {

				$this->response("Enter valid username and password", REST_Controller::HTTP_BAD_REQUEST);

			}
		}
	}
	/*
      * User Register
      * @Method: POST
      * */
	public function register_post()
	{
		$_POST = json_decode(file_get_contents("php://input"), true);
		$this->form_validation->set_rules('username', 'checkUsername', 'required');
		$this->form_validation->set_rules('password', 'checkPassword', 'required');
		$this->form_validation->set_rules('list_name', 'listName', 'required');
		$this->form_validation->set_rules('list_des', 'listDes', 'required');

		$username = strip_tags($this->post('username'));
		$password = strip_tags($this->post('password'));
		$list_name = strip_tags($this->post('list_name'));
		$list_des = strip_tags($this->post('list_description'));


		if (!empty($username) && !empty($password) && !empty($list_name)) {

			$userData = array(
				'username' => $username,
				'password' => sha1($password),
				'listname' => $list_name,
				'listdes' => $list_des
			);
			if ($this->UserModel->checkUser($userData['username'])) {
				$this->response(array("status" => "The username is taken"), 409);
			} else {
				$userInformation = $this->UserModel->registerUser($userData);
				if ($userInformation) {
					$this->response(array(
							'status' => TRUE,
							'message' => 'The user added successfully.',
							'data' => $userInformation)
						, REST_Controller::HTTP_OK);
				} else {
					$this->response("All the required information has to be filled!", REST_Controller::HTTP_BAD_REQUEST);
				}
			}

		}

	}
	/*
      * User Get
      * @Method: GET
      * */
	public function getUser_get($id)
	{
		$result = $this->UserModel->getUser($id);
		$this->response($result, 200);
	}

}
