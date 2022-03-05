<x-admin-layout>
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-7 col-auto">
                <h3 class="page-title">Work Experiences</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Work Experiences</li>
                </ul>
            </div>
            <div class="col-sm-5 col">
                <a href="{{ route('AddworkExperiences') }}" class="btn btn-primary float-right mt-2">Add New Work Experiences</a>
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
                                @forelse (Auth::user()->workExperiences as $key => $workExperience)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $workExperience->name_work_exprience }}</td>
                                        <td>{{ $workExperience->statut_work_exprience }}</td>
                                        <td>
                                            @if ( strlen($workExperience->description_work_exprience) > 20)
                                                {{ substr($workExperience->description_work_exprience , 0, 20).'...';}}
                                                @else
                                                    {{ $workExperience->description_work_exprience  }}
                                            @endif
                                        </td>
                                        <td>{{ $workExperience->start_work_exprience }}</td>
                                        <td>{{ $workExperience->end_work_exprience }}</td>
                                        <td>
                                            <div class="actions">
                                                <a class="btn btn-sm bg-success-light"
                                                    onclick="{{ $x= $workExperience->id }};
                                                    $('#user_id').val('{{ $workExperience->user_id }}');
                                                    $('#name_work_exprience').val('{{ $workExperience->name_work_exprience }}');
                                                    $('#statut_work_exprience').val('{{ $workExperience->statut_work_exprience }}');
                                                    $('#description_work_exprience').val('{{ $workExperience->description_work_exprience }}');
                                                    $('#start_work_exprience').val('{{ $workExperience->start_work_exprience }}');
                                                    $('#end_work_exprience').val('{{ $workExperience->end_work_exprience }}');" data-toggle="modal" data-target="#UpdateModal">
                                                    <i class="fe fe-pencil"></i> Edit
                                                </a>
                                                <a href="javascript:void(0);" onclick="{{ $x= $workExperience->id }}" class="btn btn-sm bg-danger-light" data-toggle="modal" data-target="#deleteConfirmModal">
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
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforelse
                                {{-- <tr>
                                    <td>8</td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <span class="avatar avatar-sm mr-2"><img class="avatar-img" src="assets/img/product/product10.jpg" alt="product image"></span>
                                            Lysofranil Dorzostin
                                        </h2>
                                    </td>
                                    <td>Hair care</td>
                                    <td>$10</td>
                                    <td>0%</td>
                                    <td><span class="btn btn-sm bg-danger-light">THE PRODUCT IS EXPIRED</span></td>
                                    <td>
                                        <div class="actions">
                                            <a class="btn btn-sm bg-success-light" href="javascript:void(0);" data-toggle="modal" data-target="#UpdateModal">
                                                <i class="fe fe-pencil"></i> Edit
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm bg-danger-light" data-toggle="modal" data-target="#deleteConfirmModal">
                                                <i class="fe fe-trash"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr> --}}
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
                    <h5 class="modal-title" id="acc_title">Update Work Experience</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('workExperiences/updated',$x) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="name_work_exprience">Name Work Experience :</label>
                                <input type="text" class="form-control" name="name_work_exprience" id="name_work_exprience">
                            </div>
                            <div class="col-md-12">
                                <label for="statut_work_exprience">Status Work Experience :</label>
                                <input type="text" class="form-control" name="statut_work_exprience" id="statut_work_exprience">
                            </div>
                            <div class="col-md-12">
                                <label for="description_work_exprience">Description Work Experience :</label>
                                <textarea name="description_work_exprience" class="form-control autogrow" id="description_work_exprience" cols="30" rows="10"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="start_work_exprience">Start :</label>
                                <input type="date" class="form-control" name="start_work_exprience"  id="start_work_exprience" >
                            </div>
                            <div class="col-md-6">
                                <label for="end_work_exprience">End :</label>
                                <input type="date" class="form-control" name="end_work_exprience"  id="end_work_exprience">
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
                    <h5 class="modal-title" id="acc_title">Delete Work Experience </h5>
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
