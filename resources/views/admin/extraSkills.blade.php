<x-admin-layout>
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-7 col-auto">
                <h3 class="page-title">Extra extraSkills</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Extra extraSkills</li>
                </ul>
            </div>
            <div class="col-sm-5 col">
                <a  href="javascript:void(0);" class="btn btn-primary float-right mt-2" data-toggle="modal" data-target="#AddModal">Add New Extra extraSkills</a>
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
                                    <th>description</th>
                                    <th>pourcentage</th>
                                    <th>User Name</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php  $x='';  @endphp
                                @forelse (Auth::user()->extraSkills as $key => $extraSkill)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $extraSkill->name_extra_skill }}</td>
                                        <td>
                                            @if ( strlen($extraSkill->desciption_extra_skill ) > 20)
                                                {{ substr($extraSkill->desciption_extra_skill , 0, 20).'...';}}
                                            @else
                                                {{ $extraSkill->desciption_extra_skill  }}
                                            @endif
                                        </td>
                                        <td>{{ $extraSkill->pourcentage_extra_skill }}</td>
                                        <td>{{ $extraSkill->user->email }}</td>
                                        <td>
                                            <div class="actions">
                                                <a class="btn btn-sm bg-success-light"
                                                    onclick="{{ $x= $extraSkill->id }};
                                                    $('#user_id').val('{{ $extraSkill->user_id }}');
                                                    $('#name_extra_skill').val('{{ $extraSkill->name_extra_skill }}');
                                                    $('#desciption_extra_skill').val('{{ $extraSkill->desciption_extra_skill }}');
                                                    $('#pourcentage_extra_skill').val('{{ $extraSkill->pourcentage_extra_skill }}');"
                                                    data-toggle="modal" data-target="#UpdateModal">
                                                    <i class="fe fe-pencil"></i> Edit
                                                </a>
                                                <a href="javascript:void(0);" onclick="{{ $x= $extraSkill->id }}" class="btn btn-sm bg-danger-light" data-toggle="modal" data-target="#deleteConfirmModal">
                                                    <i class="fe fe-trash"></i> Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="6" style="background: lightseagreen;color:white"><div class="btn btn-sm bg-danger-light" style="width:'500px'">No Data Found</div></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Add Model -->
    <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-lg-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acc_title">Add New Extra Skill</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('extraSkills/added') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="name_extra_skill">Name Extra Skill :</label>
                                <input type="text" class="form-control" name="name_extra_skill">
                            </div>
                            <div class="col-md-12">
                                <label for="desciption_extra_skill">Description Extra Skill:</label>
                                <textarea name="desciption_extra_skill" class="form-control autogrow" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="pourcentage_extra_skill">pourcentage Extra Skill:</label>
                                <input type="text" class="form-control" name="pourcentage_extra_skill">
                            </div>
                            <input type="text" class="form-control d-none" name="user_id"  value="{{ Auth::user()->id }}">

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

	<!-- ModelUpdate -->
    <div class="modal fade" id="UpdateModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog model-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acc_title">update Extra Skill</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('extraSkills/updated',$x) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="name_extra_skill">Name Extra Skill :</label>
                                <input type="text" class="form-control" name="name_extra_skill" id="name_extra_skill">
                            </div>
                            <div class="col-md-12">
                                <label for="pourcentage_extra_skill">pourcentage Extra Skill :</label>
                                <input type="text" class="form-control" name="pourcentage_extra_skill" id="pourcentage_extra_skill">
                            </div>
                            <div class="col-md-12">
                                <label for="description_extraSkill">Description Extra Skill :</label>
                                <textarea name="desciption_extra_skill" class="form-control autogrow" id="desciption_extra_skill" cols="30" rows="10"></textarea>
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

    <!-- delete Model -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acc_title">Delete </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="acc_msg">are you sure you want to delete?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('extraSkills/delete',$x) }}" class="btn btn-success si_accept_confirm">Yes</a>
                    <button type="button" class="btn btn-danger si_accept_cancel" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /delete Model -->

</x-admin-layout>

