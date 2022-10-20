<div class="table-responsive">
    <table class="table table-hover mb-0">
      <thead>
        <tr>
          <th class="pt-0">Title</th>
          <th class="pt-0">Slug</th>
          <th class="pt-0" width="10%">Status</th>
          <th class="pt-0" width="10%">Action</th>
        </tr>
      </thead>
      <tbody id="result">
          @forelse ($tags as $tag)
          <tr id="list{{ $tag->id }}">
            <td>{{ $tag->title }}</td>
            <td>{{ $tag->slug }}</td>
            <td><div class="badge bg-{{ $tag->status_color }}">{{ $tag->status }}</td>
            <td>
                <a href="javascript:;" class="badge bg-warning p-2" onclick="edit({{ $tag->id }})"><i class="fas fa-edit fa-xs"></i></a>
                <a href="javascript:;" class="badge bg-danger p-2" onclick="destroy({{ $tag->id }})"><i class="fas fa-trash fa-xs"></i></a>
            </td>
          </tr>
          @empty
            <tr id="no-data">
                <td colspan="4">
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
    {{ $tags->appends(Request::all())->links('admins.includes.paginate') }}
</div>
