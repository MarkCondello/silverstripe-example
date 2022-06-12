<?php
namespace SilverStripe\Lessons;

use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
 
class MySiteConfigExtension extends DataExtension
{
  private static $db = [
    'FB_Link' => 'VarChar',
    'Twitter_Link' => 'VarChar',
    'Youtube_Link' => 'VarChar',
    'FooterContent' => 'Text',
  ];

  public function updateCMSFields(FieldList $fields)
  {
    $fields->addFieldsToTab('Root.Social', [
      TextField::create('FB_Link', 'Facebook'),
      TextField::create('Twitter_Link', 'Twitter'),
      TextField::create('Youtube_Link', 'Youtbue'),
    ]);
    $fields->addFieldsToTab('Root.Main', TextareaField::create('FooterContent', 'Content for footer'));
  }
}