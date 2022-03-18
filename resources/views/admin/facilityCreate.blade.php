@extends('template.main')
@section('container')
<div class="container">
     <h1 class="text-center">Create New Facility</h1>

    <div class="row justify-content-center">
        <div class="col-sm-10 ">
            <form method="POST" action="/facility" class="mb-sm-5" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"  name="name" required value="{{ old('name') }}">
                  @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">facility Image</label>
                    <img class="img-preview img-fluid mb-sm-3 col-sm-5">
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                </div>
          
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    @error('body')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                    <trix-editor input="body"></trix-editor>
                </div>
        
        
                <button type="submit" class="btn btn-primary">Create Facility</button>
            </form>
        </div>
    </div>
    
</div>

<script>
    document.addEventListener('trix-file-accept',function(e){
    e.preventDefault();
  })

  function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');
    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload =function(oFREvent){
      imgPreview.src= oFREvent.target.result;
    }
  }

</script>
@endsection