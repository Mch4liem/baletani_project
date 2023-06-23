@extends('layout.admin')

@section('content')
<body>
  <br>
  <br>
  <h1 class="text-center mb-5 mt-5">Tambah Data Petani</h1>

  <div class="container mb-5">

      <div class="row justify-content-center">
          <div class="col-8">
            <div class="card">
              <div class="card-body">
                <form action="/insertpetani" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('nama')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="jeniskelamin" aria-label="Default select example">
                      <option selected>Pilih Jenis Kelamin</option>
                      <option value="Pria">Pria</option>
                      <option value="Wanita">Wanita</option>
                    </select>
                    
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Umur</label>
                    <input type="number" name="umur" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Kontak</label>
                    <input type="number" name="kontak" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('kontak')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Upah</label>
                    <input type="number" name="upah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Masukkan foto</label>
                    <input type="file" name="foto" class="form-control" >
                    
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
      </div>
  </div>


  
</body>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
--> 
@endpush