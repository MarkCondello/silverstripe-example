<?php 
namespace Markcond\Research; 
use Page;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\DropdownField;

class LandingPage extends Page
{
  private static $table_name = 'LandingPage';
  private static $db = [
    'BannerTitle' => 'Text',
  ];
  
  // a LandingPage can have one ServiceType, a ServiceType can have many LandingPages
  private static $has_one = [
    'ServiceType' => ServiceType::class,
  ];

  // a LandingPage can have many CustomerRatings, a Customer Rating can have one LandingPage
  // SS ISSUE: This columns was not getting added to the Table after a build
  private static $has_many = [
    'CustomerRatings' => CustomerRating::class,
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