<?php
namespace SilverStripe\Lessons;

use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
// use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
// use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Lessons\ArticlePage;

use Page;

class HomePage extends Page
{
  // Add related articles here as well
  private static $many_many = [
    'RelatedArticles' => ArticlePage::class,
  ];

  private static $many_many_extraFields = [
    'RelatedArticles' => [
      'SortOrder' => 'Int',
    ]
  ];

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();

    $tab = "Root.RelatedArticles";
    $gridConfig = GridFieldConfig_RelationEditor::create();
    $tilesGrid = new GridField('HeroBanners', 'Hero Banners', $this->RelatedArticles(), $gridConfig);
    $tilesGrid->setDescription("Related articles will be displayed on the sidepanel.");
    $fields->addFieldToTab($tab, $tilesGrid);

    return $fields;

  }

  public function RelatedArticles()
  {
    return $this->getManyManyComponents('RelatedArticles')->sort('SortOrder');
  }
}