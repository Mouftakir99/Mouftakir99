<x-admin-layout>


    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Profile</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-md-12">
            <x-jet-validation-errors class="mb-4" />

            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success my-2" role="alert"> <button type="button" class="close"
                            data-dismiss="alert">×</button>
                        {{ session('status') }}
                    </div>
                @elseif(session('failed'))
                    <div class="alert alert-danger my-2" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('failed') }}
                    </div>
                @endif
            </div>

            <div class="profile-header">
                <div class="row align-items-center">
                    <div class="col-auto profile-image">
                        <a href="#">
                            <img class="rounded-circle" alt="{{ Auth::user()->name }}" src="{{ Auth::user()->profile_photo_url }}">
                        </a>
                    </div>
                    <div class="col ml-md-n2 profile-user-info">
                        <h4 class="user-name mb-0"> {{ Auth::user()->name }} </h4>
                        <h6 class="text-muted"> {{ Auth::user()->email }} </h6>
                        @if (Auth::user()->address)
                            <div class="user-Location"><i class="fa fa-map-marker"></i>  {{ Auth::user()->address->city.', '.Auth::user()->address->country }} </div>
                        @endif
                        <div class="about-text">{{ Auth::user()->about_me }}</div>
                    </div>
                    {{-- <div class="col-auto profile-btn">

                        <a href="" class="btn btn-primary">
                            Edit
                        </a>
                    </div> --}}
                </div>
            </div>

            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content profile-tab-cont">

                <!-- Personal Details Tab -->
                <div class="tab-pane fade show active" id="per_details_tab">

                    <!-- Personal Details -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between">
                                        <span>Personal Details</span>
                                        <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
                                    </h5>
                                    <div class="row">
                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                        <p class="col-sm-10">{{ Auth::user()->name }}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
                                        <p class="col-sm-10">{{ Auth::user()->birthday }}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                        <p class="col-sm-10">{{ Auth::user()->email }}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                                        <p class="col-sm-10">{{ Auth::user()->phone }}</p>
                                    </div>
                                    @if ( !empty(Auth::user()->address))
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
                                            <p class="col-sm-10 mb-0"> {{ Auth::user()->address->address }},<br>
                                            {{  Auth::user()->address->city }},<br>
                                            {{ Auth::user()->address->city .' - '.Auth::user()->address->zipCode }}<br>
                                            {{ Auth::user()->address->country }}.</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>


                    </div>
                    <!-- /Personal Details -->

                </div>
                <!-- /Personal Details Tab -->

                <!-- Change Password Tab -->
                <div id="password_tab" class="tab-pane fade">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Change Password</h5>
                            <div class="row">
                                <div class="col-md-10 col-lg-6">
                                    <form action="{{ route('password-change') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input type="password" class="form-control" name="current_password" required>
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" name="new_password" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" name="password_confirmation">
                                        </div>
                                        <button class="btn btn-primary" type="submit">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Change Password Tab -->
            </div>
        </div>
    </div>


      <!-- Edit Details Modal -->
      <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Personal Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profile/updated',Auth::user()->id) }}" method="POST">
                        @csrf
                        <div class="row form-row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="firstName" value="{{ Auth::user()->firstName }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text"  class="form-control" name="lastName" value="{{ Auth::user()->lastName }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control" name="birthday" value="{{ Auth::user()->birthday }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Email ID</label>
                                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <label>About Me</label>
                                <textarea name="about_me" class="form-control autogrow mb-3" cols="30" rows="10">{{ Auth::user()->about_me }}</textarea>
                            </div>
                            <div class="col-12 col-sm-12">
                                <label>description</label>
                                <textarea name="desciption" class="form-control autogrow mb-3" cols="30" rows="10">{{ Auth::user()->about_me }}</textarea>
                            </div>
                            <div class="col-12">
                                <h5 class="form-title"><span>Address</span></h5>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" @if ( Auth::user()->address ) value="{{ Auth::user()->address->address }}" @endif>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="city" @if ( Auth::user()->address ) value="{{ Auth::user()->address->city }}" @endif>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <input type="text" class="form-control" name="zipCode" @if ( Auth::user()->address ) value="{{ Auth::user()->address->zipCode }}" @endif>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" class="form-control" name="country" @if ( Auth::user()->address ) value="{{ Auth::user()->address->country }}" @endif>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Details Modal -->


</x-admin-layout>

