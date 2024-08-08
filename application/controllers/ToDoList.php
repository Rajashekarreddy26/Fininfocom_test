<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * TO DO LIST Controller
 */
class ToDoList extends CI_controller
{
	
	public function __construct()
	{
		parent :: __construct();
		$this->load->model('ToDoList_model');
	}

	/**
	 * 
	 * To DO List Index function (Default function)
	 */
	public function index()
	{
		$data['todo_lists'] = $this->ToDoList_model->getToDoLists();

		$this->load->view('to_do_list/header');
		$this->load->view('to_do_list/to_do_list', $data);
		$this->load->view('to_do_list/footer');
	}

	/**
	 * To Do List Body 
	 * to re render the data with ajax function.
	 */
	public function toDoListBody($params)
	{
		$data['todo_lists'] = $this->ToDoList_model->getToDoLists();

		$this->load->view('to_do_list/to_do_list_body', $data);

	}

/**
 *  Insert the new task.
 * 
 */
	public function taskSubmit()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'required|trim');
		$this->form_validation->set_rules('details', 'Details', 'required|trim');
		$this->form_validation->set_rules('date', 'Date', 'required');

		if ($this->form_validation->run() == false) {
			$data['paramas'] =  $this->input->post();
			$ar = array(['err_code' => 1, 'html_code' => $this->load->view('to_do_list/create_task',$data,true)]);		
		}
		else {

			$list_ar = array(
				'title' => $this->input->post('title'),
				'details' => $this->input->post('details'),
				'date' => date('Y-m-d H:i:s',strtotime($this->input->post('date')))
			);

			$insert = $this->ToDoList_model->taskInsert($list_ar);
			if ($insert) {
				$data['todo_lists'] = $this->ToDoList_model->getToDoLists();
				$ar = array(['err_code' => 2, 'html_code' => $this->load->view('to_do_list/to_do_list_body', $data, true)],['err_code' => 1, 'html_code' => $this->load->view('to_do_list/create_task', NULL, true)]);
			}
			else {
				$ar = array(['err_code' => 1, 'html_code' => '<div alert alert-danger>Error occured, please try again!.</div>']);
			}

		}
		print json_encode($ar);
	}

	/**
	 *  Delete the task
	 **/
	public function taskDelete()
	{
		$id = $this->input->post('id');
		$delete = $this->ToDoList_model->taskDelete($id);

		$data['todo_lists'] = $this->ToDoList_model->getToDoLists();

		$this->load->view('to_do_list/to_do_list_body', $data);
	}

	/**
	 *  Edit the task.
	 **/
	public function taskEdit()
	{
		$id = $this->input->post('id');
		$data['to_do_list'] = $this->ToDoList_model->getToDoListsById($id);

		$this->load->view('to_do_list/edit_task', $data);
	}

	/**
	 *  update the task
	 **/
	public function taskUpdate()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'required|trim');
		$this->form_validation->set_rules('details', 'Details', 'required|trim');
		$this->form_validation->set_rules('date', 'Date', 'required');

		if ($this->form_validation->run() == false) {
			$data['params'] = $this->input->post();
			$ar = array(['err_code' => 1, 'html_code' => $this->load->view('to_do_list/edit_task',$data,true)]);		
		}
		else {

			$id = $this->input->post('id');
			$list_ar = array(
				'title' => $this->input->post('title'),
				'details' => $this->input->post('details'),
				'date' => date('Y-m-d H:i:s',strtotime($this->input->post('date'))),
				'updated_date' => date('Y-m-d H:i:s')
			);

			$update = $this->ToDoList_model->taskUpdate($id,$list_ar);
			if ($update) {
				$data['todo_lists'] = $this->ToDoList_model->getToDoLists();
				$ar = array(['err_code' => 2, 'html_code' => $this->load->view('to_do_list/to_do_list_body', $data, true)],['err_code' => 1, 'html_code' => $this->load->view('to_do_list/create_task', NULL, true)]);
			}
			else {
				$ar = array(['err_code' => 1, 'html_code' => '<div alert alert-danger>Error occured, please try again!.</div>']);
			}

		}
		print json_encode($ar);
	}
}
?>