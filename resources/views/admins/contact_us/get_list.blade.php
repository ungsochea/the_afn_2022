<div class="table-responsive">
    <table class="table table-hover mb-0">
      <thead>
        <tr>
          <th class="pt-0">Name</th>
          <th class="pt-0">Email</th>
          <th class="pt-0">Phone</th>
          <th class="pt-0">Description</th>
          <th class="pt-0">IP</th>
          <th class="pt-0">City</th>
          <th class="pt-0">Country</th>
          <th class="pt-0 text-center" width="10%">Action</th>
        </tr>
      </thead>
      <tbody id="result">
          @forelse ($contacts as $contact)
          <tr id="list{{ $contact->id }}">
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->phone }}</td>
            <td>{{ $contact->description }}</td>
            <td>{{ $contact->ip ?? '' }}</td>
            <td>{{ $contact->city ?? '' }}</td>
            <td>
                @if ($contact->country)
                {{ $contact->country ?? '' }}
                <i class="flag-icon flag-icon-{{ strtolower($contact->country) }} mt-1" title="us"></i>
                @endif
            </td>
            <td class="text-center">
                {{-- <a href="javascript:;" class="badge bg-warning p-2" onclick="edit({{ $contact->id }})"><i class="fas fa-edit fa-xs"></i></a> --}}
                <a href="javascript:;" class="badge bg-danger p-2" onclick="destroy({{ $contact->id }})"><i class="fas fa-trash fa-xs"></i></a>
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
    {{ $contacts->appends(Request::all())->links('admins.includes.paginate') }}
</div>
