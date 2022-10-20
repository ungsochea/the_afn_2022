<form action="" id="dataForm">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ $category->title ?? '' }}">
        <label id="title-error" class="error text-danger title" for="title"></label>
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ $category->slug ?? '' }}">
        <label id="slug-error" class="error text-danger slug" for="slug"></label>
    </div>
    <div class="mb-3">
        <label for="is_activated" class="form-label">Status</label>
        <select id="is_activated" name="is_activated" data-width="100%">
            @foreach (Status() as $value => $key)
                <option value="{{ $value }}" {{ $category->is_activated == $value ? 'selected' : ' '}} >{{ $key }}</option>
            @endforeach
        </select>
        <label id="is_activated-error" class="error text-danger is_activated" for="is_activated"></label>
    </div>
</form>
<script>
    $("#title").keyup(function() {
        var slug = $(this).val();
        $.ajax({
            data: {slug:slug},
            url: "/admin/slug-generate",
            type: "get",
            dataType: 'json',
            success: function (data) {
                $("#slug").val(data);
            },
            error: function (data) {
               console.log(data);
            }
        });
    });
</script>
