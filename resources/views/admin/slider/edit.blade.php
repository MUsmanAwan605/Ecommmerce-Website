

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
								<li class="breadcrumb-item active" aria-current="page">Slider</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->
			  <form method="POST" action="{{route('admin.slider.update',$Slider->id)}}" enctype="multipart/form-data" >
				 @csrf
                 {{ method_field('put') }}
                 <div class="card">

                    <div class="border border-1 p-4 rounded">
                        <div class="row justify-content-center">

                            <div class="col-md-6"> <!-- Add col-md-6 here -->
                    <h4 class="fw-bold text-uppercase">Edit Slider</h4>

                                <div class="mb-3">
                                    <label for="title" class="form-label">Discount</label>
                                    <input type="text" value="{{ old('Discount',$Slider->discount) }}" class="form-control @error('Discount') is-invalid @enderror" id="Discount" name="Discount">
                                    <span class="text-danger">{{ $errors->first('Discount') }}</span> <!-- Changed 'title' to 'Name' -->
                                </div>

                                <div class="mb-3">
                                    <label for="file" class="form-label">Offer</label>
                                    <input type="text" value="{{ old('Offer',$Slider->heading) }}" class="form-control @error('Offer') is-invalid @enderror" id="Offer" name="Offer">
                                    <span class="text-danger">{{ $errors->first('Offer') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="file" class="form-label">Image</label>
                                    <input type="file" value="{{ old('file') }}" class="form-control @error('file') is-invalid @enderror" id="file" name="file" >
                                    <span class="text-danger">{{ $errors->first('file') }}</span>
                                </div>

                                    @if (!empty($Slider->img))
                                    <h5 class="text-primary alert-danger">Uploaded Images</h5>
                                    <img src="/uploads/slider_img/{{ $Slider->img }}" alt="Slider Image" width="100">

                                    @else
                                    <div class="alert alert-danger">No Image Found</div>
                                    @endif


                                <div class="col-12 pt-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
