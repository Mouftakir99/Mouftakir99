<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>{{ config('app.name', 'Laravel') }}</title>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

		<link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">

		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/feathericon.min.css') }}">

		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        @yield('style')

    </head>
    <body>

		<!-- Main Wrapper -->
        <div class="main-wrapper">

			<!-- Header -->
            <div class="header">

				<!-- Logo -->
                <div class="header-left">
                    <a href="{{ route('dashboard') }}" class="logo">
						<img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
					</a>
					<a href="{{ route('dashboard') }}" class="logo logo-small">
						<img src="{{ asset('assets/img/logo-small.png') }}" alt="Logo" width="30" height="30">
					</a>
                </div>
				<!-- /Logo -->

				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fe fe-text-align-left"></i>
				</a>

				<div class="top-nav-search">
					<form>
						<input type="text" class="form-control" placeholder="Search here">
						<button class="btn" type="submit"><i class="fa fa-search"></i></button>
					</form>
				</div>

				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fa fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->

				<!-- Header Right Menu -->
				<ul class="nav user-menu">

					<!-- Notifications -->
					<li class="nav-item dropdown noti-dropdown">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<i class="fe fe-bell"></i> <span class="badge badge-pill">3</span>
						</a>
						<div class="dropdown-menu notifications">
							<div class="topnav-dropdown-header">
								<span class="notification-title">Notifications</span>
								<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
							</div>
							<div class="noti-content">
								<ul class="notification-list">
									{{-- <li class="notification-message">
										<a href="#">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/doctors/doctor-thumb-01.jpg">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Dr. Ruby Perrin</span> Schedule <span class="noti-title">her appointment</span></p>
													<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
												</div>
											</div>
										</a>
									</li> --}}
								</ul>
							</div>
							<div class="topnav-dropdown-footer">
								<a href="#">View all Notifications</a>
							</div>
						</div>
					</li>
					<!-- /Notifications -->

					<!-- User Menu -->
					<li class="nav-item dropdown has-arrow">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img class="rounded-circle" src="{{ Auth::user()->profile_photo_url }}" width="31" alt="{{ Auth::user()->name }}"></span>
						</a>
						<div class="dropdown-menu">
							<div class="user-header">
								<div class="avatar avatar-sm">
									<img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="avatar-img rounded-circle">
								</div>
								<div class="user-text">
									<h6>{{ Auth::user()->name }}</h6>
									<p class="text-muted mb-0">Administrator</p>
								</div>
							</div>
							<a class="dropdown-item" href="{{ route('profile.show') }}">My Profile</a>
							<a class="dropdown-item" href="">Settings</a>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <a href="{{ route('logout') }}"   class="dropdown-item"
                                         @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
						</div>
					</li>
					<!-- /User Menu -->

				</ul>
				<!-- /Header Right Menu -->

            </div>
			<!-- /Header -->

			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title">
								<span>Main</span>
							</li>
							<li>
								<a href="{{ route('dashboard') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
                            <li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span> Work Experiences </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{ route('workExperiences') }}"> Work Experiences </a></li>
									<li><a href="{{ route('AddworkExperiences') }}">Add  Work Experience</a></li>
								</ul>
							</li>
                            <li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span> Educations </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{ route('educations') }}"> Educations </a></li>
									<li><a href="{{ route('AddEducations') }}">Add Educations</a></li>
								</ul>
							</li>
                            <li>
                                <a href="{{ route('languagues') }}"><i class="fe fe-layout"></i> <span>Languagues</span></a>
                            </li>
                            <li>
                                <a href="{{ route('skills') }}"><i class="fe fe-layout"></i> <span>Skills</span></a>
                            </li>
                            <li>
                                <a href="{{ route('extraSkills') }}"><i class="fe fe-layout"></i> <span>Extra Skills</span></a>
                            </li>
                            <li>
                                <a href="{{ route('socialMedia') }}"><i class="fe fe-layout"></i> <span>Social Media</span></a>
                            </li>
                            <li>
                                <a href="{{ route('hobbies') }}"><i class="fe fe-layout"></i> <span>Hobbies</span></a>
                            </li>
                            <li>
                                <a href="{{ route('references') }}"><i class="fe fe-layout"></i> <span>References</span></a>
                            </li>
                            <li>
                                <a href="{{ route('profile') }}"><i class="fe fe-user-plus"></i><span>profile</span></a>
                            </li>
                            <li>
                                <a href="{{ route('setting') }}"><i class="fe fe-vector"></i><span>Setting</span></a>
                            </li>
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					{{ $slot }}

				</div>
			</div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>

		<!-- Bootstrap Core JS -->
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

        <!-- Datatables JS -->
		<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>

		<!-- Slimscroll JS -->
        <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

		<!-- Custom JS -->
		<script  src="{{ asset('assets/js/script.js') }}"></script>
		<script  src="{{ asset('assets/js/autogrow.js') }}"></script>
        @yield('script')
    </body>
</html>
