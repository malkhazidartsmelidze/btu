<div class="card">
    <div class="card-header">Categories</div>

    <div class="card-body">
        <table class="table" id="category-table">
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
                        <button class="btn btn-sm btn-danger category-delete" onclick="deleteCategory(event)"
                            data-id="{{ $category->id }}">Delete</button>
                        <a href="{{ route('admin.category.edit', ['category' => $category->id]) }}"
                            class="btn btn-sm btn-success">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

<script>
    function refreshCategoryTable() {
        $("#category-table").load(location.href + " #category-table > *",
            "");
    }

    function deleteCategory(e) {
        e.preventDefault();
        var id = $(e.target).data('id')

        if (!confirm('Are you sure?')) return;

        $.ajax({
            url: '/admin/category/' + id,
            type: 'DELETE',
            success: function(data) {
                if (data.success) {
                    refreshCategoryTable()
                }
            }
        });
    }

</script>
