<div> <!-- Master single root wrapper -->
    <div class="flex-grow-1 p-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>All Categories</h2>
            <a href="{{ route('category') }}" class="btn btn-success">Add New Category</a>
        </div>

        <table class="table table-striped table-hover align-middle bg-white shadow-sm rounded">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th class="text-end">Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td class="text-end">
                            <a href="{{ route('categories.edit', $category->id) }}"  class="btn btn-outline-primary btn-sm" style="padding: 2px 8px; font-size: 0.75rem;" wire:navigate>
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                        </td>
                          <td>
                        <a href="#" class="btn btn-outline-primary btn-sm" style="padding: 2px 8px; font-size: 0.75rem;" wire:click="deleteCategory({{ $category->id }})" wire:confirm="Are you sure you want to delete this category?"
                            <i class="fa fa-pencil"></i> delete
                        </a>
                    </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4 text-muted">No categories found in the database.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


