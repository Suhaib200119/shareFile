<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Download Files</title>
  </head>
  <body>
    <div class="position-absolute top-50 start-50 translate-middle">
        @if (session()->has("message"))
            <div class="alert alert-danger">
                {{session("message")}}
            </div>
        @endif
    <h2 class="text-success">Download File By Link</h2>
        <form action="{{route("DownloadFile.store")}}" method="post" >
            @csrf
            <div class="mb-3">
                <label for="linkFileId" class="form-label">Put File Link</label>
                <input class="form-control" type="link" id="linkFileId" name="linkFile">
                @error("linkFile")
                    <p class="text-danger">{{$message}}</p>
                @enderror
              </div>
    
              <button type="submit" class="btn btn-primary" style="width: 100%">Download File</button>
        </form>
     </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>