<?php
/**
 * @package    Core
 * @subpackage KMC
 */
require_once ( "kalturaAction.class.php" );

/**
 * @package    Core
 * @subpackage KMC
 */
class changeSettingAction extends kalturaAction
{
	public function execute() 
	{
		// Disable layout
		$this->setLayout(false);
		
		$this->type = $this->getRequestParameter('type');
		if(!$this->type)
			KExternalErrors::dieError(KExternalErrors::MISSING_PARAMETER, 'type');

		$validTypes = array('name', 'email' ,'password');
		if(! in_array($this->type, $validTypes))
			KExternalErrors::dieError('INVALID_TYPE', 'Invalid setting type');

		$ks = $this->getP ( "kmcks" );
		if(!$ks)
			KExternalErrors::dieError(KExternalErrors::MISSING_PARAMETER, 'ks');

		// Get partner & user info from KS
		$ksObj = kSessionUtils::crackKs($ks);
		$partnerId = $ksObj->partner_id;
		$userId = $ksObj->user;

		// Load the current user
		$dbUser = kuserPeer::getKuserByPartnerAndUid($partnerId, $userId);
	
		if (!$dbUser)
			KExternalErrors::dieError('INVALID_USER_ID', $userId);;

		$this->email = $dbUser->getEmail();
		$this->fname = $dbUser->getFirstName();
		$this->lname = $dbUser->getLastName();	

		// Set page title
		switch($this->type) {
			case 'password': 
				$this->pageTitle = 'Change Password';
				break;

			case 'email':
				$this->pageTitle = 'Change Email Address';
				break;

			case 'name': 
				$this->pageTitle = 'Change Username'; 
				break;
		}

		// select which action to do
		if( isset($_POST['do']) ) {
			
			switch($_POST['do']) {
				
				case "password": 
					$this->changePassword();
					break;
					
				case "email":
					$this->changeEmail();
					break;
					
				case "name": 
					$this->changeName();
					break;
			}	
		}

		sfView::SUCCESS;
	}

	private function changePassword() 
	{

	}

	private function changeEmail()
	{

	}

	private function changeName()
	{

	}
}