<?php 
namespace Markcond\Research;
use PageController;
use SilverStripe\View\Requirements;

use SilverStripe\Dev\Debug;
class LandingPageController extends PageController
{
  public function init()
  {
    parent::init();
  }

  public function serviceTypeName()
  {
    return $this->ServiceType->Name;
  }

}