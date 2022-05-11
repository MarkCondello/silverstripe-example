<div id="nav-section">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <a href="index.html" class="nav-logo"><img src="/images/logo.png" alt="One Ring Rentals" /></a>            
        <!-- BEGIN MAIN MENU -->
        <nav class="navbar">
          <button id="nav-mobile-btn"><i class="fa fa-bars"></i></button>
          <ul class="nav navbar-nav">
            <% loop $Menu(1) %>
                <li>
                    <a href="$Link" title="Go to the $Title page" class="<% if $isCurrent %>current<% else_if $isSection %>section<% end_if %>">
                        $MenuTitle
                    </a>
                    <%-- <% if $isSection %>
                        <% if $Children %>
                            <ul class="secondary">
                                <% loop $Children %>
                                    <li class="<% if $isCurrent %>current<% else_if $isSection %>section<% end_if %>"><a href="$Link">$MenuTitle</a></li>
                                <% end_loop %>
                            </ul>
                        <% end_if %>
                    <% end_if %> --%>
                </li>
            <% end_loop %>
          </ul>
        </nav>
        <!-- END MAIN MENU -->
      </div>
    </div>
  </div>
</div>