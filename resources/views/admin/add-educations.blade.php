<x-admin-layout>
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Educations</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Add Educations</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-sm-12">

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

            <div class="card">
                <div class="card-body custom-edit-service">


                <!-- Add Medicine -->
                <form  action="{{ route('educations/added') }}" method="POST">
                    @csrf
                    <div class="service-fields mb-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Name education<span class="text-danger">*</span> :</label>
                                    <input class="form-control" type="text" name="name_education" id="name_education">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Status education<span class="text-danger">*</span> :</label>
                                    <input class="form-control" type="text" name="statut_education" id="statut_education">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-fields mb-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Descriptions <span class="text-danger">*</span> :</label>
                                    <textarea class="form-control service-desc autogrow" name="description_education"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-fields mb-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Date education : </label>
                                    <input class="form-control" type="date" name="start_education">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>End education<span class="text-danger">*</span> : </label>
                                    <input class="form-control" type="date" name="end_education">
                                </div>
                            </div>
                        </div>
                    </div>

                    <input class="form-control d-none" type="text" name="user_id" value="{{ Auth::user()->id }}">


                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" type="submit" name="form_submit" value="submit">Submit</button>
                    </div>
                </form>
                <!-- /Add Medicine -->


                </div>
            </div>


        </div>
    </div>
</x-admin-layout>
