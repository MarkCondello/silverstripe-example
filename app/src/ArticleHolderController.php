<?php
namespace SilverStripe\Lessons;

use PageController;
use SilverStripe\View\Requirements;

class ArticleHolderController extends PageController 
{
  //Only allow article pages in sub page settings
  private static $allowed_children = [ArticlePage::class];
  protected function init()
  {
    parent::init();
    Requirements::css('css/bootstrap.min.css');
    Requirements::css('css/style.css');
    Requirements::javascript('javascript/common/modernizr.js');
    Requirements::javascript('javascript/common/jquery-1.11.1.min.js');
    Requirements::javascript('javascript/common/bootstrap.min.js');
    Requirements::javascript('javascript/common/bootstrap-datepicker.js');
    Requirements::javascript('javascript/common/chosen.min.js');
    Requirements::javascript('javascript/common/bootstrap-checkbox.js');
    Requirements::javascript('javascript/common/nice-scroll.js');
    Requirements::javascript('javascript/common/jquery-browser.js');
    Requirements::javascript('javascript/scripts.js');
  }

}