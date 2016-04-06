<?php
<<<<<<< HEAD
defined('BASEPATH') or exit ('No direct script access allowed');
=======

defined('BASEPATH') or exit ('No direct script access allowed');

>>>>>>> upstream/master
/**
 * XForm Class
 *
 * @package  XForm
 * @category Controller
 * @author   Eric Beda
 * @link     http://sacids.org
 */
class XmlElement
{
	var $name;
	var $attributes;
	var $content;
	var $children;
}
<<<<<<< HEAD
class Xform extends CI_Controller
{
=======

class Xform extends CI_Controller
{

>>>>>>> upstream/master
	private $form_defn;
	private $form_data;
	private $xml_defn_filename;
	private $xml_data_filename;
	private $table_name;
<<<<<<< HEAD
	public function __construct()
	{
		parent::__construct();
=======

	public function __construct()
	{
		parent::__construct();

>>>>>>> upstream/master
		$this->load->model(array(
			'Xform_model',
			'User_model',
			'Submission_model'
		));
<<<<<<< HEAD
		$this->load->library('form_auth');
		//$this->output->enable_profiler(TRUE);
	}
=======

		$this->load->library('form_auth');

		//$this->output->enable_profiler(TRUE);
	}

>>>>>>> upstream/master
	public function index()
	{
		$this->forms();
	}
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	function forms()
	{
		$data['title'] = $this->lang->line("heading_form_list");
		$data['forms'] = $this->Xform_model->get_form_list($this->session->userdata("user_id"));
<<<<<<< HEAD
=======

>>>>>>> upstream/master
		$this->load->view('header', $data);
		$this->load->view("form/menu");
		$this->load->view("form/index");
		$this->load->view('footer');
	}
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * XML submission function
	 * Author : Renfrid
	 *
	 * @return response
	 */
	public function submission()
	{
		// Form Received in openrosa server
		$http_response_code = 201;
<<<<<<< HEAD
		// Get the digest from the http header
		if (isset($_SERVER ['PHP_AUTH_DIGEST']))
			$digest = $_SERVER ['PHP_AUTH_DIGEST'];
		// server realm and unique id
		$realm = $this->config->item("realm");
		$nonce = md5(uniqid());
=======

		// Get the digest from the http header
		if (isset($_SERVER ['PHP_AUTH_DIGEST']))
			$digest = $_SERVER ['PHP_AUTH_DIGEST'];

		// server realm and unique id
		$realm = $this->config->item("realm");
		$nonce = md5(uniqid());

>>>>>>> upstream/master
		// Check if there was no digest, show login
		if (empty ($digest)) {
			// populate login form if no digest authenticate
			$this->form_auth->require_login_prompt($realm, $nonce);
			log_message('debug', 'exiting, digest was not found');
			exit ();
		}
<<<<<<< HEAD
		// http_digest_parse
		$digest_parts = $this->form_auth->http_digest_parse($digest);
		// username obtained from http digest
		$username = $digest_parts ['username'];
=======

		// http_digest_parse
		$digest_parts = $this->form_auth->http_digest_parse($digest);

		// username obtained from http digest
		$username = $digest_parts ['username'];

>>>>>>> upstream/master
		// get user details from database
		$user = $this->User_model->find_by_username($username);
		$password = $user->digest_password; // digest password
		$db_username = $user->username; // username
<<<<<<< HEAD
=======

>>>>>>> upstream/master
		$uploaded_filename = NULL;
		// show status header if user not available in database
		if (empty ($db_username)) {
			// populate login form if no digest authenticate
			$this->form_auth->require_login_prompt($realm, $nonce);
			log_message('debug', 'username is not available');
			exit ();
		}
<<<<<<< HEAD
=======

>>>>>>> upstream/master
		// Based on all the info we gathered we can figure out what the response should be
		$A1 = $password; // digest password
		$A2 = md5("{$_SERVER['REQUEST_METHOD']}:{$digest_parts['uri']}");
		$calculated_response = md5("{$A1}:{$digest_parts['nonce']}:{$digest_parts['nc']}:{$digest_parts['cnonce']}:{$digest_parts['qop']}:{$A2}");
<<<<<<< HEAD
=======

>>>>>>> upstream/master
		// If digest fails, show login
		if ($digest_parts ['response'] != $calculated_response) {
			// populate login form if no digest authenticate
			$this->form_auth->require_login_prompt($realm, $nonce);
			log_message('debug', 'Digest does not match');
			exit ();
		}
<<<<<<< HEAD
=======

>>>>>>> upstream/master
		// IF passes authentication
		if ($_SERVER ['REQUEST_METHOD'] === "HEAD") {
			$http_response_code = 204;
		} elseif ($_SERVER ['REQUEST_METHOD'] === "POST") {
<<<<<<< HEAD
			foreach ($_FILES as $file) {
				// File details
				$file_name = $file ['name'];
				// check file extension
				$value = explode('.', $file_name);
				$file_extension = end($value);
				$inserted_form_id = NULL;
=======

			foreach ($_FILES as $file) {
				// File details
				$file_name = $file ['name'];

				// check file extension
				$value = explode('.', $file_name);
				$file_extension = end($value);

				$inserted_form_id = NULL;

>>>>>>> upstream/master
				if ($file_extension === 'xml') {
					// path to store xml
					$uploaded_filename = $file_name;
					$path = $this->config->item("form_data_upload_dir") . $file_name;
					// insert form details in database
					$data = array(
						'file_name' => $file_name,
						'user_id' => $user->id
					);
<<<<<<< HEAD
					$inserted_form_id = $this->Submission_model->create($data);
=======

					$inserted_form_id = $this->Submission_model->create($data);

>>>>>>> upstream/master
				} elseif ($file_extension == 'jpg' or $file_extension == 'jpeg' or $file_extension == 'png') {
					// path to store images
					$path = $this->config->item("images_data_upload_dir") . $file_name;
					//TODO Resize image here
<<<<<<< HEAD
				} elseif ($file_extension == '3gpp' or $file_extension == 'amr') {
					// path to store audio
					$path = $this->config->item("audio_data_upload_dir") . $file_name;
=======

				} elseif ($file_extension == '3gpp' or $file_extension == 'amr') {
					// path to store audio
					$path = $this->config->item("audio_data_upload_dir") . $file_name;

>>>>>>> upstream/master
				} elseif ($file_extension == '3gp' or $file_extension == 'mp4') {
					// path to store video
					$path = $this->config->item("video_data_upload_dir") . $file_name;
				}
<<<<<<< HEAD
=======

>>>>>>> upstream/master
				// upload file to the server
				move_uploaded_file($file ['tmp_name'], $path);
			}
			// call function to insert xform data in a database
			if (!$this->_insert($uploaded_filename)) {
				if ($this->Submission_model->delete_submission($inserted_form_id))
					@unlink($path);
			}
		}
<<<<<<< HEAD
		// return response
		$this->get_response($http_response_code);
	}
=======

		// return response
		$this->get_response($http_response_code);
	}

>>>>>>> upstream/master
	/**
	 * inserts xform into database table
	 * Author : Eric Beda
	 *
	 * @param string $filename
	 * @return Mixed
	 */
	public function _insert($filename)
	{
		// call forms
		$this->set_data_file($this->config->item("form_data_upload_dir") . $filename);
		$this->load_xml_data();
<<<<<<< HEAD
		// get mysql statement used to insert form data into corresponding table
		$statement = $this->get_insert_form_data_query();
		// $this->load->model('Xform_model');
=======

		// get mysql statement used to insert form data into corresponding table

		$statement = $this->get_insert_form_data_query();
		// $this->load->model('Xform_model');

>>>>>>> upstream/master
		$result = $this->Xform_model->insert_data($statement);
		log_message('debug', "insert result " . $result);
		return $result;
	}
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * @param $filename
	 */
	public function set_data_file($filename)
	{
		$this->xml_data_filename = $filename;
	}
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * sets form_data variable to an array containing all fields of a filled xform file submitted
	 * Author : Eric Beda
	 */
	private function load_xml_data()
	{
<<<<<<< HEAD
		// get submitted file
		$file_name = $this->get_data_file();
		// load file into a string
		$xml = file_get_contents($file_name);
		// convert string into an object
		$rxml = $this->xml_to_object($xml);
		// array to hold values and field names;
		$this->form_data = array(); // TODO move to constructor
		$this->table_name = str_replace("-", "_", $rxml->attributes ['id']);
=======

		// get submitted file
		$file_name = $this->get_data_file();

		// load file into a string
		$xml = file_get_contents($file_name);

		// convert string into an object
		$rxml = $this->xml_to_object($xml);

		// array to hold values and field names;
		$this->form_data = array(); // TODO move to constructor
		$this->table_name = str_replace("-", "_", $rxml->attributes ['id']);

>>>>>>> upstream/master
		// loop through object
		foreach ($rxml->children as $val) {
			$this->get_path('', $val);
		}
	}
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * @return mixed
	 */
	public function get_data_file()
	{
		return $this->xml_data_filename;
	}
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * @param $xml
	 * @return mixed
	 */
	private function xml_to_object($xml)
	{
		$parser = xml_parser_create();
		xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
		xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
		xml_parse_into_struct($parser, $xml, $tags);
		xml_parser_free($parser);
<<<<<<< HEAD
=======

>>>>>>> upstream/master
		log_message("debug", "Tags => " . json_encode($tags));
		$elements = array(); // the currently filling [child] XmlElement array
		$stack = array();
		foreach ($tags as $tag) {
<<<<<<< HEAD
=======

>>>>>>> upstream/master
			$index = count($elements);
			if ($tag ['type'] == "complete" || $tag ['type'] == "open") {
				$elements [$index] = new XmlElement ();
				$elements [$index]->name = $tag ['tag'];
<<<<<<< HEAD
				if (!empty ($tag ['attributes'])) {
					$elements [$index]->attributes = $tag ['attributes'];
				}
				if (!empty ($tag ['value'])) {
					$elements [$index]->content = $tag ['value'];
				}
=======

				if (!empty ($tag ['attributes'])) {
					$elements [$index]->attributes = $tag ['attributes'];
				}

				if (!empty ($tag ['value'])) {
					$elements [$index]->content = $tag ['value'];
				}

>>>>>>> upstream/master
				if ($tag ['type'] == "open") { // push
					$elements [$index]->children = array();
					$stack [count($stack)] = &$elements;
					$elements = &$elements [$index]->children;
				}
			}
<<<<<<< HEAD
=======

>>>>>>> upstream/master
			if ($tag ['type'] == "close") { // pop
				$elements = &$stack [count($stack) - 1];
				unset ($stack [count($stack) - 1]);
			}
		}
<<<<<<< HEAD
		return $elements [0]; // the single top-level element
	}
=======

		return $elements [0]; // the single top-level element
	}

>>>>>>> upstream/master
	/**
	 * @param string $name
	 * @param object $obj
	 */
	private function get_path($name, $obj)
	{
		$name .= "_" . $obj->name;
		if (is_array($obj->children)) {
			foreach ($obj->children as $val) {
				$this->get_path($name, $val);
			}
		} else {
			$column_name = substr($name, 1);
			//shorten long column names
			if (strlen($column_name) > 64)
				$column_name = shorten_column_name($column_name);
			$this->form_data [$column_name] = $obj->content;
		}
	}
	/**
	 * Recursive function that runs through xml xform object and uses array keys as
	 * absolute path of variable, and sets its value to the data submitted by user
	 * Author : Eric Beda
	 *
	 * @param string $name of xml element
	 * @param object $obj
	 */
<<<<<<< HEAD
	// TO DO : Change function name to be more representative
=======

	// TO DO : Change function name to be more representative

>>>>>>> upstream/master
	/**
	 * Create query string for inserting data into table from submitted xform data
	 * file
	 * Author : Eric Beda
	 *
	 * @return boolean|string
	 */
	private function get_insert_form_data_query()
	{
<<<<<<< HEAD
		$table_name = $this->table_name;
		$form_data = $this->form_data;
		// check to see if there was a point (spatial) field in table definition
		// TODO get_point field assumes there is only one spatial field created
		if ($field_name = $this->Xform_model->get_point_field($table_name)) {
			log_message("debug", "Form data " . json_encode($form_data));
			// spatial field detected
			// extract spatial field components
			// Removed _point because it was appended during table creation, it's part of the form definition
			$field_name = str_replace("_point", "", $field_name);
=======

		$table_name = $this->table_name;
		$form_data = $this->form_data;

		// check to see if there was a point (spatial) field in table definition
		// TODO get_point field assumes there is only one spatial field created
		if ($field_name = $this->Xform_model->get_point_field($table_name)) {

			log_message("debug", "Form data " . json_encode($form_data));
			// spatial field detected
			// extract spatial field components

			// Removed _point because it was appended during table creation, it's part of the form definition
			$field_name = str_replace("_point", "", $field_name);

>>>>>>> upstream/master
			$geopoints = explode(" ", $form_data [$field_name]);
			$lat = $geopoints [0];
			$lon = $geopoints [1];
			$acc = $geopoints [3];
			$alt = $geopoints [2];
			$point = "GeomFromText('POINT($lat $lon)')";
<<<<<<< HEAD
=======

>>>>>>> upstream/master
			// build up query field names for spatial data
			$fn = '`' . $field_name . '_lat`,`';
			$fn .= $field_name . '_lng`,`';
			$fn .= $field_name . '_acc`,`';
			$fn .= $field_name . '_alt`,`';
			$fn .= $field_name . '_point`';
<<<<<<< HEAD
=======

>>>>>>> upstream/master
			// build up query data values for spatial data
			$fd = "'" . $lat . "',";
			$fd .= "'" . $lon . "',";
			$fd .= "'" . $acc . "',";
			$fd .= "'" . $alt . "',";
			$fd .= $point;
		} else {
			log_message("debug", 'error getting point field');
			return FALSE;
		}
<<<<<<< HEAD
		$field_names = "(`" . implode("`,`", array_keys($this->form_data)) . "`,$fn)";
		$field_values = "('" . implode("','", array_values($this->form_data)) . "',$fd)";
		$query = "INSERT INTO {$table_name} {$field_names} VALUES {$field_values}";
		return $query;
	}
=======


		$field_names = "(`" . implode("`,`", array_keys($this->form_data)) . "`,$fn)";
		$field_values = "('" . implode("','", array_values($this->form_data)) . "',$fd)";

		$query = "INSERT INTO {$table_name} {$field_names} VALUES {$field_values}";
		return $query;
	}

>>>>>>> upstream/master
	/**
	 * Header Response
	 *
	 * @param string $http_response_code
	 *            Input string
	 * @return response
	 */
	function get_response($http_response_code)
	{
		// OpenRosa Success Response
		$response = '<OpenRosaResponse xmlns="http://openrosa.org/http/response">
                    <message nature="submit_success">Thanks</message>
                    </OpenRosaResponse>';
<<<<<<< HEAD
=======

>>>>>>> upstream/master
		$content_length = sizeof($response);
		// set header response
		header("X-OpenRosa-Version: 1.0");
		header("X-OpenRosa-Accept-Content-Length:" . $content_length);
		header("Date: " . date('r'), FALSE, $http_response_code);
		echo $response;
	}
<<<<<<< HEAD
	function form_list()
	{
		// Get the digest from the http header
		if (isset($_SERVER['PHP_AUTH_DIGEST']))
			$digest = $_SERVER['PHP_AUTH_DIGEST'];
		//server realm and unique id
		$realm = $this->config->item("realm");
		$nonce = md5(uniqid());
=======

	function form_list()
	{
		// Get the digest from the http header

		if (isset($_SERVER['PHP_AUTH_DIGEST']))
			$digest = $_SERVER['PHP_AUTH_DIGEST'];

		//server realm and unique id
		$realm = $this->config->item("realm");

		$nonce = md5(uniqid());

>>>>>>> upstream/master
		// If there was no digest, show login
		if (empty($digest)) {
			//populate login form if no digest authenticate
			$this->form_auth->require_login_prompt($realm, $nonce);
			exit;
		}
<<<<<<< HEAD
		//http_digest_parse
		$digest_parts = $this->form_auth->http_digest_parse($digest);
		//username from http digest obtained
		$username = $digest_parts['username'];
=======

		//http_digest_parse
		$digest_parts = $this->form_auth->http_digest_parse($digest);

		//username from http digest obtained
		$username = $digest_parts['username'];

>>>>>>> upstream/master
		//get user details from database
		$user = $this->User_model->find_by_username($username);
		$password = $user->digest_password; //digest password
		$db_user = $user->username; //username
<<<<<<< HEAD
=======

>>>>>>> upstream/master
		//show status header if user not available in database
		if (empty($db_user)) {
			//populate login form if no digest authenticate
			$this->form_auth->require_login_prompt($realm, $nonce);
			exit;
		}
<<<<<<< HEAD
=======

>>>>>>> upstream/master
		// Based on all the info we gathered we can figure out what the response should be
		$A1 = $password; //digest password
		$A2 = md5("{$_SERVER['REQUEST_METHOD']}:{$digest_parts['uri']}");
		$valid_response = md5("{$A1}:{$digest_parts['nonce']}:{$digest_parts['nc']}:{$digest_parts['cnonce']}:{$digest_parts['qop']}:{$A2}");
<<<<<<< HEAD
=======

>>>>>>> upstream/master
		// If digest fails, show login
		if ($digest_parts['response'] != $valid_response) {
			//populate login form if no digest authenticate
			$this->form_auth->require_login_prompt($realm, $nonce);
			exit;
		}
<<<<<<< HEAD
		//TODO Add access control here
		$forms = $this->Xform_model->get_form_list();
		$xml = '<xforms xmlns="http://openrosa.org/xforms/xformsList">';
		foreach ($forms as $form) {
			// used to notify if anything has changed with the form, so that it may be updated on download
			$hash = md5($form->form_id . $form->date_created . $form->filename . $form->id . $form->title . $form->last_updated);
=======


		//TODO Add access control here
		$forms = $this->Xform_model->get_form_list();

		$xml = '<xforms xmlns="http://openrosa.org/xforms/xformsList">';

		foreach ($forms as $form) {

			// used to notify if anything has changed with the form, so that it may be updated on download
			$hash = md5($form->form_id . $form->date_created . $form->filename . $form->id . $form->title . $form->last_updated);

>>>>>>> upstream/master
			$xml .= '<xform>';
			$xml .= '<formID>' . $form->form_id . '</formID>';
			$xml .= '<name>' . $form->title . '</name>';
			$xml .= '<version>1.1</version>';
			$xml .= '<hash>md5:' . $hash . '</hash>';
			$xml .= '<descriptionText>' . $form->description . '</descriptionText>';
			$xml .= '<downloadUrl>' . base_url() . 'assets/forms/definition/' . $form->filename . '</downloadUrl>';
			$xml .= '</xform>';
		}
		$xml .= '</xforms>';
<<<<<<< HEAD
		log_message("debug", "Requested forms\n" . $xml);
=======

		log_message("debug", "Requested forms\n" . $xml);

>>>>>>> upstream/master
		$content_length = sizeof($xml);
		//set header response
		header('Content-Type: text/xml; charset=utf-8');
		header('"HTTP_X_OPENROSA_VERSION": "1.0"');
		header("X-OpenRosa-Accept-Content-Length:" . $content_length);
		header('X-OpenRosa-Version:1.0');
		header("Date: " . date('r'), FALSE);
<<<<<<< HEAD
		echo $xml;
	}
=======

		echo $xml;
	}

>>>>>>> upstream/master
	function add_new()
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login', 'refresh');
		}
<<<<<<< HEAD
		$data['title'] = $this->lang->line("heading_add_new_form");
		$this->form_validation->set_rules("title", $this->lang->line("validation_label_form_title"), "required|is_unique[xforms.title]");
		$this->form_validation->set_rules("access", $this->lang->line("validation_label_form_access"), "required");
=======

		$data['title'] = $this->lang->line("heading_add_new_form");

		$this->form_validation->set_rules("title", $this->lang->line("validation_label_form_title"), "required|is_unique[xforms.title]");
		$this->form_validation->set_rules("access", $this->lang->line("validation_label_form_access"), "required");

>>>>>>> upstream/master
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('header', $data);
			$this->load->view("form/menu");
			$this->load->view("form/add_new");
			$this->load->view('footer');
		} else {
<<<<<<< HEAD
			$form_definition_upload_dir = $this->config->item("form_definition_upload_dir");
			if (!empty($_FILES['userfile']['name'])) {
=======

			$form_definition_upload_dir = $this->config->item("form_definition_upload_dir");

			if (!empty($_FILES['userfile']['name'])) {


>>>>>>> upstream/master
				$config['upload_path'] = $form_definition_upload_dir;
				$config['allowed_types'] = 'xml';
				$config['max_size'] = '1024';
				$config['remove_spaces'] = TRUE;
<<<<<<< HEAD
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
=======

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

>>>>>>> upstream/master
				if (!$this->upload->do_upload("userfile")) {
					$this->session->set_flashdata("message", "<div class='warning'>" . $this->upload->display_errors("", "") . "</div>");
					redirect("xform/add_new");
				} else {
					$xml_data = $this->upload->data();
					$filename = $xml_data['file_name'];
<<<<<<< HEAD
					//TODO Check if file already exist and prompt user.
=======

					//TODO Check if file already exist and prompt user.

>>>>>>> upstream/master
					$form_details = array(
						"user_id" => $this->session->userdata("user_id"),
						"title" => $this->input->post("title"),
						"description" => $this->input->post("description"),
						"filename" => $filename,
						"date_created" => date("c"),
						"access" => $this->input->post("access")
					);
<<<<<<< HEAD
=======

>>>>>>> upstream/master
					$this->db->trans_start();
					//get last insert id
					$xform_id = $this->Xform_model->create_xform($form_details);
					//TODO Check if form is built from ODK Aggregate Build to avoid errors during initialization
					$this->_initialize($filename); // create form table.
					//TODO perform error checking,
					//set form_id to current table_name variable
					$this->Xform_model->update_form_id($xform_id, $this->table_name);
					log_message("debug", "Xform_id=" . $xform_id . " ODK BuildFormId=" . $this->table_name);
					$this->db->trans_complete();
<<<<<<< HEAD
=======

>>>>>>> upstream/master
					if ($this->db->trans_status()) {
						$this->session->set_flashdata("message", $this->lang->line("form_upload_successful"));
					} else {
						$this->session->set_flashdata("message", $this->lang->line("form_upload_failed"));
					}
					redirect("xform/add_new");
				}
<<<<<<< HEAD
=======

>>>>>>> upstream/master
			} else {
				$this->session->set_flashdata("message", $this->lang->line("form_saving_failed"));
				redirect("xform/add_new");
			}
		}
	}
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * Creates appropriate tables from an xform definition file
	 * Author : Eric Beda
	 *
	 * @param string $file_name
	 *            definition file
	 * @return bool
	 */
	public function _initialize($file_name)
	{
		log_message("debug", "File to load " . $file_name);
		// create table structure
		$this->set_defn_file($this->config->item("form_definition_upload_dir") . $file_name);
		$this->load_xml_definition();
<<<<<<< HEAD
		// TODO: change function name to get_something suggested get_form_table_definition
		$statement = $this->get_create_table_sql_query();
		$result = $this->Xform_model->create_table($statement);
=======

		// TODO: change function name to get_something suggested get_form_table_definition
		$statement = $this->get_create_table_sql_query();

		$result = $this->Xform_model->create_table($statement);

>>>>>>> upstream/master
		// return result TRUE on success
		log_message("debug", "Create table result " . $result);
		return $result;
	}
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * @param $filename
	 */
	public function set_defn_file($filename)
	{
		$this->xml_defn_filename = $filename;
	}
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * Create an array representative of xform definition file for easy transversing
	 * Author : Eric Beda
	 */
	private function load_xml_definition()
	{
		$file_name = $this->get_defn_file();
		$xml = file_get_contents($file_name);
		$rxml = $this->xml_to_object($xml);
<<<<<<< HEAD
		// TODO reference by names instead of integer keys
		$instance = $rxml->children [0]->children [1]->children [0]->children [0];
		$table_name = str_replace("-", "_", $instance->attributes ['id']);
		// get array rep of xform
		$this->form_defn = $this->get_form_definition();
		log_message("debug", "Table name " . $table_name);
		$this->table_name = $table_name;
	}
=======

		// TODO reference by names instead of integer keys
		$instance = $rxml->children [0]->children [1]->children [0]->children [0];

		$table_name = str_replace("-", "_", $instance->attributes ['id']);

		// get array rep of xform
		$this->form_defn = $this->get_form_definition();

		log_message("debug", "Table name " . $table_name);
		$this->table_name = $table_name;
	}

>>>>>>> upstream/master
	/**
	 * @return mixed
	 */
	public function get_defn_file()
	{
		return $this->xml_defn_filename;
	}
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * Return a double array containing field path as key and a value containing
	 * array filled with its corresponding attributes
	 * Author : Eric Beda
	 *
	 * @return array
	 */
	private function get_form_definition()
	{
<<<<<<< HEAD
		// retrieve object describing definition file
		$rxml = $this->xml_to_object(file_get_contents($this->get_defn_file()));
		// get the binds compononent of xform
		$binds = $rxml->children [0]->children [1]->children;
		// get the body section of xform
		$tmp2 = $rxml->children [0]->children [1]->children [1]->children [0]->children;
		// container
		$xarray = array();
		foreach ($binds as $key => $val) {
			if ($val->name == 'bind') {
				$attributes = $val->attributes;
				$nodeset = $attributes ['nodeset'];
				$xarray [$nodeset] = array();
				$xarray [$nodeset] ['field_name'] = str_replace("/", "_", substr($nodeset, 6));
				// set each attribute key and corresponding value
				foreach ($attributes as $k2 => $v2) {
=======

		// retrieve object describing definition file
		$rxml = $this->xml_to_object(file_get_contents($this->get_defn_file()));

		// get the binds compononent of xform
		$binds = $rxml->children [0]->children [1]->children;

		// get the body section of xform
		$tmp2 = $rxml->children [0]->children [1]->children [1]->children [0]->children;

		// container
		$xarray = array();

		foreach ($binds as $key => $val) {

			if ($val->name == 'bind') {

				$attributes = $val->attributes;
				$nodeset = $attributes ['nodeset'];

				$xarray [$nodeset] = array();
				$xarray [$nodeset] ['field_name'] = str_replace("/", "_", substr($nodeset, 6));

				// set each attribute key and corresponding value
				foreach ($attributes as $k2 => $v2) {

>>>>>>> upstream/master
					$xarray [$nodeset] [$k2] = $v2;
				}
			}
		}
<<<<<<< HEAD
		foreach ($tmp2 as $val) {
=======

		foreach ($tmp2 as $val) {

>>>>>>> upstream/master
			$att = $val->attributes ['id'];
			$id = explode(":", $att);
			$nodeset = $id [0];
			$label = $id [1];
			$detail = $val->children [0]->content;
<<<<<<< HEAD
=======

>>>>>>> upstream/master
			// if its an option for select/select1
			if (substr($label, 0, 6) == 'option') {
				$xarray [$nodeset] ['option'] [substr($label, 6)] = $detail;
			} else {
				$xarray [$nodeset] [$label] = $detail;
			}
		}
		return $xarray;
	}
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	/**
	 * creates query corresponding to mysql table structure of an xform definition file
	 * Author : Eric Beda
	 *
	 * @return string statement for creating table structure of xform
	 */
	private function get_create_table_sql_query()
	{
		$structure = $this->form_defn;
		$tbl_name = $this->table_name;
<<<<<<< HEAD
		// initiate statement, set id as primary key, autoincrement
		$statement = "CREATE TABLE $tbl_name ( id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY ";
		// loop through xform definition array
		foreach ($structure as $key => $val) {
			// check if type is empty
			if (empty ($val ['type']))
				continue;
			$type = $val ['type'];
			$field_name = $val ['field_name'];
			//TODO Call helper function here to shorten column name
			if (strlen($field_name) > 64)
				$field_name = shorten_column_name($field_name);
=======

		// initiate statement, set id as primary key, autoincrement
		$statement = "CREATE TABLE $tbl_name ( id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY ";

		// loop through xform definition array
		foreach ($structure as $key => $val) {

			// check if type is empty
			if (empty ($val ['type']))
				continue;

			$type = $val ['type'];

			$field_name = $val ['field_name'];

			//TODO Call helper function here to shorten column name
			if (strlen($field_name) > 64)
				$field_name = shorten_column_name($field_name);

>>>>>>> upstream/master
			// check if field is required
			if (!empty ($val ['required'])) {
				$required = 'NOT NULL';
			} else {
				$required = '';
			}
<<<<<<< HEAD
			if ($type == 'string' || $type == 'binary') {
				$statement .= ", $field_name VARCHAR(300) $required";
			}
=======

			if ($type == 'string' || $type == 'binary') {
				$statement .= ", $field_name VARCHAR(300) $required";
			}

>>>>>>> upstream/master
			if ($type == 'select1') {
				// Mysql recommended way of handling single quotes for queries is by using two single quotes at once.
				$statement .= ", $field_name ENUM('" . implode("','", str_replace("'", "''", $val ['option'])) . "') $required";
			}
<<<<<<< HEAD
			if ($type == 'select' || $type == 'text') {
				$statement .= ", $field_name TEXT $required ";
			}
			if ($type == 'date') {
				$statement .= ", $field_name DATE $required ";
			}
			if ($type == 'int') {
				$statement .= ", $field_name INT(20) $required ";
			}
			if ($type == 'geopoint') {
=======

			if ($type == 'select' || $type == 'text') {
				$statement .= ", $field_name TEXT $required ";
			}

			if ($type == 'date') {
				$statement .= ", $field_name DATE $required ";
			}

			if ($type == 'int') {
				$statement .= ", $field_name INT(20) $required ";
			}

			if ($type == 'geopoint') {

>>>>>>> upstream/master
				$statement .= "," . $field_name . " VARCHAR(150) $required ";
				$statement .= "," . $field_name . "_point POINT $required ";
				$statement .= "," . $field_name . "_lat DECIMAL(38,10) $required ";
				$statement .= "," . $field_name . "_lng DECIMAL(38,10) $required ";
				$statement .= "," . $field_name . "_acc DECIMAL(38,10) $required ";
				$statement .= "," . $field_name . "_alt DECIMAL(38,10) $required ";
			}
<<<<<<< HEAD
			$statement .= "\n";
		}
		$statement .= ")";
		return $statement;
	}
	function edit_form($xform_id)
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login', 'refresh');
		}
=======

			$statement .= "\n";
		}

		$statement .= ")";

		return $statement;
	}


	function edit_form($xform_id)
	{

		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login', 'refresh');
		}

>>>>>>> upstream/master
		if (!$xform_id) {
			$this->session->set_flashdata("message", $this->lang->line("select_form_to_edit"));
			redirect("xform/forms");
			exit;
		}
<<<<<<< HEAD
		$data['title'] = $this->lang->line("heading_edit_form");
		$data['form'] = $form = $this->Xform_model->find_by_id($xform_id);
		$this->form_validation->set_rules("title", $this->lang->line("validation_label_form_title"), "required");
		$this->form_validation->set_rules("access", $this->lang->line("validation_label_form_access"), "required");
		if ($this->form_validation->run() === FALSE) {
=======

		$data['title'] = $this->lang->line("heading_edit_form");
		$data['form'] = $form = $this->Xform_model->find_by_id($xform_id);

		$this->form_validation->set_rules("title", $this->lang->line("validation_label_form_title"), "required");
		$this->form_validation->set_rules("access", $this->lang->line("validation_label_form_access"), "required");

		if ($this->form_validation->run() === FALSE) {

>>>>>>> upstream/master
			$this->load->view('header', $data);
			$this->load->view("form/menu");
			$this->load->view("form/edit_form");
			$this->load->view('footer');
<<<<<<< HEAD
		} else {
=======

		} else {

>>>>>>> upstream/master
			if ($form) {
				$new_form_details = array(
					"title" => $this->input->post("title"),
					"description" => $this->input->post("description"),
					"access" => $this->input->post("access"),
					"last_updated" => date("c")
				);
<<<<<<< HEAD
=======

>>>>>>> upstream/master
				if ($this->Xform_model->update_form($xform_id, $new_form_details)) {
					$this->session->set_flashdata("message", $this->lang->line("form_update_successful"));
				} else {
					$this->session->set_flashdata("message", $this->lang->line("form_update_failed"));
				}
				redirect("xform/forms");
<<<<<<< HEAD
=======

>>>>>>> upstream/master
			} else {
				$this->session->set_flashdata("message", $this->lang->line("unknown_error_occurred"));
				redirect("xform/forms");
			}
		}
	}
<<<<<<< HEAD
=======

>>>>>>> upstream/master
	function delete_xform($xform_id)
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login', 'refresh');
		}
<<<<<<< HEAD
=======

>>>>>>> upstream/master
		if (!$xform_id) {
			$this->session->set_flashdata("message", $this->lang->line("select_form_to_delete"));
			redirect("xform/forms");
			exit;
		}
<<<<<<< HEAD
=======

>>>>>>> upstream/master
		$xform = $this->Xform_model->find_by_id($xform_id);
		$archive_xform_data = (array)$xform;
		$archive_xform_data['filename'] = time() . "_" . $xform->filename; //appended timestamp to avoid overriding existing files
		$archive_xform_data['last_updated'] = date("c"); //todo time form deleted
<<<<<<< HEAD
=======

>>>>>>> upstream/master
		$this->db->trans_start();
		$this->Xform_model->create_archive($archive_xform_data);
		$this->Xform_model->delete_form($xform_id);
		$this->db->trans_complete();
<<<<<<< HEAD
		if ($this->db->trans_status()) {
			$file_to_move = $this->config->item("form_definition_upload_dir") . $xform->filename;
			$file_destination = $this->config->item("form_definition_archive_dir") . $archive_xform_data['filename'];
			if (file_exists($file_to_move)) {
=======

		if ($this->db->trans_status()) {

			$file_to_move = $this->config->item("form_definition_upload_dir") . $xform->filename;
			$file_destination = $this->config->item("form_definition_archive_dir") . $archive_xform_data['filename'];

			if (file_exists($file_to_move)) {

>>>>>>> upstream/master
				if (rename($file_to_move, $file_destination))
					log_message("debug", "Move form definition file " . $xform->filename . " to " . $file_destination);
				else
					log_message("debug", "Failed to move form definition file " . $xform->filename);
			}
<<<<<<< HEAD
=======

>>>>>>> upstream/master
			$this->session->set_flashdata("message", $this->lang->line("form_delete_successful"));
		} else {
			$this->session->set_flashdata("message", $this->lang->line("error_failed_to_delete_form"));
		}
		redirect("xform/forms");
	}
<<<<<<< HEAD
	function form_data($form_id)
	{
=======

	function form_data($form_id)
	{

>>>>>>> upstream/master
		if (!$form_id) {
			$this->session->set_flashdata("message", $this->lang->line("select_form_to_delete"));
			redirect("xform/forms");
			exit;
		}
<<<<<<< HEAD
		$form = $this->Xform_model->find_by_id($form_id);
=======

		$form = $this->Xform_model->find_by_id($form_id);

>>>>>>> upstream/master
		if ($form) {
			// check if form_id ~ form data table is not empty or null
			$data['title'] = $form->title . " form";
			$data['table_fields'] = $this->Xform_model->find_table_columns($form->form_id);
			$data['form_data'] = $this->Xform_model->find_form_data($form->form_id);
<<<<<<< HEAD
=======

>>>>>>> upstream/master
			$this->load->view('header', $data);
			$this->load->view("form/menu");
			$this->load->view("form/form_data_details");
			$this->load->view('footer');
<<<<<<< HEAD
		} else {
			// form does not exist
		}
	}
=======

		} else {
			// form does not exist
		}

	}
}
>>>>>>> upstream/master
