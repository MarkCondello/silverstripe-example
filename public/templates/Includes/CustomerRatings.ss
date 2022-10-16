<% if $CustomerRatings %>
<hr>
<h3>Customer ratings:</h3>
<ul>
<% loop $CustomerRatings %>
  <li>Name: $CustomerName - $Rating</li>
<% end_loop %>
</ul>
<% end_if %>
<hr>
$CustomerRatingForm
