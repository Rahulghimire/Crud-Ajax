<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$this->load->view("header");
		$this->load->model('User_model');
		$rows=$this->User_model->all();
		$data['rows']=$rows;
		$this->load->view('list',$data);	
	}
	
	public function showCreateForm(){
		$html=$this->load->view('create','',true);
		$response['html']=$html;
		echo json_encode($response);
	} 

	public function saveModel(){

		$this->load->model('User_model');

		$this->form_validation->set_rules('name',"Name","required|trim|min_length[5]|max_length[50]");
		$this->form_validation->set_rules('email',"Email","required|valid_email");
		$this->form_validation->set_rules('phone',"Phone","required|min_length[10]|max_length[15]|regex_match[/^[0-9]+$/]");
		$this->form_validation->set_rules('province',"Province","required");
		$this->form_validation->set_rules('gender',"Gender","required|in_list[Male,Female]");
		$this->form_validation->set_rules('date',"Date","required");

		if($this->form_validation->run()===true){

		$formArray=array();

		$formArray['name']=$this->input->post('name');
		$formArray['email']=$this->input->post('email');
		$formArray['pnumber']=$this->input->post('phone');
		$formArray['province']=$this->input->post('province');
		$formArray['gender']=$this->input->post('gender');
		$formArray['dob']=$this->input->post('date');

		$id=$this->User_model->create($formArray);	

		$row=$this->User_model->getRow($id);

		$vData['row']=$row;

		$rowHtml=$this->load->view("user_row",$vData,true);

		$response['row']=$rowHtml;

		$response['status']=1;

		}

		else{
			//error
			$response['status']=0;
			$response['name']=strip_tags(form_error('name'));
			$response['email']=strip_tags(form_error('email'));
			$response['phone']=strip_tags(form_error('phone'));
			$response['province']=strip_tags(form_error('province'));
			$response['gender']=strip_tags(form_error('gender'));
			$response['date']=strip_tags(form_error('date'));
		}
		echo json_encode($response);

	}
	
	//This function will open the edit form with populated data

	public function getUserModel($id){
		
		$this->load->model('User_model');
		$row=$this->User_model->getRow($id);
	
		$data['row']=$row;

		$html=$this->load->view('edit',$data,true);

		$response['html']=$html;

		echo json_encode($response);

	}

	public function updateModel(){
		$this->load->model('User_model');
		$id=$this->input->post('id');
		$row=$this->User_model->getRow($id);

		if(empty($row)){
			$response['msg']="Record not found or deleted";
			$response['status']="100";
			echo json_encode($response);
			exit;
		}
		else{

		$this->form_validation->set_rules('name',"Name","required|min_length[5]|max_length[50]");
		$this->form_validation->set_rules('email',"Email","required|valid_email");
		$this->form_validation->set_rules('phone',"Phone","required|min_length[10]|max_length[15]|regex_match[/^[0-9]+$/]");
		$this->form_validation->set_rules('province',"Province","required");

		if($this->form_validation->run()===true){

		$formArray=array();
		$formArray['name']=$this->input->post('name');
		$formArray['email']=$this->input->post('email');
		$formArray['pnumber']=$this->input->post('phone');
		$formArray['province']=$this->input->post('province');
		$formArray['gender']=$this->input->post('gender');
		$formArray['dob']=$this->input->post('date');

		$id=$this->User_model->update($id,$formArray);	

		$row=$this->User_model->getRow($id);

		$response['row']=$row;

		$response['status']=1;
		$response['message']="Record has been updated successfuly";

		}
		else{
			//error

			$response['status']=0;
			$response['name']=strip_tags(form_error('name'));
			$response['email']=strip_tags(form_error('email'));
			$response['phone']=strip_tags(form_error('phone'));
			$response['province']=strip_tags(form_error('province'));
			$response['gender']=strip_tags(form_error('gender'));
			$response['date']=strip_tags(form_error('date'));
		}

		}

		echo json_encode($response);

	}

	function deleteModel($id){
		$this->load->model('User_model');
		$row=$this->User_model->getRow($id);

		if(empty($row)){
			$response['msg']="Record not found or deleted";
			$response['status']="0";
			echo json_encode($response);
			exit;
		}
		else{
			$this->load->model('User_model');
			$this->User_model->delete($id);
			$response['msg']="Record has been deleted successfully";
			$response['status']="1";
			echo json_encode($response);
		}
	}
}
