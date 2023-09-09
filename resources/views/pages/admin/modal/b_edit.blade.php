<div class="flex inline-block">
    <button onclick="adminEdit('{{ route('user-admin.show', $data->id) }}')" type="button" class="btn btn-sm btn-info" >Edit</button>
    <form action="{{ route('user-admin.delete', $data->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-sm btn-danger" >Delete</button>
    </form>
</div>
