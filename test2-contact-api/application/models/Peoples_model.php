<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Peoples_model extends CI_Model{




	public function insertPeople($data){
		return $this->db->insert( 'peoples', $data );
	}

	public function getPeople($id_people){

	   $res = $this->db->select( '*' )->from( 'peoples' )->where( 'id_people', $id_people )->get()->result();

	   return $res;
	
	}

	public function getAllPeople(){

	   $res = $this->db->select( '*' )->from( 'peoples' )->order_by('created_at', 'desc')->get()->result();
	   return $res;
	
	}

	public function updatePeople( $data, $id_people )
	{

	    $this->db->where( 'id_people', $id_people );
	    $res = $this->db->update( 'peoples', $data );

	    return $res;
	}

	public function deletePeople($id_people){

		$contacts = $this->db->delete( 'contacts', array( 'id_people' => $id_people ) );

		$res = $this->db->delete( 'peoples', array( 'id_people' => $id_people ) );

		return $res;

	}



}
