

@extends('admin.admin_dashboard')
@section('admin')
    <!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Ecommerce</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Category Size</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->
			  <form method="POST" action="{{route('admin.size.store')}}" enctype="multipart/form-data" >
				 @csrf
				<div class="card">
                    <div class="card-body p-4">
                        <h5 class="card-title">Add Category Size</h5>
                        <hr/>
                         <div class="form-body mt-4">
                          <div class="row">
                             <div class="col-lg-8">
                             <div class="border border-3 p-4 rounded">

                                 {{-- <div class="mb-3">
                                  <label for="Title" class="form-label">Category</label>
                                  <select class="form-select @error('category') is-invalid @enderror" name="category"
                                      id="category" aria-label="Default select example">
                                      <option value="">Open this select Title</option>
                                      @foreach ($category as $category)
                                          <option value="{{ $category->id }}"
                                              {{ old('category') == $category->title ? 'selected' : NULL }}>
                                              {{ $category->title }}</option>
                                      @endforeach
                                  </select>
                                  <span class="text-danger">{{ $errors->first('category') }}</span>
                              </div> --}}

                              <div class="mb-3">
                                  <label for="Size" class="form-label">Size </label>
                                  <input type="text" value="{{old('Size')}}" class="form-control @error('Size') is-invalid @enderror" id="Size" name="Size">
                                  <span class="text-danger">{{ $errors->first('Size') }}</span>
                              </div>
                              <div class="col-12">
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                          </div>





                              </div>
                             </div>

                          </div>
                         </div>
                      </div>
                      </div>
                    </div>
				</form>
			  </div>


			</div>
		<!--end page wrapper -->
@endsection
