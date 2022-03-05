<x-admin-layout>

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">General Settings</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:(0)">Settings</a></li>
                    <li class="breadcrumb-item active">General Settings</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">

        <div class="col-12">
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
            <!-- General -->

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">General</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('setting/updated',Auth::user()->id) }}" method="POST"  enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label>Website Name</label>
                                <input type="text" class="form-control" name="name_website">
                            </div>
                            <div class="form-group">
                                <label>Website Logo</label>
                                <input type="file" class="form-control" name="logo_website">
                                <small class="text-secondary">Recommended image size is <b>150px x 150px</b></small>
                            </div>
                            <div class="form-group mb-0">
                                <label>Favicon</label>
                                <input type="file" class="form-control" name="favicon_website">
                                <small class="text-secondary">Recommended image size is <b>16px x 16px</b> or <b>32px x 32px</b></small><br>
                                <small class="text-secondary">Accepted formats : only png and ico</small>
                            </div>

                            <div class="my-4">
                                <button type="submit" class="btn btn-primary col-md-3">Valider</button>
                            </div>

                        </form>
                    </div>
                </div>

            <!-- /General -->

        </div>
    </div>
</x-admin-layout>

