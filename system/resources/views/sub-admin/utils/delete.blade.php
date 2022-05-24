<form action="{{$url}}" method="post" class="btn-group" onclick="return confirm('yakin ingin menghapus data ini?')">
	@csrf
	@method("delete")
	<button class="dropdown-item">Delete</a> </button>
</form>