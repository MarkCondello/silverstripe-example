<!-- BEGIN HEADER  -->
<header id="header">
  <% include TopBar %>
  <% include NavSection %>
</header>
<% include BreadCrumbs %>
<!-- END PAGE TITLE/BREADCRUMB -->
<!-- BEGIN CONTENT WRAPPER -->
<div class="content">
	<div class="container">
		<div class="row">
      <div class="main col-sm-8">
				<div class="blog-main-image">
        <% loop $VideoObjects.limit(1) %>
          <h1 class="blog-title">$Title</h1>
          <video height="200" width="400" controls>
            <source src="$VideoSource.URL" type="video/mp4">
          </video>
          <% if $Description %>
          <p>$Description</p>
          <% end_if %>
          <ul>
            <% loop $videoCategories %>
            <li>$Title</li>
            <% end_loop %>
          </ul>
        <% end_loop %>
					<div class="tag"><i class="fa fa-file-text"></i></div>
				</div>
      </div>
    </div>
  </div>
</div>