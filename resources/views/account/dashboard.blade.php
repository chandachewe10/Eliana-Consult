@extends('layouts.account')

@section('content')
  <div class="account-layout  border">
    <div class="account-hdr bg-primary text-white border" >
      Dashboard
    </div>
    <div class="account-bdy p-3">
        <div class="row mb-3">
          <div class="col-xl-4 col-sm-6 py-2">
              <div class="card dashboard-card text-white h-100 shadow">
                  <div class="card-body primary-bg">
                      <div class="rotate">
                          <i class="fas fa-users fa-4x"></i>
                      </div>
                      <h6 class="text-uppercase">Users</h6>
                      <h1 class="">{{$dashCount['user']}}</h1>
                  </div>
              </div>
          </div>
          <div class="col-xl-4 col-sm-6 py-2">
              <div class="card dashboard-card text-white  h-100 shadow">
                  <div class="card-body bg-secondary">
                      <div class="rotate">
                          <i class="fas fa-building fa-4x"></i>
                      </div>
                      <h6 class="text-uppercase">Total Refered Clients</h6>
                      <h1 class="">{{\App\Models\Referals::count()}}</h1>
                  </div>
              </div>
          </div>
          <div class="col-xl-4 col-sm-6 py-2">
              <div class="card dashboard-card text-white h-100 shadow">
                  <div class="card-body bg-info">
                      <div class="rotate">
                          <i class="fas fa-user-tie fa-4x"></i>
                      </div>
                      <h6 class="text-uppercase">Added Services</h6>
                      <h1 class="">{{\App\Models\CompanyCategory::count()}}</h1>
                  </div>
              </div>
          </div>
         
      
      </div>


    
      <section class="dashboard-company">
          <h4 class="card-title text-secondary">Manage Services</h4>
          <div class="row my-4">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#categories-tab" role="tab" data-toggle="tab">Consult Services</a>
                    </li>
                  
                    
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <br>
                    <div role="tabpanel" class="tab-pane active" id="categories-tab">
                        <div class="mb-3">
                            <form action="{{route('category.store')}}" method="POST">
                                @csrf
                                <label for="">Add a new Service Category</label>
                                <div class="d-flex">
                                    <input type="text" class="form-control" placeholder="Company category name" name="category_name">
                                    <button class="btn secondary-btn">Add</button>
                                </div>
                                @error('category_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                            </form>
                        </div>
                      
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>#</th>
                                        <th>Category name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($companyCategories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->category_name}}</td>
                                        <td><a class="btn secondary-btn" href="{{route('category.edit',['category'=>$category])}}">Edit</a> 
                                            <form action="{{route('category.destroy',['id'=>$category->id])}}" id="categoryDestroyForm" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button id="categoryDestroyBtn" class="btn danger-btn">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                   
                    </div>
                   

                </div>
            </div>
          </div>
      </section>
    </div>
  </div>
@endSection

@push('js')
<script>
     $(document).ready(function(){
        //delete category 
        $('#categoryDestroyBtn').click(function(e){
            e.preventDefault();
            if(window.confirm('Are you sure you want delete the Category?')){
                $('#categoryDestroyForm').submit();
            }
        })
    })
</script>
@endpush
