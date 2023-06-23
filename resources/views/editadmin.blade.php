<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center mb-4">Edit Data Admin</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/updateadmin/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Username</label>
                              <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->username }}">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Fullname</label>
                                <input type="text" name="fullname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->fullname }}">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
