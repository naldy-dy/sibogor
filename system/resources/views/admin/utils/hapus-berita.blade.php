<form action="{{$url}}" method="post" onclick="return confirm('yakin ingin menghapus data ini?')">
	@csrf
	@method("delete")

<button  class="btn btn-danger">
	<span class="mr-2"><i class="fa fa-trash"></i></span>Hapus
</button>
</form>