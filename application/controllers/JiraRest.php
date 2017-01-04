<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class JiraRest extends CI_Controller {
//-------------------------------------------------------------------------------------------------
  public function index() {
	  	echo "for creating issue use this method :createJiraBug <br />for Updating issue use this method :updateJiraBug <br /> for Deleting issue use this method :deleteJiraBug <br /> ";exit;
  }
  //-------------------------------------------------------------------------------------------------
/*This method will create issue in jira*/  
	public function createJiraBug() {
		ini_set('error_reporting', E_STRICT);
		$config = array();
		$this->load->helper('jira_helper');
		$config['username'] = 'jirausername';
		$config['password'] = 'jirapassword';
		$config['port'] = 443;
		$config['host'] = 'jirahosturl';
		$newbug = new Jira($config);
		$data = (object)array();
		$data->fields->project->key = "WRIT";
        $data->fields->issuetype->name = 'Bug';
		$data->fields->summary = trim("Lorem Ipsum is simply dummy text of the printing and typesetting industry type specimen book. It has survived not only");
		$newbug = new Jira($config);
		$result = (array) $newbug->createIssue($data);
		echo '<pre>' . print_r($result, true) . '</pre>';exit;
    }
//-------------------------------------------------------------------------------------------------	
/*This method will update issue in jira*/  
	public function updateJiraBug() {
		ini_set('error_reporting', E_STRICT);
		$config = array();
		$this->load->helper('jira_helper');
		$config['username'] = 'jirausername';
		$config['password'] = 'jirapassword';
		$config['port'] = 443;
		$config['host'] = 'jirahosturl';
		$newbug = new Jira($config);
		/*get jira Issues description*/
	 	$issuKey = trim('jiraissuekey'); /*issue key from jira*/
		$getIssue = (array)$newbug->getIssue($issuKey);
		$count = 1;
					foreach ($getIssue as $test){
						if ($count == 8){
							$responseBodyGetIssue = json_decode($test);
						}
						$count++;
					}

		/*Print Issue Summary*/
		$responseBodyGetIssue->fields->summary;
		$data = (object)array();
		$data->fields->project->key = "jiraprojectkey";
        $data->fields->issuetype->name = 'Bug';
		$data->fields->summary = trim("dummy text of the printing and typesetting industry type specimen book. It has survived not only");
		$result = (array) $newbug->updateIssue($data,$issuKey);
		echo '<pre>' . print_r($result, true) . '</pre>';exit;
    }
//-------------------------------------------------------------------------------------------------
/*This method will delete issue in jira*/  
	public function deleteJiraBug() {
		ini_set('error_reporting', E_STRICT);
		$config = array();
		$this->load->helper('jira_helper');
		$config['username'] = 'jirausername';
		$config['password'] = 'jirapassword';
		$config['port'] = 443;
		$config['host'] = 'jirahosturl';
		$newbug = new Jira($config);
		/*get jira Issues description*/
	 	$issuKey = trim('jiraissuekey'); /*issue key from jira*/
		$result = (array) $newbug->deleteIssue($issuKey);
		echo '<pre>' . print_r($result, true) . '</pre>';exit;
}
//-------------------------------------------------------------------------------------------------	
}