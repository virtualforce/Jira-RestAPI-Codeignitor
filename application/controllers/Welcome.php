<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }
    public function index() {
        $this->load->view('welcome_message');
	}
	/*create Jira Bug Starts*/
	public function createJiraBug() {

		$this->load->plugin('jira');
		
		$data->fields->project->key = $projectKey;
		$data->fields->summary = trim($bugData['description']);
		$data->fields->priority->id = $priority;
		$resolution->transition->id = "21";
		
		$newbug = new Jira($config);
		$result = (array) $newbug->createIssue($data);

    }
	/*create Jira Bug Ends*/

	
}