<?php
namespace SilverStripe\Lessons\Videos;

use PageController;
use SilverStripe\View\Requirements;
use SilverStripe\Dev\Debug;

class VideoPageController extends PageController 
{
  protected function init()
  {
    parent::init();

    // $brochureLink = $this->Brochure->Link();
    //   Debug::dump($brochureLink);
  }
}