<tr id="list{{ $category->id }}" class="element-cus">
    <td>{{ $category->title }}</td>
    <td>{{ $category->slug }}</td>
    <td>
        <span class="badge bg-{{ $category->status_color }}"> {{ $category->status }}</span>
    </td>
    <td>
        <span class="badge bg-warning p-2" style="cursor: pointer" onclick="edit({{ $category->id }})"><i class="fas fa-edit fa-xs"></i></span>
        <span class="badge bg-danger p-2" style="cursor: pointer" onclick="destroy({{ $category->id }})"><i class="fas fa-trash fa-xs"></i></span>
    </td>
</tr>
