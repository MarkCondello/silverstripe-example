<?php
namespace SilverStripe\Lessons;

use PageController;
use SilverStripe\Control\HTTP;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\ORM\ArrayList; //WT??
use SilverStripe\ORM\PaginatedList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\FormAction;
use SilverStripe\View\ArrayData;
use SilverStripe\Dev\Debug;

use SilverStripe\View\Requirements;

use SilverStripe\Forms\DropdownField;

class VideoSearchPageController extends PageController {

  private static $allowed_actions = ['VideoSearchForm'];
 
  public function init()
  {
    parent::init();
    Requirements::javascript('javascript/bootstrap/js/pagination.js', ['defer' => true]);
  }
  public function index(HTTPRequest $request)
  {
    $videos = VideoObject::get();
    $activeFilters = ArrayList::create(); // WT?? Is this some sort of SS collection???

    if ($search = $request->getVar('Keywords')) {
      $activeFilters->push(ArrayData::create([
        'label' => "'$search'"
      ]));
      $videos = VideoObject::get()->where(
        "\"Title\" LIKE '%$search%'"
      );
      // From tutorial
      // $videos = $videos->filter([
      //   'Title:PartialMatch' => $search
      // ]);
    }
    if ($catID = $request->getVar('CategoryID')) {
      $videos = $videos->filter([
        // VideoCategories is set in the VideoObject
        'VideoCategories.ID' => $catID
      ]);
    }

    $paginatedVideos = PaginatedList::create(
      $videos,
      $request
    )
      ->setPageLength(3)
      ->setPaginationGetVar('s'); //WT??? pagination start variable

    $data = [
      'Results' => $paginatedVideos,
      'Test' => 'Whatevs'
      // 'ActiveFilters' => $activeFilters
    ];
    return $data;
  }

  public function VideoSearchForm()
  {
    $form = Form::create(
      $this,
      'VideoSearchForm',
      FieldList::create(
        TextField::create('Keywords')
          ->setAttribute('placeholder', 'Search for a video'),
        DropdownField::create('CategoryID', 'Select a Category', VideoCategory::get()->map('ID', 'Title') )->setEmptyString('(Select a Category)')
      ),
      FieldList::create(
        FormAction::create('index', 'Search')
        // FormAction::create('doVideoSearch', 'Search') // WT?? what is doVideoSearch
      )
    );
    $form->setFormMethod('GET')
      ->setFormAction($this->Link()) //WT??? this->Link() is this controller
      ->disableSecurityToken()
      ->loadDataFrom($this->request->getVars()); // fill out the form with query params
    return $form;
  }

}