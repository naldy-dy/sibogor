@extends('admin.template.base')
@section('content')

<div class="container-fluid">
	<div class="card shadow">
		<div class="card-body ">
			<div class="mr-auto pr-3 mb-sm-0 mb-3">
				<h3 class="text-black">Gedung Anda</h3>
			</div>
			<!-- <a href="{{url('admin')}}/gedung/create" class="btn rounded btn-primary mb-3"> Tambah </a> -->
		</div>
	</div>

	@foreach($list_gedung->sortByDesc('id') as $g)
	<div class="card shadow">
		<div class="card-body pt-3 pb-3">
			<div class="media border-bottom mb-3 pb-3 d-lg-flex d-block menu-list">
				<a href="{{url('admin/gedung/detail',$g->id)}}">
					<div class="row">
						<div class="col-md-6">
							<img class="rounded mr-3 mb-md-0 mb-3" src="{{url("public/$g->foto")}}" alt=" " width="100%"></a>
						</div>
						<div class="col-md-6">
							<div class="media-body col-lg-12 pl-0">
								<h6 class="fs-18 font-w600"><a href="{{url('admin/gedung/detail',$g->id)}}" class="text-black">{{ucwords($g->nama)}}</a></h6>
								<p class="fs-14">{{ Str::limit($g->deskripsi, 200) }}</p>
								<p class="fs-14 text-black font-w500">Harga : Rp. {{number_format($g->harga)}}<br>
									Kategori : {{ucwords($g->kategori)}}
								</p>
								<p class="fs-14 text-black font-w500">Alamat : {{ucwords($g->alamat)}}</p>
								<a href="{{url('admin/gedung/detail',$g->id)}}" class="btn btn-info btn-sm"><i class="fa fa-info"></i> Detail Gedung</a>
								<a href="{{url('admin/gedung/edit',$g->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>

	@endsection