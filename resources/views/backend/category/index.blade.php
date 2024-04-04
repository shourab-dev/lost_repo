@extends('backend.dashboard');
@section('containts')
<section>
    <div class="container mt-5">
        <div class="row">
            {{-- FORM --}}

            @if (Route::is('category'))
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-header bg-primary">
                        <h4 class="text-light">Add Category</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('category.insert') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <label for="category">category</label>
                            <input name="category" placeholder="category" id="category" type="text"
                                class="form-control">
                            <select name="category_id" class="form-control my-3" id="categoryId">
                                <option disabled selected>Select and Parent Category</option>
                                @foreach ($categorys as $category)
                                <option value="{{ $category->id }}">{{ $category->category }}</option>

                                @endforeach
                            </select>
                            <label>Category Icon</label>
                            <input type="file" name="icon" class="form-control">
                            @error('icon')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <button type="submit" class="btn btn-primary w-100 mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            @else
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-header bg-primary">
                        <h4 class="text-light">Edit Category</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('category.update',$findCategory->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <label for="category">category</label>
                            <input value="{{ $findCategory->category }}" name="category" placeholder="category"
                                id="category" type="text" class="form-control">

                            <select name="category_id" id="categoryId" class="form-control my-3">
                                
                                @foreach ($categorys as $category)
                                @if ($findCategory->id != $category->id)
                                <option {{ $findCategory->category_id == $category->id ? "selected" : "" }} value="{{ $category->id }}">{{ $category->category }}</option>
                                @endif
                                
                                @endforeach
                            </select>
                            <label>Category Icon</label>
                            <input type="file" name="icon" class="form-control">
                            <input type="hidden" name="old" value="{{ $findCategory->icon }}">

                            <button type="submit" class="btn btn-primary w-100 mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif

            {{-- TABLE --}}
            <div class="col-lg-8 ">
                <table class="table table-striped shadow">
                    <tr>
                        <td align="center">Sn</td>
                        <td>Category</td>
                        <td>Category-slug</td>
                        <td>Action</td>
                    </tr>


                    @forelse ($parentCategories as $key => $category)
                    <tr>
                        <td align="center">{{ $categorys->firstItem() + $key }}</td>
                        <td>
                            <img width="80px" src="{{ asset('storage/'.$category->icon) }}" alt="{{ $category->category }}">
                             {{ $category->category }}</td>
                        <td>{{ $category->category_slug }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('category.edit',$category->id) }}"
                                    class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('category.delete',$category->id) }}"
                                    class="btn btn-danger btn-sm">Delete</a>
                            </div>
                        </td>
                    </tr>
                    @if ($category->subcategories)

                    @foreach ($category->subcategories as $subcategory)
                    <tr>
                        <td align="center">{{ str('-')->repeat($loop->depth) }}</td>
                        <td><img width="80px" src="{{ asset('storage/'.$subcategory->icon) }}" alt="{{ $subcategory->category }}"> {{ $subcategory->category }}</td>
                        <td>{{ $subcategory->category_slug }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('category.edit',$subcategory->id) }}"
                                    class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('category.delete',$subcategory->id) }}"
                                    class="btn btn-danger btn-sm">Delete</a>
                            </div>
                        </td>
                    </tr>

                    @include('layouts.components.CategoryComponent')

                    @endforeach

                    @endif

                    @empty

                    <tr>
                        <td>No Data Found!</td>
                    </tr>

                    @endforelse
                </table>

                {{ $categorys->links() }}
            </div>
        </div>
    </div>
</section>
@endsection