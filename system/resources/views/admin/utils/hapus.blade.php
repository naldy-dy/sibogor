<form action="{{$url}}" method="post" onclick="return confirm('yakin ingin menghapus data ini?')">
	@csrf
	@method("delete")
	<button class="btn btn-danger btn-sm" style="border-radius:2px"><i class="fa fa-trash"></i></button>
</form>