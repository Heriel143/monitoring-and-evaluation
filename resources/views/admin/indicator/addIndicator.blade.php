@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-xl font-bold card-title">Add Indicator</h1>
                            @if (count($errors))
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">{{ $error }}</p>
                                @endforeach
                            @endif
                            <form action="{{ route('indicator.store') }}" method="post" class="mt-4" id="myForm">
                                @csrf
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Project Name</label>
                                    <div class="col-sm-9">
                                        <select name="project_id" class="form-select" aria-label="Default select example">
                                            <option selected=""></option>
                                            @foreach ($projects as $project)
                                                <option value="{{ $project->id }}">{{ $project->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Number</label>
                                    <div class="col-sm-9 form-group">
                                        <input class="form-control" type="text" name="indicator_number" id="name">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9 form-group">
                                        <input class="form-control" type="text" name="title" id="name">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Disaggretion</label>
                                    <div class="col-sm-9">
                                        <select name="disagretion" class="form-select " aria-label="Default select example"
                                            id="disagretion">
                                            <option selected=""></option>
                                            @foreach ($disagretions as $disagretion)
                                                <option value="{{ $disagretion->name }}">{{ $disagretion->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Unit</label>
                                    <div class="col-sm-9 form-group">
                                        <select name="unit" class="form-select " aria-label="Default select example"
                                            id="disagretion">
                                            <option selected=""></option>
                                            {{-- @foreach ($disagretions as $disagretion) --}}
                                            <option value="number">Number
                                            </option>
                                            <option value="percent">Percent
                                            </option>
                                            {{-- @endforeach --}}
                                        </select>
                                    </div>
                                </div>

                                <!-- end row -->


                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="px-3 py-2 font-semibold text-white bg-green-700 rounded-lg hover:bg-green-600">Add
                                        Indicator</button>
                                </div>
                                <!-- end row -->
                            </form>


                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <div class="row">
                <div class="col-10">
                    <div class="card">
                        <div class="card-body">

                            <div class="pb-4">

                                {{-- <a href="{{ route('add.category') }}"
                                    class="justify-center inline-block float-right px-3 py-2 font-semibold text-white bg-blue-900 rounded-lg hover:bg-blue-800"><i
                                        class="fas fa-plus-circle"></i> Add
                                    Category</a> --}}

                                <h4 class="text-base font-semibold">List of Indicators </h4>
                            </div>


                            <table id="datatable" class="table table-bordered dt-responsive wrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Indicator</th>

                                        <th>Action</th>

                                </thead>


                                <tbody>

                                    @foreach ($indicators as $key => $indicator)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td> {{ $indicator->indicator_number . ' ' . $indicator->title . ' disaggregaton by (' . $indicator->disagretion . ')' }}
                                            </td>


                                            <td class="flex justify-around">
                                                <a href="{{ route('edit.indicator', $indicator->id) }}"
                                                    class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i>
                                                </a>

                                                <a href="{{ route('delete.indicator', $indicator->id) }}"
                                                    class="btn btn-danger sm" title="Delete Data" id="delete"> <i
                                                        class="fas fa-trash-alt"></i>
                                                </a>

                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

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
                    title: {
                        required: true,
                    },
                    indicator_number: {
                        required: true,
                    },
                    disagretion: {
                        required: true,
                    },
                    unit: {
                        required: true,
                    },

                },
                messages: {
                    project_id: {
                        required: 'Please select Project name',
                    },
                    title: {
                        required: 'Please enter Indicator name',
                    },
                    indicator_number: {
                        required: 'Please enter Indicator number',
                    },
                    disagretion: {
                        required: 'Please select Disagretion',
                    },
                    unit: {
                        required: 'Please select Indicator Unit of measure',
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
