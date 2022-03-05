<x-admin-layout>
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-7 col-auto">
                <h3 class="page-title">Education</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Education</li>
                </ul>
            </div>
            <div class="col-sm-5 col">
                <a href="{{ route('AddEducations') }}" class="btn btn-primary float-right mt-2">Add Education</a>
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
                                    <th>Status</th>
                                    <th>description</th>
                                    <th>start</th>
                                    <th>end</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php  $x='';  @endphp
                                @forelse (Auth::user()->educations as $key => $education)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $education->name_education }}</td>
                                        <td>{{ $education->statut_education  }}</td>
                                        <td>
                                            @if ( strlen($education->description_education ) > 20)
                                                {{ substr($education->description_education  , 0, 20).'...';}}
                                                @else
                                                    {{ $education->description_education   }}
                                            @endif
                                        </td>
                                        <td>{{ $education->start_education  }}</td>
                                        <td>{{ $education->end_education  }}</td>
                                        <td>
                                            <div class="actions">
                                                <a class="btn btn-sm bg-success-light"
                                                    onclick="{{ $x= $education->id }};
                                                    $('#user_id').val('{{ $education->user_id }}');
                                                    $('#name_education').val('{{ $education->name_education }}');
                                                    $('#statut_education').val('{{ $education->statut_education }}');
                                                    $('#description_education').val('{{ $education->description_education }}');
                                                    $('#start_education').val('{{ $education->start_education }}');
                                                    $('#end_education').val('{{ $education->end_education }}');" data-toggle="modal" data-target="#UpdateModal">
                                                    <i class="fe fe-pencil"></i> Edit
                                                </a>
                                                <a href="javascript:void(0);" onclick="{{ $x= $education->id }}" class="btn btn-sm bg-danger-light" data-toggle="modal" data-target="#deleteConfirmModal">
                                                    <i class="fe fe-trash"></i> Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="7" style="background: lightseagreen;color:white"><div class="btn btn-sm bg-danger-light" style="width:'500px'">No Data Found</div></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!-- ModelUpdate -->
    <div class="modal fade" id="UpdateModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog model-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acc_title">Update Education</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('educations/updated',$x) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="name_work_exprience">Name Education :</label>
                                <input type="text" class="form-control" name="name_education" id="name_education">
                            </div>
                            <div class="col-md-12">
                                <label for="statut_education">Status Education :</label>
                                <input type="text" class="form-control" name="statut_education" id="statut_education">
                            </div>
                            <div class="col-md-12">
                                <label for="description_education">Description Education :</label>
                                <textarea name="description_education" class="form-control autogrow" id="description_education" cols="30" rows="10"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="start_education">Start :</label>
                                <input type="date" class="form-control" name="start_education"  id="start_education" >
                            </div>
                            <div class="col-md-6">
                                <label for="end_education">End :</label>
                                <input type="date" class="form-control" name="end_education"  id="end_education">
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
    <!-- /Modele -->

    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acc_title">Delete Education </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="acc_msg">are you sure you want to delete?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('educations/delete',$x) }}" class="btn btn-success si_accept_confirm">Yes</a>
                    <button type="button" class="btn btn-danger si_accept_cancel" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>


</x-admin-layout>
