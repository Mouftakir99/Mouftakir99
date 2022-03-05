<x-admin-layout>
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-7 col-auto">
                <h3 class="page-title">languages</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">languages</li>
                </ul>
            </div>
            <div class="col-sm-5 col">
                <a  href="javascript:void(0);" class="btn btn-primary float-right mt-2" data-toggle="modal" data-target="#AddModal">Add New languages</a>
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
            <!-- Recent Orders -->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Level</th>
                                    <th>User Name</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php  $x='';  @endphp
                                @forelse (Auth::user()->languagues as $key => $languague)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $languague->name_languague }}</td>
                                        <td>{{ $languague->level_languague }}</td>
                                        <td>{{ $languague->user->email }}</td>
                                        <td>
                                            <div class="actions">
                                                <a class="btn btn-sm bg-success-light"
                                                    onclick="{{ $x= $languague->id }};
                                                    $('#user_id').val('{{ $languague->user_id }}');
                                                    $('#name_languague').val('{{ $languague->name_languague }}');
                                                    $('#level_languague').val('{{ $languague->level_languague }}');"
                                                    data-toggle="modal" data-target="#UpdateModal">
                                                    <i class="fe fe-pencil"></i> Edit
                                                </a>
                                                <a href="javascript:void(0);" onclick="{{ $x= $languague->id }}" class="btn btn-sm bg-danger-light" data-toggle="modal" data-target="#deleteConfirmModal">
                                                    <i class="fe fe-trash"></i> Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td></td>
                                        <td class="text-center"><div class="btn btn-sm bg-danger-light" style="width:'500px'">No Data Found</div></td>
                                        <td></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>

	<!-- ModelUpdate -->
    <div class="modal fade" id="UpdateModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog model-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acc_title">update languague</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('languagues/updated',$x) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="name_languague">Name languague :</label>
                                <input type="text" class="form-control" name="name_languague" id="name_languague">
                            </div>
                            <div class="col-md-12">
                                <label for="level_languague">level languague:</label>
                                <input type="text" class="form-control" name="level_languague" id="level_languague">
                            </div>
                            <input type="text" class="form-control d-none" name="user_id"  id="user_id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /ModelUpdate -->



    <!-- Add Model -->
    <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-lg-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acc_title">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('languagues/added') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="name_languague">Name languague :</label>
                                <input type="text" class="form-control" name="name_languague">
                            </div>
                            <div class="col-md-12">
                                <label for="level_languague">level languague:</label>
                                <div class="ml-2 form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="level_languague" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="level_languague" id="inlineRadio2" value="2">
                                    <label class="form-check-label" for="inlineRadio2">2</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="level_languague" id="inlineRadio3" value="3">
                                    <label class="form-check-label" for="inlineRadio3">3</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="level_languague" id="inlineRadio4" value="4">
                                    <label class="form-check-label" for="inlineRadio4">4</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="level_languague" id="inlineRadio5" value="5">
                                    <label class="form-check-label" for="inlineRadio5">5</label>
                                </div>
                            </div>
                            <input type="text" class="form-control d-none" name="user_id"  id="user_id"  value="{{ Auth::user()->id }}">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Model -->

    <!-- delete Model -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acc_title">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="acc_msg">are you sure you want to delete?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('workExperiences/delete',$x) }}" class="btn btn-success si_accept_confirm">Yes</a>
                    <button type="button" class="btn btn-danger si_accept_cancel" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /delete Model -->
