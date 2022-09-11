<!-- BEGIN HEADER  -->
<header id="header">
  <% include TopBar %>
  <% include NavSection %>
</header>
<% include BreadCrumbs subTitle=$Test %>
<!-- END PAGE TITLE/BREADCRUMB -->
<!-- BEGIN CONTENT WRAPPER -->
<div class="content">
	<div class="container">
    <% include Pagination %>
 		<div class="row">
      <div class="col-lg-2">
        <div class="search-form">
          $VideoSearchForm
        </div>
      </div>
      <div class="col-lg-8">
        <% include VideoResults %>
    </div>
    <% include Pagination %>
  </div>

  <div id="counter"></div>

</div>