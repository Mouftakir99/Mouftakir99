<x-admin-layout>
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Dashboard Admin</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->



    <div class="row">
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
        <div class="col-md-6 d-flex">
            <!-- Recent Orders -->
            <div class="card card-table flex-fill">
                <div class="card-header">
                    <h4 class="card-title"><a href="{{ route('workExperiences') }}" style="color: black">Work Experiences List</a></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>description</th>
                                    <th>start</th>
                                    <th>end</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse (Auth::user()->workExperiences as $item)
                                    <tr>
                                        <td>{{ $item->name_work_exprience }}</td>
                                        <td>{{ $item->statut_work_exprience }}</td>
                                        <td>
                                            @if ( strlen($item->description_work_exprience ) > 20)
                                                {{ substr($item->description_work_exprience  , 0, 20).'...';}}
                                                @else
                                                    {{ $item->description_work_exprience   }}
                                            @endif
                                        </td>
                                        <td>{{ $item->start_work_exprience }}</td>
                                        <td>{{ $item->end_work_exprience }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            No data Found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Recent Orders -->
        </div>

        <div class="col-md-6 d-flex">
            <!-- Feed Activity -->
            <div class="card  card-table flex-fill">
                <div class="card-header">
                    <h4 class="card-title"><a href="{{ route('educations') }}" style="color: black">Educations List</a></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>description</th>
                                    <th>start</th>
                                    <th>end</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse (Auth::user()->educations as $item)
                                    <tr>
                                        <td>{{ $item->name_education }}</td>
                                        <td>{{ $item->status_education }}</td>
                                        <td>
                                            @if ( strlen($item->description_education ) > 20)
                                                {{ substr($item->description_education  , 0, 20).'...';}}
                                                @else
                                                    {{ $item->description_education   }}
                                            @endif
                                        </td>
                                        <td>{{ $item->start_education }}</td>
                                        <td>{{ $item->end_education }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            No data Found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Feed Activity -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 d-flex">
            <!-- Recent Orders -->
            <div class="card card-table flex-fill">
                <div class="card-header">
                    <h4 class="card-title"><a href="{{ route('socialMedia') }}" style="color: black">Social Media List</a></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse (Auth::user()->socialMedia as $item)
                                    <tr>
                                        <td>{{ $item->name_socialMedia }}</td>
                                        <td>{{ $item->link_socialMedia }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            No data Found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Recent Orders -->
        </div>

        <div class="col-md-6 d-flex">
            <!-- Feed Activity -->
            <div class="card  card-table flex-fill">
                <div class="card-header">
                    <h4 class="card-title"><a href="{{ route('languagues') }}" style="color: black">Languages List</a></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Level</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse (Auth::user()->educations as $item)
                                    <tr>
                                        <td>{{ $item->name_languague }}</td>
                                        <td>{{ $item->level_languague }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">
                                            No data Found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Feed Activity -->
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 d-flex">
            <!-- Recent Orders -->
            <div class="card card-table flex-fill">
                <div class="card-header">
                    <h4 class="card-title"><a href="{{ route('skills') }}" style="color: black">Skill List</a></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Pourcentage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse (Auth::user()->skills as $item)
                                    <tr>
                                        <td>{{ $item->name_skill }}</td>
                                        <td>{{ $item->pourcentage_skill }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            No data Found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Recent Orders -->
        </div>

        <div class="col-md-6 d-flex">
            <!-- Feed Activity -->
            <div class="card  card-table flex-fill">
                <div class="card-header">
                    <h4 class="card-title"><a href="{{ route('extraSkills') }}" style='color:black'>Extra Skills List</a></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Level</th>
                                    <th>pourcentage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse (Auth::user()->extraSkills as $item)
                                    <tr>
                                        <td>{{ $item->name_extra_skill }}</td>
                                        <td>
                                            @if ( strlen($item->description__extra_skill ) > 20)
                                                {{ substr($item->description__extra_skill  , 0, 20).'...';}}
                                                @else
                                                    {{ $item->description__extra_skill  }}
                                            @endif
                                        </td>
                                        <td>{{ $item->pourcentage_extra_skill }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">
                                            No data Found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Feed Activity -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex">
            <!-- Feed Activity -->
            <div class="card  card-table flex-fill">
                <div class="card-header">
                    <h4 class="card-title"><a href="{{ route('hobbies') }}" style="color: black">Hobbies List</a></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse (Auth::user()->hobbies as $item)
                                    <tr>
                                        <td>{{ $item->name_hobby }}</td>
                                        <td>{{ $item->photo_hobby }}</td>
                                        <td>{{ $item->user->email }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">
                                            No data Found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>

</x-admin-layout>
