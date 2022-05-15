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
<%--  <div class="search-results">
        <% loop $GetVids %>
        <a href="$VideoPage.link">
          <h3>$Title</h2>
        </a>
        <% end_loop %>
      </div> --%>
      <% if $Results %>
        <div class="search-results">
          <% loop $Results %>
          <a href="$VideoPage.link">
            <h3>$Title</h2>
          </a>
          <% end_loop %>
      </div>
      <%-- <% else_if % %> I had this instead of the below and SS failed silently--%>
      <% else %>
      <p>Not results found...</p>
      <% end_if %>
    </div>
    <% include Pagination %>
  </div>
</div>