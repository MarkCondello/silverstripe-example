<?php
namespace SilverStripe\Lessons;
use Page;

// These below control how our form appears in admin
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
// use SilverStripe\Forms\GridField\GridFieldComponent;

class VideoPage extends Page {
  private static $has_many = [
    'VideoObjects' => VideoObject::class,
    'VideoComments' => VideoComment::class
  ];

  // Because this class extends Page it already has CMS fields, we must reference the parent method
  public function getCMSFields()
  {
    $fields = parent::getCMSFields();
    $fields->addFieldToTab('Root.Main', GridField::create(
      'VideoObjects',
      'Videos',
      $this->VideoObjects(),
      GridFieldConfig_RecordEditor::create()
    ));
    return $fields;
  }
}