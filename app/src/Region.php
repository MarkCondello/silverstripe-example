<?php
namespace Silverstripe\Lessons;

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\AssetAdmin\Forms\UploadField;

use SilverStripe\Versioned\Versioned;

class Region extends DataObject
{
  private static $table_name = 'Region';

  private static $db = [
    'Title' => 'Varchar',
    'Description' => 'Text'
  ];
  private static $has_one = [
    'Photo' => Image::class,
    'RegionsPage' => RegionsPage::class,
  ];
  //changes cascade from parent (Region) to child (Photo)
  private static $owns = [
    'Photo',
  ];

  //allows for published and draft statuses
  private static $extensions = [
    Versioned::class,
  ];

  public function getCMSFIelds( )
  {
    $fields = FieldList::create(
      TextField::create('Title'),
      TextareaField::create('Description'),
      $uploader = UploadField::create('Photo')
    );
    $uploader->setFolderName('region-photos');
    $uploader->getValidator()->setAllowedExtensions(['gif', 'jpeg', 'jpg', 'png']);
    return $fields;
  }
}