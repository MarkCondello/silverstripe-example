<?php
namespace SilverStripe\Lessons;

use SilverStripe\Dev\Debug;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;

 
class MySiteConfigExtension extends DataExtension
{
  private static $db = [
    'FacebookLink' => 'Varchar',
    'TwitterLink' => 'Varchar',
    'GoogleLink' => 'Varchar',
    'YouTubeLink' => 'Varchar',
    'FooterContent' => 'Text'
  ];

  public function updateCMSFields(FieldList $fields)
  {
    $fields->addFieldsToTab('Root.Social', array (
        TextField::create('FacebookLink','Facebook'),
        TextField::create('TwitterLink','Twitter'),
        TextField::create('GoogleLink','Google'),
        TextField::create('YouTubeLink','YouTube')
    ));
    $fields->addFieldsToTab('Root.Main', TextareaField::create('FooterContent', 'Content for footer'));
  }

  public function getSocialsForFrontEnd()
  {
    $socials = [];
    if ($this->owner->FacebookLink) {
      $socials['fb'] = [ 
        'link' => $this->owner->FacebookLink,
        'icon' => 'fa-facebook'
      ];
    }
    if ($this->owner->TwitterLink) {
      $socials['twitter'] = [ 
        'link' => $this->owner->TwitterLink,
        'icon' => 'fa-twitter'
      ];
    }
    if ($this->owner->GoogleLink) {
      $socials['google'] = [ 
        'link' => $this->owner->GoogleLink,
        'icon' => 'fa-google'
      ];
    }
    if ($this->owner->YouTubeLink) {
      $socials['youtube'] = [ 
        'link' => $this->owner->YouTubeLink,
        'icon' => 'fa-youtube'
      ];
    }

    // die(var_dump($socials));
    return json_encode($socials);
    // Debug::dump($socials);
  }
}