@extends('sub-admin.template.base')
@section('content')

<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header d-sm-flex d-block pb-0 border-0">
			<div class="mr-auto pr-3 mb-sm-0 mb-3">
				<h4 class="text-black fs-20">Kritik & Saran</h4>
			</div>
			
		</div>

	</div>
		@foreach($list_kritik->sortByDesc('id') as $k)
		<div class="card card-body shadow mt-3">
			<label for="">Nama : {{ucwords($k->nama)}}</label>
			<label for="" ><i class="fa fa-envelope" aria-hidden="true"></i> : {{ucwords($k->email)}}</label>
			<p>{!!nl2br($k->pesan)!!}</p>

			<div class="float-right">
			<label for="" style="float: right;"><i class="fa fa-clock-o"></i>{{$k->created_at}}</label>
			</div>
			<a href="mailto:{{$k->email}}" class="btn btn-primary light" style="width: 150px"><i class="fa fa-reply" aria-hidden="true"></i> Balas</a>
		</div>
		@endforeach

</div>

@endsection