<?php
namespace SilverStripe\Lessons;

use SilverStripe\ORM\DataObject;

class VideoComment extends DataObject {
  private static $table_name = 'VideoComment';

  private static $db =[
    'Name' => 'Text',
    'Comment' => 'Text'
  ];

  private static $has_one = [
    'VideoPage' => VideoPage::class
  ];

}