@extends('section.base')
@section('content')
<section class="py-lg-5 pt-5 card card-body">
  <div class="container pt-6">
      <h1>Berita Terkini</h1> <hr>
    <div class="row ">
      @foreach($list_berita->sortByDesc('id') as $b)
      <div class="col-lg-3 col-sm-6">
        <div class="card shadow">
          <div class="card-header  border-0 p-0">
              <img src="{{url('public')}}/{{$b->foto}}" alt="img-blur-shadow" height="150px" width="100%" class="shadow border-radius-lg" loading="lazy">
          </div>
          <div class="card-body px-0">
            <div class="container">
              <h5>
              <a href="{{url('berita/baca',$b->id)}}" class="text-dark font-weight-bold"> {{ Str::limit(ucwords($b->judul), 50) }}</a><br>
              <label for=""><i class="fa fa-clock"></i> {{$b->created_at}}</label>
            </h5>
            <p style="font-size:13px">
             {{ Str::limit($b->isi, 100) }}
           </p>
           <a href="{{url('berita/baca',$b->id)}}" class="text-info text-sm icon-move-right">Baca Selengkapnya
            <i class="fas fa-arrow-right text-xs ms-1"></i>
          </a>
            </div>
            
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
</div>
</div>
</section>
@endsection