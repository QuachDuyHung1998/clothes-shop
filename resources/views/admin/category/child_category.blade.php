<tr data-key="{{ $child_category->id }}">
    <td>
        @for ($i = 0; $i < $deep*3; $i++)
            &nbsp;
        @endfor
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check font-medium-2 mr-50 font-rotate"><polyline points="20 6 9 17 4 12"></polyline></svg>
        <span>{{ $child_category->name }}</span>
    </td>
    <td>{{ $parentCategoryName }}</td>
    <td>{{ $child_category->products->count() }}</td>
    <td>{{ $child_category->created_at->format('H:i:s - d/m/Y') }}</td>
    <td>
        <div class="custom-control custom-control-primary custom-switch">
            <input id="{{ $child_category->id }}" type="checkbox" {{ $child_category->status === 1 ? 'checked' : '' }} class="custom-control-input update-status-category">
            <label class="custom-control-label" for="{{ $child_category->id }}"></label>
        </div>
    </td>
    <td>
        <a href="javascript:void(0)">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye icon-hover hover-success font-medium-2" data-toggle="tooltip" title="" data-original-title="{{ __('View') }}"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
        </a>
        <a class="btn-edit-category" href="javascript:void(0)" data-id="{{ $child_category->id }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 icon-hover hover-success font-medium-2" data-toggle="tooltip" title="" data-original-title="{{ __('Edit') }}"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
        </a>
        <a href="{{ route('admin.category.delete', ['id' => $child_category->id]) }}" onclick="return confirm('Are you sure you want to delete this item?')">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon-hover hover-danger font-medium-2" data-toggle="tooltip" title="" data-original-title="{{ __('Delete') }}"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
        </a>
    </td>
</tr>
@if ($child_category->categories)
    @foreach ($child_category->categories as $childCategory)
        @include('admin.category.child_category', [
            'child_category' => $childCategory,
            'parentCategoryName' => $child_category->name,
            'deep' => $deep+1
        ])
    @endforeach
@endif