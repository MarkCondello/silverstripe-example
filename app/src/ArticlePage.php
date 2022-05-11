<?php
namespace SilverStripe\Lessons;

use Page;
use SilverStripe\Forms\DateField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\Assets\Image;
use SilverStripe\Assets\File;
use SilverStripe\AssetAdmin\Forms\UploadField;

class ArticlePage extends Page 
{
  // Prevents this item from being a root menu element
  private static $can_be_root = false;
  private static $table_name = 'ArticlePage';
  private static $db = [
    'Date' => 'Date',
    'Teaser' => 'Text',
    'Author' => 'Varchar',
  ];

  private static $has_one = [
    'Photo' => Image::class,
    'Brochure' => File::class,
  ];

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();
    $fields->addFieldToTab('Root.Main', DateField::create('Date', 'Date of article'));
    $fields->addFieldToTab('Root.Main', TextareaField::create('Teaser', 'An abstract of the article that appears on the article list page.'));
    $fields->addFieldToTab('Root.Main', TextField::create('Author', 'Author of the article'));
    $fields->addFieldToTab('Root.Attachments', UploadField::create('Photo'));
    // These docs are wrong now: https://www.silverstripe.org/learn/lessons/v4/working-with-files-and-images-1?_ga=2.115260359.1318327465.1652136890-1194748893.1652136890
    // refer to this instead: https://docs.silverstripe.org/en/4/developer_guides/files/file_management/
    $fields->addFieldToTab('Root.Attachments', 
      UploadField::create('Brochure', 'Travel brochure, optional (PDF only)')
        ->setFolderName('travel-brochures')
        ->setAllowedExtensions(['pdf'])
      );
    // $brochure->getValidator()->setAllowedExtensions(['pdf']);
    return $fields;
  }

}