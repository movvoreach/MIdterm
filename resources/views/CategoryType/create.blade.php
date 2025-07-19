@extends('Layouts.master')

@section('content')
    @include('Comportments.header')
    @include('Comportments.sidebar')

    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Dashboard</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!--end::App Content Header-->

        <!--begin::App Content-->
        <div class="app-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <!-- Categories Card Start -->
                   
                            <div class="container-fluid">
                                <!--begin::Create Category Card-->
                                <div class="card card-primary card-outline mb-4">
                                    <!--begin::Header-->
                                    <div class="card-header d-flex align-items-center">
                                        <h3 class="card-title mb-0">Create Category</h3>
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Form-->
                                    <form action="{{ route('categories.store') }}" method="POST">
                                        @csrf
                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Category Name (ឈ្មោះប្រភេទ)</label>
                                                <input type="text" name="name" id="name" class="form-control"
                                                    required placeholder="Enter category name">
                                            </div>
                                        </div>
                                        <!--end::Body-->

                                        <!--begin::Footer-->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fas fa-save me-1"></i> Save Category
                                            </button>
                                        </div>
                                        <!--end::Footer-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Create Category Card-->

                            </div>
                            <!--end::Row-->
                    </div>
                    <!-- /.Categories Card -->
                </div>
            </div>
        </div>
        </div>
        <!--end::App Content-->
    </main>
@endsection
