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

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <!-- Categories Card Start -->
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center">
                                <h3 class="card-title mb-0">Expend List</h3>
                                <a href=" {{ route('expends.create') }}" class="btn btn-sm btn-success ms-auto">
                                    <i class="fas fa-plus-circle me-1"></i> Add Expend
                                </a>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-sm table-bordered mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 50px">ID</th>
                                            <th>Cat_Expend</th>
                                            <th>Amount</th>
                                            <th>Name</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($expends as $expend)
                                            <tr>
                                                <td>{{ $expend->id }}</td>
                                                <td>{{ $expend->category->name }}</td>
                                                <td>{{ $expend->amount }}</td>
                                                <td>{{ $expend->name }}</td>
                                                <td>{{ $expend->created_at->format('Y-m-d H:i') }}</td>
                                                <td>
                                                    <a href="{{ route('expends.edit', $expend->id) }}" class="btn btn-sm btn-warning">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('expends.destroy', $expend->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.Categories Card -->
                    </div>
                </div>
            </div>
        </div>
        <!--end::App Content-->
    </main>
@endsection
