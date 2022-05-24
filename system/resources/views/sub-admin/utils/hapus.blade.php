<form action="{{$url}}" method="post" class="btn-group"onclick="return confirm('yakin ingin menghapus data ini?')">
	@csrf
	@method("delete")
	<button class="btn btn-primary light btn-sm"><i class="fa fa-trash"></i></button>
</form>