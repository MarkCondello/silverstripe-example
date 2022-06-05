<?php
namespace SilverStripe\Lessons;

use PageController;

class AboutUsPageController extends PageController 
{
  protected function init()
  {
    parent::init();

    // ToDo: How do I pass data like this to the view???
    // $brochureLink = $this->Brochure->Link();
    //   Debug::dump($brochureLink);
  }

}

//  I assumed that adding this will create a path fpr the AboutUsPage.ss template but NOOOO...