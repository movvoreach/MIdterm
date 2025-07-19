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
                            <form action="{{ route('income.update', $income->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select name="category_id" id="category_id" class="form-select" required>
                                        <option value="">-- Select Category --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $income->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Income Name</label>
                                    <input type="text" name="name" class="form-control" required
                                        placeholder="Enter income name" value="{{ $income->name }}">
                                </div>

                                <div class="mb-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input type="number" name="amount" step="0.01" class="form-control" required value="{{ $income->amount }}">
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="1" {{ $income->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $income->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-success">Save Income</button>
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
