<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * TO DO LIST model
 */
class ToDoList_model extends CI_model
{
	// Constructor
	public function __construct()
	{
		parent :: __construct();
		$this->load->database();
	}

	/**
	 * To get the all to do lists as latest added to come first.
	 * 
	 */
	public function getToDoLists()
	{
		return $this->db->select('*')->from('to_do_list')->order_by('date', 'desc')->get()->result_array();
		
	}

	/**
	 * Insert the task
	 **/
	public function taskInsert($list_ar)
	{
		return ($this->db->insert('to_do_list', $list_ar)) ? $this->db->insert_id() : false ;
	}

	/**
	 * Delete the task 
	 **/
	public function taskDelete($id)
	{
		$this->db->where('id', $id)->delete('to_do_list');
	}

	/**
	 * Fetch List by id 
	 **/
	public function getToDoListsById($id)
	{
		return $this->db->where('id', $id)->get('to_do_list')->row_array();
	}

	/**
	 * Update the task.
	 **/
	public function taskUpdate($id,$ar)
	{
		return $this->db->where('id', $id)->update('to_do_list', $ar);
	}
}
?>