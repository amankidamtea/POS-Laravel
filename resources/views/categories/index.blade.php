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
                    <h4 class="mb-3">Category List</h4>
                    <p class="mb-0">Dasbor Kategori memungkinkan Anda dengan mudah mengumpulkan dan memvisualisasikan data Kategori dari pengoptimalan</p>
                </div>
                <div class="d-flex gap-3">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary add-list"><i class="fas fa-plus mr-3"></i>Create Category</a>
                    <a href="{{ route('categories.index') }}" class="btn btn-danger d-flex align-items-center"><span class="material-symbols-outlined fs-6">
                        delete
                        </span>Clear Search
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <form action="{{ route('categories.index') }}" method="get">
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
                            <div class="input-group">
                                <input type="text" id="search" class="form-control" name="search" placeholder="Search category" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text bg-primary  ms-2"><span class="material-symbols-outlined text-white">
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
                            <th>@sortablelink('name')</th>
                            <th>@sortablelink('slug')</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @forelse ($categories as $category)
                        <tr>
                            <td>{{ (($categories->currentPage() * 10) - 10) + $loop->iteration  }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <div class="d-flex gap-3 align-items-center list-action">
                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                        href="{{ route('categories.edit', $category->slug) }}""><span class="material-symbols-outlined">
                                            edit_square
                                            </span>
                                    </a>
                                    <form action="{{ route('categories.destroy', $category->slug) }}" method="POST" style="margin-bottom: 5px">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="badge bg-warning mr-2 border-0" onclick="return confirm('Are you sure you want to delete this record?')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><span class="material-symbols-outlined">
                                            delete
                                            </span></button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        @empty
                        <div class="alert alert-danger gap-2 d-flex align-items-center text-white" role="alert">
                            <span class="material-symbols-outlined">
                                warning
                                </span>
                            <div>
                                Data Not Found
                            </div>
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $categories->links() }}
        </div>
    </div>
    <!-- Page end  -->
</div>

@endsection
