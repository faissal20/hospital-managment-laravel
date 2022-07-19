<!-- main-header opened -->
			<div class="main-header sticky side-header nav nav-item">
				<div class="container-fluid">
					<div class="main-header-left ">
						<div class="responsive-logo">
							<a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo.png')}}" class="logo-1" alt="logo"></a>
							<a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="dark-logo-1" alt="logo"></a>
							<a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-2" alt="logo"></a>
							<a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="dark-logo-2" alt="logo"></a>
						</div>
						<div class="app-sidebar__toggle" data-toggle="sidebar">
							<a class="open-toggle" href="#"><i class="header-icon fe fe-align-left" ></i></a>
							<a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
						</div>
						
					</div>
					<div class="main-header-right">
						
						
						<div class="nav nav-item  navbar-nav-right ml-auto">		
							<div class="dropdown main-profile-menu nav nav-item nav-link">
								<a class="profile-user d-flex" href=""><img alt="" style="object-fit: cover" src=" @if (auth()->user()->role == 2)
									{{ auth()->user()->doctor->picture }}
									@else 
									{{ URL::asset('doc_img/defaultAdminImage.jpg') }}
									@endif "></a>
								<div class="dropdown-menu">
									<div class="main-header-profile bg-primary p-3">
										<div class="d-flex wd-100p">
											<div class="main-img-user"><img alt="" style="object-fit: cover" src=" @if (auth()->user()->role == 2)
												{{ auth()->user()->doctor->picture }}
												@else 
												{{ URL::asset('doc_img/defaultAdminImage.jpg') }}
												@endif" class=""></div>
											<div class="ml-3 my-auto">
												<h6>{{ auth()->user()->username }}</h6><span>@if (auth()->user()->role == 2)
													Doctor
												@else
													Admin
												@endif</span>
											</div>
										</div>
									</div>
									{{-- <a class="dropdown-item" href=""><i class="bx bx-user-circle"></i>Profile</a>
									<a class="dropdown-item" href=""><i class="bx bx-cog"></i> Edit Profile</a>
									<a class="dropdown-item" href=""><i class="bx bxs-inbox"></i>Inbox</a>
									<a class="dropdown-item" href=""><i class="bx bx-envelope"></i>Messages</a>
									<a class="dropdown-item" href=""><i class="bx bx-slider-alt"></i> Account Settings</a> --}}
									<a class="dropdown-item" href="{{ url('/logout') }}"><i class="bx bx-log-out"></i> Sign Out</a>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
<!-- /main-header -->
