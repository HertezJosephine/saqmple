<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model {

	public function login_model()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$sql = $this->db->query("SELECT * FROM users_admin WHERE username= '$username' AND password = '$password'")->result();
		return $sql;
	}
	
	public function getUsers()
	{
		return $this->db->query("SELECT * FROM users_admin")->result();
	}

	public function addUserModel()
	{
		$data_array = array(
								'username' => $this->input->post('user_name'),
								'password' => md5($this->input->post('password')),
								'fullname' => $this->input->post('fullname'),
								'contact_number' => $this->input->post('contact'),
								'address'  => $this->input->post('address'),
								'user_type'=> $this->input->post('user_type')
							);
		if($this->db->insert('users_admin', $data_array) == true)
			return 0;
		return 1;
	}

	public function getEachUsers()
	{
		$id = $this->uri->segment(3);
		return $this->db->query("SELECT * FROM users_admin WHERE user_id = '$id'")->result();
	}

	public function saveChangesUserModel()
	{
		$data_array = array(
								'username' => $this->input->post('user_name'),
								'fullname' => $this->input->post('fullname'),
								'contact_number' => $this->input->post('contact'),
								'address'  => $this->input->post('address'),
								'user_type'=> $this->input->post('user_type')
							);
		$user_id = $this->input->post('user_id');
		$this->db->where('user_id', $user_id);
		if($this->db->update('users_admin', $data_array) == true)
			return 0;
		return 1;
	}
	
	public function deleteUsersModel($user_id)
	{
		$this->db->where('user_id', $user_id);
        if ($this->db->delete('users_admin')== true)
        	return 0;
        return 1;

	}
	public function getFacilities()
	{
		return $this->db->query("SELECT * FROM facilities_admin")->result();
	}
	public function getEachFacility()
	{
		$id = $this->uri->segment(3);
		return $this->db->query("SELECT * FROM facilities_admin WHERE faci_id = '$id'")->result();

	}

	public function addFacilityModel()
	{
		$data_array = array(
								'facilityname' => $this->input->post('facility_name'),
								'description'=> $this->input->post('faci_description')
							);
		if($this->db->insert('facilities_admin', $data_array) == true)
			return 0;
		return 1;	
	}
	public function saveChangesFaciModel()
	{
		$data_array = array(
								'facilityname' => $this->input->post('facilityname'),
								'description' => $this->input->post('description')
							);
		$faci_id = $this->input->post('faci_id');
		$this->db->where('faci_id', $faci_id);
		if($this->db->update('facilities_admin', $data_array) == true)
			return 0;
		return 1;
	}
	public function deleteFacilityModel($faci_id)
	{
		$this->db->where('faci_id', $faci_id);
        if ($this->db->delete('facilities_admin') == true)
        	return 0;
        return 1;

	}
	public function getEquipment()
	{
		return $this->db->query("SELECT * FROM equipment_admin")->result();
	}
	public function getEachEquipment()
	{
		$id = $this->uri->segment(3);
		return $this->db->query("SELECT * FROM equipment_admin WHERE id = '$id'")->result();

	}
	public function saveChangesEquipmentModel()
	{
		$data_array = array(
								'equipmentname' => $this->input->post('equipmentname'),
								'description' => $this->input->post('description')	
							);
		$id = $this->input->post('id');
		$this->db->where('id', $id);
		if($this->db->update('equipment_admin', $data_array) == true)
			return 0;
		return 1;
	}
	public function addEquipmentModel()
	{
		$data_array = array(
								'equipmentname' => $this->input->post('equipment_name'),
								'description'=> $this->input->post('equip_description')
							);
		if($this->db->insert('equipment_admin', $data_array) == true)
			return 0;
		return 1;	
	}
	public function deleteEquipmentModel($id)
	{
		$this->db->where('id', $id);
		if($this->db->delete('equipment_admin') == true)
			return 0;
		return 1;

	}

	public function getSocialHallModel()
	{
		return $this->db->query("SELECT * FROM reservation_system")->result();
	}
	public function addSocialHallModel()
	{
		$data_array = array(
								'event_name' => $this->input->post('event_name'),
								'event_place' => $this->input->post('event_place'),
								'guest' => $this->input->post('guest'),
								'date'=> $this->input->post('date'),
								'id' => $this->input->post('id')

							);
		if($this->db->insert('reservation_system', $data_array) == true)
			return 0;
		return 1;		
	}
	public function getEachSocialHall()
	{
		$reservation_id = $this->uri->segment(3);
		return $this->db->query("SELECT * FROM reservation_system WHERE reservation_id = '$reservation_id'")->result();

	}
	public function saveChangesSocialHallModel()
	{
		$data_array = array(
								'event_name' => $this->input->post('event_name'),
								'event_place' => $this->input->post('event_place'),
								'guest' => $this->input->post('guest'),	
								'date' => $this->input->post('date'),
								'id' => $this->input->post('id')
							);
		$reservation_id = $this->input->post('reservation_id');
		$this->db->where('reservation_id', $reservation_id);
		if($this->db->update('reservation_system', $data_array) == true)
			return 0;
		return 1;
	}
	public function deleteReservationModel($reservation_id)
	{
		$this->db->where('reservation_id', $reservation_id);
		if($this->db->delete('reservation_system') == true)
			return 0;
		return 1;
	}
	public function getAVRModel()
	{
		return $this->db->query("SELECT * FROM reservation_system")->result();
	}
	public function addAVRModel()
	{
		$data_array = array(
								'event_name' => $this->input->post('event_name'),
								'event_place' => $this->input->post('event_place'),
								'guest' => $this->input->post('guest'),
								'date'=> $this->input->post('date'),
								'id' => $this->input->post('id')

							);
		if($this->db->insert('reservation_system', $data_array) == true)
			return 0;
		return 1;		
	}
	public function getEachAVR()
	{
		$reservation_id = $this->uri->segment(3);
		return $this->db->query("SELECT * FROM reservation_system WHERE reservation_id = '$reservation_id'")->result();

	}
	public function saveChangesAVRModel()
	{
		$data_array = array(
								'event_name' => $this->input->post('event_name'),
								'event_place' => $this->input->post('event_place'),
								'guest' => $this->input->post('guest'),	
								'date' => $this->input->post('date'),
								'id' => $this->input->post('id')
							);
		$reservation_id = $this->input->post('reservation_id');
		$this->db->where('reservation_id', $reservation_id);
		if($this->db->update('reservation_system', $data_array) == true)
			return 0;
		return 1;
	}
	public function deleteAVRModel($reservation_id)
	{
		$this->db->where('reservation_id', $reservation_id);
		if($this->db->delete('reservation_system') == true)
			return 0;
		return 1;
	}
	public function getMultiModel()
	{
		return $this->db->query("SELECT * FROM reservation_system")->result();
	}
	public function addMultiModel()
	{
		$data_array = array(
								'event_name' => $this->input->post('event_name'),
								'event_place' => $this->input->post('event_place'),
								'guest' => $this->input->post('guest'),
								'date'=> $this->input->post('date'),
								'id' => $this->input->post('id')
							);
		if($this->db->insert('reservation_system', $data_array) == true)
			return 0;
		return 1;		
	}
	public function getEachMulti()
	{
		$reservation_id = $this->uri->segment(3);
		return $this->db->query("SELECT * FROM reservation_system WHERE reservation_id = '$reservation_id'")->result();

	}
	public function saveChangesMultiModel()
	{
		$data_array = array(
								'event_name' => $this->input->post('event_name'),
								'event_place' => $this->input->post('event_place'),
								'guest' => $this->input->post('guest'),	
								'date' => $this->input->post('date'),
								'id' => $this->input->post('id')
							);
		$reservation_id = $this->input->post('reservation_id');
		$this->db->where('reservation_id', $reservation_id);
		if($this->db->update('reservation_system', $data_array) == true)
			return 0;
		return 1;
	}
	public function deleteMultiModel($reservation_id)
	{
		$this->db->where('reservation_id', $reservation_id);
		if($this->db->delete('reservation_system') == true)
			return 0;
		return 1;
	}
	public function getnewFaciModel()
	{
		return $this->db->query("SELECT * FROM newfacility")->result();	
	}
	public function newFacilityModel()
	{
				$data_array = array(
								'faciname' => $this->input->post('faciname'),
								'facility_id' => $this->input->post('facility_id')
							);
		if($this->db->insert('newfacility', $data_array) == true)
			return 0;
		return 1;		
	}
}