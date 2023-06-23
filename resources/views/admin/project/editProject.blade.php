@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">

                            <h1 class="text-xl font-bold card-title">Edit Project</h1>
                            @if (count($errors))
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">{{ $error }}</p>
                                @endforeach
                            @endif
                            <form action="{{ route('project.update') }}" method="post" class="mt-4" id="myForm">
                                @csrf
                                <input type="hidden" name="id" value="{{ $project->id }}">
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Name:</label>
                                    <div class="col-sm-8 form-group">
                                        <input class="form-control" type="text" name="title"
                                            value="{{ $project->title }}" id="name">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Description:</label>
                                    <div class="col-sm-8 form-group">
                                        <textarea class="form-control" name="description" id="name">{{ $project->description }}</textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Location:</label>
                                    <div class="col-sm-8 form-group">
                                        <input class="form-control" type="text" value="{{ $project->location }}"
                                            name="location" id="name">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Budget (in USD):</label>
                                    <div class="col-sm-8 form-group">
                                        <input class="form-control" type="number" value="{{ $project->budget }}"
                                            name="budget" id="name">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Implementing
                                        Mechanism:</label>
                                    <div class="col-sm-8 form-group">
                                        <input class="form-control" type="text"
                                            value="{{ $project->implementing_mechanism }}" name="implementing_mechanism"
                                            id="name">
                                    </div>
                                </div>
                                <div class="mb-10 ml-40">

                                    <div class="flex gap-5 col-md-4">

                                        <div class="md-3">
                                            <label for="example-text-input" class="form-label">Start Date</label>
                                            <input name="start_date" value="{{ $project->start_date }}"
                                                class="form-control example-date-input" type="date" id="date">
                                        </div>
                                        <div class="md-3">
                                            <label for="example-text-input" class="form-label">End Date</label>
                                            <input name="end_date" value="{{ $project->end_date }}"
                                                class="form-control example-date-input" type="date" id="date">
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="px-3 py-2 font-semibold text-white bg-green-700 rounded-lg hover:bg-green-600">Add
                                        Project</button>
                                </div>
                                <!-- end row -->
                            </form>


                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    title: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                    location: {
                        required: true,
                    },
                    budget: {
                        required: true,
                    },
                    implementing_mechanism: {
                        required: true,
                    },
                    start_date: {
                        required: true,
                    },
                    end_date: {
                        required: true,
                    },

                },
                messages: {
                    title: {
                        required: 'Please Enter Project name',
                    },
                    description: {
                        required: 'Please Enter Description',
                    },
                    location: {
                        required: 'Please Enter Location',
                    },
                    budget: {
                        required: 'Please set Budget',
                    },
                    implementing_mechanism: {
                        required: 'Please Enter Implementing Mechanism',
                    },
                    start_date: {
                        required: 'Please select Start date',
                    },
                    end_date: {
                        required: 'Please select End date',
                    },

                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
