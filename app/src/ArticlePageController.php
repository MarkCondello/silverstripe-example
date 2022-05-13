<?php
namespace SilverStripe\Lessons;

use PageController;
use SilverStripe\View\Requirements;
use SilverStripe\Dev\Debug;

class ArticlePageController extends PageController 
{
  protected function init()
  {
    parent::init();

    // $brochureLink = $this->Brochure->Link();
    //   Debug::dump($brochureLink);
  }
}