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

                        <!--begin::Create Expense Card-->
                        <div class="card card-primary card-outline mb-4">
                            <!--begin::Header-->
                            <div class="card-header d-flex align-items-center">
                                <h3 class="card-title mb-0">Create Expense (បញ្ចូលចំណាយ)</h3>
                            </div>
                            <!--end::Header-->

                            <!--begin::Form-->
                            <form action="{{ route('expends.update', $expend->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!-- Category Select -->
                                    <div class="mb-3">
                                        <label for="category_id" class="form-label">Category (ប្រភេទចំណាយ)</label>
                                        <select name="category_id" id="category_id" class="form-select" required>
                                            <option value="">-- Select Category --</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $expend->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Expense Name -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Expense Name (ឈ្មោះចំណាយ)</label>
                                        <input type="text" name="name" id="name" class="form-control" required
                                            placeholder="Enter expense name" value="{{ $expend->name }}">
                                    </div>

                                    <!-- Amount -->
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Amount (ចំនួនទឹកប្រាក់)</label>
                                        <input type="number" name="amount" id="amount" class="form-control" required
                                            step="0.01" placeholder="Enter amount" value="{{ $expend->amount }}">
                                    </div>

                                    <!-- Status -->
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" id="status" class="form-select">
                                            <option value="1" {{ $expend->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $expend->status == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <!--end::Body-->

                                <!--begin::Footer-->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save me-1"></i> Save Expense
                                    </button>
                                </div>
                                <!--end::Footer-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Create Expense Card-->

                    </div>
                    <!-- /.Categories Card -->
                </div>
            </div>
        </div>
        </div>
        <!--end::App Content-->
    </main>
@endsection
