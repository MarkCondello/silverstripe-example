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
    <div class="row">
      <div class="col-md-6">
        <ul class="list-unstyled">
        <% loop $VideoComments %>
          <li class="media my-5">
            <div class="media-body">
            <h5 class="mt-0 mb-1">$Name </h5> $Comment
            </div>
          </li>
        <% end_loop %>
      </ul>
      </div>
    </div>
    <div class="row">
      <h1>Comment form:</h1>
      <div class="col-md-6">
        $CommentForm
      </div>
    </div>
  </div>
</div>