<div class="flex-grow-1 p-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Post Directory</h2>
        <!-- Links directly to your dynamic post creation route -->
        <a href="{{ route('post') }}" class="btn btn-success">Add New Post</a>
    </div>

    <table class="table table-striped table-hover align-middle bg-white shadow-sm rounded">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category Name</th>
                <th>Author Name</th>
                <th>Slug</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th class="text-end">Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <!-- 1. FIXED: Changed from plural $posts to singular $post -->
                    <td>{{ $post->id }}</td>
                    
                    <!-- 2. FIXED: Pointed post image field to the post storage instead of variable $author -->
                    <td>
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="rounded" style="width: 50px; height: 40px; object-fit: cover;">
                        @else
                            <span class="text-muted small">No Image</span>
                        @endif
                    </td>
                    
                    <td><strong>{{ $post->title }}</strong></td>
                    <td>{{ Str::limit($post->description, 40) }}</td>
                    
                    <td><span class="badge bg-secondary">{{ $post->category->name ?? 'Uncategorized' }}</span></td>
                    <td>{{ $post->author->author ?? 'Unknown Author' }}</td>
                    
                    <td><code class="small text-muted">{{ $post->slug }}</code></td>
                    <td>{{ $post->created_at->format('Y-m-d') }}</td>
                    <td>{{ $post->updated_at->format('Y-m-d') }}</td>
                    
                   <td class="text-end">
                         <a href="{{ route('posts.edit', $post->id) }}" wire:navigate class="btn btn-outline-primary btn-sm" style="padding: 2px 8px; font-size: 0.75rem;">
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                    </td>

                      <td>
                        <a href="#" class="btn btn-outline-primary btn-sm" style="padding: 2px 8px; font-size: 0.75rem;" wire:click="deletePost({{$post->id}})" wire:confirm="Are you sure you want to delete this Post?">
                            <i class="fa fa-pencil"></i> delete
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <!-- 4. FIXED: Adjusted column span count to perfectly match the 10 defined headers -->
                    <td colspan="10" class="text-center py-4 text-muted">No posts found in the database.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
