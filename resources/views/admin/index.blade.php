@extends('layout.admin.master')
@section('content')
    <a class="btn btn-success" href="logout.php"><i class="fa fa-lock"></i> Logout</a>
    <a class="btn btn-success" data-toggle="modal" data-target="#myModal" href="{{ route('students.create') }}">
        <i class="fa fa-plus"></i> Add New Student
    </a>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered table-striped table-hover" id="myTable">
        <thead>
            <tr>
                <th class="text-center" scope="col">S.L</th>
                <th class="text-center" scope="col">Name</th>
                <th class="text-center" scope="col">Phone</th>
                <th class="text-center" scope="col">Photo</th>
                <th class="text-center" scope="col">View</th>
                <th class="text-center" scope="col">Edit</th>
                <th class="text-center" scope="col">Approve</th>
                <th class="text-center" scope="col">Reject</th>
            </tr>
        </thead>
        @foreach ($students as $student)
            <tr>
                <td class='text-left'>{{ $student->id ?? '' }}</td>
                <td class='text-left'>{{ $student->fname ?? '' }} {{ $student->lname ?? '' }}</td>
                <td class='text-left'>{{ $student->phone ?? '' }}</td>
                <td>
                    <a class="fancybox" data-fancybox="demo"
                        href="{{ asset('/assets/admin/img/student/' . $student->image) }}">
                        <img src="{{ asset('/assets/admin/img/student/' . $student->image) }}" alt="{{ $student->name }}"
                            width="100">
                    </a>
                </td>
                <td class='text-center'>
                    <span>
                        <a class='btn btn-success mr-3 profile' data-toggle='modal' data-target='#view$id'
                            href='{{ route('students.show', $student->id) }}' title='Prfile'><i class='fa fa-address-card-o'
                                aria-hidden='true'></i></a>
                    </span>

                </td>

                <td class='text-center'>
                    <span>
                        <a class='btn btn-warning mr-3 edituser' data-toggle='modal' data-target='#edit$id'
                            href='{{ route('students.edit', $student->id) }}' title='Edit'><i
                                class='fa fa-pencil-square-o fa-lg'></i></a>

                    </span>

                </td>
                <td class='text-center'>
                    <span>
                        @if ($student->status === 'pending')
                            <form action="{{ route('approve', $student->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-success" type="submit">Approve</button>
                            </form>
                        @endif

                        {{ $student->status ?? '' }}

                    </span>

                </td>
                <td class='text-center'>
                    <span>

                        @if ($student->status === 'pending')
                            <form action="{{ route('reject', $student->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger" type="submit"> Reject</button>
                            </form>
                        @endif
                        <br>
                        {{ $student->status ?? '' }}
                        <form class="delete-form" action="{{ route('students.destroy', $student->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger delete_course mr-2" id="" data-type="confirm"
                                type="submit" title="Delete"><i class="fa fa-trash"></i>
                                Delete</button>
                        </form>
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
