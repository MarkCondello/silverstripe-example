<?php 
namespace SilverStripe\Lessons;

use SilverStripe\Admin\ModelAdmin;

class CategoriesAdmin extends ModelAdmin 
{
  private static $table_name = 'Categories';

  // We need 3 items for ModelAdmins (MenuTitle, Url Segment and the Managed Models)
  private static $menu_title = 'Categories';
  private static $url_segment = 'categories';

  private static $managed_models = [
    VideoCategory::class
  ];
}