<?php
namespace Markcond\Research;

use SilverStripe\ORM\DataObject;

class CustomerRating extends DataObject
{
  private static $table_name = 'CustomerRating';
  private static $db = [
    'CustomerName' => 'Text',
    'Rating' => 'Int'
  ];
  private static $has_one = [
    'LandingPage' => LandingPage::class
  ];
}