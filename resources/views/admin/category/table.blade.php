a<div class="card">
    <div class="card-header">Categories</div>

    <div class="card-body">
        <table class="table" id="categories-table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>

            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <button onclick="deleteCategory(event)"
                            data-deleteurl="{{ route('admin.category.destroy', ['category' => $category->id]) }}"
                            class="btn btn-sm btn-danger">Delete</button>

                        <a href="{{ route('admin.category.edit', ['category' => $category->id]) }}"
                            class="btn btn-sm btn-success">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

<script>
    function refreshCategories() {
        $('#categories-table').load(location.href + " #categories-table > *");
    }

    function deleteCategory(e) {
        const el = $(e.target);
        const url = el.data('deleteurl')

        $.ajax({
            url: url,
            type: 'DELETE',
            success: data => {
                if (data.success) {
                    refreshCategories()
                }
            }
        })
    }

</script>
