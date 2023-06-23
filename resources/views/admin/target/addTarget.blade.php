@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-xl font-bold card-title">Add Target Page</h1>
                            @if (count($errors))
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">{{ $error }}</p>
                                @endforeach
                            @endif
                            <form action="{{ route('target.store') }}" method="post" class="mt-4" id="myForm">
                                @csrf
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Project Name:</label>
                                    <div class="col-sm-8">
                                        <select name="project_id" class="form-select" aria-label="Default select example"
                                            id="project_id">
                                            <option selected=""></option>
                                            @foreach ($projects as $project)
                                                <option value="{{ $project->id }}">{{ $project->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Indicator Name:</label>
                                    <div class="col-sm-8">
                                        <select name="indicator_id" id="indicator_id" class="form-select"
                                            aria-label="Default select example">
                                            <option selected=""></option>
                                            {{-- @foreach ($indicators as $indicator)
                                                <option value="{{ $indicator->id }}">{{ $indicator->name }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Name:</label>
                                    <div class="col-sm-8 form-group">
                                        <input class="form-control" type="text" name="title" id="name">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Description:</label>
                                    <div class="col-sm-8 form-group">
                                        <input class="form-control" type="text" name="description" id="name">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Unit:</label>
                                    <div class="col-sm-8 form-group">
                                        <input class="form-control" type="text" name="unit" id="name">
                                    </div>
                                </div>
                                <div class="mb-10 ml-48">

                                    <div class="flex gap-5 col-md-4">

                                        <div class="md-3">
                                            <label for="example-text-input" class="form-label">Start Date</label>
                                            <input name="start_date" value="" class="form-control example-date-input"
                                                type="date" id="date">
                                        </div>
                                        <div class="md-3">
                                            <label for="example-text-input" class="form-label">End Date</label>
                                            <input name="end_date" value="" class="form-control example-date-input"
                                                type="date" id="date">
                                        </div>
                                    </div>
                                </div>

                                <!-- end row -->


                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="px-3 py-2 font-semibold text-white bg-blue-900 rounded-lg hover:bg-blue-800">Add
                                        Indicator</button>
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
                    project_id: {
                        required: true,
                    },
                    indicator_id: {
                        required: true,
                    },
                    title: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                    unit: {
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
                    project_id: {
                        required: 'Please select Project',
                    },
                    indicator_id: {
                        required: 'Please select Indicator',
                    },
                    title: {
                        required: 'Please enter Target name',
                    },
                    description: {
                        required: 'Please enter Description',
                    },
                    unit: {
                        required: 'Please enter units',
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
    <script type="text/javascript">
        $(function() {
            $(document).on('change', '#project_id', function() {
                var project_id = $(this).val();
                $.ajax({
                    url: "{{ route('get-indicator') }}",
                    type: 'GET',
                    data: {
                        project_id: project_id
                    },
                    success: function(data) {
                        var html = '<option value="">Select Indicator</option>';
                        // console.log('hello');
                        $.each(data, function(key, v) {
                            html += '<option value="' + v.id +
                                '">' + v.title + '</option>'
                        });
                        $('#indicator_id').html(html);
                    }
                })
            })
        })
    </script>
@endsection
