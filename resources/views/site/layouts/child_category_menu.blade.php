<li><a href="{{ $child_category->slug }}">{{ $child_category->name }}</a></li>
@if ($child_category->categories)
    <ul>
        @foreach ($child_category->categories as $childCategory)
            @include('admin.category.child_category', ['child_category_menu' => $childCategory])
        @endforeach
    </ul>
@endif