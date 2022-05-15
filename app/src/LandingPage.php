<?php 
namespace Markcond\Research; 
use Page;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\DropdownField;

class LandingPage extends Page
{
  // a LandingPage can have one ServiceType, a ServiceType can have many LandingPages
  private static $table_name = 'LandingPage';
  private static $db = [
    'BannerTitle' => 'Text',
  ];

  private static $has_one = [
    'ServiceType' => ServiceType::class
  ];
  
  public function getCMSFields()
  {
    $fields = parent::getCMSFields();
    $fields->addFieldsToTab('Root.Main', TextField::create('BannerTitle', 'Banner title text'));
    // https://api.silverstripe.org/4/SilverStripe/Forms/DropdownField.html
    $fields->addFieldsToTab('Root.Main', DropdownField::create('ServiceTypeID', 'Select a service type', ServiceType::get() )->setEmptyString('(Select a service)'));
    return $fields;
  }
}