@extends('layouts.master')
@section('sectionTitle', 'My Files')
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        function myFunction() {
            var copyText = document.getElementById("myUrl");
            navigator.clipboard.writeText(copyText.value);
        }
        function fetchData(id) {
            const route = `uploadFile/${id}`;
            axios.get(route)
                .then(function(response){
                    const data = response.data["data"];
                    Swal.fire({
                        title: data.fileName,
                        text: data.urlDownload,
                        imageUrl: "storage/" + data.imagePath,
                        imageWidth: 400,
                        imageHeight: 300,
                        imageAlt: 'Custom image',
                    });
                })
                .catch(error => {
                    console.error(error);
                    Swal.fire({
                        icon: 'error',
                        title: 'error',
                        text: 'error',
                    })
                });
        }
    </script>


@endsection
@section('sectionContent')
    <div
        style="background-color: rgb(33, 72, 229);width: 150px;padding: 8px;float: right;text-align: center;border-radius: 4px">
        <a href="{{ route('uploadFile.create') }}"
            style="display: block;width: 100%;font-size: 20px;color: white;text-decoration: none">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-plus-circle">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="16"></line>
                <line x1="8" y1="12" x2="16" y2="12"></line>
            </svg>
            add
        </a>
    </div>
    <div style="clear: both"></div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
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
                    <tr>
                        <td>{{ $image->fileName }}</td>
                        <input id="myUrl" type="hidden" value="{{ $image->urlDownload }}">
                        <td>{{ $image->urlDownload }}</td>
                        <td>after <b>{{$image->linkHours}}</b> h</td>
                        <td>
                            <button
                                style=" background-color: rgb(33, 72, 229);
                        border: none;
                        text-align: center;
                        display: inline-block;
                        font-size: 16px;
                        padding: 4px;
                        border-radius: 4px"
                                onclick="myFunction('{{ $image->imagePath }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-copy">
                                    <rect x="9" y="9" width="13" height="13" rx="2"
                                        ry="2"></rect>
                                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                </svg>
                            </button>
                            <button onclick="fetchData({{ $image->id }})"
                                style=" background-color: rgba(81, 57, 177, 0.664);border: none;text-align: center;
                             display: inline-block;font-size: 16px;padding: 4px; border-radius: 4px"
                                id="show-dialog-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-eye">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
