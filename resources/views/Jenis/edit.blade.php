@extends('layout')
@section('konten')

<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
       </div><!-- /.col -->
       {{-- <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="/profil">Profil</a></li>
           <li class="breadcrumb-item active">selanjutnya</li>
         </ol>
       </div><!-- /.col --> --}}
     </div><!-- /.row -->
   </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->

 <div class="content">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="card">
                  <div class="card-header">
                      <h2 class="card-title">Tambah Data Barang</h2>
                  </div>
                  <div class="card-body">
                      @foreach($jenis as $d)
                      <form action="/jenis/update" method="post">
                          @csrf
                          <input type="hidden" name="id" value="{{ $d->idjenis }}">
                          <div class="form-group">
                              <label for="namabarang">Nama Jenis</label>
                              <input type="text" class="form-control" required="required" name="namajenis" value="{{ $d->namajenis }}">
                          </div>
                          <div class="form-group">
                              <label for="harga">Kode Jenis</label>
                              <input type="text" class="form-control" required="required" name="kodejenis" value="{{ $d->kodejenis }}">
                          </div>
                          <div class="form-group">
                              <label for="stok">Keterangan</label>
                              <input type="text" class="form-control" required="required" name="keterangan" value="{{ $d->keterangan }}">
                          </div>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                      </form>
                      @endforeach
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>



 @endsection