@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Profile Page</h4>
                            <form action="{{ route('store.profile') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">First Name:</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="first_name"
                                            value="{{ $editData->first_name }}" id="example-text-input">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Last Name:</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="last_name"
                                            value="{{ $editData->last_name }}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="email"
                                            value="{{ $editData->email }}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                {{-- <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="username"
                                            value="{{ $editData->name }}" id="example-text-input">
                                    </div>
                                </div> --}}
                                <!-- end row -->
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="file" name="profile_image"
                                            id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-8">
                                        <img class="object-fill my-1 rounded-xl h-36 w-36"
                                            src="{{ !empty($editData->profile_image) ? url('upload/admin_images/' . $editData->profile_image) : url('upload/no_image.jpg') }}"
                                            alt="Card image cap">
                                    </div>
                                </div>
                                <div class="flex justify-end">

                                    <button type="submit"
                                        class="px-3 py-2 font-semibold text-white bg-green-700 rounded-lg hover:bg-green-600">Update
                                        Profile</button>
                                </div>
                                <!-- end row -->
                            </form>


                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
