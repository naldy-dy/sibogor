@extends('admin.template.base')
@section('content')

<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header d-sm-flex d-block pb-0 border-0">
			<div class="mr-auto pr-3 mb-sm-0 mb-3">
				<h4 class="text-black fs-20">Galeri Gedung</h4>
			</div>
		</div>
			
		<div class="card-body">
			<div class="row">
				@foreach($list_galeri->sortByDesc('id') as $galeri)
				<div class="col-md-4">
				  <div class="card-body shadow m-1">
				    <img src="{{url('public')}}/{{$galeri->foto}}" width="100%">
				    @include('admin.utils.hapus', ['url' =>url('admin/galeri', $galeri->id)])
				  </div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection

