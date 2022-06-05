<?php
namespace SilverStripe\Lessons;

use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

use Page;

class RegionsPage extends Page
{
  private static $has_many = [
    'Regions' => Region::class,
  ];

  // changes to RegsionsPage cascades from parent to child (Regions), and vice-versa.
  private static $owns = [
    'Regions'
  ];

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();
    $fields->addFieldsToTab('Root.Regions', GridField::create(
      'Regions',
      'Regions on this page',
      $this->Regions(), // populates CRUD grid with the data, this uses the $has_many magic method
      GridFieldConfig_RecordEditor::create()
    ));
    return $fields;
  }
}