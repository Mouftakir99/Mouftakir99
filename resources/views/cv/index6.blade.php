<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets-admin/assets/img/favicon.png">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i,700" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}"/>
	<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}"/>
	<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}"/>
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"/>

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<div class="home-six-style">
		<!-- Header section start -->
		<header class="header-section">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-5">
						<div class="site-logo">
							@if ($user->setting)
                                <h2><a href="#">{{ $user->setting->name_website }}</a></h2>
                                <p>{{ $user->setting->description_website }}</p>
                            @else
                                <h2><a href="#">Civic</a></h2>
                                <p>Enhance your online presence</p>
                            @endif
						</div>
					</div>
					<div class="col-md-7 text-md-right header-buttons">
						<a href="#" class="site-btn">Download CV</a>
						<a href="#" class="site-btn">Discover me</a>
					</div>
				</div>
			</div>
		</header>
		<!-- Header section end -->

		<!-- Hero section start -->
        <section class="hero-section">
			<div class="container-fluid text-center"  style="margin-top: 200px" >
				<img src="{{ $user->profile_photo_url }}"  width="499px"  alt="">
				<div class="hero-text">
					<h2>{{ $user->name }}</h2>
                    @if ($user->about_me)
					    <p>{{ substr($user->about_me,0,strlen($user->about_me)/1.5) }}<br>{{ substr($user->about_me,strlen($user->about_me)/1.5,strlen($user->about_me))  }}</p>
                        @else
                        <p>I’m a digital designer in love with photography, painting and<br>discovering new worlds and cultures.</p>
                    @endif
                </div>
				<div class="social-links">
					@forelse ($user->socialMedia as $item)
                        <div class="social-links">
                            <a href="{{ $item->link_socialMedia	 }}"><i class="fa fa-{{ $item->name_socialMedia }}"></i></a>
                        </div>
                    @empty
                        <div class="social-links">
                            <a href=""><i class="fa fa-pinterest"></i></a>
                            <a href=""><i class="fa fa-linkedin"></i></a>
                            <a href=""><i class="fa fa-instagram"></i></a>
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-twitter"></i></a>
                        </div>
                    @endforelse
				</div>
			</div>
		</section>
		<!-- Hero section end -->


		<!-- Info section start -->
		<div class="info-section">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-8 offset-xl-2 container-warp">
						<div class="row">
							<div class="col-md-6">
								<div class="hero-info mb-4 mb-md-0">
									<ul>
										<li>
                                            <span>Date of Birth :</span>
                                            <div class="d-inline"  style="color: white;font-size: 19px">{{ $user->birthday->format('F j, Y') }}</div>
                                        </li>
										@if($user->address)
                                            <li>
                                                <span>Address :</span>
                                                <div class="d-inline"  style="color: lightgray;font-size: 18px">{{ $user->address->address.', '.$user->address->city.', '.$user->address->country }}</div>
                                            </li>
                                        @endif
									</ul>
								</div>
							</div>
							<div class="col-md-6">
								<div class="hero-info">
									<ul>
										<li><span>E-mail :</span><a href="{{ 'mailto:'.$user->email }}" style="color: white;font-size: 19px">{{ $user->email }}</a></li>
										<li><span>Phone :</span><a href="{{ 'tel:'.$user->phone }}" style="color: white;font-size: 19px">{{ $user->phone }}</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Info section end -->

		<!-- portfolio section start -->
		<div class="portfolo-section">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-lg-3 p-0">
						<div class="portfolio-item mb-0">
							<a href="{{ asset('assets/img/portfolio/1.jpg') }}" class="set-bg port-pic mb-0" data-setbg="{{ asset('assets/img/portfolio/1.jpg') }}"></a>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 p-0">
						<div class="portfolio-item mb-0">
							<a href="{{ asset('assets/img/portfolio/2.jpg') }}" class="set-bg port-pic mb-0" data-setbg="{{ asset('assets/img/portfolio/2.jpg') }}"></a>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 p-0">
						<div class="portfolio-item mb-0">
							<a href="{{ asset('assets/img/portfolio/3.jpg') }}" class="set-bg port-pic mb-0" data-setbg="{{ asset('assets/img/portfolio/3.jpg') }}"></a>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 p-0">
						<div class="portfolio-item mb-0">
							<a href="{{ asset('assets/img/portfolio/4.jpg') }}" class="set-bg port-pic mb-0" data-setbg="{{ asset('assets/img/portfolio/4.jpg') }}"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- portfolio section end -->

		<!-- Resume section start -->
		<section class="resume-section spad">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-10 col-xl-6 offset-lg-1 offset-xl-3 container-warp text-center p-xl-0">
						<div class="section-title">
							<h2>Work Experience</h2>
						</div>
						<ul class="resume-list">
                            @forelse ($user->workExperiences as $item)
                                <li>
                                    <h2>{{ $item->start_work_exprience->format('Y') .' - '.$item->end_work_exprience->format('Y') }}</h2>
                                    <h3>{{ $item->name_work_exprience }}</h3>
                                    <h4>{{ $item->statut_work_exprience }}</h4>
                                    <p>{{ $item->description_work_exprience }}</p>
                                </li>
                            @empty
                                <li>
                                    <h2>2016-Present</h2>
                                    <h3>Web Design Company</h3>
                                    <h4>Web Designer</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor orci ut sapien scelerisque viverra. Sed trist ique justo nec mauris efficitur, ut lacinia elit dapibus. In egestas elit in dap ibus laoreet. Duis magna libero, fermentum ut facilisis id, pulvinar eget tortor. Vestibulum pelle ntesque tincidunt lorem, vitae euismod felis porttitor sed. </p>
                                </li>
                                <li>
                                    <h2>2014-2016</h2>
                                    <h3>Web Design Company</h3>
                                    <h4>Web Designer</h4>
                                    <p>Sit amet, consectetur adipiscing elit. Sed porttitor orci ut sapien scelerisque viverra. Sed trist ique justo nec mauris efficitur, ut lacinia elit dapibus. In egestas elit in dap ibus laoreet. Duis magna libero, fermentum ut facilisis id, pulvinar eget tortor. Vestibulum pelle ntesque tincidunt lorem, vitae euismod felis porttitor sed. </p>
                                </li>
                            @endforelse
						</ul>


						<div class="spad">
							<div class="section-title">
								<h2>Education</h2>
							</div>
							<ul class="resume-list">
								@forelse ($user->educations as $item)
                                    <li>
                                        <h2>{{ $item->start_education->format('Y') .' - '. $item->end_education->format('Y') }}</h2>
                                        <h3>{{ $item->name_education }}</h3>
                                        <h4>{{ $item->statut_education }}</h4>
                                        <p>{{ $item->description_education }}</p>
                                    </li>
                                @empty
                                    <li>
                                        <h2>2008</h2>
                                        <h3>Ui/Ux Diploma</h3>
                                        <h4>Design College California</h4>
                                        <p>Sit amet, consectetur adipiscing elit. Sed porttitor orci ut sapien scelerisque viverra. Sed trist ique justo nec mauris efficitur, ut lacinia elit dapibus. In egestas elit in dap ibus laoreet. Duis magna libero, fermentum ut facilisis id, pulvinar eget tortor. Vestibulum pelle ntesque tincidunt lorem, vitae euismod felis porttitor sed. </p>
                                    </li>
                                    <li>
                                        <h2>2006</h2>
                                        <h3>Web design Diploma</h3>
                                        <h4>Design College California</h4>
                                        <p>Sit amet, consectetur adipiscing elit. Sed porttitor orci ut sapien scelerisque viverra. Sed trist ique justo nec mauris efficitur, ut lacinia elit dapibus. In egestas elit in dap ibus laoreet. Duis magna libero, fermentum ut facilisis id, pulvinar eget tortor. Vestibulum pelle ntesque tincidunt lorem, vitae euismod felis porttitor sed. </p>
                                    </li>
                                @endforelse
							</ul>
						</div>


						<div class="section-title">
							<h2>References</h2>
						</div>
						<!-- review slider -->
                        <div class="review-slider owl-carousel">
                            @forelse ($user->references as $item)
                                <div class="single-review">
                                    <div class="qut">“</div>
                                    <p>{{ $item->description_reference }}</p>
                                    <h3>{{ $item->name_reference }}</h3>
                                    <h4>{{ $item->poste_reference.', '.$item->company_reference }}</h4>
                                </div>
                            @empty
                                <div class="single-review">
                                    <div class="qut">“</div>
                                    <p>Sit amet, consectetur adipiscing elit. Sed porttitor orci ut sapien scelerisque viverra. Sed trist ique justo nec mauris efficitur, ut lacinia elit dapibus. In egestas elit in dap ibus laoreet. Duis magna libero, fermentum ut facilisis id, pulvinar eget tortor. Vestibulum pelle ntesque tincidunt lorem, vitae euismod felis porttitor sed. </p>
                                    <h3>Robert G. Smith</h3>
                                    <h4>Manager, Company</h4>
                                </div>
                                <div class="single-review">
                                    <div class="qut">“</div>
                                    <p>Sit amet, consectetur adipiscing elit. Sed porttitor orci ut sapien scelerisque viverra. Sed trist ique justo nec mauris efficitur, ut lacinia elit dapibus. In egestas elit in dap ibus laoreet. Duis magna libero, fermentum ut facilisis id, pulvinar eget tortor. Vestibulum pelle ntesque tincidunt lorem, vitae euismod felis porttitor sed. </p>
                                    <h3>Robert G. Smith</h3>
                                    <h4>Manager, Company</h4>
                                </div>
                                <div class="single-review">
                                    <div class="qut">“</div>
                                    <p>Sit amet, consectetur adipiscing elit. Sed porttitor orci ut sapien scelerisque viverra. Sed trist ique justo nec mauris efficitur, ut lacinia elit dapibus. In egestas elit in dap ibus laoreet. Duis magna libero, fermentum ut facilisis id, pulvinar eget tortor. Vestibulum pelle ntesque tincidunt lorem, vitae euismod felis porttitor sed. </p>
                                    <h3>Robert G. Smith</h3>
                                    <h4>Manager, Company</h4>
                                </div>
                            @endforelse
						</div>
						<!-- /review slider -->

					</div>
					<div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2 container-warp">

						<!-- skill section start -->
						<section class="skill-section spad">
							<div class="section-title text-center">
								<h2>Skills</h2>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="row">
										<div class="col-md-6">
											<div class="fact-box">
												<div class="fact-content">
													<img src="assets/img/icon/1-w.png" alt="">
													<h2>14</h2>
													<p>Years of Experience</p>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="fact-box">
												<div class="fact-content">
													<img src="assets/img/icon/2-w.png" alt="">
													<h2>9</h2>
													<p>Awards Won</p>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="skills pt-5 pt-lg-0">
                                        @forelse ($user->skills as $item)
                                            <div class="single-progress-item">
                                                <div class="progress-bar-style" data-progress="{{ $item->pourcentage_skill }}"></div>
                                                <p>{{ $item->name_skill }}</p>
                                            </div>
                                        @empty
                                            <div class="single-progress-item">
                                                <div class="progress-bar-style" data-progress="99"></div>
                                                <p>Design</p>
                                            </div>
                                            <div class="single-progress-item">
                                                <div class="progress-bar-style" data-progress="75"></div>
                                                <p>Illsutrator</p>
                                            </div>
                                            <div class="single-progress-item">
                                                <div class="progress-bar-style" data-progress="87"></div>
                                                <p>Photoshop</p>
                                            </div>
                                            <div class="single-progress-item">
                                                <div class="progress-bar-style" data-progress="60"></div>
                                                <p>HTML</p>
                                            </div>
                                        @endforelse
									</div>
									<div class="row">
                                        @forelse ($user->extraSkills as $item)
                                            <div class="col-md-6 text-center">
                                                <div class="circle-progress">
                                                    <div id="progress1" class="prog-circle"></div>
                                                    <div class="progress-info">
                                                        <h2>{{ $item->pourcentage_extra_skill.'%' }}</h2>
                                                    </div>
                                                    <div class="prog-title">
                                                        <h3>{{ $item->name_extra_skill }}</h3>
                                                        <p>{{ $item->desciption_extra_skill }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-md-6 text-center">
                                                <div class="circle-progress">
                                                    <div id="progress1" class="prog-circle"></div>
                                                    <div class="progress-info">
                                                        <h2>75%</h2>
                                                    </div>
                                                    <div class="prog-title">
                                                        <h3>Inspiration</h3>
                                                        <p>Etiam nec odio vestibulum est.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <div class="circle-progress">
                                                    <div id="progress2" class="prog-circle"></div>
                                                    <div class="progress-info">
                                                        <h2>83%</h2>
                                                    </div>
                                                    <div class="prog-title">
                                                        <h3>Inspiration</h3>
                                                        <p>Etiam nec odio vestibulum est.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse
									</div>
								</div>
							</div>
						</section>
						<!-- skill section end -->
						<div class="footer-top-section">
							<div class="row">
								<div class="col-xl-4">
									<div class="section-title">
										<h2>Languages</h2>
									</div>
									<ul class="language-progress">
										@forelse ($user->languagues as $item)
                                            <li>{{ $item->name_languague }}<div class="lan-prog" data-lanprogesss="{{ $item->level_languague }}"></div></li>
                                        @empty
                                            <li>English <div class="lan-prog" data-lanprogesss="5"></div></li>
                                            <li>Spanish <div class="lan-prog" data-lanprogesss="4"></div></li>
                                            <li>Chinesse <div class="lan-prog" data-lanprogesss="3"></div></li>
                                        @endforelse
									</ul>
								</div>
								<div class="col-xl-8 pt-5 pt-lg-0">
									<div class="section-title">
										<h2>Hobbies</h2>
									</div>
									<div class="icon-box-area">
										@forelse ($user->hobbies as $item)
                                            <div class="icon-box">
                                                <img src="{{ asset('storage/website/hobbies'.$item->photo_hobby) }}" width="32px" alt="{{ $item->name_hobby }}">
                                                <p>{{ $item->name_hobby }}</p>
                                            </div>
                                        @empty
                                            <div class="icon-box">
                                                <i class="flaticon-032-cooking"></i>
                                                <p>Cooking</p>
                                            </div>
                                            <div class="icon-box">
                                                <i class="flaticon-015-photo-camera"></i>
                                                <p>Photography</p>
                                            </div>
                                            <div class="icon-box">
                                                <i class="flaticon-013-chess-1"></i>
                                                <p>Playing Chess</p>
                                            </div>
                                            <div class="icon-box">
                                                <i class="flaticon-001-yoga"></i>
                                                <p>Yoga</p>
                                            </div>
                                            <div class="icon-box">
                                                <i class="flaticon-035-tent"></i>
                                                <p>Camping in nature</p>
                                            </div>
                                        @endforelse
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- Footer section start -->
	<footer class="footer-section">
		<div class="container text-center">
			<div class="copyright">
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://github.com/Mouftakir99" target="_blank">Mouftakir</a> &amp; distirbuted by <a href="https://github.com/Mouftakir99" target="_blank">Mouftakir</a>
            </div>
		</div>
	</footer>
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
	<script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>
	<script src="{{ asset('assets/js/autogrow.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
