<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Share Files</title>
  </head>
  <body>
 <div class="position-absolute top-50 start-50 translate-middle">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has("success"))
        <div class="alert alert-success">
        {{session("success")}}
        </div>
     @elseif (Session()->has("danger")) 
     <div class="alert alert-danger">
        {{session("danger")}}
        </div>  
    @endif
<h2 class="text-success">Share your files by url</h2>
    <form action="{{route("uploadFile.store")}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload Your File</label>
            <input class="form-control" type="file" id="formFile" name="userFile">
            @error("userFile")
                <p class="text-danger">{{$message}}</p>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary" style="width: 100%">Get Link</button>
    </form>
 </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>