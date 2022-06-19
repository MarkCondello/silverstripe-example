<?php
namespace SilverStripe\Lessons;

use PageController;
use SilverStripe\Dev\Debug;
 
class HomePageController extends PageController 
{
  protected function init()
  {
    parent::init();
  }

  public function FeaturedProperties($limit = 6)
  {
    return Property::get()
      ->filter([
        'FeaturedOnHomepage' => true
      ])
      ->limit($limit);
      // Debug::dump($list->count());
  }

}