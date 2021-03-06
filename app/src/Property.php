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

use SilverStripe\Versioned\Versioned;

class Property extends DataObject
{
  private static $table_name = "Property";

  private static $db = [
    'Title' => 'Varchar',
    'PricePerNight' => 'Currency',
    'Bedrooms' => 'Int',
    'Bathrooms' => 'Int',
    'FeaturedOnHomepage' => 'Boolean'
  ];

  private static $has_one = [
    'PrimaryPhoto' => Image::class,
    'Region' => Region::class
  ];

  private static $summary_fields = [
    'Title' => 'Title',
    'Region.Title' => 'Region',
    'PricePerNight.Nice' => 'Price',
    'FeaturedOnHomepage.Nice' => 'Featured?'
  ];
//   private static $searchable_fields = [
//     'Title',
//     'Region.Title',
//     'FeaturedOnHomepage'
// ]; 

private static $owns = [
  'PrimaryPhoto',
];

private static $extensions = [
  Versioned::class,
];

private static $versioned_gridfield_extensions = true;

  //custom filtering of the table
  public function searchableFields()
  {

    return [
      'Title' => [
        'filter' => 'PartialMatchFilter',
        'title' => 'Title',
        'field' => TextField::class,
      ], 
      'Region.Title' => [
        'filter' => 'ExactMatchFilter',
        'title' => 'Region',
        'field' => DropdownField::create('RegionID')
        ->setSource(
          Region::get()->map('ID','Title')
          )
          ->setEmptyString('-- Any Region --')
      ],
      'FeaturedOnHomepage' => [
        'filter' => 'ExactMatchFilter',
        'title' => 'Only Featured'
      ]
    ];
  } 

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
      DropdownField::create('RegionID', 'Region')
        ->setSource(Region::get()->map('ID', 'title')),
      CheckboxField::create('FeaturedOnHomepage', 'Feature on homepage?')

      // CheckboxField::create('FeaturedOnHomePage', 'Featured on home page?')// this does not work. WTF
    ]);
    $fields->addFieldsToTab('Root.Photos', $upload = UploadField::create('PrimaryPhoto', 'Primary photo'));
    $upload->getValidator()->setAllowedExtensions(['png', 'jpeg', 'jpg', 'gif']);
    $upload->setFolderName('property-photos');
    return $fields;
  }

}
