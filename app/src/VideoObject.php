<?php 
namespace SilverStripe\Lessons;
use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\File;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\CheckboxSetField;

class VideoObject extends DataObject {
  private static $table_name = 'VideoObject';

  private static $db = [
    'Title' => 'Text',
    'Description' => 'Text',
  ];
  private static $has_one = [
    'VideoSource' => File::class,
    'VideoPage' => VideoPage::class,
    'VideoThumbnail' => Image::class
  ];

  private static $owns = [
    'VideoSource',
    'VideoThumbnail'
  ];

  private static $many_many = [
    'VideoCategories' => VideoCategory::class
  ];

  public function getCMSFields()
  {
    // This defines what fields we are supporting and what it saves
    return new FieldList(
      TextField::create('Title'),
      TextareaField::create('Description'),
      UploadField::create('VideoSource'),
      UploadField::create('VideoThumbnail'),
      CheckboxSetField::create('VideoCategories', 'Categories', VideoCategory::get())
    );
  }
}