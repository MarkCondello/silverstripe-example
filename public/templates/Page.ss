<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<!-- Page Title -->
	<title>One Ring Rentals - Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<!-- IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> 
	<![endif]-->
	<!-- Google Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,500,900%7COpen+Sans:400,700,400italic" rel="stylesheet" type="text/css" />
</head>
<body>
	<p>$CurrentMember.DateOfBirth</p>
	<p>$CurrentMember.GreetMember</p>
	<p>$CurrentMember.Position</p>
	<img src="$CurrentMember.ProfileImage.URL" width="40"/>
	<div id="wrapper">
		$Layout
	</div>
	<%-- <div id="app"></div> This is the react dom container--%>
	<script src="/react/javascript/bundle.js"></script>	
</body>
</html>
<!-- The static templates for the tutes can be found here: https://github.com/silverstripe/one-ring-rentals/tree/master/themes/one-ring/static -->