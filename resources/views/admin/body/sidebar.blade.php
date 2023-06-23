<div class="vertical-menu">

    <div data-simplebar class="h-100">

        @php
            $id = Auth::user()->id;
            $adminData = App\Models\User::find($id);
        @endphp
        <!-- User details -->
        {{-- <div class="mt-3 text-center user-profile">
            <div class="flex justify-center">
                <img src="{{ !empty($adminData->profile_image) ? url('upload/admin_images/' . $adminData->profile_image) : url('upload/no_image.jpg') }}"
                    alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="mb-1 font-size-16">{{ $adminData->name }}</h4>
                <span class="text-muted"><i class="align-middle ri-record-circle-line font-size-14 text-success"></i>
                    Online</span>
            </div>
        </div> --}}

        <!--- Sidemenu -->
        <div id="sidebar-menu" class="">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled " id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        {{-- <span class="badge rounded-pill bg-success float-end">3</span> --}}
                        <span>Dashboard</span>
                    </a>
                </li>



                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect ">
                        <i class="fas fa-project-diagram"></i>
                        <span>Projects</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('project.new') }}">New Projects</a></li>
                        <li><a href="{{ route('project.all') }}">All Projects</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-drafting-compass"></i>
                        <span>Indicators</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('indicator.add') }}">Add Indicator</a></li>
                        {{-- <li><a href="{{ route('indicator.add.sub') }}">Add Indicator Disaggretion</a></li> --}}
                    </ul>
                </li>
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Target</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('target.add') }}">Add Target</a></li>
                    </ul>
                </li> --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-database"></i>
                        <span>Data Entry</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('data.add') }}">Add Data</a></li>
                        {{-- <li><a href="{{ route('indicator.add.sub') }}">Add Sub Indicator</a></li> --}}
                    </ul>
                </li>
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Manage Customers</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.customers') }}">All Customers</a></li>
                        <li><a href="{{ route('credit.customers') }}">Credit Customers</a></li>
                        <li><a href="{{ route('customers.purchases') }}">Customers Purchases</a></li>
                    </ul>
                </li> --}}
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Manage Units</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.units') }}">All Units</a></li>
                    </ul>
                </li> --}}
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Manage Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.categories') }}">All Categories</a></li>
                    </ul>
                </li> --}}
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Manage Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.products') }}">All Products</a></li>
                    </ul>
                </li> --}}
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Manage Purchase</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.purchases') }}">All Purchases</a></li>
                        @if (Auth::user()->role_id == 3)
                            <li><a href="{{ route('pending.purchases') }}">Approval Purchases</a></li>
                        @endif
                        <li><a href="{{ route('purchase.report') }}">Daily Purchase Report</a></li>
                    </ul>

                </li> --}}
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Manage Invoices</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.invoices') }}">All Invoices</a></li>
                        @if (Auth::user()->role_id == 2)
                            <li><a href="{{ route('pending.invoices') }}">Approval Invoice</a></li>
                        @endif
                        <li><a href="{{ route('daily.invoice.report') }}">Daily Invoice Report</a></li>
                    </ul>

                </li> --}}








            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
