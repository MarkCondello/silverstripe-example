<!-- BEGIN HEADER  -->
<header id="header">
  <% include TopBar %>
  <% include NavSection %>
</header>
<% include BreadCrumbs subTitle=$BannerTitle %>
<!-- END PAGE TITLE/BREADCRUMB -->
<!-- BEGIN CONTENT WRAPPER -->
<div class="content">
	<div class="container">
		<div class="row">
      <div class="main col-sm-8">
        <%-- Markcond/Research Namespaced Layout --%>
        <h2>Service type: $serviceTypeName</h2>
        <p>$Content</p>
        <% include CustomerRatings %>
      </div>
    </div>
  </div>
</div>