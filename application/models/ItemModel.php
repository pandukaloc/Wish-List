<?php

class ItemModel extends CI_Model
{





	public function getAllItems($user_id)
	{
		$this->db->select('*');
		$this->db->from('item');
		$this->db->order_by('status', "asc");
		$this->db->where('userID', $user_id);

		$query = $this->db->get();
		return $query->result();

		$data_returned = $query->num_rows;

		if ($data_returned < 1) {
			echo "There is no data in the database";
			exit();
		}
	}

	public function addCurrentItem($addItemInfo)
	{
		$insert = $this->db->insert('item', $addItemInfo);
		return $insert ? $this->db->insert_id() : false;
	}

	public function updateCurrentItem($updateItemDetails, $item_id)
	{
		$this->db->where('id', $item_id);
		$updated = $this->db->update('item', $updateItemDetails);
		return $updated;
	}

	//Whether to delete or not
	public function getItem($item_id)
	{
		$this->db->select('*');
		$this->db->where('id', $item_id);
		$this->db->from('item');
		$query = $this->db->get();

		return $query->result();

	}

	public function index($item_id)
	{
		$this->db->where('id', $item_id);
		$delete = $this->db->delete('item');
		return $delete;


	}

	public function deleteCurrentItem($id)
	{
		$this->db->where('id', $id);
		$deletevalue = $this->db->delete('item');

		return $deletevalue;
	}
}
