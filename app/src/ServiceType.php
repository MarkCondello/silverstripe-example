<?php 
namespace Markcond\Research; 
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;

class ServiceType extends DataObject
{
  private static $table_name = 'ServiceType';
  private static $db = [
    'Name' => 'Text'
  ];
  private static $has_many = [
    'LandingPages' => LandingPage::class
  ];
  public function getCMSFIelds()
  {
    return new FieldList(
      TextField::create('Name', 'Service type name.')
    );
  }
}