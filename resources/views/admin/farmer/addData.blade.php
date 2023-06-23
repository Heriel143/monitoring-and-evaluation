@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h1 class="text-xl font-bold card-title">Data Entry</h1>
                            @if (count($errors))
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">{{ $error }}</p>
                                @endforeach
                            @endif
                            <form action="{{ route('farmer.store') }}" method="post" class="mt-4" id="myForm">
                                @csrf
                                <div class="mb-12 row">
                                    <label class="col-sm-2 col-form-label">Indicator</label>
                                    <div class="col-sm-10">
                                        <select name="indicator_id" id="indicator_id" class="form-select"
                                            aria-label="Default select example">
                                            <option selected=""></option>
                                            @foreach ($indicators as $indicator)
                                                <option value="{{ $indicator->id }}">{{ $indicator->indicator_number }}
                                                    {{ $indicator->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <table id="datatable" class="table table-bordered dt-responsive wrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" class="col-sm-6">Indicator / Disaggretion</th>
                                            <th colspan="2" class="text-center">2023</th>
                                            <th>2024</th>
                                            <th>2025</th>
                                            <th>2026</th>
                                        </tr>
                                        <tr>
                                            {{-- <th rowspan="2"></th> --}}
                                            <td>Target</td>
                                            <td>Actual</td>
                                            <td>Target</td>
                                            <td>Target</td>
                                            <td>Target</td>

                                        </tr>

                                    </thead>


                                    <tbody class="addRow" id="addRow">

                                        {{-- <tr>
                                            <td>Target</td>
                                            <td>Actual</td>
                                            <td>Target</td>
                                            <td>Target</td>
                                            <td>Target</td>
                                        </tr> --}}
                                        {{-- @foreach ($categories as $key => $category)
                                            <tr>
                                                <td> {{ $key + 1 }} </td>
                                                <td> {{ $category->name }} </td>


                                                <td class="flex justify-around">
                                                    <a href="{{ route('edit.category', $category->id) }}"
                                                        class="btn btn-info sm" title="Edit Data"> <i
                                                            class="fas fa-edit"></i>
                                                    </a>

                                                    <a href="{{ route('delete.category', $category->id) }}"
                                                        class="btn btn-danger sm" title="Delete Data" id="delete"> <i
                                                            class="fas fa-trash-alt"></i>
                                                    </a>

                                                </td>

                                            </tr>
                                        @endforeach --}}

                                    </tbody>
                                </table>
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="px-3 py-2 font-semibold text-white bg-green-700 rounded-lg hover:bg-green-600">Save
                                    </button>
                                </div>
                                <!-- end row -->
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },

                },
                messages: {
                    name: {
                        required: 'Please Enter Category name',
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
        $(document).ready(function() {
            $(document).on('change', '#indicator_id', function() {
                var indicator_id = $(this).val();


                // $('.delete_add_more_item').remove();
                // totalAmountPrice();

                $.ajax({
                    url: "{{ route('get-sex') }}",
                    type: 'GET',
                    data: {
                        indicator_id: indicator_id
                    },
                    success: function(data) {
                        // var source = $('#document-template').html();
                        // var tamplate = Handlebars.compile(source);
                        var one = data[0];
                        // console.log(data);

                        var html = '<tr class="delete_add_more_item"><td>' + one
                            .indicator_number +
                            '<input type="hidden" name="indicator_id" class="col-sm-12" value="' +
                            one.id + '"> ' + one.title +
                            ' </td><td>' + one.target + '</td><td>' + one.actual +
                            '</td><td>Target</td><td>Target</td><td>Target</td></tr>';
                        $.each(data[1], function(key, v) {
                            html += '<tr><td>' + v.name +
                                '</td><td><input type="hidden" value="' + v.id +
                                '" name="id[]"><input type="number" name="target[]" class="col-sm-12" value="' +
                                v.target +
                                '"></td><td><input name="actual[]" type="number" class="col-sm-12" value="' +
                                v.actual +
                                '"></td><td>Target</td><td>Target</td><td>Target</td></tr>'
                        });
                        // // var one =
                        // //     '<tr><td>Indicator with Disaggretion</td><td>Target</td><td>Actual</td><td>Target</td><td>Target</td><td>Target</td></tr>'
                        // // var html = '<option value="">Select Sex</option>';
                        // $.each(data, function(key, v) {
                        //     html += '<option value="' + v.id +
                        //         '">' + v.name + '</option>'
                        // });
                        // $('.addRow').append(html);
                        $('.addRow').html(html);
                    }
                })

                // var source = $('#document-template').html();
                // var tamplate = Handlebars.compile(source);
                // var data = {
                //     date: date,
                //     invoice_no: invoice_no,
                //     category_id: category_id,
                //     customer_id: customer_id,
                //     category_name: category_name,
                //     product_id: product_id,
                //     product_name: product_name
                // };
                // var html = tamplate(data);
                // $('#addRow').append(html);

            });







        })
    </script>

    {{-- <script type="text/javascript">
        $(function() {
            $(document).on('change', '#indicator_id', function() {
                var indicator_id = $(this).val();
                $.ajax({
                    url: "{{ route('get-sex') }}",
                    type: 'GET',
                    data: {
                        indicator_id: indicator_id
                    },
                    success: function(data) {
                        // console.log(data);
                        // var data2 = data[1];
                        $.each(data, function(key, v) {
                            html += '<tr><td>' + v.name +
                                '</td><td>Target</td><td>Actual</td><td>Target</td><td>Target</td><td>Target</td></tr>'
                        });
                        // var one =
                        //     '<tr><td>Indicator with Disaggretion</td><td>Target</td><td>Actual</td><td>Target</td><td>Target</td><td>Target</td></tr>'
                        // var html = '<option value="">Select Sex</option>';
                        // $.each(data, function(key, v) {
                        //     html += '<option value="' + v.id +
                        //         '">' + v.name + '</option>'
                        // });
                        // $('.Sex').html(html);
                        $('#datatable').html(html);
                    }
                })
            })
        })
    </script> --}}
@endsection
