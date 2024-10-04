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
            @if (session()->has('error'))
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
                    <h4 class="mb-3">Product List</h4>
                    <p class="mb-0">Dasbor produk memungkinkan Anda dengan mudah mengumpulkan dan memvisualisasikan data produk dari pengoptimalan pengalaman pengguna</p>
                </div>
                <div>
                <a href="{{ route('products.importView') }}" class="btn btn-success add-list">Import</a>
                <a href="{{ route('products.exportData') }}" class="btn btn-warning add-list">Export</a>
                <a href="{{ route('products.create') }}" class="btn btn-primary add-list">Add Product</a>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <form action="{{ route('products.index') }}" method="get">
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
                        <div class="input-group col-sm-8">
                            <input type="text" id="search" class="form-control" name="search" placeholder="Search product" value="{{ request('search') }}">
                            <div class="d-flex gap-1 input-group-append ms-2">
                                <button type="submit" class="input-group-text bg-primary"><span class="material-symbols-outlined  text-white">
                                    search
                                    </span></button>
                                <a href="{{ route('products.index') }}" class="input-group-text bg-danger"><span class="material-symbols-outlined text-white">
                                    close
                                    </span></a>
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
                            <th>@sortablelink('product_name', 'name')</th>
                            <th>@sortablelink('category.name', 'category')</th>
                            <th>@sortablelink('supplier.name', 'supplier')</th>
                            <th>@sortablelink('selling_price', 'price')</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @forelse ($products as $product)
                        <tr>
                            <td>{{ (($products->currentPage() * 10) - 10) + $loop->iteration  }}</td>
                            <td>
                                <img class="w-30 rounded" src="{{ $product->product_image ? asset('storage/products/'.$product->product_image) : asset('assets/images/product/default.webp') }}">
                            </td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->supplier->name }}</td>
                            <td>{{ $product->selling_price }}</td>
                            <td>
                                @if ($product->expire_date > Carbon\Carbon::now()->format('Y-m-d'))
                                    <span class="badge rounded-pill bg-success">Valid</span>
                                @else
                                    <span class="badge rounded-pill bg-danger">Invalid</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="margin-bottom: 5px">
                                    @method('delete')
                                    @csrf
                                    <div class="d-flex gap-2 align-items-center list-action">
                                        <a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                            href="{{ route('products.show', $product->id) }}"><span class="material-symbols-outlined fs-6">
                                                visibility
                                                </span>
                                        </a>
                                        <a class="btn btn-success " data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                            href="{{ route('products.edit', $product->id) }}""><span class="material-symbols-outlined fs-6">
                                                edit
                                                </span>
                                        </a>
                                            <button type="submit" class="btn btn-warning  border-none" onclick="return confirm('Are you sure you want to delete this record?')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><span class="material-symbols-outlined fs-6">
                                                delete
                                                </span></button>
                                    </div>
                                </form>
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
            {{ $products->links() }}
        </div>
    </div>
    <!-- Page end  -->
</div>

@endsection
