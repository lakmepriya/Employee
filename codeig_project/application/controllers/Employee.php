<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function __construct()
    {
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('form_validation');
    //$this->load->library('session');
	$this->load->model('emp_model');
    }

	public function index()
	{
		$result['data'] = $this->emp_model->get_list();
			//print_r($result);exit;
			if(!empty($result)){
				$this->load->view('employee_list',$result);
				//redirect('dashboard/view_create',$re);
			}
	}

	public function view_create(){

       	$this->load->view('employee_list');

    }

	public function create(){

        $this->form_validation->set_rules('emp_name','Employee Name','required');
        $this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('phone_no','Phone no','required');
		$this->form_validation->set_rules('dob','Date of birth','required');

		if($this->form_validation->run()==false){
			$this->session->set_flashdata('errors', validation_errors());
            redirect('employee/view_create');
		}
		else{
			$dob_date = $this->input->post('dob');
			$dob = date('Y-m-d',strtotime($dob_date));
			$data = array(
				'Emp_name'=>$this->input->post('emp_name'),
				'Email_id'=>$this->input->post('email'),
				'Phone_no'=>$this->input->post('phone_no'),
				'Dob'=>$dob,
		        'Created_at'=>date('Y-m-d H:i:s'));
//print_r($data);exit;
			$result = $this->emp_model->add_employee($data);
			if(isset($result)){
				$this->session->set_flashdata('success','Employee Created Successfully');
			    redirect('employee/index');
			}
			else {

			$this->session->set_flashdata('errors','Something went wrong');
			redirect('employee/index');
			
			}
		}

	}

	public function edit($id)
	{
		$result['val'] = $this->emp_model->emp_gets($id);
		//print_r($result);exit;
			if(!empty($result)){

					$this->load->view('employee_list',$result);
				}
	}

		public function update($id){

        $this->form_validation->set_rules('emp_name','Employee Name','required');
        $this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('phone_no','Phone no','required');
		$this->form_validation->set_rules('dob','Date of birth','required');

		if($this->form_validation->run()==false){
			$this->session->set_flashdata('errors', validation_errors());
            redirect('employee/view_create');
		}
		else{
			$dob_date = $this->input->post('dob');
			$dob = date('Y-m-d',strtotime($dob_date));
			$data = array(
				'Emp_name'=>$this->input->post('emp_name'),
				'Email_id'=>$this->input->post('email'),
				'Phone_no'=>$this->input->post('phone_no'),
				'Dob'=>$dob,
		        'Created_at'=>date('Y-m-d H:i:s'));
//print_r($data);exit;
			$result = $this->emp_model->update_employee($id,$data);
			if(isset($result)){
				$this->session->set_flashdata('success','Employee Updated Successfully');
			    redirect('employee/index');
			}
			else {

			$this->session->set_flashdata('errors','Something went wrong');
			redirect('employee/index');
			
			}
		}

	}

	public function delete($id){

		$result = $this->emp_model->employee_delete($id);
			//print_r($result);exit;
			if(!empty($result)){
				$this->session->set_flashdata('success','Employee Deleted successfully');
				redirect('employee/index');
				}

	}

}
