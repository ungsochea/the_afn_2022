<tr id="list{{ $tag->id }}" class="element-cus">
    <td>{{ $tag->title }}</td>
    <td>{{ $tag->slug }}</td>
    <td>
        <span class="badge bg-{{ $tag->status_color }}"> {{ $tag->status }}</span>
    </td>
    <td>
        <span class="badge bg-warning p-2" style="cursor: pointer" onclick="edit({{ $tag->id }})"><i class="fas fa-edit fa-xs"></i></span>
        <span class="badge bg-danger p-2" style="cursor: pointer" onclick="destroy({{ $tag->id }})"><i class="fas fa-trash fa-xs"></i></span>
    </td>
</tr>
