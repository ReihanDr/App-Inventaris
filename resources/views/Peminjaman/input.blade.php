@extends('layout')
@section('konten')

<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1 class="m-0">Tambah Peminjaman</h1>
       </div><!-- /.col -->
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="/profil">Profil</a></li>
           <li class="breadcrumb-item active">Tambah Peminjaman</li>
         </ol>
       </div><!-- /.col -->
     </div><!-- /.row -->
   </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->

 <!-- Main content -->
 <div class="content">
   <div class="container-fluid">
     <div class="row">
       <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
              <h2 class="card-title">Tambah Peminjaman</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="store" method="POST">
                    @csrf
                    <select name="idinventaris" class="form-control" id="">
                      <option value="">-- Inventaris --</option>
                      @foreach ($inventaris as $item)
                      <option value="{{ $item['idinventaris'] }}">{{ $item['nama'] }}</option>
                      @endforeach
                    </select>
                    <div class="mb-3">
                      <label for="jumlah" class="form-label">Jumlah</label>
                      <input type="number" name="jumlah" class="form-control" id="jumlah" required>
                  </div>
                  <select name="idpegawai" class="form-control" id="">
                    <option value="">-- Pegawai --</option>
                    @foreach ($pegawai as $item)
                    <option value="{{ $item['idpegawai'] }}">{{ $item['namapegawai'] }}</option>
                    @endforeach
                  </select>
                    <div class="mb-3">
                        <label for="statuspeminjaman" class="form-label">Status</label>
                        <select name="statuspeminjaman" class="form-select" id="statuspeminjaman" required>
                            <option value="Dipinjam">Dipinjam</option>
                            <option value="Proses Dipinjam">Proses dipinjam</option>
                            <option value="Dikembalikan">Dikembalikan</option>
                            <option value="Proses Dikembalikan">Proses Dikembalikan</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
       </div>
       <!-- /.col-md-6 -->
     </div>
     <!-- /.row -->
   </div><!-- /.container-fluid -->
 </div>

@endsection
