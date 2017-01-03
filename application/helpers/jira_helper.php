<?php
require_once('class.RestRequest.php');
class Jira {
	protected $project;
	protected $host;
	function __construct($config){
		$this->request = new RestRequest;
		$this->request->username = $config['username'];
		$this->request->password = $config['password'];
		$this->host = $config['host'];
	}
//-----------------------------------------------------------------------------------------------------------	
	public function createIssue($json){
		$this->request->openConnect('https://'.$this->host.'/rest/api/2/issue/', 'POST', ($json));
		$this->request->execute();  
        return $this->request;
	}
//-----------------------------------------------------------------------------------------------------------	
	public function updateIssue($json, $issueKey){
		$this->request->openConnect('https://'.$this->host.'/rest/api/2/issue/'.$issueKey, 'PUT', $json);
		$this->request->execute();  
        return $this->request;
	}
//----------------------------------------------------------------------------------------------------------- 
    public function getIssue($issueKey){
		$this->request->openConnect('https://'.$this->host.'/rest/api/2/issue/'.$issueKey);
		$this->request->execute();  
        return $this->request;
	}
//-----------------------------------------------------------------------------------------------------------
    public function deleteIssue($issueKey){
		$this->request->openConnect('https://'.$this->host.'/rest/api/2/issue/'.$issueKey ,"DELETE" );
		$this->request->execute();  
        return $this->request;
	}
//-----------------------------------------------------------------------------------------------------------
}       