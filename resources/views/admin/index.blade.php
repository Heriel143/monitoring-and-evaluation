@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Current Project: Nafaka</h4>

                        <div class="page-title-right">
                            <ol class="m-0 breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="mb-2 text-truncate font-size-14">Project Progress</p>
                                    <h4 class="mb-2">{{ number_format($projectprog, 2) }}%</h4>
                                    {{-- <p class="mb-0 text-muted"><span class="text-success fw-bold font-size-12 me-2"><i
                                                class="align-middle ri-arrow-right-up-line me-1"></i>9.23%</span>from
                                        previous period</p> --}}
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="fas fa-chart-line font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                {{-- <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="mb-2 text-truncate font-size-14">New Orders</p>
                                    <h4 class="mb-2">938</h4>
                                    <p class="mb-0 text-muted"><span class="text-danger fw-bold font-size-12 me-2"><i
                                                class="align-middle ri-arrow-right-down-line me-1"></i>1.09%</span>from
                                        previous period</p>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="mdi mdi-currency-usd font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="mb-2 text-truncate font-size-14">New Users</p>
                                    <h4 class="mb-2">8246</h4>
                                    <p class="mb-0 text-muted"><span class="text-success fw-bold font-size-12 me-2"><i
                                                class="align-middle ri-arrow-right-up-line me-1"></i>16.2%</span>from
                                        previous period</p>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="ri-user-3-line font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="mb-2 text-truncate font-size-14">Unique Visitors</p>
                                    <h4 class="mb-2">29670</h4>
                                    <p class="mb-0 text-muted"><span class="text-success fw-bold font-size-12 me-2"><i
                                                class="align-middle ri-arrow-right-up-line me-1"></i>11.7%</span>from
                                        previous period</p>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="mdi mdi-currency-btc font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col --> --}}
            </div><!-- end row -->

            {{--  --}}
            <!-- end row -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
                                {{-- <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                </div> --}}
                            </div>

                            <h4 class="mb-4 card-title">Project Indicators</h4>

                            <div class="table-responsive">
                                <table class="table mb-0 align-middle table-centered table-hover table-wrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th colspan="2">Name</th>
                                            {{-- <th>Position</th> --}}
                                            <th class="col-sm-1">Target</th>
                                            <th class="col-sm-1">Actual</th>
                                            <th class="col-sm-1">Percent</th>
                                            {{-- <th style="width: 120px;">Salary</th> --}}
                                        </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                        @foreach ($indicators as $indicator)
                                            <tr>
                                                <td colspan="2">
                                                    <p class="mb-0 ">
                                                    <h6 class="inline-block"> {{ $indicator->indicator_number }}</h6>
                                                    {{ $indicator->title }}</p>
                                                </td>
                                                {{-- <td>Web Developer</td> --}}

                                                <td>
                                                    {{ $indicator->target }}
                                                </td>
                                                <td>
                                                    {{ $indicator->actual }}
                                                </td>
                                                <td>
                                                    <div class="font-size-13"><i
                                                            class="align-middle ri-checkbox-blank-circle-fill font-size-10 text-success me-2"></i>{{ $indicator->target == 0 ? '0' : number_format(($indicator->actual / $indicator->target) * 100, 2) }}%
                                                    </div>
                                                </td>
                                                {{-- <td>$42,450</td> --}}
                                            </tr>
                                        @endforeach

                                        <!-- end -->
                                        {{--  --}}
                                        <!-- end -->
                                    </tbody><!-- end tbody -->
                                </table> <!-- end table -->
                            </div>
                        </div><!-- end card -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>

    </div>
@endsection
