@extends('layout.student.master')
@section('content')
    <a class="btn btn-success" href="logout.php"><i class="fa fa-lock"></i> Logout</a>
    <a class="btn btn-success" data-toggle="modal" data-target="#myModal" href="{{ route('mydetails.create') }}">
        <i class="fa fa-plus"></i> Add a request
    </a>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    {{-- {{ Auth::user() }} --}}
    <table class="table table-bordered table-striped table-hover" id="myTable">
        <thead>
            <tr>
                <th class="text-centaer" scope="col">S.L</th>
                <th class="text-center" scope="col">Name</th>
                <th class="text-center" scope="col">Phone</th>
                <th class="text-center" scope="col">Status</th>
                <th class="text-center" scope="col">View</th>
                <th class="text-center" scope="col">Edit</th>
            </tr>
        </thead>
        @foreach ($students as $student)
            <tr>
                <td class='text-left'>{{ $student->id ?? '' }}</td>
                <td class='text-left'>{{ $student->fname ?? '' }} {{ $student->lname ?? '' }}</td>
                <td class='text-left'>{{ $student->phone ?? '' }}</td>
                <td class="text-center">
                    {{ $student->status ?? '' }}
                </td>
                <td class='text-center'>
                    <span>
                        <a class='btn btn-success mr-3 profile' data-toggle='modal' data-target='#view$id'
                            href='{{ route('mydetails.show', $student->id) }}' title='Prfile'><i
                                class='fa fa-address-card-o' aria-hidden='true'></i></a>
                    </span>

                </td>

                <td class='text-center'>
                    <span>
                        @if ($student->status === 'pending' || $student->status === 'rejected')
                            <a class='btn btn-warning mr-3 edituser' data-toggle='modal' data-target='#edit$id'
                                href='{{ route('mydetails.edit', $student->id) }}' title='Edit'><i
                                    class='fa fa-pencil-square-o fa-lg'></i></a>
                        @else
                            You cannot edit your detail after approved
                        @endif
                    </span>

                </td>
            </tr>
        @endforeach

    </table>
@endsection
@section('script')
    <script>
        $('.delete_course').click(function(e) {
            e.preventDefault();
            swal({
                    title: `Are you sure?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(this).closest("form").submit();
                    }
                });

        });
    </script>
@endsection
