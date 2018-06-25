<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts_model extends CI_Model{

	public function verifyPeople($email){


	    $query = $this->db->select('*')
	        ->from('contacts')
	        ->where('contact', $email)
	        ->get()
	        ->result();				 

		return $query;

	}

	public function insertContact($data){
		return $this->db->insert( 'contacts', $data );
	}



	public function getContact($id_contact){

	   $res = $this->db->select( '*' )->from( 'contacts' )->where( 'id_contact', $id_contact )->get()->result();

	   return $res;
	
	}

	public function getAllContacts(){

	   $res = $this->db->select( '*' )->from( 'contacts' )->order_by('created_at', 'desc')->get()->result();
	   return $res;
	
	}

	public function updateContact( $data, $id_contact )
	{

	    $this->db->where( 'id_contact', $id_contact );
	    $res = $this->db->update( 'contacts', $data );

	    return $res;
	}

	public function deleteContact($id_contact){

		$res = $this->db->delete( 'contacts', array( 'id_contact' => $id_contact ) );

		return $res;

	}

}
