@extends('layouts.master')
@section('sectionTitle', 'My Files')
@section('css')
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
        table tr th,td{
            text-align: center;
        }
    </style>
@endsection
@section('sectionContent')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (Session()->has('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif
    <a href="{{ route('uploadFile.create') }}" class="btn btn-primary btn-lg" style="float: right">
        upload Image
    </a>

    <div style="clear: both"></div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Image Name</th>
                    <th scope="col">Url</th>
                    <th scope="col">expiration</th>
                    <th scope="col">operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($images as $image)
                    <tr id="{{$image->id}}" >
                        <td>{{ $image->fileName }}</td>
                        <td style="width: ">{{ $image->urlDownload }}</td>
                        <td><b>{{ $image->linkHours }}</b></td>
                        <td style="text-align: center;padding-right: 0px;padding-left: 0px;width: 200px;">
                            <button onclick="showDialog('{{ $image->id }}')" class="btn btn-primary">
                                <i class="bi bi-eye" style="color: white"></i>
                            </button>
                            <button onclick="copyLink('{{ $image->urlDownload }}')" class="btn btn-success">
                                <i class="bi bi-clipboard-check"></i>
                            </button>
                           
                            <button onclick="confirmDeleteItem('{{ $image->id }}')" class="btn btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                            <form style="display: inline" action="{{route("uploadFile.update",$image->id)}}" method="post">
                            @csrf
                            @method("put")
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-arrows-angle-expand"></i>
                            </button>
                            </form>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        // Function To Copy Download Link
        function copyLink(url) {
            navigator.clipboard.writeText(url);
        }
        // Function To View Data In Dialog
        function showDialog(id) {
            const route = `uploadFile/${id}`; // route format
            axios.get(route) //get requset
                .then(function(response) { // then => Success Request
                    const data = response.data["data"]; // Retrieve Data and Store in Data variable
                    // Craete Dialog Using SweetAlert
                    Swal.fire({
                        title: data.fileName,
                        text: data.urlDownload,
                        imageUrl: "storage/" + data.imagePath,
                        imageWidth: 400,
                        imageHeight: 300,
                        imageAlt: 'image',
                    });
                })
                .catch(error => { // catch => Failure Request
                    console.error(error);
                    Swal.fire({
                        icon: 'error',
                        title: 'error',
                        text: 'error',
                    })
                });
        }
        // Function To confirm Delete Item
        function confirmDeleteItem(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                 deleteItem(id);
                }
                });
        }
        // Function To Delete Item
        function deleteItem(id) {
            const route = `uploadFile/${id}`;// route format
            axios.delete(route)//get requset
            .then(function(response) {// then => Success Request
                 // Craete Dialog Using SweetAlert   
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'File Deleted',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    // Remove te From Table Using Js
                    document.getElementById(id).remove();
                }

            );


        }

    </script>


@endsection
