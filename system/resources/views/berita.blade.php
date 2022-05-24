@extends('section.base')
@section('content')
<section class="py-lg-5 pt-5 card card-body">
    <div class="container pt-6">
      <div class="row card-body">
        <h1>Berita Terkini</h1> <hr>
          @foreach($list_berita->sortByDesc('id') as $b)
      <div class="col-lg-3 col-sm-6">
        <div class="card card-plain">
          <div class="card-header  border-0 p-0 position-relative">
            <a class="d-block blur-shadow-image">
              <img src="{{url('public')}}/{{$b->foto}}" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg" loading="lazy">
            </a>
          </div>
          <div class="card-body px-0">
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
@endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection