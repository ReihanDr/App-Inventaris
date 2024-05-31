@extends('layout')
@section('konten')

<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1 class="m-0">Validasi Peminjaman</h1>
       </div><!-- /.col -->
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="/profil">Profil</a></li>
           <li class="breadcrumb-item active">selanjutnya</li>
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
              <h2 class="card-title">Data jenis</h2>
              {{-- <a href="ruang/create" class="btn btn-info" style="float: right">Tambah</a> --}}
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Inventaris</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($data as $d)
                        <tr>
                            <th>{{ $loop->iteration  }}</th>
                            <th>{{ $d->nama }}</th>
                            <th>{{ $d->tanggalpeminjaman }}</th>
                            <th>{{ $d->tanggalkembali }}</th>
                            <th>{{ $d->statuspeminjaman }}</th>

                            <th>
                                <a href="/validasipengembalian/allow/{{ $d->idpeminjaman }}" class="btn btn-success">VALIDASI</a>
                            </th>
        
                        </tr>
                    @endforeach 
                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
       </div>
       <!-- /.col-md-6 -->
   
       <!-- /.col-md-6 -->
     </div>
     <!-- /.row -->
   </div><!-- /.container-fluid -->
 </div>

@endsection
