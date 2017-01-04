# Using JIRA REST API to create/update/delete issues in Jira using Codeigniter Framework.

Muhammad Khalid Wazir, Software Engineer, Virtual Force Pvt. Ltd.

Recently I had to work on an integration between our system and Jira. The original idea was to enable all sorts of integration which was not less than ideal. However as usual the reality was different from what we idalized. 

There were some areas where Jira API wouldnt support dynamic creation of the fields. On the other hand there were some custom datatypes in Jira that would not exactly map on our system. 

In this writeup, I will highlight the challenges we faced and show how to Connect to Jira  to Create / Update / Delete issues using their REST API in PHP.

# Things needed
 
You need a valid Jira Account in order to use REST API functionalities. You can create a trial account which lasts for 15 days or use your subscribed account. For the purpose of this demo, I will use a trial account.
   
# Getting started

Clone/Download and run the application in your local server

http://localhost/jira-php-rest/index.php/JiraRest/

## Understanding the Code
The file application\controllers\JiraRest.php contains high level functions to 
* Create a Bug (see function createJiraBug)
* Update a Bug (see function updateJiraBug)
* Delete a Bug (see function deleteJiraBug)

## Challenges - What you can not do using Jira API
* You can not create Custom Dropdowns using the API
* You can not add/remove an option in the drop downs using API
* You ca not assign custom fields to screens automatically, that needs to be done by the user through Jira UI (settings/customization section)