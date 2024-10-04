@extends('dashboard.component.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @if (session()->has('success'))
            <div class="alert d-flex align-items-center alert-warning alert-dismissible fade show" role="alert">
                <div class="d-flex align-items-center w-100 text-white gap-2">
                    <span class="material-symbols-outlined">
                    check_circle
                    </span>
                    <span>{{ session('success') }}</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span class="material-symbols-outlined">
                        close
                        </span>
                </button>
            </div>
            @endif
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div style="width: 50%;">
                    <h4 class="mb-3">Customer List</h4>
                    <p class="mb-0">Dasbor pelanggan memungkinkan Anda dengan mudah mengumpulkan dan memvisualisasikan data pelanggan dari pengoptimalan
                        pengalaman pelanggan, memastikan retensi pelanggan.</p>
                </div>
                <div class="d-flex gap-3">
                    <a href="{{ route('customers.create') }}" class="btn btn-primary d-flex align-items-center gap-2"><span class="material-symbols-outlined">
                        add
                        </span>Add Customer</a>
                    <a href="{{ route('customers.index') }}" class="btn btn-danger d-flex align-items-center gap-2"><span class="material-symbols-outlined">
                        delete
                        </span>Clear Search</a>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <form action="{{ route('customers.index') }}" method="get">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <div class="form-group row">
                        <label for="row" class="col-sm-3 align-self-center">Row:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="row">
                                <option value="10" @if(request('row') == '10')selected="selected"@endif>10</option>
                                <option value="25" @if(request('row') == '25')selected="selected"@endif>25</option>
                                <option value="50" @if(request('row') == '50')selected="selected"@endif>50</option>
                                <option value="100" @if(request('row') == '100')selected="selected"@endif>100</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center" for="search">Search:</label>
                        <div class="col-sm-8">
                            <div class="d-flex gap-1">
                                <input type="text" id="search" class="form-control" name="search" placeholder="Search customer" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text bg-primary"><span class="material-symbols-outlined text-white">
                                        search
                                        </span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-12">
            <div class="table-responsive rounded mb-3">
                <table class="table mb-0">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>No.</th>
                            <th>Photo</th>
                            <th>@sortablelink('name')</th>
                            <th>@sortablelink('email')</th>
                            <th>@sortablelink('phone')</th>
                            <th>@sortablelink('shopname')</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @foreach ($customers as $customer)
                        <tr>
                            <td>{{ (($customers->currentPage() * 10) - 10) + $loop->iteration  }}</td>
                            <td>
                                <img class="w-30 rounded" src="{{ $customer->photo ? asset('storage/customers/'.$customer->photo) : asset('assets/images/user/1.png') }}">
                            </td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->shopname }}</td>
                            <td>
                                <div class="d-flex align-items-center list-action gap-2">
                                    <a class="badge bg-info mr-2 fs-6 p-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                        href="{{ route('customers.show', $customer->id) }}"><span class="material-symbols-outlined fs-6">
                                            visibility
                                            </span>
                                    </a>
                                    <a class="badge bg-success mr-2 p-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                        href="{{ route('customers.edit', $customer->id) }}""><span class="material-symbols-outlined fs-6">
                                            edit
                                            </span>
                                    </a>
                                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="badge bg-danger mr-2 border-0 p-2" onclick="return confirm('Are you sure you want to delete this record?')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><span class="material-symbols-outlined fs-6">
                                            delete
                                            </span></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $customers->links() }}
        </div>
    </div>
    <!-- Page end  -->
</div>

@endsection
