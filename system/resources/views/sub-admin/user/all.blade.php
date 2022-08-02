@extends('sub-admin.template.base')
@section('content')
<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header d-sm-flex d-block pb-0 border-0">
			<div class="mr-auto pr-3 mb-sm-0 mb-3">
				<h4 class="text-black fs-20">Data Pembokingan</h4>
			</div>

		</div>
		<div class="card-body">
			<div class="table-responsive" >
				<table id="example" class="display table-hover table-datatable table" >
					<thead>
						<tr class="bg-light">
							<th width="30px">No</th>
							<th>Action</th>
							<th>Nama</th>
							<th>Level Akun</th>
							<th>Email</th>
							<th>No Handphone</th>
							<th>Bergabung</th>
						</tr>
					</thead>
					<tbody>
						@foreach($list_user as $user)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>
								<div class="btn-group">
									<a href="https://api.whatsapp.com/send?phone={{$user->notlp}}" target="_blank" class="btn btn-primary light" title="Kirim Whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i> </a>
									<a href="mailto:{{$user->email}}" class="btn btn-primary light" title="Kirim Email"><i class="fa fa-envelope" aria-hidden="true"></i> </a>
								 @include('sub-admin.utils.hapus', ['url' =>url('sub-admin/kategori', $user->id)])
								 </div>
							</td>
							<td>{{ucwords($user->nama)}}</td>
							<td>
								@if($user->level == 1)
								<span class="badge badge-sm badge-info">Pengguna</span>
								@else
								<span class="badge badge-sm badge-success">Admin Gedung</span>
								@endif
							</td>
							<td>{{ucwords($user->email)}}</td>
							<td>{{$user->notlp}}</td>
							<td>{{$user->created_at}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>

				<!-- Button trigger modal -->

			</div>
		</div>

	</div>

</div>

@endsection