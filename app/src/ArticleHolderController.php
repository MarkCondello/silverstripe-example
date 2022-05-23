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
  }
}