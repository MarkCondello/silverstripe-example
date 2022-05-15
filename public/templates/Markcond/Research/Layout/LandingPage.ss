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
        <h2>Markcond/Research Namespaced Layout | $serviceTypeName</h2>  
        <p>$Content</p>
        <% if $GetCustomerRatings %>
        <hr>
        <ul>
        <% loop $GetCustomerRatings %>
          <li>Name: $CustomerName - $Rating</li>
        <% end_loop %>
        </ul>
        <% end_if %>
        <hr>
        $CustomerRatingForm
      </div>
    </div>
  </div>
</div>