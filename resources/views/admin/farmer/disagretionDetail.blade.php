@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">

                            <h1 class="text-xl font-bold card-title">Detail Page</h1>
                            @if (count($errors))
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">{{ $error }}</p>
                                @endforeach
                            @endif
                            <form action="{{ route('farmer.store') }}" method="post" class="mt-4" id="myForm">
                                @csrf
                                @foreach ($results as $key => $item)
                                    <div class="mb-3 row">
                                        <div>
                                            <h1 class="float-left col-sm-10 col-form-label">{{ $key + 1 }}.
                                                {{ $item->name }}</h1>
                                            <div class=" form-group unyama" id="unyama">
                                                <div class="float-right col-sm-2" id="unyama2">
                                                    <input type="hidden" name='support_id[]' id="support_id"
                                                        value="{{ $item->id }}">
                                                    {{-- <input type="checkbox" name='' id="check" class="check"
                                                        value="{{ $item->title }}"> --}}
                                                    {{-- <select name="product_id[]" id="{{ $item->title }}"
                                                        class="mr-2 form-select select2 {{ $item->title }}"
                                                        aria-label="Default select example">
                                                        <option selected="">select</option>

                                                    </select> --}}
                                                    <input class="form-control" type="text" name="name[]"
                                                        id="name[]">
                                                    {{-- <input type="button"
                                                        class="px-3 py-2 font-semibold text-white bg-blue-900 rounded-lg hover:bg-blue-800 addeventmore"
                                                        id="addeventmore" value="+"> --}}

                                                </div>
                                                {{-- <script type="text/javascript">
                                                    $(function() {
                                                        $(document).on('change', "#{{ $item->title }}", function() {
                                                            // var supplier_id = $(this).val();
                                                            $.ajax({
                                                                url: "{{ route('get-sex') }}",
                                                                type: 'GET',
                                                                // data: {
                                                                //     supplier_id: supplier_id
                                                                // },
                                                                success: function(data) {
                                                                    var html = '<option value="">Select {{ $item->title }}</option>';
                                                                    $.each(data, function(key, v) {
                                                                        html += '<option value="' + v.id +
                                                                            '">' + v.name + '</option>'
                                                                    });
                                                                    $('.{{ $item->title }}').html(html);
                                                                }
                                                            });
                                                        });
                                                    })
                                                </script> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Description:</label>
                                    <div class="col-sm-8 form-group">
                                        <input class="form-control" type="text" name="description" id="name">
                                    </div>
                                </div>
                                <div class="mb-10 ml-40">

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


                            {{-- <div class="flex justify-end">
                                    <button type="submit"
                                        class="px-3 py-2 font-semibold text-white bg-blue-900 rounded-lg hover:bg-blue-800">Submit
                                        Form</button>
                                </div>
                                <!-- end row -->
                            </form> --}}


                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
    <script id="document-template" type="text/x-handlebars-template">
        <div class = "flex float-right col-sm-8 unyama2"
        id = "unyama2">
            <input type = "hidden"
        name = 'support_id[]' id="support_id"
        value ="@{{ support_id }}">
            
            <select name = "product_id[]"
        id = ""
        class = "mr-2 form-select select2 @{{ typee}}"
        aria - label = "Default select example" >
            <option selected = "" >select </option>
            </select> 
            <input class = "form-control"
        type = "text"
        name = "name[]"
        id = "name[]" >
            <input type="button"
        class = "px-3 py-2 font-semibold text-white bg-blue-900 rounded-lg addeventmore hover:bg-blue-800" value="+" > 
        <p class="flex items-center"><i class = "btn btn-danger btn-sm fas fa-window-close removeeventmore" > </i> </p>
    </div>
        </div>
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.addeventmore', function() {
                // var date = $('#date').val();
                var typee = $('.check').val();
                var support_id = $('#support_id').val();
                // var category_id = $('#category_id').val();
                // var category_name = $('#category_id').find('option:selected').text();
                // var product_id = $('#product_id').val();
                // var product_name = $('#product_id').find('option:selected').text();

                // if (date == '') {
                //     $.notify('Date is required', {
                //         globalPosition: 'top right',
                //         className: 'error'
                //     })
                //     return false;
                // }
                // if (purchase_no == '') {
                //     $.notify('Purchase No is required', {
                //         globalPosition: 'top right',
                //         className: 'error'
                //     })
                //     return false;
                // }
                // if (supplier_id == '') {
                //     $.notify('Date is required', {
                //         globalPosition: 'top right',
                //         className: 'error'
                //     })
                //     return false;
                // }
                // if (category_id == '') {
                //     $.notify('Category is required', {
                //         globalPosition: 'top right',
                //         className: 'error'
                //     })
                //     return false;
                // }
                // if (product_id == '') {
                //     $.notify('Product is required', {
                //         globalPosition: 'top right',
                //         className: 'error'
                //     })
                //     return false;
                // }

                var source = $('#document-template').html();
                var tamplate = Handlebars.compile(source);
                var data = {
                    typee: typee,
                    // purchase_no: purchase_no,
                    support_id: support_id,
                    // category_id: category_id,
                    // category_name: category_name,
                    // product_id: product_id,
                    // product_name: product_name
                };
                var html = tamplate(data);
                $(this).closest('.unyama').append(html);

            });

            $(document).on('click', '.removeeventmore', function(event) {
                $(this).closest('.unyama2').remove();
                // totalAmountPrice();
            });

            $(document).on('keyup click', '.unit_price,.buying_qty', function() {
                var unit_price = $(this).closest('tr').find('input.unit_price').val();
                var qty = $(this).closest('tr').find('input.buying_qty').val();
                var total = unit_price * qty;
                $(this).closest('tr').find('input.buying_price').val(total);
                totalAmountPrice();
            });

            function totalAmountPrice() {
                var sum = 0;
                $('.buying_price').each(function() {
                    var value = $(this).val();
                    if (!isNaN(value) && value.length != 0) {
                        sum += parseFloat(value);
                    }
                });
                $('#estimated_amount').val(sum);
            }

        })
    </script>
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
        $(function() {
            $(document).on('change', '.check', function() {
                // var supplier_id = $(this).val();
                $.ajax({
                    url: "{{ route('get-sex') }}",
                    type: 'GET',
                    // data: {
                    //     supplier_id: supplier_id
                    // },
                    success: function(data) {
                        var html = '<option value="">Select Sex</option>';
                        $.each(data, function(key, v) {
                            html += '<option value="' + v.id +
                                '">' + v.name + '</option>'
                        });
                        $('.Sex').html(html);
                    }
                })
            })
        })
    </script>
@endsection
