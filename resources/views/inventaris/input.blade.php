@extends('layout')
@section('konten')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"></h1>
      </div>
      <div class="col-lg-12">
       <div class="card">
         <ol class="breadcrumb float-sm-left m-3">
          <li class="breadcrumb-item ml-1"><a href="/inventaris">Inventaris</a></li>
           <li class="breadcrumb-item active ml-1">Tambah Invevntaris</li>
         </ol>
       </div>
      </div>
    </div>
  </div>
</div>

 <!-- Main content -->
 <div class="content">
   <div class="container-fluid">
     <div class="row">
       <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
             
            <h3>Tambah Data Inventaris</h3>
          </div>
            <!-- /.card-header -->
            <div class="card-body">
              
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <form action="store" method="POST">
                      @csrf
                      @method('POST')
                        <div class="form-group">
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama">
                        </div>
                        <div class="form-group">
                          <select class="form-control" id="kondisi" name="kondisi" required>
                              <option value="">-- Kondisi --</option>
                              <option value="Selesai">Selesai</option>
                              <option value="Proses">Proses</option>
                          </select>
                       </div>
                        <div class="form-group">
                          <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan">
                        </div>
                        <div class="form-group">
                          <input type="number" id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah">
                        </div>
                        <select name="idjenis" class="form-control" id="">
                          <option value="">-- Jenis --</option>
                          @foreach ($jenis as $item)
                          <option value="{{ $item['idjenis'] }}">{{ $item['namajenis'] }}</option>
                          @endforeach
                        </select>
                        <div class="form-group mt-3">
                          <input type="date" id="tanggalregister" name="tanggalregister" class="form-control">
                        </div>
                        <select name="idruang" class="form-control" id="">
                          <option value="">-- Ruang --</option>
                          @foreach ($ruang as $item)
                          <option value="{{ $item['idruang'] }}">{{ $item['namaruang'] }}</option>
                          @endforeach
                        </select>
                        <div class="form-group mt-3">
                          <input type="text" id="kodeinventaris" name="kodeinventaris" class="form-control" placeholder="Kode Inventaris">
                        </div>
                        <select name="idpetugas" class="form-control" id="">
                            <option value="">-- Petugas --</option>
                            @foreach ($petugas as $item)
                            <option value="{{ $item['idpetugas'] }}">{{ $item['namapetugas'] }}</option>
                            @endforeach
                        </select>
                      <div class="form-group mt-3">
                       <button type="submit" class="btn btn-info mt-3">Simpan Data Inventaris</button>
                    </div>
                    </form>
                    
  
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