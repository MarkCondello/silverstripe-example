<div class="image">
  <a href="blog-detail.html">
    <span class="btn btn-default">Read More</span>
  </a>
  <% if $Photo %>
    $Photo.Fit(242,156) 
  <% else %>
  <img src="https://via.placeholder.com/766x515?text=Visit+Blogging.com+Now%20C/O%20https://placeholder.com/" alt="" />
  <% end_if %>
</div>
<div class="tag"><i class="fa fa-file-text"></i></div>
<div class="info-blog">
  <ul class="top-info">
    <li><i class="fa fa-calendar"></i>$Date by $Author</li>
    <li><i class="fa fa-comments-o"></i> 2</li>
    <li><i class="fa fa-tags"></i> Properties, Prices, best deals</li>
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