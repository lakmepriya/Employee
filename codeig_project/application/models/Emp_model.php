<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emp_model extends CI_Model {

	
	public function get_list(){

		$this->db->select('*');
		$this->db->from('employees');
		$query = $this->db->get();
        return $query->result();
	}

	public function add_employee($data){

		if($this->db->insert('employees',$data)){
			
            return $this->db->insert_id();
		}
		else{ return false;}
	}

	public function emp_gets($id){
        
 		$this->db->select('*');
		$this->db->from('employees');
		$this->db->where('Emp_id',$id);
		$query = $this->db->get();
        return $query->row_array();

	}

	public function update_employee($id,$data){
        
 		$this->db->where('Emp_id',$id);
 		return $this->db->update('employees',$data);
	}

public function employee_delete($id){
		$del_id =  array('Emp_id' =>$id );
		return $this->db->delete('employees',$del_id);
	}


}
