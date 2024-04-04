@extends('layouts.backendLayouts')
@section('containts')

<div class="container-fluid">

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mt-5">
            <div class="col-12 text-end mb-3">
                <button type="submit" class="main-btn primary-btn square-btn btn-hover">
                    <i class="lni lni-heart"></i>
                    Store Product
                </button>
            </div>
            <div class="col-lg-8">
                <div class="card-style">
                    <h5 class="mb-25">Add Product</h5>
                    <div class="input-style-2">
                        <input name="title" type="text" placeholder="Product Title">
                        <span class="icon"> <i class="lni lni-apple-brand"></i> </span>
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-style-2">
                                <input name="price" type="text" placeholder="Product Price">
                                <span class="icon"> <i class="lni lni-apple-brand"></i> </span>
                                @error('price')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-style-2">
                                <input name="sell_price" type="text" placeholder="Product Discount Price">
                                <span class="icon"> <i class="lni lni-apple-brand"></i> </span>
                                @error('sell_price')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="input-style-2">
                                <input name="sku" type="text" placeholder="Sku">
                                <span class="icon"> <i class="lni lni-apple-brand"></i> </span>
                                @error('sku')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="select-style-1">
                                <div class="select-position">
                                    <select name="stock">
                                        <option selected value="{{ 1 }}">In Stock</option>
                                        <option value="{{ 0 }}">Out of Stock</option>
                                    </select>
                                </div>
                                @error('stock')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-style-2">
                                <input name="brand" type="text" placeholder="Brand Name">
                                <span class="icon"> <i class="lni lni-apple-brand"></i> </span>
                                @error('brand')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="input-style-2">
                            <textarea name="short_detail" placeholder="Short Detail"></textarea>

                            @error('short_detail')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="input-style-2">
                            <textarea name="long_detail" id="longDetail" placeholder="Long Detail"></textarea>


                            @error('long_detail')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-lg-flex">
                        <div class="form-check form-switch toggle-switch me-3">
                            <input class="form-check-input" name="status" type="checkbox" id="status" checked
                                value="{{ 1 }}">
                            <label class="form-check-label" for="status">Status</label>
                        </div>
                        <div class="form-check form-switch toggle-switch">
                            <input class="form-check-input" type="checkbox" name="featured" id="featured"
                                value="{{ 1 }}">
                            <label class="form-check-label" for="featured">Featured Products</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card-style">
                    <div class="input-style-1">
                        <label>Featured Image</label>
                        <input name="featured_img" type="file">
                    </div>
                    <div class="input-style-1">
                        <label>Gallery Images</label>
                        <input type="file" multiple name="galleries[]">
                        @error('galleries.*')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-style-1">
                        <label>Category</label>

                        <select style="width: 100%" multiple name="categories[]" class="categoryItems">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ str($category->category)->headline() }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@push('customCss')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .select2 span {
        display: block !important;
    }
</style>

@endpush
@push('customJs')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#longDetail' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    $(document).ready(function() {
    $('.categoryItems').select2();
    });
</script>
@endpush


@endsection