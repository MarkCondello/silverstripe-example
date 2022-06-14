<?php
namespace SilverStripe\Lessons;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\CurrencyField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\ORM\ArrayLib;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\TabSet;

class Property extends DataObject
{
  private static $table_name = "Property";

  private static $db = [
    'Title' => 'Varchar',
    'PricePerNight' => 'Currency',
    'Bedrooms' => 'Int',
    'Bathrooms' => 'Int',
    'FeaturedOnHomepage' => 'Boolean',

  ];

  private static $has_one = [
    'PrimaryPhoto' => Image::class,
  ];
  // 'Region' => Region::class, //ToDo: The lesson on adding Regions

  public function getCMSFields()
  {
    $fields = FieldList::create(TabSet::create('Root'));
    $fields->addFieldsToTab('Root.Main', [
      TextField::create('Title'),
      CurrencyField::create('PricePerNight', 'Price (per night)'),
      DropdownField::create('Bedrooms')
        ->setSource(ArrayLib::valuekey(range(1, 10))),
      DropdownField::create('Bathrooms')
        ->setSource(ArrayLib::valuekey(range(1, 10))),
      // DropdownField::create('RegionId', 'Region')
      //   ->setSource(Region::get()->map('ID', 'title')), //ToDo: Add this when adding Regions
      CheckboxField::create('FeaturedOnHomePage', 'Featured on home page'),
    ]);
    $fields->addFieldsToTab('Root.Photos', $upload = UploadField::create('PrimaryPhoto', 'Primary photo'));
    $upload->getValidator()->setAllowedExtensions(['png', 'jpeg', 'jpg', 'gif']);
    $upload->setFolderName('property-photos');
    return $fields;
  }

}
