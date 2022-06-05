<?php 

namespace SilverStripe\Lessons;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;

class Category extends DataObject 
{
  private static $table_name = 'Category';

  private static $db = [
    'Title' => 'Text',
  ];

  private static $belongs_many_many = [
    'VideoObjects' => VideoObject::class
  ];

  public function getCMSFields()
  {
    return new FieldList(
      TextField::create('Title', 'Category title.')
    );
  } 
}