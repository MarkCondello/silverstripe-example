<?php
namespace SilverStripe\Lessons;

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
  //This array maps the name of the field to the human-readable column name. We'll let the photo speak for itself and leave its column header empty.
  private static $summary_fields = [
    'GridThumbnail' => '',
    'Photo.Filename' => 'Photo file name', // dont notation can be included with relations
    'Title' => 'Title of the region',
    'Description' => 'Short description'
  ];

  public function getGridThumbnail() // This is used to populate the $summary fields
  {
    // return $this->Photo->CMSThumbnail(); // OR
    if ($this->Photo()->exists()) {
      return $this->Photo()->ScaleWidth(100);
    }
    return "(No img)";
   }

  private static $versioned_gridfield_extensions = true; // provide versioning for this gridField item

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