<?php 
/**
 * @package Admin
 * @subpackage Partners
 */
class Form_PartnerConfiguration extends Infra_Form
{    
	const GROUP_ENABLE_DISABLE_FEATURES = 'GROUP_ENABLE_DISABLE_FEATURES';
    const GROUP_CONTENT_INGESTION_OPTIONS = 'GROUP_CONTENT_INGESTION_OPTIONS';
    const GROUP_PUBLISHER_DELIVERY_SETTINGS = 'GROUP_PUBLISHER_DELIVERY_SETTINGS';
    const GROUP_REMOTE_STORAGE = 'GROUP_REMOTE_STORAGE';
    const GROUP_NOTIFICATION_CONFIG = 'GROUP_NOTIFICATION_CONFIG';
   	
    protected $limitSubForms = array();
    
	public function init()
	{
		$permissionNames = array();
		$permissionNames[self::GROUP_ENABLE_DISABLE_FEATURES] = array();
		$permissionNames[self::GROUP_CONTENT_INGESTION_OPTIONS] = array();
		$permissionNames[self::GROUP_PUBLISHER_DELIVERY_SETTINGS] = array();
		$permissionNames[self::GROUP_REMOTE_STORAGE] = array();
		$permissionNames[self::GROUP_NOTIFICATION_CONFIG] = array();
		// Set the method for the display form to POST
		$this->setMethod('post');
		$this->setAttrib('id', 'frmPartnerConfigure');

		//$this->setDescription('partner-configure intro text');
		$this->loadDefaultDecorators();
		$this->addDecorator('Description', array('placement' => 'prepend'));	
		
//		$this->addElement('text', 'account_name', array(
//			'label' => 'Publisher Name:',
//			'decorators' 	=> array('Label', 'Description')
//		));
//--------------------------- General Information ---------------------------			
		$this->addElement('text', 'partner_name', array(
			'label'			=> 'partner-configure Publisher Name',
			'filters'		=> array('StringTrim'),
			'required' 		=> true,
		));
				
		$this->addElement('text', 'description', array(
			'label'			=> 'partner-configure Description',
			'filters'		=> array('StringTrim'),
		));
			
		// change to read only
		$this->addElement('text', 'admin_name', array(
			'label'			=> 'partner-configure Administrator Name',
			'filters'		=> array('StringTrim'),
			'readonly'		=> true,
		));	
		
		// change to read only		 
		$this->addElement('text', 'admin_email', array(
			'label'			=> 'Administrator E-Mail:',
			'filters'		=> array('StringTrim'),
			'readonly'		=> true,
			'ignore' 		=> true,
		));
		
		$this->addElement('text', 'id', array(
			'label'			=> 'Partner ID:',
			'filters'		=> array('StringTrim'),
			'readonly'		=> true,
			'ignore' 		=> true,
		));
		
		$this->addElement('text', 'kmc_version', array(
			'label'			=> 'KMC Release Version:',
			'filters'		=> array('StringTrim'),
			'readonly'		=> true,
			'ignore' 		=> true,
		));
						
//--------------------------- Publisher specific Delivery Settings ---------------------------		 
		$this->addElement('checkbox', 'checkbox_host', array(
			'decorators' => array('ViewHelper', array('Label', array('placement' => 'append')), array('HtmlTag',  array('tag' => 'dt', 'class' => 'partner_configuration_checkbox_field'))),
		));
		
		$this->addElement('text', 'host', array(
			'label'			=> 'Service Host Name:',
			'filters'		=> array('StringTrim'),
		));
		
		$this->addElement('checkbox', 'checkbox_cdn_host', array(
			'decorators' => array('ViewHelper', array('Label', array('placement' => 'append')), array('HtmlTag',  array('tag' => 'dt', 'class' => 'partner_configuration_checkbox_field')))
		));
		
		$this->addElement('text', 'cdn_host', array(
			'label'			=> 'CDN HTTP Delivery URL:',
			'filters'		=> array('StringTrim'),
		));
		
		$this->addElement('checkbox', 'checkbox_rtmp_url', array(
			'decorators' => array('ViewHelper', array('Label', array('placement' => 'append')), array('HtmlTag',  array('tag' => 'dt', 'class' => 'partner_configuration_checkbox_field')))
		));
		
		$this->addElement('text', 'rtmp_url', array(
			'label'			=> 'RTMP Delivery URL:',
			'filters'		=> array('StringTrim'),
		));
		
		$this->addElement('checkbox', 'checkbox_thumbnail_host', array(
			'decorators' => array('ViewHelper', array('Label', array('placement' => 'append')), array('HtmlTag',  array('tag' => 'dt', 'class' => 'partner_configuration_checkbox_field')))
		));
		
		$this->addElement('text', 'thumbnail_host', array(
			'label'			=> 'Thumbnail Delivery URL:',
			'filters'		=> array('StringTrim'),
		));
		
		$this->addElement('checkbox', 'checkbox_delivery_restrictions', array(
			'decorators' => array('ViewHelper', array('Label', array('placement' => 'append')), array('HtmlTag',  array('tag' => 'dt', 'class' => 'partner_configuration_checkbox_field')))
		));
		
		$this->addElement('text', 'delivery_restrictions', array(
			'label'			=> 'Delivery Restrictions:',
			'filters'		=> array('StringTrim'),
		));
		
		$this->addElement('checkbox', 'restrict_thumbnail_by_ks', array(
			'label'	  => 'Apply access control rule on thumbnail',
			'decorators' => array('ViewHelper', array('Label', array('placement' => 'append')), array('HtmlTag',  array('tag' => 'dt', 'class' => 'live_stream_enabled')))
		));		
		
		$permissionNames[self::GROUP_PUBLISHER_DELIVERY_SETTINGS]['Apply access control rule on thumbnail'] = 'restrict_thumbnail_by_ks';
				

//--------------------------- Remote Storage Account policy ---------------------------				
		$storageServP = new Kaltura_Form_Element_EnumSelect('storage_serve_priority', array('enum' => 'Kaltura_Client_Enum_StorageServePriority'));
		$storageServP->setLabel('Delivery Policy:');
		$this->addElements(array($storageServP));	
		
		$this->addElement('checkbox', 'storage_delete_from_kaltura', array(
			'label'	  => 'Delete exported storage from Kaltura',
			'decorators' => array('ViewHelper', array('Label', array('placement' => 'append')), array('HtmlTag',  array('tag' => 'dt', 'class' => 'partner_configuration_checkbox_field')))
		));
				
		$this->addElement('checkbox', 'import_remote_source_for_convert', array(
			'label'	  => 'Import remote source for convert',
			'decorators' => array('ViewHelper', array('Label', array('placement' => 'append')), array('HtmlTag',  array('tag' => 'dt', 'class' => 'partner_configuration_checkbox_field')))
		));
	
//--------------------------- Advanced Notification settings ---------------------------		
		$this->addElement('text', 'notifications_config', array(
			'label'			=> 'Notification Configuration:',
			'filters'		=> array('StringTrim'),
		));
			
		$this->addElement('checkbox', 'allow_multi_notification', array(
			'label'	  => 'Allow multi-notifications',
			'decorators' => array('ViewHelper', array('Label', array('placement' => 'append')), array('HtmlTag',  array('tag' => 'dt', 'class' => 'partner_configuration_checkbox_field_only')))
		));	
//--------------------------- Content Ingestion Options ---------------------------	
		$this->addElement('text', 'def_thumb_offset', array(
			'label'	  => 'Default Thumbnail Offset',
		));	

		$this->addElement('text', 'def_thumb_density', array(
			'label'	  => 'Default Thumbnail Density',
		));	

		$this->addElement('checkbox', 'enable_bulk_upload_notifications_emails', array(
			'label'	  => 'Bulk Upload Notifications Emails',
			'decorators' => array('ViewHelper', array('Label', array('placement' => 'append')), array('HtmlTag',  array('tag' => 'dt', 'class' => 'partner_configuration_checkbox_field')))
		));
		
		$this->addElement('text', 'bulk_upload_notifications_email', array(
			'label'	  => 'Bulk Upload Notifications Email',
		));
			
//--------------------------- Password Security ---------------------------			
		
		$this->addElement('text', 'login_block_period', array(
			'label'			=> 'Login Block Period (seconds):',
			'filters'		=> array('StringTrim'),
		));
		
		$this->addElement('text', 'num_prev_pass_to_keep', array(
			'label'			=> 'Number of recent passwords kept:',
			'filters'		=> array('StringTrim'),
		));
		
		$this->addElement('text', 'pass_replace_freq', array(
			'label'			=> 'Password replacement frequency (seconds):',
			'filters'		=> array('StringTrim'),
		));				
//--------------------------- Single Sign On ---------------------------			
		
		$this->addElement('text', 'logout_url', array(
			'label'			=> 'Logout Url:',
			'filters'		=> array('StringTrim'),
		));
//--------------------------- Group Association ---------------------------			
		$partnerGroupTypes = new Kaltura_Form_Element_EnumSelect('partner_group_type', array('enum' => 'Kaltura_Client_Enum_PartnerGroupType'));
		$partnerGroupTypes->setLabel('Account Type:');
		$this->addElements(array($partnerGroupTypes));
		
		$this->addElement ('text','partner_parent_id', array(
			'label'			=> 'Parent Account Id:',
			'filters'		=> array('StringTrim'),
		));
//--------------------------- Service Packages ---------------------------		
		$this->addElement('select', 'partner_package', array(		
			'label'			=> 'Service Edition Type:',
			'filters'		=> array('StringTrim'),
			'onChange'		=> 'openChangeServicePackageAlertBox()',
		));
		
		$this->addElement('select', 'partner_package_class_of_service', array(		
			'label'			=> 'Class of Service:',
			'filters'		=> array('StringTrim'),
		));
		
		$this->addElement('select', 'vertical_clasiffication', array(		
			'label'			=> 'Vertical Clasiffication:',
			'filters'		=> array('StringTrim'),
		));
		
		$this->addElement('text', 'crm_id', array(
			'label'			=> 'CRM ID:',
			'filters'		=> array('StringTrim'),
		));
		
		$this->addElement('text', 'crm_link', array(
			'label'			=> 'Link to CRM record:',
			'filters'		=> array('StringTrim'),
		));
		
		$this->addElement('checkbox', 'internal_use', array(
			'label'	  => 'Internal Use Account',
			'decorators' => array('ViewHelper', array('Label', array('placement' => 'append')), array('HtmlTag',  array('tag' => 'dt', 'class' => 'partner_configuration_checkbox_field_only')))
		));	
		
//--------------------------- New Account Options ---------------------------			
												
		$this->addElement('checkbox', 'extended_free_trail', array(
			'label'	  => 'Extended Free Trial',
			'decorators' => array('ViewHelper', array('Label', array('placement' => 'append')), array('HtmlTag',  array('tag' => 'dt', 'class' => 'partner_configuration_checkbox_field')))
		));
		
		$this->addElement('text', 'extended_free_trail_expiry_date', array(
			'label'		=> 'Free Trial Extension Expiry Date:',
		));
		
		$this->addElement('text', 'extended_free_trail_expiry_reason', array(
			'label'		=> 'Free Trial Extension Expiry Reason:',
		));
		
		$this->addElement('button', 'monitor_usage_history', array(
			'label'	  => 'View History',
			
			//'decorators' => array('ViewHelper', array('Label', array('placement' => 'append')), array('HtmlTag',  array('class' => 'partner_configuration_checkbox_field')))
		));	
		
		
		$this->addElement('checkbox', 'is_first_login', array(
			'label'	  => 'Force First Login Message in KMC',
			'decorators' => array('ViewHelper', array('Label', array('placement' => 'append')), array('HtmlTag',  array('class' => 'partner_configuration_checkbox_field_only')))
		));
				

//--------------------------- Included Usage ---------------------------	
		$element = new Zend_Form_Element_Hidden('includedUsageLabel');
		$element->setLabel('For reporting purposes only. Leave empty for unlimited usage or when not applicable');
		$element->setDecorators(array('ViewHelper', array('Label', array('placement' => 'append')), array('HtmlTag',  array('tag' => 'dt', 'class' => 'partnerConfigurationDescription'))));	
		$this->addElements(array($element));
		
		
		$this->addElement('radio', 'mothly_bandwidth_combined', array(
			'label'	  => 'Mothly Bandwidth:',
			'multiOptions' => array(
					        '1'=>'Combined Usage:', 
					        '2'=>'Separated Usage:'),
					        
			'decorators' => array('ViewHelper', array('HtmlTag',  array('tag' => 'dt', 'id' => 'mothly_bandwidth_combined')))
		));
 	
		
	//--------------- Live Stream Params ----------------------------
		$sourceTypes = array(Kaltura_Client_Enum_SourceType::AKAMAI_LIVE => 'Akamai Live');
		if (defined('Kaltura_Client_Enum_SourceType::LIMELIGHT_LIVE')) {
		    $sourceTypes[Kaltura_Client_Enum_SourceType::LIMELIGHT_LIVE] = 'Lime Light Live';
		}

		$this->addElement('select', 'default_live_stream_entry_source_type', array(
		   'label'   => 'Live Stream source type:',
		   'filters'  => array('StringTrim')));
		$this->getElement('default_live_stream_entry_source_type')->setMultiOptions($sourceTypes);
		
		$this->addElement('text', 'live_stream_provision_params', array(
			'label'			=> 'Provision parameters (JSON format)',
			'filters'		=> array('StringTrim'),
		));	
		
		
//-----------------------------------------------------------------------	
		$this->addElement('hidden', 'crossLine', array(
			'lable'			=> 'line',
			'decorators' => array('ViewHelper', array('Label', array('placement' => 'append')), array('HtmlTag',  array('tag' => 'hr', 'class' => 'crossLine')))
		));
		
		$this->addLimitsElements();	
			
		//--------------------------- Enable/Disable Features ---------------------------
		$moduls = Zend_Registry::get('config')->moduls;
		if ($moduls)
		{
	
			foreach($moduls as $name => $modul)
			{
				$attributes = array(
					'label'	  => $modul->label,
					'decorators' => array('ViewHelper', array('Label', array('placement' => 'append')), array('HtmlTag',  array('tag' => 'dt', 'class' => 'partner_configuration_checkbox_field')))
				);
				if(!$modul->enabled)
					$attributes['disabled'] = true;	
				$this->addElement('checkbox', $modul->permissionName, $attributes);
				if ($modul->indexLink != null)
				{
					//check permission to access the link's page
					$indexLinkArray = explode('/', $modul->indexLink);
					
	//				Commented by Tan-Tan
	//				The system admin user is never allowed to use these features, the features are allowed to the partner
	//						
	//				$linkAllowed= false;
	//				if (($indexLinkArray[0])=='plugin'){
	//				 	$linkAllowed = Infra_AclHelper::isAllowed($indexLinkArray[1], null);
	//				}
	//				else{
	//					$linkAllowed = Infra_AclHelper::isAllowed($indexLinkArray[0], $indexLinkArray[1]);
	//				}
	//				if ($linkAllowed)
	//				{
						$element = $this->getElement($modul->permissionName);
						$element->setDescription('<a class=linkToPage href="../'.$modul->indexLink.'">(config)</a>');
						$element->addDecorators(array('ViewHelper',		      
					        array('Label', array('placement' => 'append')),
					        array('Description', array('escape' => false, 'tag' => false)),
					      ));
	//				}		      
				}
				$permissionNames[$modul->group][$modul->label] = $modul->permissionName;
			}
			
			$this->addElement('checkbox', 'moderate_content', array(
				'label'	  => 'Content Moderation',
				'decorators' => array('ViewHelper', array('Label', array('placement' => 'append')), array('HtmlTag',  array('tag' => 'dt', 'class' => 'partner_configuration_checkbox_field')))
			));
			$permissionNames[self::GROUP_CONTENT_INGESTION_OPTIONS]['Content Moderation'] = 'moderate_content';
		
			ksort($permissionNames[self::GROUP_ENABLE_DISABLE_FEATURES]);
			ksort($permissionNames[self::GROUP_CONTENT_INGESTION_OPTIONS]);
			ksort($permissionNames[self::GROUP_REMOTE_STORAGE]);		
			ksort($permissionNames[self::GROUP_NOTIFICATION_CONFIG]);		
			$this->addAllDisplayGroups($permissionNames);
		}
		
		//adding display group to all features
		
		
		$this->addDisplayGroup($permissionNames[self::GROUP_ENABLE_DISABLE_FEATURES], 'enableDisableFeatures',array('legend' => 'Enable/Disable Features:'));
			
		//removing decorators from display groups
		$displayGroups = $this->getDisplayGroups();
		foreach ($displayGroups as $displayGroup)
		{
			$displayGroup->removeDecorator ('label');
	  		$displayGroup->removeDecorator('DtDdWrapper');		
		}
		//creating divs for left right dividing
		$this->setDisplayColumn('generalInformation',  'passwordSecurity', true);
		$this->setDisplayColumn('accountPackagesService', 'enableDisableFeatures', false);
				
		//---------------- Display DisplayGroups according to Permissions ---------------	
		$this->handlePermissions();
	}
	/**
	 * creating a form display in two columns (left and right).	
	 * $firstColumnElement - the first display group in the column
	 * $lastColumnElement - the last display group in the column
	 */
	public function setDisplayColumn($firstColumnElement, $lastColumnElement, $isLeft = true)
	{
		if ($isLeft){
			$class = 'partnerConfigureFormColumnLeft';
		}else{
			$class = 'partnerConfigureFormColumnRight';
		}
		
		$openLeftDisplayGroup = $this->getDisplayGroup($firstColumnElement);
    	$openLeftDisplayGroup->setDecorators(array(
             'FormElements',
             'Fieldset',
             array('HtmlTag',array('tag'=>'div','openOnly'=>true,'class'=> $class))
    	 ));
	
    	$closeLeftDisplayGroup = $this->getDisplayGroup($lastColumnElement);
    	$closeLeftDisplayGroup->setDecorators(array(
             'FormElements',
             'Fieldset',
              array('HtmlTag',array('tag'=>'div','closeOnly'=>true))
     	));   
	}
	
	/**
	 * make permission group elements readonly and disabled.
	 * @param unknown_type $dispalyGroupNames
	 */
	private function setPermissionGroupElementsToReadOnly($permissionGroupName)
	{
		foreach ($permissionGroupName as $dispalyGroupName)
		{
			$displayGroupElements = $this->getDisplayGroup($dispalyGroupName)->getElements();
			foreach ($displayGroupElements as $el)
			{
				$el->setAttrib('readonly', true);				
				//$el->setAttrib('disable', 'disable');
				//disable links
				if ($dispalyGroupName == 'enableDisableFeatures'){
					$el->setDescription('<a class=linkToPage href=# onClick="return false;">(config)</a>');
				}
			}
		}
	}
	
	/**
	 * make permission group elements readonly and disabled.
	 * @param unknown_type $dispalyGroupNames
	 */
	private function setPermissionGroupElementsToDisabled($permissionGroupName)
	{
		foreach ($permissionGroupName as $dispalyGroupName)
		{
			$displayGroupElements = $this->getDisplayGroup($dispalyGroupName)->getElements();
			foreach ($displayGroupElements as $el)
			{
				$el->setAttrib('readonly', true);				
				$el->setAttrib('disable', 'disable');
				//disable links
				if ($dispalyGroupName == 'enableDisableFeatures'){
					$el->setDescription('<a class=linkToPage href=# onClick="return false;">(config)</a>');
				}
			}
		}
	}
	
	
	private function handlePermissions()
	{
		//permissions groups 
		$configureAccountsTechData = array('publisherSpecificDeliverySettings', 'remoteStorageAccountPolicy', 'advancedNotificationSettings', 'publisherSpecificIngestionSettings', 'passwordSecurity'); //EAGLE PRD group 1
		$configureGeneralInformation = array('generalInformation'); // EAGLE PRD group 2
		$configureAccountsGroup = array('groupAssociation'); // EAGLE PRD group 3
		$configureAccountPackagesService = array('accountPackagesService'); // EAGLE PRD group 4
		$configureAccountsOptionsMonitorUsage = array('accountOptionsMonitorUsage'); // EAGLE PRD group 5
		$configureAccountsOptions = array('accountPackages','accountOptions','includedUsage', 'includedUsageSecondPart', 'enableDisableFeatures'); // EAGLE PRD group 6
		$configureKmcUsers = array('configureKmcUsers');
		
		//according to current permissin call to setPermissionGroupElementsToReadOnly		
		//with the correct group array as parameter
		if (!(Infra_AclHelper::isAllowed('partner', 'configure-tech-data'))){
			$this->setPermissionGroupElementsToReadOnly($configureAccountsTechData);
		}
		if (!(Infra_AclHelper::isAllowed('partner', 'configure-group-options'))){
			$this->setPermissionGroupElementsToReadOnly($configureAccountsGroup);
		}
		if (!(Infra_AclHelper::isAllowed('partner', 'configure-account-info'))){
			$this->setPermissionGroupElementsToReadOnly($configureAccountsOptions);
		}
		if (!(Infra_AclHelper::isAllowed('partner', 'configure-kmc-users'))){
			$this->setPermissionGroupElementsToReadOnly($configureKmcUsers);
		}
		if (!(Infra_AclHelper::isAllowed('partner', 'configure-general-information'))){
			$this->setPermissionGroupElementsToReadOnly($configureGeneralInformation);
		}
		if (!(Infra_AclHelper::isAllowed('partner', 'configure-account-packages-service'))){
			$this->setPermissionGroupElementsToDisabled($configureAccountPackagesService);
		}
		if (!(Infra_AclHelper::isAllowed('partner', 'configure-account-options-monitor-usage'))){
			$this->setPermissionGroupElementsToDisabled($configureAccountsOptionsMonitorUsage);
		}
		
	}
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------		
	/**
	 * @param Kaltura_Client_SystemPartner_Type_SystemPartnerConfiguration $object
	 * @param bool $add_underscore
	 */
	public function populateFromObject($object, $add_underscore = true)
	{
		/* @var $object Kaltura_Client_SystemPartner_Type_SystemPartnerConfiguration */
		parent::populateFromObject($object, $add_underscore);
		
		if (is_array($object->limits))
		{
			foreach ($object->limits as $limit)
			{
				if (isset($this->limitSubForms[$limit->type]))
				{
					$subFormObject = $this->limitSubForms[$limit->type];
					$subFormObject->populateFromObject($this, $limit, false);
				}
			}			
		}
		if(!$object->permissions || !count($object->permissions))
			return;
			
		foreach($object->permissions as $permission){
			KalturaLog::debug("Set Permission: "  . $permission->name . " status: " . $permission->status);
			$this->setDefault($permission->name, ($permission->status == Kaltura_Client_Enum_PermissionStatus::ACTIVE));
		}
	
		// partner is set to free trail package
		if(!$object->partnerPackage == PartnerController::PARTNER_PACKAGE_FREE)
		{
			if (!(Infra_AclHelper::isAllowed('partner', 'configure-account-packages-service-paid')))
			{
				$this->setPermissionGroupElementsToDisabled(array('accountPackagesService'));
			}
		}
	}
	
	/* (non-PHPdoc)
	 * @see Infra_Form::getObject()
	 */
	public function getObject($objectType, array $properties, $add_underscore = true, $include_empty_fields = false)
	{
		$systemPartnerConfiguration = parent::getObject($objectType, $properties, $add_underscore, $include_empty_fields);
		
		$moduls = Zend_Registry::get('config')->moduls;
		if ($moduls)
		{
			$basePermissionsToAdd = array();
			$basePermissionsToRemove = array();
			
			if(is_null($systemPartnerConfiguration->permissions))
				$systemPartnerConfiguration->permissions = array();
				
			foreach($moduls as $name => $modul)
			{
				if(!$modul->enabled)
					continue;
					
				$permission = new Kaltura_Client_Type_Permission();
				$permission->type = $modul->permissionType;
				$permission->name = $modul->permissionName;
				$permission->status = Kaltura_Client_Enum_PermissionStatus::ACTIVE;
				
				if(!isset($properties[str_replace('.', '', $modul->permissionName)]) || !$properties[str_replace('.', '', $modul->permissionName)])
					$permission->status = Kaltura_Client_Enum_PermissionStatus::BLOCKED;
					
				$systemPartnerConfiguration->permissions[] = $permission;
				
				if (($modul->basePermissionName != '') && ($modul->basePermissionType != '')){
					$basePermission = new Kaltura_Client_Type_Permission();
					$basePermission->name = $modul->basePermissionName;
					$basePermission->type = $modul->basePermissionType;
					$basePermission->status = $permission->status;
										
					$permissionSet = false;
					KalturaLog::debug("try to add permission: ". $basePermission->name);
					foreach ($systemPartnerConfiguration->permissions as $permission)
					{				
						if (($permission->name == $basePermission->name) && ($permission->type == $basePermission->type))
						{
							if ($basePermission->status == Kaltura_Client_Enum_PermissionStatus::ACTIVE)
								$permission->status = $basePermission->status;
							KalturaLog::debug("permission exists with status : " . $permission->status);		
							$permissionSet = true;
							break;
						}
					}
					
					if(!$permissionSet)
					{
						KalturaLog::debug("permission didn't exist with status : " . $permission->status);
						$systemPartnerConfiguration->permissions[] = $basePermission;
					}
				}
			}	
		}
			

			
		foreach ($this->limitSubForms as $subForm)
		{
			if ($subForm instanceof Form_PartnerConfigurationLimitSubForm)
			{
				$limitType = $subForm->getName();
				$limit = $subForm->getObject('Kaltura_Client_SystemPartner_Type_SystemPartnerLimit', $properties[$limitType], false, $include_empty_fields);
				$systemPartnerConfiguration->limits[] = $limit;			
			}
		}		
		return $systemPartnerConfiguration;
	}
		
	protected function addLimitsElements()
	{
		$userLoginAttempsSubForm = new Form_PartnerConfigurationLimitSubForm(Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::USER_LOGIN_ATTEMPTS, 'Maximum login attemps:', false);
		$this->addLimitSubForm($userLoginAttempsSubForm, Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::USER_LOGIN_ATTEMPTS);
		
		$monthlyBandwidthSubForm = new Form_PartnerConfigurationLimitSubForm(Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::MONTHLY_BANDWIDTH, 'Streaming (GB):');
		$this->addLimitSubForm($monthlyBandwidthSubForm, Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::MONTHLY_BANDWIDTH);
		
		$monthlyStorageSubForm = new Form_PartnerConfigurationLimitSubForm(Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::MONTHLY_STORAGE, 'Storage (GB):');
		$this->addLimitSubForm($monthlyStorageSubForm, Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::MONTHLY_STORAGE);
		
		$monthlyStorageAndBandwidthSubForm = new Form_PartnerConfigurationLimitSubForm(Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::MONTHLY_STORAGE_AND_BANDWIDTH, 'Streaming + Storage (GB):');
		$this->addLimitSubForm($monthlyStorageAndBandwidthSubForm, Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::MONTHLY_STORAGE_AND_BANDWIDTH);
		
		
		$adminLoginUsersSubForm = new Form_PartnerConfigurationLimitSubForm(Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::ADMIN_LOGIN_USERS, 'Number of administrative (KMC) users:');
		$this->addLimitSubForm($adminLoginUsersSubForm, Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::ADMIN_LOGIN_USERS);
		
		$numberOfPublishersSubForm = new Form_PartnerConfigurationLimitSubForm(Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::PUBLISHERS, 'included accounts:');
		$this->addLimitSubForm($numberOfPublishersSubForm, Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::PUBLISHERS);
		
		$monthlyStreamsSubForm = new Form_PartnerConfigurationLimitSubForm(Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::MONTHLY_STREAM_ENTRIES, 'Monthly Streams:');
		$this->addLimitSubForm($monthlyStreamsSubForm, Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::MONTHLY_STREAM_ENTRIES);

		$numberOfEndUsersSubForm = new Form_PartnerConfigurationLimitSubForm(Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::END_USERS, 'Number of End-Users:');
		$this->addLimitSubForm($numberOfEndUsersSubForm, Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::END_USERS);
		
		$numberOfEntriesSubForm = new Form_PartnerConfigurationLimitSubForm(Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::ENTRIES, 'Number of videos allowed:');
		$this->addLimitSubForm($numberOfEntriesSubForm, Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::ENTRIES);
		
		$accessControlsSubForm = new Form_PartnerConfigurationLimitSubForm(Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::ACCESS_CONTROLS, 'Maximum access control profiles:', false);
		$this->addLimitSubForm($accessControlsSubForm, Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::ACCESS_CONTROLS);
				
	}
	/**
	 * split the form elements into different display groups
	 */
	public function addAllDisplayGroups($permissionNames)
	{
		//adding display groups
		
		$this->addDisplayGroup(array('partner_name', 'description','admin_name', 'admin_email', 'id', 'kmc_version', 'crossLine'), 'generalInformation', array('legend' => 'General Information'));
		$this->addDisplayGroup(array('partner_group_type', 'partner_parent_id','crossLine'), 'groupAssociation', array('legend' => 'Multi-Account Group Related information'));
		$this->addDisplayGroup(array_merge(array('checkbox_host', 'host', 'checkbox_cdn_host', 'cdn_host', 'checkbox_rtmp_url', 'rtmp_url', 'checkbox_thumbnail_host', 'thumbnail_host', 'checkbox_delivery_restrictions', 'delivery_restrictions'), $permissionNames[self::GROUP_PUBLISHER_DELIVERY_SETTINGS], array ('crossLine')), 'publisherSpecificDeliverySettings', array('legend' => 'Publisher Specific Delivery Settings'));				
		
		$this->addDisplayGroup(array_merge(array('storage_serve_priority', 'storage_delete_from_kaltura','import_remote_source_for_convert'), $permissionNames[self::GROUP_REMOTE_STORAGE] ,array('crossLine')), 'remoteStorageAccountPolicy', array('legend' => 'Remote Storage Policy'));

		// TODO
		$this->addDisplayGroup(array_merge(array('notifications_config', 'allow_multi_notification'), $permissionNames[self::GROUP_NOTIFICATION_CONFIG] ,array('crossLine')), 'advancedNotificationSettings', array('legend' => 'Advanced Notification Settings'));
		$this->addDisplayGroup(array_merge(array('def_thumb_offset','def_thumb_density') , $permissionNames[self::GROUP_CONTENT_INGESTION_OPTIONS], array('enable_bulk_upload_notifications_emails', 'bulk_upload_notifications_email', 'crossLine')), 'publisherSpecificIngestionSettings', array('legend' => 'Content Ingestion Options'));
		$this->addDisplayGroup(array('logout_url', 'crossLine'), 'signSignOn', array('legend' => 'Sign Sign On'));
		$this->addDisplayGroup(array(Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::USER_LOGIN_ATTEMPTS.'_max',
									// Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::USER_LOGIN_ATTEMPTS.'_overagePrice',
									 'login_block_period',
									 'num_prev_pass_to_keep',
									 'pass_replace_freq'),
									 'passwordSecurity', array('legend' => 'Password Security'));
		$this->addDisplayGroup(array('partner_package'), 'accountPackagesService', array('legend' => 'Service Packages'));
		$this->addDisplayGroup(array('partner_package_class_of_service', 'vertical_clasiffication', 'crm_id', 'crm_link', 'internal_use', 'crossLine'), 'accountPackages');
		$this->addDisplayGroup(array('extended_free_trail', 'extended_free_trail_expiry_date', 'extended_free_trail_expiry_reason', 'monitor_usage_history'), 'accountOptionsMonitorUsage', array('legend' => 'New Account Options'));
		$this->addDisplayGroup(array('is_first_login','crossLine'), 'accountOptions');
				
		$this->addDisplayGroup(array('includedUsageLabel', 'mothly_bandwidth_combined',
									Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::MONTHLY_STORAGE_AND_BANDWIDTH.'_max',
									Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::MONTHLY_STORAGE_AND_BANDWIDTH.'_overagePrice',
									Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::MONTHLY_STORAGE_AND_BANDWIDTH.'_overageUnit',
									Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::MONTHLY_BANDWIDTH.'_max',
									Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::MONTHLY_BANDWIDTH.'_overagePrice',
									Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::MONTHLY_BANDWIDTH.'_overageUnit',
									Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::MONTHLY_STORAGE.'_max',
									Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::MONTHLY_STORAGE.'_overagePrice',
									Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::MONTHLY_STORAGE.'_overageUnit',
									),'includedUsage', array('legend' => 'Included Usage'));
		$this->addDisplayGroup(array(
									Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::ADMIN_LOGIN_USERS.'_max',
									Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::ADMIN_LOGIN_USERS.'_overagePrice',
									Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::ADMIN_LOGIN_USERS.'_overageUnit'
									), 'configureKmcUsers');
		$this->addDisplayGroup(array(
									Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::PUBLISHERS.'_max',
									Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::PUBLISHERS.'_overagePrice',
									Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::PUBLISHERS.'_overageUnit',
									Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::MONTHLY_STREAM_ENTRIES.'_max',
									Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::MONTHLY_STREAM_ENTRIES.'_overagePrice',
									Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::MONTHLY_STREAM_ENTRIES.'_overageUnit',
									Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::END_USERS.'_max',
									Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::END_USERS.'_overagePrice',
									Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::END_USERS.'_overageUnit',
									Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::ENTRIES.'_max',
									Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::ENTRIES.'_overagePrice',
									Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::ENTRIES.'_overageUnit',
									Kaltura_Client_SystemPartner_Enum_SystemPartnerLimitType::ACCESS_CONTROLS.'_max',
									'crossLine'), 'includedUsageSecondPart');

		$this->addDisplayGroup(
			array_merge(
				array('default_live_stream_entry_source_type', 'live_stream_provision_params'), 
				array('crossLine')), 
			'liveStreamConfig', 
			array('legend' => 'Live Stream Config')
		);	
									
	}
	
	protected function addLimitSubForm($subForm, $subFormName)
	{
		$subForm->setName($subFormName);
		$this->limitSubForms[$subFormName] = $subForm;
		$subForm->addElementsToForm($this);
	}
	
	    /**
     * Validate the form
     *
     * @param  array $data
     * @return boolean
     */
    public function isValid($data)
    {
    	if (isset($data['extended_free_trail']) && $data['extended_free_trail']){
		    $extended_free_trail_expiry_date = $this->getElement('extended_free_trail_expiry_date');
		    $extended_free_trail_expiry_date->setRequired(true);
		    $date = new Zend_Validate_Date('M/d/Y');
		    $extended_free_trail_expiry_date->addValidator($date);
		    $extended_free_trail_expiry_reason = $this->getElement('extended_free_trail_expiry_reason');
    		$extended_free_trail_expiry_reason->setRequired(true);
    	}
    	
    	
    	return parent::isValid($data);
    }
			
}