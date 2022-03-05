<x-admin-layout>
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-7 col-auto">
                <h3 class="page-title">Contacts</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Contacts</li>
                </ul>
            </div>
            <div class="col-sm-5 col">
                <a  href="javascript:void(0);" class="btn btn-primary float-right mt-2" data-toggle="modal" data-target="#AddModal">Add New Contacts</a>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php  $x='';  @endphp
                                @forelse (Auth::user()->contacts as $item)
                                    <tr>
                                        <td>{{ $item->name_contact }}</td>
                                        <td>{{ $item->email_contact }}</td>
                                        <td>{{ $item->subject_contact }}</td>
                                        <td>
                                            @if ( strlen($item->message_contact ) > 20)
                                                {{ substr($item->message_contact  , 0, 20).'...';}}
                                                @else
                                                    {{ $item->message_contact   }}
                                            @endif
                                        </td>
                                        <td>
                                            <div class="actions">
                                                <a class="btn btn-sm bg-success-light"
                                                    onclick="{{ $x= $item->id }};
                                                    $('#user_id').val('{{ $item->user_id }}');
                                                    $('#name_contact').val('{{ $item->name_contact }}');
                                                    $('#email_contact').val('{{ $item->email_contact }}');
                                                    $('#subject_contact').val('{{ $item->subject_contact }}');
                                                    $('#message_contact').val('{{ $item->message_contact }}');"
                                                     data-toggle="modal" data-target="#UpdateModal">
                                                    <i class="fe fe-pencil"></i> Edit
                                                </a>
                                                <a href="javascript:void(0);" onclick="{{ $x= $item->id }}" class="btn btn-sm bg-danger-light" data-toggle="modal" data-target="#deleteConfirmModal">
                                                    <i class="fe fe-trash"></i> Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">
                                            No data Found
                                        </td>
                                    </tr>
                                @endforelse
                            <tbody>
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
                    <h5 class="modal-title" id="acc_title">Add New Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('contacts/added') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="name_extra_skill">Name Contacts:</label>
                                <input type="text" class="form-control" name="name_contact">
                            </div>

                            <div class="col-md-12">
                                <label for="name_extra_skill">E-mail Contacts:</label>
                                <input type="email" class="form-control" name="email_contact">
                            </div>

                            <div class="col-md-12">
                                <label for="name_extra_skill">Subject Contacts:</label>
                                <input type="text" class="form-control" name="subject_contact">
                            </div>


                            <div class="col-md-12">
                                <label for="desciption_extra_skill">Message Contact  :</label>
                                <textarea name="message_contact" class="form-control autogrow" id="" cols="20" rows="10"></textarea>
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
                    <h5 class="modal-title" id="acc_title">Update Contacts</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('contacts/updated',$x) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label for="name_extra_skill">Name Contacts:</label>
                            <input type="text" class="form-control" name="name_contact" id="name_contact">
                        </div>

                        <div class="col-md-12">
                            <label for="name_extra_skill">E-mail Contacts:</label>
                            <input type="email" class="form-control" name="email_contact" id="email_contact">
                        </div>

                        <div class="col-md-12">
                            <label for="name_extra_skill">Subject Contacts:</label>
                            <input type="text" class="form-control" name="subject_contact" id="subject_contact">
                        </div>


                        <div class="col-md-12">
                            <label for="desciption_extra_skill">Message Contact  :</label>
                            <textarea name="message_contact" class="form-control autogrow" id="message_contact" cols="20" rows="10"></textarea>
                        </div>

                        <input type="text" class="form-control d-none" name="user_id"  value="{{ Auth::user()->id }}">

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
                    <h5 class="modal-title" id="acc_title">Delete Contacts </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="acc_msg">are you sure you want to delete?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('contacts/delete',$x) }}" class="btn btn-success si_accept_confirm">Yes</a>
                    <button type="button" class="btn btn-danger si_accept_cancel" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>


</x-admin-layout>
