

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
								<li class="breadcrumb-item active" aria-current="page">Colors</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->
			  <form method="POST" action="{{route('admin.color.store')}}" enctype="multipart/form-data" >
				 @csrf
                 <div class="card">
                    <div class="border border-1 p-4 rounded">
                        <div class="row">
                            <div class="col-md-6"> <!-- Add col-md-6 here -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Name</label>
                                    <input type="text" value="{{ old('Name') }}" class="form-control @error('Name') is-invalid @enderror" id="Name" name="Name">
                                    <span class="text-danger">{{ $errors->first('Name') }}</span> <!-- Changed 'title' to 'Name' -->
                                </div>

                                <div class="mb-3">
                                    <label for="file" class="form-label">Color Code</label>
                                    <input type="text" value="{{ old('Color') }}" class="form-control @error('Color') is-invalid @enderror" id="Color" name="Color">
                                    <span class="text-danger">{{ $errors->first('Color') }}</span>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                        {{-- <div class="mb-3">
                         <label for="Title" class="form-label">Product</label>
                         <select class="form-select @error('Product') is-invalid @enderror" name="Product"
                             id="Product" aria-label="Default select example">
                             <option value="">Open this select Title</option>
                             @foreach ($Products as $Product)
                                 <option value="{{ $Product->id }}"
                                     {{ old('Product') == $Product->id ? 'selected' : NULL }}>
                                     {{ $Product->prod }}</option>
                             @endforeach
                         </select>
                         <span class="text-danger">{{ $errors->first('Product') }}</span>
                        </div> --}}

                        {{-- <div class="mb-3">
                            <label for="Title" class="form-label">Size</label>
                            <select class="form-select @error('Size') is-invalid @enderror" name="Size"
                                id="Size" aria-label="Default select example">
                                <option value="">Open this select Title</option>
                                @foreach ($Sizes as $Size)
                                    <option value="{{ $Size->id }}"
                                        {{ old('Size') == $Size->id ? 'selected' : NULL }}>
                                        {{ $Size->size }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('category') }}</span> --}}
                           </div>

                        </div>
				</form>
			  </div>


			</div>
		<!--end page wrapper -->
@endsection
