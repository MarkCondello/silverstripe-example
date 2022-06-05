<?php 
use SilverStripe\ORM\DataExtension;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class SiteConfigExtension extends DataExtension
{
  private static $has_many = [
    'SocialLinks' => SocialLink::class
  ];

  public function updateCMSFields(Fieldlist $fields)
  {
    $fields->addFieldsToTab('Root.Social', GridField::create(
      'SocialLinks',
      'Social Links',
      $this->owner->SocialLinks(), // wt??
      GridFieldConfig_RecordEditor::create()
    ));
  }
}