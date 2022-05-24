@extends('section.base')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 mt-5">
			<div class="card">
				<div class="card-header">
					Alamat
				</div>
				
				<div class="card-body">
					<div class="row">
						<div class="col-md-3">
							<label class="control-label">Provinsi</label>

							<select name="" class="form-control" id="nama" onchange="cekii(this.value)">
							<option value="">Pilih Gedung </option>
								@foreach($list_gedung as $gedung)
									<option value="{{$gedung->id}}">{{$gedung->id}}</option>
								@endforeach
								</select>
							</div>
							<div class="col-md-3">
								<label for="" class="control-label">Harga</label>
								<select name="" class="form-control" id="harga" onchange="cekii(this.value">
									
									<option value="">Pilih Provinsi Terlebih Dahulu</option>
								
								</select>
							</div>
							<div class="col-md-3">
								<label for="" class="control-label">Kecamatan</label>
								<select name="" class="form-control" id="kecamatan" onchange="gantiKecamatan(this.value">
									<option value="">Pilih Kabupaten Terlebih Dahulu</option>
									
								</select>
							</div>
							<div class="col-md-3">
								<label for="" class="control-label">Desa</label>
								<select name="" class="form-control" id="desa">
									<option value="">Pilih Kecamatan Terlebih Dahulu</option>
									
								</select>
							</div>
							 
						</div>
						
					</div>

					
				</div>

				
			</div>
			
		</div>
		
	</div>


@endsection

@push('script')
<script type="text/javascript">
    function send() {
        var person = {
            name: $("#id-name").val(),
            address:$("#id-address").val(),
            phone:$("#id-phone").val()
        }

        $('#target').html('sending..');

        $.ajax({
            url: '/test/PersonSubmit',
            type: 'post',
            dataType: 'json',
            contentType: 'application/json',
            success: function (data) {
                $('#target').html(data.msg);
            },
            data: JSON.stringify(person)
        });
    }
</script>


<script>
	function cekii(id){
		$.get("api/gedung"+id, function(result){
			result = JSON.parse(result);
			input = ""
			for(item of result){
				$("#nama").val(item.nama);
				$("#harga").val(item.harga);

			}
		});

	}
</script>

<script>
    function gantiNama(id) {
        $.get("api/gedung/" +id, function(result) {
            result = JSON.parse(result);
            option = ""
            for (item of result) {
                option += `<option value="${item.id}">${item.harga}</option>`;
            }
            $("#harga").html(option)
        });
    }
    function gantiHarga(id) {
        $.get("api/gedung/" +id, function(result) {
            result = JSON.parse(result)
            option = ""
            for (item of result) {
                option += `<option value="${item.id}">${item.id}</option>`;
            }
            $("#kategori").html(option)
        });
    }
    function ganti(id) {
        $.get("api/kecamatan/" +id, function(result) {
            result = JSON.parse(result)
            option = ""
            for (item of result) {
                option += `<option value="${item.id}">${item.name}</option>`;
            }
            $("#desa").html(option)
        });
    }
</script>
@endpush