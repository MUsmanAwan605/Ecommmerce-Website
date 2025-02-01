

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
								<li class="breadcrumb-item active" aria-current="page">Category</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->
			  <form method="POST" action="{{route('admin.category.store')}}" enctype="multipart/form-data" >
				 @csrf
				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Add Raw Materials</h5>
					  <hr/>
                       <div class="form-body mt-4">
                        <div class="row">
						   <div class="col-lg-8">
                           <div class="border border-3 p-4 rounded">
                               <div class="mb-3">
                                 <label for="date" class="form-label">Date</label>
                                 <input type="date" value="{{old('Date')}}" class="form-control @error('Date') is-invalid @enderror" id="Date" name="Date">
                                 <span class="text-danger">{{ $errors->first('Date') }}</span>
                               </div>

                               <div class="mb-3">
                                 <label for="title" class="form-label">Title</label>
                                 <input type="text" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                                 <span class="text-danger">{{ $errors->first('title') }}</span>
                               </div>

                               <div class="mb-3">
                                <label for="file" class="form-label">Brand </label>
                                <input type="file" value="{{old('file')}}" class="form-control @error('file') is-invalid @enderror" id="file" name="file">
                                <span class="text-danger">{{ $errors->first('file') }}</span>
                              </div>

                               <div class="mb-3">
                                 <label for="dscp" class="form-label">Description</label>
                                <textarea name="descp" id="descp" value="{{old('descp')}}" class="form-control @error('descp') is-invalid @enderror" cols="5" rows="5"></textarea>
                                 <span class="text-danger">{{ $errors->first('descp') }}</span>
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
				</form>
			  </div>


			</div>
		<!--end page wrapper -->
@endsection
