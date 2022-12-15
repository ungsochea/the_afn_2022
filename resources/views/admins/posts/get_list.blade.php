<div class="table-responsive">
    <table class="table table-hover mb-0">
      <thead>
        <tr>
          <th class="pt-0" width="10%">Photo</th>
          <th class="pt-0">Title</th>
          <th class="pt-0">Category</th>
          <th class="pt-0">Tag</th>
          <th class="pt-0" width="10%">Published</th>
          <th class="pt-0" width="10%">User</th>
          <th class="pt-0" width="5%">Status</th>
          <th class="pt-0" width="5%">Action</th>
        </tr>
      </thead>
      <tbody id="result">
          @forelse ($posts as $post)
          <tr id="list{{ $post->id }}" class="align-middle">
            <td>
                <img src="{{ $post->thumbnail_xs }}" alt="photo">
            </td>
            <td>{{ $post->title }}</td>
            <td>
                {{-- @foreach ($post->categories as $category)
                    <span class="badge bg-primary">{{ $category->title}}</span>
                @endforeach --}}
            </td>
            <td>
                {{-- @foreach ($post->tags as $tag)
                    <span class="badge bg-primary">{{ $tag->title}}</span>
                @endforeach --}}
            </td>
            <td>{{ $post->published }}</td>
            <td>{{ $post->post_by }}</td>
            <td><div class="badge bg-{{ $post->status_color }}">{{ $post->status }}</td>
            <td>
                <a href="{{ route('post.show',$post->id) }}" class="badge bg-success p-2" target="_blank"><i class="fas fa-eye fa-xs"></i></a>
                <a href="{{ route('admin.post.edit',$post->id) }}" class="badge bg-warning p-2"><i class="fas fa-edit fa-xs"></i></a>
                <a href="javascript:;" class="badge bg-danger p-2" onclick="destroy({{ $post->id }})"><i class="fas fa-trash fa-xs"></i></a>
            </td>
          </tr>
          @empty
            <tr id="no-data">
                <td colspan="8">
                    <div class="text-center text-danger">
                        No data
                    </div>
                </td>
            </tr>
          @endforelse

      </tbody>
    </table>
</div>
<div class="d-flex justify-content-center mt-3 pagina">
    {{ $posts->appends(Request::all())->links('admins.includes.paginate') }}
</div>
