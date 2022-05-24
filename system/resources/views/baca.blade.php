@extends('section.base')
@section('content')
<section class="py-lg-5 pt-5 card card-body">
  <div class="container pt-6">
    <div class="row card-body">
      <h1>{{ucwords($berita->judul)}}</h1> <hr>
      <label for=""><i class=" fa fa-clock"></i> Dibuat Pada Tanggal {{$berita->created_at}}</label>
      <div class="row">
       <div class="col-md-6">
         <img src="{{url('public')}}/{{$berita->foto}}" class="rounded" style="width: 100%" alt="">
       </div>
       <div class="col-md-6">
         {!!nl2br($berita->isi)!!}
       </div>
     </div>
   </div>
 </div>
</div>
<div class="row">
  <div class="col-md-12">
    <h3>Share</h3>
    <div class="form-group">
     <a href="https://api.whatsapp.com/send?phone=&text={{url()->current()}}" class="btn btn-success" target="_blank"><i class="fa fa-whatsapp"></i></a>
     <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" class="btn btn-primary" target="_blank"><i class="fa fa-facebook"></i></a>
     <a href="https://twitter.com/intent/tweet?url={{url()->current()}}" class="btn btn-info" target="_blank"><i class="fa fa-twitter"></i></a>

    <div class="input-group mb-3" style="width: 50%">
    <button class="btn btn-info" id="copyBtn"><i class="fa fa-copy"></i> Salin Url</button>
    <input type="text" class="form-control"  value="{{url()->current()}}" id="copyText" readonly >
  </div>
  </div>
</div>
</div>
</div>
</section>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
  const copyBtn = document.getElementById('copyBtn')
  const copyText = document.getElementById('copyText')

  copyBtn.onclick = () => {
                copyText.select();    // Selects the text inside the input
                document.execCommand('copy');    // Simply copies the selected text to clipboard 
                 Swal.fire({         //displays a pop up with sweetalert
                  icon: 'success',
                  title: 'Text copied to clipboard',
                  showConfirmButton: false,
                  timer: 1000
                });
               }
             </script>
             @endsection