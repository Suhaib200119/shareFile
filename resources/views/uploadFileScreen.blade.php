@extends("layouts.master")
@section("sectionContent")
<div class="position-absolute top-50 start-50 translate-middle">
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <h2 class="text-success">Share your files by url</h2>
  <form action="{{ route('uploadFile.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
          <label for="formFile" class="form-label">Upload Your File</label>
          <input class="form-control" type="file" id="formFile" name="userFile">
          @error('userFile')
              <p class="text-danger">{{ $message }}</p>
          @enderror
      </div>
      <div class="mb-3">
          <label for="hour" class="form-label">The number of hours the link is valid
          </label>
          <select name="hours" id="hours" class="form-select">
              @for ($x = 1; $x < 25; $x++)
                  <option value="{{ $x }}">{{ $x }}</option>
              @endfor
          </select>
      </div>

      <button type="submit" class="btn btn-primary" style="width: 100%">Get Link</button>
  </form>
</div>
@endsection