<?php

require APPPATH . 'libraries/REST_Controller.php';

class Item extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ItemModel');
	}

	/*
      * Display All Items
      * @Method: GET
      * */
	public function displayAllItems_get()
	{
		$user_id = strip_tags($this->get('user_id'));
		$items = $this->ItemModel->getAllItems($user_id);

		// Check if the user data exists
		if (!empty($items)) {
			$this->response($items, REST_Controller::HTTP_OK);
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'your wish-list is empty.'
			), REST_Controller::HTTP_NOT_FOUND);
		}
	}
	    /*
          * Display Single Item
          * @Method: GET
          * */
	public function displaySingleItem_get($id)
	{
		$item_id = $id;
		$items = $this->ItemModel->getItem($item_id);

		// Check if the user data exists
		if (!empty($items)) {
			$this->response($items, REST_Controller::HTTP_OK);
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'your wish-list is empty.'
			), REST_Controller::HTTP_NOT_FOUND);
		}
	}
	/*
      * Add Item
      * @Method: POST
      * */

	public function addItem_post($user_id)
	{
		// Get the post data 
		$item_name = strip_tags($this->post('item_name'));
		$item_url = strip_tags($this->post('item_url'));
		$item_price = strip_tags($this->post('item_price'));
		$item_category = strip_tags($this->post('categories'));
		$item_status = strip_tags($this->post('status'));
		$item_desc = strip_tags($this->post('item_desc'));


		// Validate the post data
		if (!empty($item_status) && !empty($item_url) && !empty($item_name) && !empty ($item_desc)) {
			// Insert user data
			$addItemsInfo = array(
				'userID' => $user_id,
				'item_name' => $item_name,
				'item_desc'=>$item_desc,
				'item_url' => $item_url,
				'item_price' => $item_price,
				'categories' => $item_category,
				'status' => $item_status,
				'create_date_time' => date('Y-m-d H:i:s'),

			);
			$insert = $this->ItemModel->addCurrentItem($addItemsInfo);

			// Check if the item data is inserted
			if ($insert) {
				// Set the response and exit
				$this->response(array(
					'status' => TRUE,
					'message' => 'Item added successfully.',
					'data' => $insert
				), REST_Controller::HTTP_OK);
			} else {
				// Set the response and exit
				$this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
			}

		} else {
			// Set the response and exit
			$this->response("Please enter all required item information.", REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	/*
          * Delete Item
          * @Method: DELETE
          * */
	public function deleteItem_delete($id)
	{

		$deleted = $this->ItemModel->deleteCurrentItem($id);
		// Check if the user data is updated
		if ($deleted) {
			// Set the response and exit
			$this->response(array(
				'status' => TRUE,
				'message' => 'Item is deleted successfully.',
				'data' => $deleted

			), REST_Controller::HTTP_OK);
		} else {
			// Set the response and exit
			$this->response("A problem occurred while deleting. Please try again.", REST_Controller::HTTP_BAD_REQUEST);
		}
		$this->response($id);
	}
	    /*
          * Update Item
          * @Method: PUT
          * */

	public function updateItem_put()
	{
		$item_id = $this->put('id');

		// Get the post data
		$item_name = strip_tags($this->put('item_name'));
		$item_url = strip_tags($this->put('item_url'));
		$item_price = strip_tags($this->put('item_price'));
		$item_category = strip_tags($this->put('categories'));
		$item_status = strip_tags($this->put('status'));
		$item_desc = strip_tags($this->put('item_desc'));

		// Validate the post data
		if (!empty($item_id)) {
			// Update item's account data
			$updateItemDetails = array(
				'item_name' => $item_name,
				'item_url' => $item_url,
				'item_price' => $item_price,
				'categories' => $item_category,
				'status' => $item_status,
				'item_desc'=>$item_desc,
			);
			// itemModel update function change
			$updateItem = $this->ItemModel->updateCurrentItem($updateItemDetails, $item_id);

			// Check if the user data is updated
			if ($updateItem) {
				// Set the response and exit
				$this->response(array(
					'status' => TRUE,
					'message' => 'The item info has been updated successfully.',
					'data' => $updateItem,
					'itdexsc'=>$this->put('item_desc')
				), REST_Controller::HTTP_OK);
			} else {
				// Set the response and exit
				$this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
			}
		} else {
			// Set the response and exit
			$this->response("Provide at least one item info to update.", REST_Controller::HTTP_BAD_REQUEST);
		}
	}
}
