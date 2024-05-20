{{-- <div>
    <!-- It is never too late to be what you might have been. - George Eliot -->
</div> --}}
@extends('layout.student.master')
@section('content')
    @include('layout.student.header')
    <div class="modal-content">
        <div class="modal-body ml-10">
            <form method="POST" enctype="multipart/form-data" action="{{ route('mydetails.update', $student->id) }}">
                @csrf
                @method('PUT')
                <!-- This is test for New Card Activate Form  -->
                <!-- This is Address with email id  -->

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstname">First Name</label>
                        <input class="form-control" type="text" value="{{ old('fname', $student->fname) }}" name="fname"
                            placeholder="Enter First Name">
                        @error('fname')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastname">Last Name</label>
                        <input class="form-control" type="text" value="{{ old('lname', $student->lname) }}"
                            name="lname" placeholder="Enter Last Name">
                        @error('lname')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Mobile No.</label>
                        <input class="form-control" type="phone" value="{{ old('phone', $student->phone) }}"
                            name="phone" placeholder="Enter Mobile no.">
                        @error('phone')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="fathername">Father's Name</label>
                        <input class="form-control" type="text" value="{{ old('fathername', $student->fathername) }}"
                            name="fathername" placeholder="Enter First Name">
                        @error('fathername')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="mothername">Mother's Name</label>
                        <input class="form-control" type="text" value="{{ old('mothername', $student->mothername) }}"
                            name="mothername" placeholder="Enter Last Name">
                        @error('mothername')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="form-row" style="color: skyblue;">
                    <div class="form-group col-md-6">
                        <label for="email">Email Id</label>
                        <input class="form-control" type="email" value="{{ old('email', $student->email) }}"
                            name="email" placeholder="Enter Email id">\
                        @error('email')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="form-group col-md-6">
                            <label for="inputState">Gender</label>
                            <select class="form-control" id="inputState" name="gender">
                                <option selected disabled>Choose...</option>
                                <option value="Male" {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}>
                                    Male</option>
                                <option value="Female" {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}>
                                    Female</option>
                                <option value="Other" {{ old('gender', $student->gender) == 'Other' ? 'selected' : '' }}>
                                    Other</option>
                            </select>
                            @error('gender')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Date of Birth</label>
                            <input class="form-control" type="date" value="{{ old('dob', $student->dob) }}"
                                name="dob" placeholder="Date of Birth">
                            @error('dob')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Full Address</label>
                        <input class="form-control" type="text" name="address"
                            value="{{ old('address', $student->address) }}" placeholder="Ex:-Bharatpur">
                        @error('address')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputAddress">Your Subject</label>
                        <textarea class="form-control ckeditor" id="editor" name="subject" cols="30" rows="10"> {{ old('subject', $student->subject) }}</textarea>
                        @error('subject')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control" type="file" name="image">
                        @error('image')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <input class="btn btn-info btn-large" type="submit" name="submit" value="Update">

            </form>
        </div>
    </div>
@endsection
