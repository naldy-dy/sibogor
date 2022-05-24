@extends('admin.template.base')
@section('content')

<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header d-sm-flex d-block pb-0 border-0">
			<div class="mr-auto pr-3 mb-sm-0 mb-3">
				<h4 class="text-black fs-20">Gedung Anda</h4>
			</div>
			<a href="{{url('admin')}}/gedung/create" class="btn rounded btn-primary mb-3"> Tambah </a>
		</div>
	</div>

	@foreach($list_gedung->sortByDesc('id') as $g)
	<div class="card shadow">
		<div class="card-body pt-3 pb-3">
			<div class="media border-bottom mb-3 pb-3 d-lg-flex d-block menu-list">
				<a href="{{url('admin/gedung/detail',$g->id)}}">
					<div class="row">
						<div class="col-md-4">
							<img class="rounded mr-3 mb-md-0 mb-3" src="{{url("public/$g->foto")}}" alt=" " width="100%"></a>
						</div>
						<div class="col-md-8">
							<div class="media-body col-lg-12 pl-0">
								<h6 class="fs-18 font-w600"><a href="{{url('admin/gedung/detail',$g->id)}}" class="text-black">{{ucwords($g->nama)}}</a></h6>
								<p class="fs-14">{{ Str::limit($g->deskripsi, 200) }}</p>
								<p class="fs-14 text-black font-w500">Harga : Rp. {{number_format($g->harga)}}<br>
									Kategori : {{ucwords($g->kategori)}}
								</p>
								<p class="fs-14 text-black font-w500">Alamat : {{ucwords($g->alamat)}}</p>
								<a href="{{url('admin/gedung/detail',$g->id)}}" class="btn btn-info btn-sm">Detail Gedung</a>
							</div>
						</div>	
					</div>
					
					<!-- Button Aksi -->
					<button type="button" class="btn rounded btn-light shadow btn-block" data-toggle="dropdown" aria-expanded="true">Aksi
						<svg class="ml-2" width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M1 0.999999L7 7L13 1" stroke="#0B2A97" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</button>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="{{url('admin/gedung/edit',$g->id)}}">Edit</a>
						@include('admin.utils.delete', ['url' =>url('admin/gedung/delete', $g->id)])
					</div>
					<!-- end Button Aksi -->
				</div>
			</div>
		</div>
		@endforeach
	</div>

	@endsection