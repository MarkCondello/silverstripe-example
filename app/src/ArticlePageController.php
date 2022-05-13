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

    // ToDo: How do I pass data like this to the view???
    // $brochureLink = $this->Brochure->Link();
    //   Debug::dump($brochureLink);
  }
}