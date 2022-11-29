<div class="table-responsive">
    <table class="table table-hover mb-0">
      <thead>
        <tr>
          <th class="pt-0">Category Title</th>
          <th class="pt-0">Slug</th>
          <th class="pt-0" width="10%">Status</th>
          <th class="pt-0" width="10%">Action</th>
        </tr>
      </thead>
      <tbody id="result">
          @forelse ($categories as $category)
          <tr id="list{{ $category->id }}">
            <td>{{ $category->title }}</td>
            <td>{{ $category->slug }}</td>
            <td><div class="badge bg-{{ $category->status_color }}">{{ $category->status }}</td>
            <td>
                <a href="javascript:;" class="badge bg-warning p-2" onclick="edit({{ $category->id }})"><i class="fas fa-edit fa-xs"></i></a>
                <a href="javascript:;" class="badge bg-danger p-2" onclick="destroy({{ $category->id }})"><i class="fas fa-trash fa-xs"></i></a>
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
    {{ $categories->appends(Request::all())->links('admins.includes.paginate') }}
</div>
