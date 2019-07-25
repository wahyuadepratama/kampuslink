<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
	{{-- bootstrap 4.1.3 --}}
	<link rel="stylesheet" href="{{asset('client/css/bootstrap.css')}}">
	{{-- fontawesome 5.9.0 --}}
	<link rel="stylesheet" href="{{asset('client/vendors/fontawesome-5.9.0/css/all.min.css')}}">
	{{-- style khusus koran --}}
	<link rel="stylesheet" type="text/css" href="{{asset('client/vendors/slick/slick.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('client/vendors/slick/slick-theme.css')}}"/>
	<link rel="stylesheet" href="{{asset('client/css/style2.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
</head>
<body>
<header>
	<div class="container">
		<div class="header-data">
			<div class="logo">
				<a href="#" title=""><img src="{{asset('client/img/logo/icon.png')}}" width="100%"  width="100%"  alt=""></a>
			</div><!--logo end-->
			<div class="search-bar">
				<form>
					<input type="text" name="search" placeholder="Cari organisasi...">
					<button type="submit"><i class="fas fa-search"></i></button>
				</form>
			</div><!--search-bar end-->
			<nav>
				<ul>
					<li>
						<a href="#" title="">
							<span><img src="" alt=""></span>
							Home
						</a>
					</li>
					<li>
						<a href="#" title="">
							<span><img src="{{asset('client/img/template-koran/icon.png')}}" alt=""></span>
							Companies
						</a>
					</li>
					<li>
						<a href="#" title="">
							<span><img src="{{asset('client/img/template-koran/icon.png')}}" alt=""></span>
							Projects
						</a>
					</li>
					<li class="profil">
						<a href="#" title="">
							<span><img src="{{asset('client/img/template-koran/icon.png')}}" alt=""></span>
							Profiles
						</a>
						<ul>
							<li><a href="user-profile.html" title="">User Profile</a></li>
							<li><a href="my-profile-feed.html" title="">my-profile-feed</a></li>
						</ul>
					</li>
					<li>
						<a href="#" title="">
							<span><img src="{{asset('client/img/template-koran/icon.png')}}" alt=""></span>
							Jobs
						</a>
					</li>
					<li class="pesan">
						<a href="#" title="" class="not-box-open">
							<span><img src="{{asset('client/img/template-koran/icon6.png')}}" alt=""></span>
							Messages
						</a>
						<div class="notification-box msg d1">
							<div class="nt-title">
								<h4>Setting</h4>
								<a href="#" title="">Clear all</a>
							</div>
							<div class="nott-list">
								<div class="notfication-details">
					  				<div class="noty-user-img">
					  					<img src="{{asset('client/img/logo/icon.png')}}" width="100%"  alt="">
					  				</div>
					  				<div class="notification-info">
					  					<h3><a href="#" title="">Jassica William</a> </h3>
					  					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
					  					<span>2 min ago</span>
					  				</div><!--notification-info -->
				  				</div>
				  				<div class="notfication-details">
					  				<div class="noty-user-img">
					  					<img src="{{asset('client/img/logo/icon.png')}}" width="100%"  alt="">
					  				</div>
					  				<div class="notification-info">
					  					<h3><a href="#" title="">Jassica William</a></h3>
					  					<p>Lorem ipsum dolor sit amet.</p>
					  					<span>2 min ago</span>
					  				</div><!--notification-info -->
				  				</div>
				  				<div class="notfication-details">
					  				<div class="noty-user-img">
					  					<img src="{{asset('client/img/logo/icon.png')}}" width="100%"  alt="">
					  				</div>
					  				<div class="notification-info">
					  					<h3><a href="#" title="">Jassica William</a></h3>
					  					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempo incididunt ut labore et dolore magna aliqua.</p>
					  					<span>2 min ago</span>
					  				</div><!--notification-info -->
				  				</div>
				  				<div class="view-all-nots">
				  					<a href="#" title="">View All Messsages</a>
				  				</div>
							</div><!--nott-list end-->
						</div><!--notification-box end-->
					</li>
					<li class="notif">
						<a href="#" title="" class="not-box-open">
							<span><img src="{{asset('client/img/template-koran/icon7.png')}}" alt=""></span>
							Notification
						</a>
						<div class="notification-box d2">
							<div class="nt-title">
								<h4>Setting</h4>
								<a href="#" title="">Clear all</a>
							</div>
							<div class="nott-list">
								<div class="notfication-details">
					  				<div class="noty-user-img">
					  					<img src="{{asset('client/img/logo/icon.png')}}" width="100%"  alt="">
					  				</div>
					  				<div class="notification-info">
					  					<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
					  					<span>2 min ago</span>
					  				</div><!--notification-info -->
				  				</div>
				  				<div class="notfication-details">
					  				<div class="noty-user-img">
					  					<img src="{{asset('client/img/logo/icon.png')}}" width="100%"  alt="">
					  				</div>
					  				<div class="notification-info">
					  					<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
					  					<span>2 min ago</span>
					  				</div><!--notification-info -->
				  				</div>
				  				<div class="notfication-details">
					  				<div class="noty-user-img">
					  					<img src="{{asset('client/img/logo/icon.png')}}" width="100%"  alt="">
					  				</div>
					  				<div class="notification-info">
					  					<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
					  					<span>2 min ago</span>
					  				</div><!--notification-info -->
				  				</div>
				  				<div class="notfication-details">
					  				<div class="noty-user-img">
					  					<img src="{{asset('client/img/logo/icon.png')}}" width="100%"  alt="">
					  				</div>
					  				<div class="notification-info">
					  					<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
					  					<span>2 min ago</span>
					  				</div><!--notification-info -->
				  				</div>
				  				<div class="view-all-nots">
				  					<a href="#" title="">View All Notification</a>
				  				</div>
							</div><!--nott-list end-->
						</div><!--notification-box end-->
					</li>
				</ul>
			</nav><!--nav end-->
			<div class="menu-btn">
				<a href="#" title=""><i class="fa fa-bars"></i></a>
			</div><!--menu-btn end-->
			<div class="user-account">
				<div class="user-info">
					<img src="{{asset('client/img/template-koran/user.png')}}" alt="">
					<a href="#" title="">John</a>
					<i class="la la-sort-down"></i>
				</div>
				<div class="user-account-settingss">
					<h3>Online Status</h3>
					<ul class="on-off-status">
						<li>
							<div class="fgt-sec">
								<input type="radio" name="cc" id="c5">
								<label for="c5">
									<span></span>
								</label>
								<small>Online</small>
							</div>
						</li>
						<li>
							<div class="fgt-sec">
								<input type="radio" name="cc" id="c6">
								<label for="c6">
									<span></span>
								</label>
								<small>Offline</small>
							</div>
						</li>
					</ul>
					<h3>Custom Status</h3>
					<div class="search_form">
						<form>
							<input type="text" name="search">
							<button type="submit">Ok</button>
						</form>
					</div><!--search_form end-->
					<h3>Setting</h3>
					<ul class="us-links">
						<li><a href="profile-account-setting.html" title="">Account Setting</a></li>
						<li><a href="#" title="">Privacy</a></li>
						<li><a href="#" title="">Faqs</a></li>
						<li><a href="#" title="">Terms &amp; Conditions</a></li>
					</ul>
					<h3 class="tc"><a href="#" title="">Logout</a></h3>
				</div><!--user-account-settingss end-->
			</div>
		</div><!--header-data end-->
	</div>
</header>

<main>
	<div class="main-section">
		<div class="container">
			<div class="main-section-data">
				<div class="row">
					<div class="col-lg-3 col-md-4 pd-left-none no-pd">
						<div class="main-left-sidebar no-margin">
							<div class="user-data full-width">
								<div class="user-profile">
									<div class="username-dt">
										<div class="usr-pic">
											<img src="{{asset('client/img/template-koran/user-pic.png')}}" alt="">
										</div>
									</div><!--username-dt end-->
									<div class="user-specs">
										<h3>John Doe</h3>
										<span>Graphic Designer at Self Employed</span>
									</div>
								</div><!--user-profile end-->
								<ul class="user-fw-status">
									<li>
										<h4>Following</h4>
										<span>34</span>
									</li>
									<li>
										<h4>Followers</h4>
										<span>155</span>
									</li>
									<li>
										<a href="#" title="">View Profile</a>
									</li>
								</ul>
							</div><!--user-data end-->
							<div class="suggestions full-width">
								<div class="sd-title">
									<h3>Suggestions</h3>
									<i class="la la-ellipsis-v"></i>
								</div><!--sd-title end-->
								<div class="suggestions-list">
									<div class="suggestion-usd">
										<img src="{{asset('client/img/template-koran/s1.png')}}" alt="">
										<div class="sgt-text">
											<h4>Jessica William</h4>
											<span>Graphic Designer</span>
										</div>
										<span><i class="la la-plus"></i></span>
									</div>
									<div class="suggestion-usd">
										<img src="{{asset('client/img/template-koran/s2.png')}}" alt="">
										<div class="sgt-text">
											<h4>John Doe</h4>
											<span>PHP Developer</span>
										</div>
										<span><i class="la la-plus"></i></span>
									</div>
									<div class="suggestion-usd">
										<img src="{{asset('client/img/template-koran/s3.png')}}" alt="">
										<div class="sgt-text">
											<h4>Poonam</h4>
											<span>Wordpress Developer</span>
										</div>
										<span><i class="la la-plus"></i></span>
									</div>
									<div class="suggestion-usd">
										<img src="{{asset('client/img/template-koran/s4.png')}}" alt="">
										<div class="sgt-text">
											<h4>Bill Gates</h4>
											<span>C &amp; C++ Developer</span>
										</div>
										<span><i class="la la-plus"></i></span>
									</div>
									<div class="suggestion-usd">
										<img src="{{asset('client/img/template-koran/s5.png')}}" alt="">
										<div class="sgt-text">
											<h4>Jessica William</h4>
											<span>Graphic Designer</span>
										</div>
										<span><i class="la la-plus"></i></span>
									</div>
									<div class="suggestion-usd">
										<img src="{{asset('client/img/template-koran/s6.png')}}" alt="">
										<div class="sgt-text">
											<h4>John Doe</h4>
											<span>PHP Developer</span>
										</div>
										<span><i class="la la-plus"></i></span>
									</div>
									<div class="view-more">
										<a href="#" title="">View More</a>
									</div>
								</div><!--suggestions-list end-->
							</div><!--suggestions end-->
							<div class="tags-sec full-width">
								<ul>
									<li><a href="#" title="">Help Center</a></li>
									<li><a href="#" title="">About</a></li>
									<li><a href="#" title="">Privacy Policy</a></li>
									<li><a href="#" title="">Community Guidelines</a></li>
									<li><a href="#" title="">Cookies Policy</a></li>
									<li><a href="#" title="">Career</a></li>
									<li><a href="#" title="">Language</a></li>
									<li><a href="#" title="">Copyright Policy</a></li>
								</ul>
								<div class="cp-sec">
									<img src="{{asset('client/img/template-koran/logo2.png')}}" alt="">
									<p><img src="{{asset('client/img/template-koran/cp.png')}}" alt="">Copyright 2017</p>
								</div>
							</div><!--tags-sec end-->
						</div><!--main-left-sidebar end-->
					</div>
					<div class="col-lg-6 col-md-8 no-pd">
						<div class="main-ws-sec">
							<div class="post-topbar">
								<div class="user-picy">
									<img src="{{asset('client/img/template-koran/user-pic.png')}}" alt="">
								</div>
								<div class="post-st">
									<ul>
										<li><a class="post_project" href="#" title="">Post a Project</a></li>
										<li><a class="post-jb active" href="#" title="">Post a Job</a></li>
									</ul>
								</div><!--post-st end-->
							</div><!--post-topbar end-->
							<div class="posts-section">
								<div class="post-bar">
									<div class="post_topbar">
										<div class="usy-dt">
											<img src="{{asset('client/img/template-koran/us-pic.png')}}" alt="">
											<div class="usy-name">
												<h3>John Doe</h3>
												<span><img src="{{asset('client/img/template-koran/clock.png')}}" alt="">3 min ago</span>
											</div>
										</div>
										<div class="ed-opts">
											<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
											<ul class="ed-options">
												<li><a href="#" title="">Edit Post</a></li>
												<li><a href="#" title="">Unsaved</a></li>
												<li><a href="#" title="">Unbid</a></li>
												<li><a href="#" title="">Close</a></li>
												<li><a href="#" title="">Hide</a></li>
											</ul>
										</div>
									</div>
									<div class="epi-sec">
										<ul class="descp">
											<li><img src="{{asset('client/img/template-koran/icon8.png')}}" alt=""><span>Epic Coder</span></li>
											<li><img src="{{asset('client/img/template-koran/icon9.png')}}" alt=""><span>India</span></li>
										</ul>
										<ul class="bk-links">
											<li><a href="#" title=""><i class="far fa-bookmark"></i></a></li>
											<li><a href="#" title=""><i class="far fa-envelope"></i></a></li>
										</ul>
									</div>
									<div class="job_descp">
										<h3>Senior Wordpress Developer</h3>
										<ul class="job-dt">
											<li><a href="#" title="">Full Time</a></li>
											<li><span>$30 / hr</span></li>
										</ul>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
										<ul class="skill-tags">
											<li><a href="#" title="">HTML</a></li>
											<li><a href="#" title="">PHP</a></li>
											<li><a href="#" title="">CSS</a></li>
											<li><a href="#" title="">Javascript</a></li>
											<li><a href="#" title="">Wordpress</a></li> 	
										</ul>
									</div>
									<div class="job-status-bar">
										<ul class="like-com">
											<li>
												<a href="#"><i class="fas fa-heart"></i> Like</a>
												<img src="{{asset('client/img/template-koran/liked-img.png')}}" alt="">
												<span>25</span>
											</li> 
											<li><a href="#" title="" class="com"><img src="{{asset('client/img/template-koran/com.png')}}" alt=""> Comment 15</a></li>
										</ul>
										<a><i class="far fa-eye"></i></i>Views 50</a>
									</div>
								</div><!--post-bar end-->
								<div class="top-profiles">
									<div class="pf-hd">
										<h3>Top Profiles</h3>
										<i class="la la-ellipsis-v"></i>
									</div>
									<div class="profiles-slider">
										<div class="user-profy">
											<img src="{{asset('client/img/template-koran/user1.png')}}" alt="">
											<h3>John Doe</h3>
											<span>Graphic Designer</span>
											<ul>
												<li><a href="#" title="" class="followw">Follow</a></li>
												<li><a href="#" title="" class="envlp"><img src="{{asset('client/img/template-koran/envelop.png')}}" alt=""></a></li>
												<li><a href="#" title="" class="hire">hire</a></li>
											</ul>
											<a href="#" title="">View Profile</a>
										</div><!--user-profy end-->
										<div class="user-profy">
											<img src="{{asset('client/img/template-koran/user2.png')}}" alt="">
											<h3>John Doe</h3>
											<span>Graphic Designer</span>
											<ul>
												<li><a href="#" title="" class="followw">Follow</a></li>
												<li><a href="#" title="" class="envlp"><img src="{{asset('client/img/template-koran/envelop.png')}}" alt=""></a></li>
												<li><a href="#" title="" class="hire">hire</a></li>
											</ul>
											<a href="#" title="">View Profile</a>
										</div><!--user-profy end-->
										<div class="user-profy">
											<img src="{{asset('client/img/template-koran/user3.png')}}" alt="">
											<h3>John Doe</h3>
											<span>Graphic Designer</span>
											<ul>
												<li><a href="#" title="" class="followw">Follow</a></li>
												<li><a href="#" title="" class="envlp"><img src="{{asset('client/img/template-koran/envelop.png')}}" alt=""></a></li>
												<li><a href="#" title="" class="hire">hire</a></li>
											</ul>
											<a href="#" title="">View Profile</a>
										</div><!--user-profy end-->
										<div class="user-profy">
											<img src="{{asset('client/img/template-koran/user1.png')}}" alt="">
											<h3>John Doe</h3>
											<span>Graphic Designer</span>
											<ul>
												<li><a href="#" title="" class="followw">Follow</a></li>
												<li><a href="#" title="" class="envlp"><img src="{{asset('client/img/template-koran/envelop.png')}}" alt=""></a></li>
												<li><a href="#" title="" class="hire">hire</a></li>
											</ul>
											<a href="#" title="">View Profile</a>
										</div><!--user-profy end-->
										<div class="user-profy">
											<img src="{{asset('client/img/template-koran/user2.png')}}" alt="">
											<h3>John Doe</h3>
											<span>Graphic Designer</span>
											<ul>
												<li><a href="#" title="" class="followw">Follow</a></li>
												<li><a href="#" title="" class="envlp"><img src="{{asset('client/img/template-koran/envelop.png')}}" alt=""></a></li>
												<li><a href="#" title="" class="hire">hire</a></li>
											</ul>
											<a href="#" title="">View Profile</a>
										</div><!--user-profy end-->
										<div class="user-profy">
											<img src="{{asset('client/img/template-koran/user3.png')}}" alt="">
											<h3>John Doe</h3>
											<span>Graphic Designer</span>
											<ul>
												<li><a href="#" title="" class="followw">Follow</a></li>
												<li><a href="#" title="" class="envlp"><img src="{{asset('client/img/template-koran/envelop.png')}}" alt=""></a></li>
												<li><a href="#" title="" class="hire">hire</a></li>
											</ul>
											<a href="#" title="">View Profile</a>
										</div><!--user-profy end-->
									</div>
								</div><!--top-profiles end-->
								<div class="post-bar">
									<div class="post_topbar">
										<div class="usy-dt">
											<img src="{{asset('client/img/template-koran/us-pic.png')}}" alt="">
											<div class="usy-name">
												<h3>John Doe</h3>
												<span><img src="{{asset('client/img/template-koran/clock.png')}}" alt="">3 min ago</span>
											</div>
										</div>
										<div class="ed-opts">
											<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
											<ul class="ed-options">
												<li><a href="#" title="">Edit Post</a></li>
												<li><a href="#" title="">Unsaved</a></li>
												<li><a href="#" title="">Unbid</a></li>
												<li><a href="#" title="">Close</a></li>
												<li><a href="#" title="">Hide</a></li>
											</ul>
										</div>
									</div>
									<div class="epi-sec">
										<ul class="descp">
											<li><img src="{{asset('client/img/template-koran/icon8.png')}}" alt=""><span>Epic Coder</span></li>
											<li><img src="{{asset('client/img/template-koran/icon9.png')}}" alt=""><span>India</span></li>
										</ul>
										<ul class="bk-links">
											<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
											<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
											<li><a href="#" title="" class="bid_now">Bid Now</a></li>
										</ul>
									</div>
									<div class="job_descp">
										<h3>Senior Wordpress Developer</h3>
										<ul class="job-dt">
											<li><a href="#" title="">Full Time</a></li>
											<li><span>$30 / hr</span></li>
										</ul>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
										<ul class="skill-tags">
											<li><a href="#" title="">HTML</a></li>
											<li><a href="#" title="">PHP</a></li>
											<li><a href="#" title="">CSS</a></li>
											<li><a href="#" title="">Javascript</a></li>
											<li><a href="#" title="">Wordpress</a></li> 	
										</ul>
									</div>
									<div class="job-status-bar">
										<ul class="like-com">
											<li>
												<a href="#"><i class="la la-heart"></i> Like</a>
												<img src="{{asset('client/img/template-koran/liked-img.png')}}" alt="">
												<span>25</span>
											</li> 
											<li><a href="#" title="" class="com"><img src="{{asset('client/img/template-koran/com.png')}}" alt=""> Comment 15</a></li>
										</ul>
										<a><i class="la la-eye"></i>Views 50</a>
									</div>
								</div><!--post-bar end-->
								<div class="posty">
									<div class="post-bar no-margin">
										<div class="post_topbar">
											<div class="usy-dt">
												<img src="{{asset('client/img/template-koran/us-pc2.png')}}" alt="">
												<div class="usy-name">
													<h3>John Doe</h3>
													<span><img src="{{asset('client/img/template-koran/clock.png')}}" alt="">3 min ago</span>
												</div>
											</div>
											<div class="ed-opts">
												<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
												<ul class="ed-options">
													<li><a href="#" title="">Edit Post</a></li>
													<li><a href="#" title="">Unsaved</a></li>
													<li><a href="#" title="">Unbid</a></li>
													<li><a href="#" title="">Close</a></li>
													<li><a href="#" title="">Hide</a></li>
												</ul>
											</div>
										</div>
										<div class="epi-sec">
											<ul class="descp">
												<li><img src="{{asset('client/img/template-koran/icon8.png')}}" alt=""><span>Epic Coder</span></li>
												<li><img src="{{asset('client/img/template-koran/icon9.png')}}" alt=""><span>India</span></li>
											</ul>
											<ul class="bk-links">
												<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
												<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
											</ul>
										</div>
										<div class="job_descp">
											<h3>Senior Wordpress Developer</h3>
											<ul class="job-dt">
												<li><a href="#" title="">Full Time</a></li>
												<li><span>$30 / hr</span></li>
											</ul>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
											<ul class="skill-tags">
												<li><a href="#" title="">HTML</a></li>
												<li><a href="#" title="">PHP</a></li>
												<li><a href="#" title="">CSS</a></li>
												<li><a href="#" title="">Javascript</a></li>
												<li><a href="#" title="">Wordpress</a></li> 	
											</ul>
										</div>
										<div class="job-status-bar">
											<ul class="like-com">
												<li>
													<a href="#"><i class="la la-heart"></i> Like</a>
													<img src="{{asset('client/img/template-koran/liked-img.png')}}" alt="">
													<span>25</span>
												</li> 
												<li><a href="#" title="" class="com"><img src="{{asset('client/img/template-koran/com.png')}}" alt=""> Comment 15</a></li>
											</ul>
											<a><i class="la la-eye"></i>Views 50</a>
										</div>
									</div><!--post-bar end-->
									<div class="comment-section">
										<div class="plus-ic">
											<i class="la la-plus"></i>
										</div>
										<div class="comment-sec">
											<ul>
												<li>
													<div class="comment-list">
														<div class="bg-img">
															<img src="{{asset('client/img/template-koran/bg-img1.png')}}" alt="">
														</div>
														<div class="comment">
															<h3>John Doe</h3>
															<span><img src="{{asset('client/img/template-koran/clock.png')}}" alt=""> 3 min ago</span>
															<p>Lorem ipsum dolor sit amet, </p>
															<a href="#" title="" class="active"><i class="fa fa-reply-all"></i>Reply</a>
														</div>
													</div><!--comment-list end-->
													<ul>
														<li>
															<div class="comment-list">
																<div class="bg-img">
																	<img src="{{asset('client/img/template-koran/bg-img2.png')}}" alt="">
																</div>
																<div class="comment">
																	<h3>John Doe</h3>
																	<span><img src="{{asset('client/img/template-koran/clock.png')}}" alt=""> 3 min ago</span>
																	<p>Hi John </p>
																	<a href="#" title=""><i class="fa fa-reply-all"></i>Reply</a>
																</div>
															</div><!--comment-list end-->
														</li>
													</ul>
												</li>
												<li>
													<div class="comment-list">
														<div class="bg-img">
															<img src="{{asset('client/img/template-koran/bg-img3.png')}}" alt="">
														</div>
														<div class="comment">
															<h3>John Doe</h3>
															<span><img src="{{asset('client/img/template-koran/clock.png')}}" alt=""> 3 min ago</span>
															<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at.</p>
															<a href="#" title=""><i class="fa fa-reply-all"></i>Reply</a>
														</div>
													</div><!--comment-list end-->
												</li>
											</ul>
										</div><!--comment-sec end-->
										<div class="post-comment">
											<div class="cm_img">
												<img src="{{asset('client/img/template-koran/bg-img4.png')}}" alt="">
											</div>
											<div class="comment_box">
												<form>
													<input type="text" placeholder="Post a comment">
													<button type="submit">Send</button>
												</form>
											</div>
										</div><!--post-comment end-->
									</div><!--comment-section end-->
								</div><!--posty end-->
								<div class="process-comm">
									<a href="#" title=""><img src="{{asset('client/img/template-koran/process-icon.png')}}" alt=""></a>
								</div><!--process-comm end-->
							</div><!--posts-section end-->
						</div><!--main-ws-sec end-->
					</div>
					<div class="col-lg-3 pd-right-none no-pd">
						<div class="right-sidebar">
							<div class="widget widget-about">
								<img src="{{asset('client/img/logo/icon.png')}}" width="100%"  alt="" width="100%">
								<h3>Track Time on Workwise</h3>
								<span>Pay only for the Hours worked</span>
								<div class="sign_link">
									<h3><a href="#" title="">Sign up</a></h3>
									<a href="#" title="">Learn More</a>
								</div>
							</div><!--widget-about end-->
							<div class="widget widget-jobs">
								<div class="sd-title">
									<h3>Top Jobs</h3>
									<i class="la la-ellipsis-v"></i>
								</div>
								<div class="jobs-list">
									<div class="job-info">
										<div class="job-details">
											<h3>Senior Product Designer</h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
										</div>
										<div class="hr-rate">
											<span>$25/hr</span>
										</div>
									</div><!--job-info end-->
									<div class="job-info">
										<div class="job-details">
											<h3>Senior UI / UX Designer</h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
										</div>
										<div class="hr-rate">
											<span>$25/hr</span>
										</div>
									</div><!--job-info end-->
									<div class="job-info">
										<div class="job-details">
											<h3>Junior Seo Designer</h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
										</div>
										<div class="hr-rate">
											<span>$25/hr</span>
										</div>
									</div><!--job-info end-->
									<div class="job-info">
										<div class="job-details">
											<h3>Senior PHP Designer</h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
										</div>
										<div class="hr-rate">
											<span>$25/hr</span>
										</div>
									</div><!--job-info end-->
									<div class="job-info">
										<div class="job-details">
											<h3>Senior Developer Designer</h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
										</div>
										<div class="hr-rate">
											<span>$25/hr</span>
										</div>
									</div><!--job-info end-->
								</div><!--jobs-list end-->
							</div><!--widget-jobs end-->
							<div class="widget widget-jobs">
								<div class="sd-title">
									<h3>Most Viewed This Week</h3>
									<i class="la la-ellipsis-v"></i>
								</div>
								<div class="jobs-list">
									<div class="job-info">
										<div class="job-details">
											<h3>Senior Product Designer</h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
										</div>
										<div class="hr-rate">
											<span>$25/hr</span>
										</div>
									</div><!--job-info end-->
									<div class="job-info">
										<div class="job-details">
											<h3>Senior UI / UX Designer</h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
										</div>
										<div class="hr-rate">
											<span>$25/hr</span>
										</div>
									</div><!--job-info end-->
									<div class="job-info">
										<div class="job-details">
											<h3>Junior Seo Designer</h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
										</div>
										<div class="hr-rate">
											<span>$25/hr</span>
										</div>
									</div><!--job-info end-->
								</div><!--jobs-list end-->
							</div><!--widget-jobs end-->
							<div class="widget suggestions full-width">
								<div class="sd-title">
									<h3>Most Viewed People</h3>
									<i class="la la-ellipsis-v"></i>
								</div><!--sd-title end-->
								<div class="suggestions-list">
									<div class="suggestion-usd">
										<img src="{{asset('client/img/template-koran/s1.png')}}" alt="">
										<div class="sgt-text">
											<h4>Jessica William</h4>
											<span>Graphic Designer</span>
										</div>
										<span><i class="la la-plus"></i></span>
									</div>
									<div class="suggestion-usd">
										<img src="{{asset('client/img/template-koran/s2.png')}}" alt="">
										<div class="sgt-text">
											<h4>John Doe</h4>
											<span>PHP Developer</span>
										</div>
										<span><i class="la la-plus"></i></span>
									</div>
									<div class="suggestion-usd">
										<img src="{{asset('client/img/template-koran/s3.png')}}" alt="">
										<div class="sgt-text">
											<h4>Poonam</h4>
											<span>Wordpress Developer</span>
										</div>
										<span><i class="la la-plus"></i></span>
									</div>
									<div class="suggestion-usd">
										<img src="{{asset('client/img/template-koran/s4.png')}}" alt="">
										<div class="sgt-text">
											<h4>Bill Gates</h4>
											<span>C &amp; C++ Developer</span>
										</div>
										<span><i class="la la-plus"></i></span>
									</div>
									<div class="suggestion-usd">
										<img src="{{asset('client/img/template-koran/s5.png')}}" alt="">
										<div class="sgt-text">
											<h4>Jessica William</h4>
											<span>Graphic Designer</span>
										</div>
										<span><i class="la la-plus"></i></span>
									</div>
									<div class="suggestion-usd">
										<img src="{{asset('client/img/template-koran/s6.png')}}" alt="">
										<div class="sgt-text">
											<h4>John Doe</h4>
											<span>PHP Developer</span>
										</div>
										<span><i class="la la-plus"></i></span>
									</div>
									<div class="view-more">
										<a href="#" title="">View More</a>
									</div>
								</div><!--suggestions-list end-->
							</div>
						</div><!--right-sidebar end-->
					</div>
				</div>
			</div><!-- main-section-data end-->
		</div> 
	</div>
</main>

<script src="{{asset('client/js/jquery-3.2.1.min.js')}}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}
<script src="{{asset('client/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('client/vendors/slick/slick.js')}}"></script>
{{-- <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> --}}
<script type="text/javascript">
$(document).ready(function(){
	$('.profiles-slider').slick({
        slidesToShow: 3,
        slck:true,
        slidesToScroll: 1,
        prevArrow:'<span class="slick-previous"></span>',
        nextArrow:'<span class="slick-nexti"></span>',
        autoplay: true,
        dots: false,
        autoplaySpeed: 2000,
        responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]


    });
});
</script>
</body>
</html>