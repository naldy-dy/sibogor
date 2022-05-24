@extends('sub-admin.template.base')
@section('content')

<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header d-sm-flex d-block pb-0 border-0">
			<div class="mr-auto pr-3 mb-sm-0 mb-3">
				<h4 class="text-black fs-20">Data Kecamatan</h4>
			</div>
			<a href="{{url('sub-admin')}}/kecamatan/create" class="btn rounded btn-primary mb-3"> <i class="fa fa-plus"></i> Tambah </a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="example" class="display table-datatable table min-w850">
					<thead>
						<tr>
							<th width="30px">No</th>
							<th width="50px">Action</th>
							<th class="text-center" >Warna</th>
							<th>Kecamatan</th>
						</tr>
					</thead>
					<tbody>
						@foreach($list_kecamatan->sortBy('kecamatan') as $k)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>
								<div class="btn-group">
								<a href="{{url('sub-admin/kecamatan/edit',$k->id)}}" class="btn light btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
								 @include('sub-admin.utils.hapus', ['url' =>url('sub-admin/kecamatan', $k->id)])
								 </div>
							</td>
							<td><button class="btn btn-block " style="background-color: {{$k->warna}}; color: #ffffff">{{$k->warna}}</button></td>
							<td>{{ucwords($k->kecamatan)}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

	</div>

</div>

@endsection