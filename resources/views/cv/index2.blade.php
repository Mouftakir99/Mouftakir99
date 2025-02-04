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

	<div class="home-two-style">
		<!-- Header section start -->
		<header class="header-section">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-4">
						<div class="site-logo">
                            @if ($user->setting)
                                <h2><a href="#">{{ $user->setting->name_website }}</a></h2>
                                <p>{{ $user->setting->description_website }}</p>
                            @else
                                <h2><a href="#">Mouftakir Aiman</a></h2>
                                <p>Welcome to my Cv</p>
                            @endif
                        </div>
                    </div>
                {{-- <div class="col-md-7 text-md-right header-buttons">
                    <a href="#" class="site-btn">Download CV</a>
                    <a href="#" class="site-btn">Discover me</a>
                </div> --}}
				</div>
			</div>
		</header>
		<!-- Header section end -->

		<!-- Hero section start -->
		<section class="hero-section spad">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-10 offset-xl-1">
						<div class="row">
							<div class="col-lg-6">
								<div class="hero-text">
									<h2>{{ $user->name }}</h2>
                                    <p>{{ $user->about_me }}</p>
                                </div>
								<div class="hero-info">
									<h2>General Info</h2>
                                    <ul>
                                        <li><span>Date of Birth</span>{{ $user->birthday->format('F j, Y') }}</li>
                                        @if ($user->address)
                                            <li><span>Address</span><div style="font-size: 19px;display: inline;">{{ $user->address->address.', '.$user->address->city.', '.$user->address->country }}</div></li>
                                        @endif
                                        <li><span>E-mail</span><a href="{{ 'mailto:'.$user->email }}" style="color: white">{{ $user->email }}</a></li>
                                        <li><span>Phone </span><a href="{{ 'Tel:'.$user->phone }}" style="color: white">{{ $user->phone }}</a></li>
                                    </ul>
								</div>
							</div>
							<div class="col-lg-6 text-md-center">
								<figure class="hero-image">
									<img src="{{ $user->profile_photo_url }}" width="499px" alt="5">
								</figure>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Hero section end -->

		<!-- Social links section start -->
		<div class="social-section">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-10 offset-xl-1">
						<div class="social-link-warp">
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
							<h2 class="hidden-md hidden-sm">My Social Profiles</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Social links section end -->

		<!-- Resume section start -->
		<section class="resume-section spad">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-7 offset-xl-2">
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
					</div>
				</div>
			</div>
		</section>
		<!-- Resume section end -->

		<!-- Resume section start -->
		<section class="resume-section spad">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-7 offset-xl-2">
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
				</div>
			</div>
		</section>
		<!-- Resume section end -->


		<!-- Review section start -->
		<section class="review-section spad pb-0">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-7 offset-xl-2">
						<div class="section-title">
							<h2>References</h2>
						</div>
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
					</div>
				</div>
			</div>
		</section>
		<!-- Review section end -->


		<!-- Portfolio section start -->
		<section class="portfolio-section spad pb-0">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-4 col-md-8 offset-xl-2 ">
						<div class="section-title">
							<h2>Portfolio</h2>
						</div>
					</div>
					<div class="col-md-4 text-md-right">
						<a href="#" class="site-btn mb-5">See All Portfolio</a>
					</div>
				</div>
				<div class="portfolio-warp">
					<div class="row">
						<div class="col-xl-3 col-lg-6 col-md-6">
							<div class="portfolio-item">
								<a href="assets/img/portfolio/1.jpg" class="set-bg port-pic" data-setbg="assets/img/portfolio/1.jpg"></a>
								<h2>Brand Campaign</h2>
								<p>Graphic design</p>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6 col-md-6">
							<div class="portfolio-item">
								<a href="assets/img/portfolio/2.jpg" class="set-bg port-pic" data-setbg="assets/img/portfolio/2.jpg"></a>
								<h2>A Corporate Identity</h2>
								<p>Graphic design</p>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6 col-md-6">
							<div class="portfolio-item">
								<a href="assets/img/portfolio/3.jpg" class="set-bg port-pic" data-setbg="assets/img/portfolio/3.jpg"></a>
								<h2>Web Design Website</h2>
								<p>Graphic design</p>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6 col-md-6">
							<div class="portfolio-item">
								<a href="assets/img/portfolio/4.jpg" class="set-bg port-pic" data-setbg="assets/img/portfolio/4.jpg"></a>
								<h2>Logo design</h2>
								<p>Graphic design</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Portfolio section end -->

		<!-- Extra section start -->
		<section class="extra-section spad pb-0">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-8 offset-xl-2">
						<div class="section-title">
							<h2>Extra Skills</h2>
						</div>
						<div class="row">
                            @forelse ($user->extraSkills as $item)
                                <div class="col-lg-3 col-md-6 pt-5">
                                    <div class="fact-box trans">
                                        <div class="fact-content">
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
                                    </div>
                                </div>
                            @empty
                                <div class="col-lg-3 col-md-6 pt-5">
                                    <div class="fact-box trans">
                                        <div class="fact-content">
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
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 pt-5">
                                    <div class="fact-box trans">
                                        <div class="fact-content">
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
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="fact-box">
                                        <div class="fact-content">
                                            <img src="assets/img/icon/1-w.png" alt="">
                                            <h2>14</h2>
                                            <p>Years of Experience</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="fact-box">
                                        <div class="fact-content">
                                            <img src="assets/img/icon/2-w.png" alt="">
                                            <h2>9</h2>
                                            <p>Awards Won</p>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Extra section end -->

		<!-- Contact section start -->
        <section class="contact-section spad">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="section-title">
                            <h2>Contact Me</h2>
                        </div>
                        <form class="contact-form" action="{{ route('contacts/added') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" placeholder="Name" name="name_contact">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" placeholder="E-mail" name="email_contact">
                                </div>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Subject" name="subject_contact">
                                    <textarea placeholder="Message" class="autogrow" name="subject_contact"></textarea>
                                </div>
                                <input type="text" class="d-none" name="user_id" value="{{ $user->id }}">
                            </div>
                            <div class="text-md-right">
                                <button class="site-btn" type="submit">Send message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
		<!-- Contact section end -->

		<!-- Footer section start -->
		<footer class="footer-section">
			<div class="container text-center">
				<div class="copyright">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://github.com/Mouftakir99" target="_blank">Mouftakir</a> &amp; distirbuted by <a href="https://github.com/Mouftakir99" target="_blank">Mouftakir</a>
                </div>
			</div>
		</footer>
		<!-- Footer section end -->
	</div>


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
