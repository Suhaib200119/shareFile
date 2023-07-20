<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Operations On File</title>
    <style>
      a:link, a:visited {
        background-color: #f44336;
        color: white;
        padding: 14px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
      }
      
      a:hover, a:active {
        background-color: red;
      }
      </style>
  </head>
  <body>

    <div class="position-absolute top-50 start-50 translate-middle" >
        <div style="text-align: center">
            <a href="{{route("uploadFile.create")}}" style="background: rgb(51, 51, 214)" >Upload File</a>
            <p style="margin: 10px;display: inline;"></p>
            <a href="{{route("DownloadFile.create")}}" style="background: rgb(63, 214, 68)"  >Download File</a>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>