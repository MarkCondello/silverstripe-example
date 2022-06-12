<?php
namespace SilverStripe\Lessons; // is it okay to do this ?? 

use SilverStripe\ORM\DataExtension;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\DateField;

class MyMemberExtension extends DataExtension
{
  private static $db = [
    'DateOfBirth' => 'DBDatetime',
    'Position' => 'Varchar'
  ];
  private static $has_one = [
    'ProfileImage' => Image::class,
  ];

  public function GreetMember()
  {
    return "Greetings " . $this->owner->FirstName . '!';
  }

  public function updateCMSFields(FieldList $fields)
  {
    $fields->push(new DateField('DateOfBirth'));
    $fields->push(new TextField('Position'));
    $fields->push($upload = new UploadField('ProfileImage', 'Profile image'));
    $upload->setAllowedFileCategories('image/supported');
    
  }
}
