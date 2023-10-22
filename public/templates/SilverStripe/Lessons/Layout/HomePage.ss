<!-- BEGIN HEADER  -->
<header id="header">
  <% include TopBar %>
  <% include NavSection %>
</header>
<!-- END HEADER -->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators 
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
  </ol> -->

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active"id="slide1" style="background: url(http://placehold.it/1920x605) no-repeat left center; background-size: cover;"> <!-- Ready for JS Injection -->
      <div class="carousel-caption">
    <div class="caption sfr slider-title">Breathtaking views</div>
    <div class="caption sfl slider-subtitle">Relaxation in the Bay of Belfalas</div>
    <a href="#" class="caption sfb btn btn-default btn-lg">Learn More</a>
      </div>
    </div>
    <div class="item" id="slide2" style="background: url(http://placehold.it/1920x605) no-repeat left center; background-size: cover;"> 
      <div class="carousel-caption">
    <div class="caption sfr slider-title">The simple life</div>
    <div class="caption sfl slider-subtitle">Lush gardens in Mordor</div>
    <a href="#" class="caption sfb btn btn-default btn-lg">Learn More</a>
      </div>
    </div>
  </div>
  <!-- Blue Filter -->
  <div id="home-search-section"></div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>



</div>		
<!-- END HOME SLIDER SECTION -->

<!-- BEGIN HOME ADVANCED SEARCH -->
<div id="home-advanced-search" class="open">
  <div id="opensearch"></div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <form>
          <div class="form-group">
            <div class="form-control-small">
              <div class='input-group date chzn-container' data-datepicker>
                <input placeholder="Arrive on..." type='text' class="form-control" data-date-format="DD/MM/YYYY"/>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
            
            <div class="form-control-small">
              <select id="search_status" name="search_status" data-placeholder="Stay...">
                <option value=""> </option>
                <option value="1">1 Night</option>
                <option value="2">2 Nights</option>
                <option value="3">3 Nights</option>
                <option value="4">4 Nights</option>
                <option value="5">5 Nights</option>
                <option value="6">6 Nights</option>
                <option value="7">7 Nights</option>
                <option value="8">8 Nights</option>
                <option value="9">9 Nights</option>
                <option value="10">10 Nights</option>
                <option value="11">11 Nights</option>
                <option value="12">12 Nights</option>
                <option value="13">13 Nights</option>
                <option value="14">14 Nights</option>
              </select>
            </div>
            
            <div class="form-control-small">
              <select id="search_bedrooms" name="search_bedrooms" data-placeholder="Bedrooms">
                <option value=""> </option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="5plus">5+</option>
              </select>
            </div>
            <div class="form-control-large">
              <input type="text" class="form-control" name="location" placeholder="City, State, Country, etc...">
            </div>
            <button type="submit" class="btn btn-fullcolor">Search</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
<!-- END HOME ADVANCED SEARCH -->


<!-- BEGIN CONTENT WRAPPER -->
<div class="content">
  <div class="container">
    <div class="row">
    
      <!-- BEGIN MAIN CONTENT -->
      <div class="main col-sm-8">
        <h1 class="section-title">Featured Properties</h1>

        <div class="grid-style1 clearfix">
          <% loop $FeaturedProperties %>
            <div class="item col-md-4">
                <div class="image">
                    <a href="$Link">
                        <h3>$Title</h3>
                        <span class="location">$Region.Title</span>
                    </a>
                    $PrimaryPhoto.Fill(220,194)
                </div>
                <div class="price">
                    <span>$PricePerNight.Nice</span><p>per night<p>
                </div>
                <ul class="amenities">
                    <li><i class="icon-bedrooms"></i> $Bedrooms</li>
                    <li><i class="icon-bathrooms"></i> $Bathrooms</li>
                </ul>
            </div>
          <% end_loop %>
          <%-- <div class="item col-md-4">
            <div class="image">
              <a href="properties-detail.html">
                <h3>Luxury Apartment with great views</h3>
                <span class="location">Upper East Side, New York</span>
              </a>
              <img src="http://placehold.it/760x670" alt="" />
            </div>
            <div class="price">
              <span>$950</span><p>per night<p>
            </div>
            <ul class="amenities">
              <li><i class="icon-bedrooms"></i> 4</li>
              <li><i class="icon-bathrooms"></i> 3</li>
            </ul>
          </div>
          
          <div class="item col-md-4">
            <div class="image">
              <a href="properties-detail.html">
                <h3>Stunning Villa with 5 bedrooms</h3>
                <span class="location">Miami Beach, Florida</span>
              </a>
              <img src="http://placehold.it/760x670" alt="" />
            </div>
            <div class="price">
              <span>$1,300</span><p>per night<p>
            </div>
            <ul class="amenities">
              <li><i class="icon-bedrooms"></i> 5</li>
              <li><i class="icon-bathrooms"></i> 2</li>
            </ul>
          </div>
          
          <div class="item col-md-4">
            <div class="image">
              <a href="properties-detail.html">
                <h3>Recent construction with 3 bedrooms</h3>
                <span class="location">Park Slope, New York</span>
              </a>
              <img src="http://placehold.it/760x670" alt="" />
            </div>
            <div class="price">
              <span>$560</span><p>per night<p>
            </div>
            <ul class="amenities">
              <li><i class="icon-bedrooms"></i> 3</li>
              <li><i class="icon-bathrooms"></i> 2</li>
            </ul>
          </div>
          
          <div class="item col-md-4">
            <div class="image">
              <a href="properties-detail.html">
                <h3>Modern construction with parking space</h3>
                <span class="location">Midtown, New York</span>
              </a>
              <img src="http://placehold.it/760x670" alt="" />
            </div>
            <div class="price">
              <span>$85</span><p>per night<p>
            </div>
            <ul class="amenities">
              <li><i class="icon-bedrooms"></i> 1</li>
              <li><i class="icon-bathrooms"></i> 2</li>
            </ul>
          </div>
          
          <div class="item col-md-4">
            <div class="image">
              <a href="properties-detail.html">
                <h3>Single Family Townhouse</h3>
                <span class="location">Cobble Hill, New York</span>
              </a>
              <img src="http://placehold.it/760x670" alt="" />
            </div>
            <div class="price">									
              <span>$840</span><p>per night<p>
            </div>
            <ul class="amenities">
              <li><i class="icon-bedrooms"></i> 2</li>
              <li><i class="icon-bathrooms"></i> 2</li>
            </ul>
          </div>
          
          <div class="item col-md-4">
            <div class="image">
              <a href="properties-detail.html">
                <h3>3 bedroom villa with garage for rent</h3>
                <span class="location">Bal Harbour, Florida</span>
              </a>
              <img src="http://placehold.it/760x670" alt="" />
            </div>
            <div class="price">									
              <span>$150</span><p>per night<p>
            </div>
            <ul class="amenities">
              <li><i class="icon-bedrooms"></i> 3</li>
              <li><i class="icon-bathrooms"></i> 2</li>
            </ul>
          </div> --%>
        </div>

        
        
        <div class="row">
          <div class="col-sm-12">
            <h1 class="section-title">Popular Regions</h1>
            <div id="regions">
              <div class="item">
                <a href="#">
                  <img src="http://placehold.it/194x194" alt=""  />
                  <h3>Rhovanion</h3>
                </a>
              </div>
              <div class="item">
                <a href="#">
                  <img src="http://placehold.it/194x194" alt="" />
                  <h3>Eriador</h3>
                </a>
              </div>
              <div class="item">
                <a href="#">
                  <img src="http://placehold.it/194x194" alt=""  />
                  <h3>Bay of Belfalas</h3>
                </a>
              </div>
              <div class="item">
                <a href="#">
                  <img src="http://placehold.it/194x194" alt="" />
                  <h3>Mordor</h3>
                </a>
              </div>

              <div class="item">
                <a href="#">
                  <img src="http://placehold.it/194x194" alt=""  />
                  <h3>The Southwest</h3>
                </a>
              </div>
              <div class="item">
                <a href="#">
                  <img src="http://placehold.it/194x194" alt="" />
                  <h3>Arnor</h3>
                </a>
              </div>
            </div>
          </div>
        </div>

        <h1 class="section-title">Recent Articles</h1>
        <div class="grid-style1">
          <%-- <% loop $LatestArticles(3) %> --%>
          <% loop $RelatedArticles %>
              <div class="item col-md-4">
                  <div class="image">
                    <a href="$Link">
                      <span class="btn btn-default"> Read More</span>
                    </a>
                    $Photo.Fit(220,148)
                  </div>
                  <div class="tag"><i class="fa fa-file-text"></i></div>
                  <div class="info-blog">
                      <ul class="top-info">
                          <li><i class="fa fa-calendar"></i> $Date.Format('j F, Y')</li>
                           <li><i class="fa fa-pencil"></i>$getAuthor</li>
                           <%-- WTF, cant get author or date --%>
                          <%-- <li><i class="fa fa-tags"></i> $CategoriesList</li> --%>
                      </ul>
                      <h3>
                          <a href="$Link">$Title - $Author</a>
                      </h3>
                      <%-- <p>$Content.FirstSentence</p> --%>
                      <p><% if $Teaser %>TEASER: $Teaser<% else %>$Content.FirstSentence<% end_if %></p>
                  </div>
              </div>
          <% end_loop %>
        </div>
        <div class="center"><a href="#" class="btn btn-default-color">View All News</a></div>
      </div>
      <!-- END MAIN CONTENT -->
      
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar col-sm-4">
        
        <!-- BEGIN SIDEBAR ABOUT -->
        <div class="col-sm-12">
          <h2 class="section-title">Last minute deals</h2>
          <ul class="latest-news">
          <li class="col-md-12">
            <div class="image">
              <a href="blog-detail.html"></a>
              <img alt="" src="http://placehold.it/100x100">
            </div>
            
            <ul class="top-info">
              <li><i class="fa fa-calendar"></i>Available Now</li>
            </ul>
              
            <h4><a href="blog-detail.html">Private Beach</a><p>Lossarnach, Eriado</p></h4>
          </li>
          <li class="col-md-12">
            <div class="image">
              <a href="blog-detail.html"></a>
              <img alt="" src="http://placehold.it/100x100">
            </div>
            
            <ul class="top-info">
              <li><i class="fa fa-calendar"></i>Available on 24 July</li>
            </ul>
              
            <h4><a href="blog-detail.html">Mountain views</a><p>Hyarnustar, Rhovanion</p></h4>
          </li>
          <li class="col-md-12">
            <div class="image">
              <a href="blog-detail.html"></a>
              <img alt="" src="http://placehold.it/100x100">
            </div>
            
            <ul class="top-info">
              <li><i class="fa fa-calendar"></i>Available 5 July</li>
            </ul>
            
            <h4><a href="blog-detail.html">Heart of the village</a><p>Minhiriath, Eriador</p></h4>
          </li>
          <li class="col-md-12">
            <div class="image">
              <a href="blog-detail.html"></a>
              <img alt="" src="http://placehold.it/100x100">
            </div>
            
            <ul class="top-info">
              <li><i class="fa fa-calendar"></i>Available 6 July</li>
            </ul>
            
            <h4><a href="blog-detail.html">The city life</a><p>West Beleriand, Mordor</p></h4>
          </li></ul>
          <p class="center"><a class="btn btn-fullcolor" href="#">More deals</a></p>
        </div>
        <!-- END SIDEBAR ABOUT -->
        
        
        <div class="col-sm-12">
          <h2 class="section-title">Activity</h2>
          <ul class="activity">
            <li class="col-lg-12">
              <a href="#"><img src="http://placehold.it/70x70" alt="" /></a>
              <div class="info">										
                <h5>Sam Minnée reviewed <a href="#">The House With No Windows</a></h4>
                <p>Awesome solitary confinement, mate. Spot on. Sweet as.</p>
                <h6>Just now</h6>
              </div>
            </li>
            <li class="col-lg-12">
              <a href="#"><img src="http://placehold.it/70x70" alt="" /></a>
              <div class="info">
                <h5>Ingo Schoomer asked a question about <a href="#">The Mistake by the Lake</a></h4>
                <p>Has this house been unit tested?</p>
                <h6>37 minutes ago</h6>
              </div>
            </li>
          </ul>
        </div>
        
        
        
      </div>
      <!-- END SIDEBAR -->
      
    </div>
  </div>
</div>
<!-- END CONTENT WRAPPER -->




<!-- BEGIN CONTENT -->
<%-- <div class="content">
  <div class="container">
    <div class="row">
      <div class="main col-sm-8">						
          <h1 class="section-title">Nunc enim nulla HOME</h1>
          <p class="darker-text">Donec magna justo, laoreet sed consectetur non, malesuada non neque. Aenean vehicula vitae dui eu convallis. Cras a venenatis urna, ac congue nulla.</p>
          <p>Donec ex sapien, semper sit amet sodales suscipit, imperdiet in metus. Aliquam maximus mi eget finibus cursus. Duis a nisi tempus, porta eros sit amet, placerat urna. Vivamus varius enim ut sem imperdiet lacinia. Cras sed mauris ac felis rhoncus sodales sit amet eget ante. In metus purus, tristique a porttitor ac, sollicitudin vitae arcu. Quisque ac vehicula nulla. Morbi finibus facilisis cursus. Praesent sollicitudin sem id fermentum dignissim. Donec dictum dui a accumsan finibus. Quisque velit purus, lobortis et aliquam sit amet, sagittis eget lorem. Integer ut elit nisi.</p>
          <p>Ut vel facilisis leo. Cras feugiat dolor faucibus, porttitor nisl euismod, tempus tellus. Donec varius cursus velit eu aliquam. Nulla facilisi. Pellentesque sit amet nunc nisl. Suspendisse tortor dolor, sagittis vel mattis vel, commodo eu metus. Proin a hendrerit mi. Sed blandit ante mi, nec elementum lacus elementum in. Quisque at risus nunc. Vestibulum quis diam id massa sodales viverra sit amet et nulla. Quisque commodo faucibus dignissim. Ut eros neque, tristique tincidunt sapien non, fermentum elementum metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
          <p>Phasellus pellentesque metus neque, quis consequat neque hendrerit eget. Vestibulum nunc mauris, venenatis id mi et, ornare consectetur nisl. Nunc molestie sem tempor ante mattis, et consectetur dolor ornare. In congue elit gravida nisi semper gravida. Maecenas posuere mollis ligula, quis malesuada elit pretium vitae. Nulla aliquam eget justo sollicitudin fermentum. Nunc ac justo at arcu aliquet iaculis non non lacus. In nisi tellus, mollis nec volutpat nec, sagittis ac neque. Sed in aliquam risus. Sed in tristique nisl. Ut in tellus non neque pellentesque venenatis eget sed risus. Nulla facilisi. Duis efficitur velit nunc, et mattis enim dictum vitae. Integer tincidunt quam quis vulputate tempor. Donec sagittis tortor vitae consectetur sodales. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
      </div>
      
      <div class="sidebar gray col-sm-4">
        <h2 class="section-title">In this section</h2>
        <ul class="categories subnav">
          <li><a href="#">Company</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Careers</a></li>
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">Terms of Use</a></li>
          <li><a href="#">Privacy Policy</a></li>
        </ul>
      </div>
    </div>
  </div>
</div> --%>
<!-- END CONTENT -->
<% include Footer %>