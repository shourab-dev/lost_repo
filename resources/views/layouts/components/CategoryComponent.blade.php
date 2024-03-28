@if ($subcategory->subcategories)

@foreach ($subcategory->subcategories as $subcategory)
<tr>
    <td align="center">{{ str('-')->repeat($loop->depth) }}</td>
    <td><img width="80px" src="{{ $subcategory->icon ? asset('storage/'.$subcategory->icon) : '' }}" alt="{{ $subcategory->category }}"> {{ $subcategory->category }}</td>
    <td>{{ $subcategory->category_slug }}</td>
    <td>
        <div class="btn-group">
            <a href="{{ route('category.edit',$subcategory->id) }}" class="btn btn-primary btn-sm">Edit</a>
            <a href="{{ route('category.delete',$subcategory->id) }}" class="btn btn-danger btn-sm">Delete</a>
        </div>
    </td>
</tr>
@include('layouts.components.CategoryComponent')
@endforeach

@endif