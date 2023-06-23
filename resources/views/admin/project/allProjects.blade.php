@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">All Projects</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Location</th>
                                        <th>Budget (in USD)</th>
                                        <th>Implementing Mechanism</th>
                                        <th class="whitespace-nowrap">Start date</th>
                                        <th class="whitespace-nowrap">End date</th>
                                        {{-- <th>Supplier</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>

                                    @foreach ($projects as $key => $project)
                                        <tr>
                                            <td class=""> {{ $key + 1 }} </td>
                                            <td> {{ $project->title }} </td>
                                            <td> {{ $project->description }} </td>
                                            <td> {{ $project->location }} </td>
                                            <td>{{ number_format($project->budget, 2) }} </td>
                                            <td> {{ $project->implementing_mechanism }} </td>
                                            <td class="whitespace-nowrap">
                                                {{ date('M d, Y', strtotime($project->start_date)) }} </td>
                                            <td class="whitespace-nowrap">
                                                {{ date('M d, Y', strtotime($project->end_date)) }} </td>
                                            {{-- <td> {{ $project->supplier->name }} </td> --}}


                                            <td>
                                                <a href="{{ route('project.edit', $project->id) }}" class="btn btn-info sm"
                                                    title="Edit Data"> <i class="fas fa-edit"></i>
                                                </a>

                                                <a href="{{ route('project.destroy', $project->id) }}"
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
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
@endsection
