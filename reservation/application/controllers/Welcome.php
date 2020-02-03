<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){

		parent:: __construct();
	}

	public function index()
	{
		if($session_data = $this->session->userdata('set_session'))
        {
        	redirect('Welcome/home','refresh');
        }
        else
        {
			$this->load->view('login');
		}
	}

	public function login()
	{
		$data = $this->Admin->login_model();
		if($session_data = $this->session->userdata('set_session'))
        {
        	redirect('Welcome/home','refresh');
        }
        else
        {
        	$session_array = array();
			if(sizeof($data) > 0)
			{
				foreach($data as $row)
				{
					$session_array = array(
											'user_id'  	 	 => $row->user_id,
											'fullname' 	 	 => $row->fullname,
										  );
				}
				$session_data = $this->session->set_userdata('set_session', $session_array);
				redirect('Welcome/home','refresh');
	   		}
	   		else
	   		{
	   			redirect('Welcome','refresh');
	   		}
		}
	}

	public function home()
	{
		if($session_data = $this->session->userdata('set_session'))
        {
        	$data['session'] = $session_data;
        	$this->load->view('header', $data);
        	$this->load->view('home'); //loads view php files
        	$this->load->view('footer');
        }
        else
        {
        	redirect('Welcome','refresh');
        }
	}


	public function logout()
	{
		session_destroy();
		redirect('Welcome','refresh');
	}

	public function dashboard()
	{
		if($session_data = $this->session->userdata('set_session'))
        {
        	$data['session'] = $session_data;
        	$this->load->view('header', $data);
        	$this->load->view('dashboard');
        	$this->load->view('footer');
        }
        else
        {
        	redirect('Welcome','refresh');
        }
	}

	public function users()
	{
		if($session_data = $this->session->userdata('set_session'))
        {
        	$data['session'] = $session_data;
			$data['userlist'] = $this->Admin->getUsers();
			$this->load->view('header', $data);
			$this->load->view('user_list'); 
	    	$this->load->view('footer');
	    }
	    else
        {
        	redirect('Welcome','refresh');
        }
	}

	public function addUser()
	{
		if($session_data = $this->session->userdata('set_session'))
        {
        	$data['session'] = $session_data;
			$result = $this->Admin->addUserModel();
			if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-success">
											                <div class="card-body">
											            		User was successfully added.      	
											                </div>
											            </div>');
				redirect('Welcome/users','refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-danger">
							                <div class="card-body">
							            		Failed in adding new user.      	
							                </div>
							            </div>');
				redirect('Welcome','refresh');
			}
	    }
	    else
        {
        	redirect('Welcome/users','refresh');
        }
	}

	public function editUser()
	{
		if($session_data = $this->session->userdata('set_session'))
        {
        	$data['session'] = $session_data;
			$data['userdata'] = $this->Admin->getEachUsers();
			$this->load->view('header', $data);
			$this->load->view('editUser'); 
	    	$this->load->view('footer');
	    }
	    else
        {
        	redirect('Welcome','refresh');
        }
	}

	public function saveChangesUser()
	{
		if($session_data = $this->session->userdata('set_session'))
        {
        	$data['session'] = $session_data;
			$result = $this->Admin->saveChangesUserModel();
			$user_id = $this->input->post('user_id');
			if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-success">
											                <div class="card-body">
											            		User was successfully updated.      	
											                </div>
											            </div>');
				redirect('Welcome/editUser/'.$user_id,'refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-danger">
							                <div class="card-body">
							            		Failed in updating user.      	
							                </div>
							            </div>');
				redirect('Welcome/editUser/'.$user_id,'refresh');
			}
	    }
	    else
        {
        	redirect('Welcome','refresh');
        }
	}
	public function deleteUsers()
	{
		$user_id = $this->uri->segment(3);
        $result= $this->Admin->deleteUsersModel($user_id);        
     	if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-success">
											                <div class="card-body">
											            		User was successfully deteled.      	
											                </div>
											            </div>');
				redirect('Welcome/users/','refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-danger">
							                <div class="card-body">
							            		Failed in deleting user.      	
							                </div>
							            </div>');
				redirect('Welcome/users/','refresh');
			}       
    
	}
	public function facility()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$data['facilist'] = $this->Admin->getFacilities();
			$this->load->view('header', $data);
			$this->load->view('facilities'); 
	    	$this->load->view('footer');
		}
		else
        {
        	redirect('Welcome','refresh');
        }
	}

	public function addFacility()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$result = $this->Admin->addFacilityModel();
			if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-success">
											                <div class="card-body">
											            		Facility was successfully added.      	
											                </div>
											            </div>');
				redirect('Welcome/facility','refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-danger">
							                <div class="card-body">
							            		Failed in adding new facility.      	
							                </div>
							            </div>');
				redirect('Welcome','refresh');
			}
	    }
	    else
        {
        	redirect('Welcome/facility','refresh');
        }		
		
	}
	public function editFacility()
	{
		if($session_data = $this->session->userdata('set_session'))
        {
        	$data['session'] = $session_data;
			$data['userdata'] = $this->Admin->getEachFacility();
			$this->load->view('header', $data);
			$this->load->view('editFacility'); 
	    	$this->load->view('footer');
	    }
	    else
        {
        	redirect('Welcome','refresh');
        }
	}
	public function saveChangesFaci()
	{
		if($session_data = $this->session->userdata('set_session'))
        {
        	$data['session'] = $session_data;
			$result = $this->Admin->saveChangesFaciModel();
			$faci_id = $this->input->post('faci_id');
			if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-success">
											                <div class="card-body">
											            		Faciity was successfully updated.      	
											                </div>
											            </div>');
				redirect('Welcome/editFacility/'.$faci_id,'refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-danger">
							                <div class="card-body">
							            		Failed in updating facility.      	
							                </div>
							            </div>');
				redirect('Welcome/editFacility/'.$faci_id,'refresh');
			}
	    }
	    else
        {
        	redirect('Welcome','refresh');
        }
	}
	public function deleteFacility()
	{
		$faci_id = $this->uri->segment(3);
        $result= $this->Admin->deleteFacilityModel($faci_id);        
     	if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-success">
											                <div class="card-body">
											            		Facility was successfully deleted.      	
											                </div>
											            </div>');
				redirect('Welcome/facility/','refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-danger">
							                <div class="card-body">
							            		Failed in deleting facility.      	
							                </div>
							            </div>');

				redirect('Welcome/facility/','refresh');
			}
	}
	public function equipments()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$data['equipmentlist'] = $this->Admin->getEquipment();
			$this->load->view('header', $data);
			$this->load->view('equipments'); 
	    	$this->load->view('footer');
		}
		else
        {
        	redirect('Welcome','refresh');
        }
	}

	public function addEquipment()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$result = $this->Admin->addEquipmentModel();
			if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-success">
											                <div class="card-body">
											            		Equipment was successfully added.      	
											                </div>
											            </div>');
				redirect('Welcome/equipments','refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-danger">
							                <div class="card-body">
							            		Failed in adding new equipment.      	
							                </div>
							            </div>');
				redirect('Welcome','refresh');
			}
	    }
	    else
        {
        	redirect('Welcome/equipments','refresh');
        }
	}		
	public function editEquipment()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$data['userdata'] = $this->Admin->getEachEquipment();
			$this->load->view('header', $data);
			$this->load->view('editEquipment'); 
	    	$this->load->view('footer');
	    }
	    else
        {
        	redirect('Welcome','refresh');
        }
		}
	
	public function saveChangesEquipment()
	{
		if($session_data = $this->session->userdata('set_session'))
        {
        	$data['session'] = $session_data;
			$result = $this->Admin->saveChangesEquipmentModel();
			$id = $this->input->post('id');
			if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-success">
											                <div class="card-body">
											            		Equipment was successfully updated.      	
											                </div>
											            </div>');
				redirect('Welcome/editEquipment/'.$id,'refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-danger">
							                <div class="card-body">
							            		Failed in updating equipment.      	
							                </div>
							            </div>');
				redirect('Welcome/editEquipment/'.$id,'refresh');
			}
	    }
	    else
        {
        	redirect('Welcome','refresh');
        }

	}
	public function deleteEquipment()
	{
		$id = $this->uri->segment(3);
        $result= $this->Admin->deleteEquipmentModel($id);        
     	if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-success">
											                <div class="card-body">
											            		Equipment was successfully deleted.      	
											                </div>
											            </div>');
				redirect('Welcome/equipments/','refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-danger">
							                <div class="card-body">
							            		Failed in deleting equipment.      	
							                </div>
							            </div>');

				redirect('Welcome/equipments/','refresh');
			}	
	}
	public function socialhall()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$data['socialhalllist'] = $this->Admin->getSocialHallModel();
			$this->load->view('header', $data);
			$this->load->view('socialhall'); 
	    	$this->load->view('footer');
		}
		else
        {
        	redirect('Welcome','refresh');
        }	
	}
	public function addSocialhall()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$result = $this->Admin->addSocialHallModel();
			if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-success">
											                <div class="card-body">
											            		Reservation was successfully added.      	
											                </div>
											            </div>');
				redirect('Welcome/socialhall','refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-danger">
							                <div class="card-body">
							            		Failed in adding new reservation.      	
							                </div>
							            </div>');
				redirect('Welcome','refresh');
			}
	    }
	    else
        {
        	redirect('Welcome/socialhall','refresh');
        }		
	}
	public function editSocialHall()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$data['userdata'] = $this->Admin->getEachSocialHall();
			$this->load->view('header', $data);
			$this->load->view('editSocialHall'); 
	    	$this->load->view('footer');
	    }
	    else
        {
        	redirect('Welcome','refresh');
		}
	}
	public function saveChangesSocialHall()
	{
		if($session_data = $this->session->userdata('set_session'))
        {
        	$data['session'] = $session_data;
			$result = $this->Admin->saveChangesSocialHallModel();
			$reservation_id = $this->input->post('reservation_id');
			if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-success">
											                <div class="card-body">
											            		Social Hall was successfully updated.      	
											                </div>
											            </div>');
				redirect('Welcome/editSocialHall/'.$reservation_id,'refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-danger">
							                <div class="card-body">
							            		Failed in updating Social Hall.      	
							                </div>
							            </div>');
				redirect('Welcome/editSocialHall/'.$reservation_id,'refresh');
			}
	    }
	    else
        {
        	redirect('Welcome','refresh');
        }

	}
	public function deleteReservation()
	{
		$reservation_id = $this->uri->segment(3);
        $result= $this->Admin->deleteReservationModel($reservation_id);        
     	if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-success">
											                <div class="card-body">
											            		Reservation Event was successfully deleted.      	
											                </div>
											            </div>');
				redirect('Welcome/socialhall/','refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-danger">
							                <div class="card-body">
							            		Failed in deleting Reservation Event.      	
							                </div>
							            </div>');

				redirect('Welcome/socialhall/','refresh');
			}		
	}
	public function avr()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$data['avrlist'] = $this->Admin->getAVRModel();
			$this->load->view('header', $data);
			$this->load->view('avr'); 
	    	$this->load->view('footer');
		}
		else
        {
        	redirect('Welcome','refresh');
        }	
	}
	public function addAVR()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$result = $this->Admin->addAVRModel();
			if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-success">
											                <div class="card-body">
											            		Reservation was successfully added.      	
											                </div>
											            </div>');
				redirect('Welcome/avr','refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-danger">
							                <div class="card-body">
							            		Failed in adding new reservation.      	
							                </div>
							            </div>');
				redirect('Welcome','refresh');
			}
	    }
	    else
        {
        	redirect('Welcome/avr','refresh');
        }		
	}
	public function editAVR()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$data['userdata'] = $this->Admin->getEachSocialHall();
			$this->load->view('header', $data);
			$this->load->view('editAVR'); 
	    	$this->load->view('footer');
	    }
	    else
        {
        	redirect('Welcome','refresh');
		}
	}
	public function saveChangesAVR()
	{
		if($session_data = $this->session->userdata('set_session'))
        {
        	$data['session'] = $session_data;
			$result = $this->Admin->saveChangesAVRModel();
			$reservation_id = $this->input->post('reservation_id');
			if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-success">
											                <div class="card-body">
											            		Social Hall was successfully updated.      	
											                </div>
											            </div>');
				redirect('Welcome/editAVR/'.$reservation_id,'refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-danger">
							                <div class="card-body">
							            		Failed in updating Social Hall.      	
							                </div>
							            </div>');
				redirect('Welcome/editAVR/'.$reservation_id,'refresh');
			}
	    }
	    else
        {
        	redirect('Welcome','refresh');
        }

	}
	public function deleteAVR()
	{
		$reservation_id = $this->uri->segment(3);
        $result= $this->Admin->deleteAVRModel($reservation_id);        
     	if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-success">
											                <div class="card-body">
											            		Reservation Event was successfully deleted.      	
											                </div>
											            </div>');
				redirect('Welcome/avr/','refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-danger">
							                <div class="card-body">
							            		Failed in deleting Reservation Event.      	
							                </div>
							            </div>');

				redirect('Welcome/avr/','refresh');
			}		
	}
	public function multipurpose()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$data['multilist'] = $this->Admin->getMultiModel();
			$this->load->view('header', $data);
			$this->load->view('multipurpose'); 
	    	$this->load->view('footer');
		}
		else
        {
        	redirect('Welcome','refresh');
        }	
	}
	public function addMulti()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$result = $this->Admin->addMultiModel();
			if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-success">
											                <div class="card-body">
											            		Reservation was successfully added.      	
											                </div>
											            </div>');
				redirect('Welcome/multipurpose','refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-danger">
							                <div class="card-body">
							            		Failed in adding new reservation.      	
							                </div>
							            </div>');
				redirect('Welcome','refresh');
			}
	    }
	    else
        {
        	redirect('Welcome/multipurpose','refresh');
        }		
	}
	public function editMulti()
	{
		if($session_data = $this->session->userdata('set_session'))
		{
			$data['session'] = $session_data;
			$data['userdata'] = $this->Admin->getEachMulti();
			$this->load->view('header', $data);
			$this->load->view('editMulti'); 
	    	$this->load->view('footer');
	    }
	    else
        {
        	redirect('Welcome','refresh');
		}
	}
	public function saveChangesMulti()
	{
		if($session_data = $this->session->userdata('set_session'))
        {
        	$data['session'] = $session_data;
			$result = $this->Admin->saveChangesMultiModel();
			$reservation_id = $this->input->post('reservation_id');
			if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-success">
											                <div class="card-body">
											            		Social Hall was successfully updated.      	
											                </div>
											            </div>');
				redirect('Welcome/editMulti/'.$reservation_id,'refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-danger">
							                <div class="card-body">
							            		Failed in updating Social Hall.      	
							                </div>
							            </div>');
				redirect('Welcome/editMulti/'.$reservation_id,'refresh');
			}
	    }
	    else
        {
        	redirect('Welcome','refresh');
        }

	}
	public function deleteMulti()
	{
		$reservation_id = $this->uri->segment(3);
        $result= $this->Admin->deleteMultiModel($reservation_id);        
     	if($result == 0)
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-success">
											                <div class="card-body">
											            		Reservation Event was successfully deleted.      	
											                </div>
											            </div>');
				redirect('Welcome/multipurpose/','refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="card mb-4 py-3 border-left-danger">
							                <div class="card-body">
							            		Failed in deleting Reservation Event.      	
							                </div>
							            </div>');

				redirect('Welcome/multipurpose/','refresh');
			}		
	}
	
}
