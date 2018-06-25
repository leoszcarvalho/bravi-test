<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{

		parent::__construct();
		$this->load->database();
		$this->load->model("Peoples_model", 'peoples');
		$this->load->model("Contacts_model", 'contacts');
	
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}


	public function savePeople()
	{

		//E-mail and name are going to be required fields since the application needs that to verify if the people already exists in the system

		$name = $this->input->post('name');

		$email = $this->input->post('email');

		$contacts = $this->input->post('contacts');

		/*
		A possible way to validate the form data, I commented this to make possible run the script, just putting here for note that I knew how to do that
		$this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == FALSE)
        {
			return false;
        }
        else
        {
			return true;
        }

		*/

		//=================================================================================================================
		//Variables just for example comment or delete when in production
		$name = "Leo Test";

		$email = "test@leo.com";

		$contacts = [
			[
				"type" => 2,
				"contact" => "(541) 555-2115",
			],
			[
				"type" => 3,
				"contact" => "(541) 658-2147",
			],

		];
		//Variables just for example comment or delete when in production
		//=================================================================================================================

		$people_verification = $this->contacts->verifyPeople($email);

		if (!empty($people_verification)) {

			$result = [
				"error" => 1,
				"message" => "There's a people with this same e-mail in the system already.",
			];

			echo json_encode($result);
			die();
		
		}

		$data_people = array(
			'name' => $name,
			);

		if($this->peoples->insertPeople($data_people)){

			$id_inserted = $this->db->insert_id(); 

			$data_email = array(
				'id_people' => $id_inserted,
				'id_type' => 1,
				'contact' => $email,
			);		

			//First save the e-mail for the new people inserted
			if(!$this->contacts->insertContact($data_email)){

				$result = [
					"error" => 1,
					"message" => "There was an error and the e-mail data couldn't be saved.",
				];
				
				echo json_encode($result);
				die();

			}

			$result = [
				"error" => 0,
				"message" => "The data was saved with success.",
			];

			if (!empty($contacts)) {


				foreach ($contacts as $key => $contact) {

					$data_contact = array(
						'id_people' => $id_inserted,
						'id_type' => $contact["type"],
						'contact' => $contact["contact"],
					);					

					if(!$this->contacts->insertContact($data_contact)){

						$result = [
							"error" => 1,
							"message" => "There was an error and the contact data couldn't be saved.",
						];
						
						echo json_encode($result);
						die();
					}

				}

			}


		}else{

			$result = [
				"error" => 1,
				"message" => "There was an error and the people data couldn't be saved.",
			];

		}

		echo json_encode($result);

	}

	public function updatePeople($id_people)
	{

		$name = $this->input->post('name');

		//=================================================================================================================
		//Variables just for example comment or delete when in production
		$name = "Leo Test";

		//Variables just for example comment or delete when in production
		//=================================================================================================================

		if (empty($this->peoples->getPeople($id_people))) {

			$result = [
				"error" => 1,
				"message" => "There's no data with this id.",
			];

			echo json_encode($result);
			die();
		}



		$data = [
			"name" => $name,
		];

		$result = [
			"error" => 0,
			"message" => "The data was saved with success.",
		];


		if (!$this->peoples->updatePeople($data, $id_people)) {

			$result = [
				"error" => 1,
				"message" => "The data couldn't be saved.",
			];

			echo json_encode($result);
			die();

		}

		echo json_encode($result);

	}

	public function getPeople($id_people)
	{

		//=================================================================================================================
		//Variables just for example comment or delete when in production

		$id_people = 10;

		//=================================================================================================================
		//Variables just for example comment or delete when in production

		$people = $this->peoples->getPeople($id_people);

		if (empty($people)) {

			$result = [
				"error" => 1,
				"message" => "The data couldn't be finded.",
			];

			echo json_encode($result);
			die();

		}


		echo json_encode($people);

	}	

	public function getAllPeople()
	{

		$peoples = $this->peoples->getAllPeople();

		echo json_encode($peoples);

	}	


	public function deletePeople($id_people)
	{


		$result = [
			"error" => 0,
			"message" => "The data was deleted with success.",
		];


		if (!$this->peoples->deletePeople($id_people)) {

			$result = [
				"error" => 1,
				"message" => "The data couldn't be deleted.",
			];

			echo json_encode($result);
			die();

		}

		echo json_encode($result);

	}



	public function saveContacts()
	{

		$id_people = $this->input->post('id_people');

		$contacts = $this->input->post('contacts');

		$result = [
			"error" => 0,
			"message" => "Contacts were saved with success.",
		];


		//=================================================================================================================
		//Variables just for example comment or delete when in production
		$id_people = 10;

		$contacts = [
			[
				"type" => 2,
				"contact" => "(541) 988-1244",
			],
			[
				"type" => 3,
				"contact" => "(541) 154-3215",
			],

		];
		//Variables just for example comment or delete when in production
		//=================================================================================================================

		if (empty($this->peoples->getPeople($id_people))) {

			$result = [
				"error" => 1,
				"message" => "There's no data with this people id.",
			];

			echo json_encode($result);
			die();
		}

		if (!empty($contacts)) {


			foreach ($contacts as $key => $contact) {

				$data_contact = array(
					'id_people' => $id_people,
					'id_type' => $contact["type"],
					'contact' => $contact["contact"],
				);					

				if(!$this->contacts->insertContact($data_contact)){

					$result = [
						"error" => 1,
						"message" => "There was an error and the contact data couldn't be saved.",
					];
					
					echo json_encode($result);
					die();
				}

			}

		}


		echo json_encode($result);

	}



	public function updateContact($id_contact)
	{

		if (empty($this->contacts->getContact($id_contact))) {

			$result = [
				"error" => 1,
				"message" => "There's no data with this id.",
			];

			echo json_encode($result);
			die();
		}

		$contact = $this->input->post('contact');

		//=================================================================================================================
		//Variables just for example comment or delete when in production

		$contact = "(235) 135-2568";

		//Variables just for example comment or delete when in production
		//=================================================================================================================

		$data = [
			"contact" => $contact,
		];

		$result = [
			"error" => 0,
			"message" => "The data was saved with success.",
		];


		if (!$this->contacts->updateContact($data, $id_contact)) {

			$result = [
				"error" => 1,
				"message" => "The data couldn't be saved.",
			];

			echo json_encode($result);
			die();

		}

		echo json_encode($result);

	}

	public function getContact($id_contact)
	{

		$contact = $this->contacts->getContact($id_contact);

		if (empty($contact)) {

			$result = [
				"error" => 1,
				"message" => "The data couldn't be finded.",
			];

			echo json_encode($result);
			die();

		}

		echo json_encode($contact);

	}	

	public function getAllContacts()
	{

		$contacts = $this->contacts->getAllContacts();

		echo json_encode($contacts);

	}	


	public function deleteContact($id_contact)
	{


		$result = [
			"error" => 0,
			"message" => "The data was deleted with success.",
		];


		if (!$this->contacts->deleteContact($id_contact)) {

			$result = [
				"error" => 1,
				"message" => "The data couldn't be deleted.",
			];

			echo json_encode($result);
			die();

		}

		echo json_encode($result);

	}



}
