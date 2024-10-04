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
                <div style="width: 50%">
                    <h4 class="mb-3">Supplier List</h4>
                    <p class="mb-0">Dasbor pemasok memungkinkan Anda dengan mudah mengumpulkan dan memvisualisasikan data pemasok dari pengoptimalan
                        pengalaman pemasok, memastikan retensi pemasok.</p>
                </div>
                <div class="d-flex gap-3">
                    <a href="{{ route('suppliers.create') }}" class="btn btn-primary add-list d-flex align-items-center gap-2"><span class="material-symbols-outlined fs-6">
                        add
                        </span>Add Supplier</a>
                    <a href="{{ route('suppliers.index') }}" class="btn btn-danger add-list d-flex align-items-center gap-2"><span class="material-symbols-outlined fs-6">
                        delete
                        </span> Clear Search</a>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <form action="{{ route('suppliers.index') }}" method="get">
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

                    <div class="d-flex  flex-column">
                        <label class="" for="search">Search:</label>
                        <div class="col-sm-8 w-100">
                            <div class="input-group d-flex gap-2">
                                <input type="text" id="search" class="form-control" name="search" placeholder="Search supplier" value="{{ request('search') }}">
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
                <table class="table table-striped table-hover mb-0">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>No.</th>
                            <th>Photo</th>
                            <th>@sortablelink('name')</th>
                            <th>@sortablelink('email')</th>
                            <th>@sortablelink('phone')</th>
                            <th>@sortablelink('shopname')</th>
                            <th>@sortablelink('type')</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{ (($suppliers->currentPage() * 10) - 10) + $loop->iteration  }}</td>
                            <td class="w-fit">
                                <img class="w-40 rounded" src="{{ $supplier->photo ? asset('storage/suppliers/'.$supplier->photo) : asset('assets/images/user/1.png') }}">
                            </td>
                            <td class="text-wrap" style="max-width: 150px;">{{ $supplier->name }}</td>
                            <td>{{ $supplier->email }}</td>
                            <td>{{ $supplier->phone }}</td>
                            <td class="text-wrap" style="max-width: 150px;">{{ $supplier->shopname }}</td>
                            <td>{{ $supplier->type }}</td>
                            <td>
                                <div class="d-flex gap-1 align-items-center list-action">
                                    <a class="badge bg-info mr-2 p-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                        href="{{ route('suppliers.show', $supplier->id) }}"><span class="material-symbols-outlined fs-6">
                                            visibility
                                            </span>
                                    </a>
                                    <a class="badge bg-success mr-2 p-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                        href="{{ route('suppliers.edit', $supplier->id) }}""><span class="material-symbols-outlined fs-6">
                                            edit
                                            </span>
                                    </a>
                                    <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="badge bg-warning border-0 p-1" onclick="return confirm('Are you sure you want to delete this record?')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><span class="material-symbols-outlined fs-6">
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
            {{ $suppliers->links() }}
        </div>
    </div>
    <!-- Page end  -->
</div>

@endsection
