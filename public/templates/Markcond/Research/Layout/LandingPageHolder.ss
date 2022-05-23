<!-- BEGIN HEADER  -->
<header id="header">
  <% include TopBar %>
  <% include NavSection %>
</header>
<% include BreadCrumbs subTitle="LANDING PAGE HOLDER" %>
<!-- END PAGE TITLE/BREADCRUMB -->
<!-- BEGIN CONTENT WRAPPER -->
<div class="content">
	<div class="container">
    <div class="row">
       $LandingPageCategoryFilter  
    </div>
		<div class="row">
      <div class="main col-sm-8">
        <% include Pagination %>
        <% if $Results %>
        <% loop $Results %>
          <div class="item col-md-12">
            <div class="info-blog">
              <ul class="top-info">
                <% if $ServiceType %>
                <li>$ServiceType.Name</li>
                <% end_if %>
              </ul>
              <h3>
                <a href="$Link">$Title</a>
              </h3>
              <% if $Teaser %>
              <p>Abstract: $Teaser</p>
              <% else  %>
              <p>$Content.FirstSentence</p>
              <% end_if %>
            </div>
          </div>
          <hr class="col-md-12">
        <% end_loop %>
        <% else %>
        <p>There are not results found</p>
        <% end_if %>
      </div>
    </div>
  </div>
</div>