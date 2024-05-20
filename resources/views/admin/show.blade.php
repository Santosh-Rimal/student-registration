@extends('layout.admin.master')
@section('content')
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>Profile <i class='fa fa-user-circle-o' aria-hidden='true'></i>
                </h5>
            </div>
            <div class='modal-body'>
                <div class='container' id='profile'>
                    <div class='row'>
                        <div class='col-sm-4 col-md-2'>
                            <img src='{{ asset('assets/admin/img/student/' . $student->image) }}' alt=''
                                style='width: 150px; height: 150px;'><br>
                            <i class='fa fa-phone' aria-hidden='true'></i> {{ $student->phone }} <br>
                        </div>
                        <div class='col-sm-3 col-md-6'>
                            <h3 class='text-primary'>{{ $student->fname }} {{ $student->lname }}</h3>
                            <p class='text-secondary'>
                                <strong>Father Name :</strong> {{ $student->fathername }} <br>
                                <strong>Mother Name:</strong>{{ $student->mothername }} <br>
                                <i class='fa fa-venus-mars' aria-hidden='true'></i> {{ $student->gender }}
                                <br />
                                <i class='fa fa-envelope-o' aria-hidden='true'></i> ${{ $student->email }}
                                <br />

                                <i class='fa fa-home' aria-hidden='true'> Address : </i>{{ $student->address }}
                                <br>
                                Choose Subject :{!! $student->subject !!}
                            </p>
                            <!-- Split button -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
