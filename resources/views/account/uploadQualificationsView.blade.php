@extends('layouts.account')

@section('content')
  <div class="account-layout  border">
    <div class="account-hdr bg-primary text-white border">
      Upload Qualifications (Multiple Files Supported)
    </div>
    <div class="account-bdy p-3">
      <form action="{{route('account.uploadQualifications')}}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
          <input type="files" placeholder="Files" class="form-control" name="status_upload" value="Academic Qualifications" readonly>
        </div>
        <p class="mt-3  alert alert-primary">You can upload Multiple Files at once</p>
        <div class="form-group">
          <input type="file" placeholder="Files*" class="form-control @error('filename') is-invalid @enderror" name="filename[]" multiple required>
            @error('filename')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="line-divider"></div>
        <div class="mt-3">
          <button type="submit" class="btn primary-btn">Upload</button>
         
        </div>
      </form>
    </div>
  </div>
@endSection

@push('css')

@endpush