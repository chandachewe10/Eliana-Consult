@extends('layouts.account')
@section('content')
<div class="account-layout  border">
  <div class="account-hdr bg-primary text-white border">
   Refer Someone at {{config('app.name')}}
  </div>
  <div class="account-bdy p-3">
    <div class="row">
     
      <div class="col-sm-12 col-md-12">
        <div>
          <p class="text-sm"><i class="fas fa-info-circle"></i> <span class="font-weight-bold">This will be validated by the Admin</span> </p>
          <div class="my-4">
          <p class="my-3">Fill in the input fields <span class="text-primary">Below</span> to add a client and start earning.</p>
            <form action="{{route('account.referSomeone')}}" method="POST">
              @csrf

  <div class="form-group">
    <label for="Client Name/Business Name">Client Name/Business Name</label>
    <input type="text" class="form-control" name="client_name" placeholder="Enter Client Name">    
  </div>
  @error('client_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

  <div class="form-group">
    <label for="Client Email">Client Email</label>
    <input type="email" class="form-control" name="client_email" placeholder="Enter Client Email">    
  </div>

  @error('client_email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

  <div class="form-group">
    <label for="lient Phone">Client Phone</label>
    <input type="number" class="form-control" name="client_phone" placeholder="Enter Client Phone">    
  </div>
  @error('client_phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

  <div class="form-group">
    <label for="Client Address">Client Address</label>
    <input type="text" class="form-control" name="client_address" placeholder="Enter Client Address">    
  </div>
  @error('client_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

@php    

$services = \App\Models\CompanyCategory::get();

@endphp
  <div class="form-group">
    <label for="Required Service">Required Service</label>
    <select name="client_required_service" class="form-control" >
      @foreach($services as $service)
      <option value="{{$service->category_name}}">{{$service->category_name}}</option>
     @endforeach
     </select>
  </div>
  @error('client_required_service')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror


  <div class="form-group">
    <label for="Attachment (Optional)">Attachment (Optional)</label>
    <input type="file" class="form-control" name="attachment">
  </div>
  @error('attachment')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror



              <div class="form-group">
                <div class="d-flex">
                  <button type="submit" class="btn primary-outline-btn">Add to referals</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection