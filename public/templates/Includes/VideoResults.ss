<% if $Results %>
  <div class="search-results">
    <% loop $Results %>
    <a href="$VideoPage.link" class="row">
      <% if $VideoThumbnail %>
        <div class="col-md-4">
          <img src="$VideoThumbnail.URL" style="width:100%"/>
        </div>
      <% end_if %>
      <div class="col-md-6">
        <h3>$Title</h2>
          <% if VideoCategories %>
            <ul>
              <% loop VideoCategories %>
              <li>$Title</li>
            <% end_loop %>
          </ul> 
        <% end_if %>
      </div>
    </a>
    <hr>
    <% end_loop %>
</div>
<%-- <% else_if % %> I had this instead of the below and SS failed silently--%>
<% else %>
<p>Not results found...</p>
<% end_if %>