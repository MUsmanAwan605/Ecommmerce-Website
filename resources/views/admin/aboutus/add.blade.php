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
                            <li class="breadcrumb-item active" aria-current="page">About </li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->
            <form method="POST" action="{{ route('admin.about.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="card-title">Add About Section</h5>
                        <hr />
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="border border-3 p-4 rounded">

                                        <div class="form-group mb-3 mb-3">
                                            <label for="title">Main Title</label>
                                            <input type="text" name="title" id="title" class="form-control"
                                                placeholder="Enter main title">
                                        </div>

                                        <!-- Main Content -->
                                        <div class="form-group mb-3">
                                            <label for="main_content">Main Content</label>
                                            <textarea name="main_content" id="main_content" class="form-control" rows="4" placeholder="Enter main content"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="PointOne" class="form-label">Point One</label>
                                            <input type="text" value="{{ old('PointOne') }}"
                                                class="form-control @error('PointOne') is-invalid @enderror" id="PointOne"
                                                name="PointOne">
                                            <span class="text-danger">{{ $errors->first('PointOne') }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="PointSecond" class="form-label">Point Second</label>
                                            <input type="text" value="{{ old('PointSecond') }}"
                                                class="form-control @error('PointSecond') is-invalid @enderror"
                                                id="PointSecond" name="PointSecond">
                                            <span class="text-danger">{{ $errors->first('PointOne') }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="PointThird" class="form-label">Point Third</label>
                                            <input type="text" value="{{ old('PointThird') }}"
                                                class="form-control @error('PointThird') is-invalid @enderror"
                                                id="PointThird" name="PointThird">
                                            <span class="text-danger">{{ $errors->first('PointOne') }}</span>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="border border-3 p-4 rounded">
                                        <h4>Product Section</h4>
                                        <div class="mb-3">
                                            <label for="frt_icon">Icon</label>
                                            <input type="file" name="first_icon" id="frt_icon" class="form-control"
                                                placeholder="Enter icon class (optional)">
                                        </div>

                                        <div class="mb-3">
                                            <label for="first_title">Title</label>
                                            <input type="text" name="first_title" id="first_title" class="form-control"
                                                placeholder="Enter title (optional)">
                                        </div>

                                        <div class="mb-3">
                                            <label for="frt_content">Content</label>
                                            <textarea name="first_content" id="frt_content" class="form-control" rows="3"
                                                placeholder="Enter content (optional)"></textarea>
                                        </div>

                                        <h4>Payment Section</h4>
                                        < <div class="mb-3">
                                            <label for="sec_icon">Icon</label>
                                            <input type="file" name="Second_icon" id="sec_icon" class="form-control"
                                                placeholder="Enter icon class (optional)">
                                        </div>

                                        <div class="mb-3">
                                            <label for="sec_title">Title</label>
                                            <input type="text" name="Second_title" id="sec_title" class="form-control"
                                                placeholder="Enter title (optional)">
                                        </div>

                                        <div class="mb-3">
                                            <label for="sec_content">Content</label>
                                            <textarea name="Second_content" id="sec_content" class="form-control" rows="3"
                                                placeholder="Enter content (optional)"></textarea>
                                        </div>

                                        <h4 class="mb-3">Delivery Section</h4>
                                        <div class="mb-3">
                                            <label for="trd_icon">Icon</label>
                                            <input type="file" name="Third_icon" id="trd_icon" class="form-control"
                                                placeholder="Enter icon class (optional)">
                                        </div>

                                        <div class="mb-3">
                                            <label for="sec_title">Title</label>
                                            <input type="text" name="Third_Title" id="trd_icon" class="form-control"
                                                placeholder="Enter title (optional)">
                                        </div>

                                        <div class="mb-3">
                                            <label for="trd_icon">Content</label>
                                            <textarea name="Third_Content" id="Third_Content" class="form-control" rows="3"
                                                placeholder="Enter content (optional)"></textarea>
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


    </div>
    <!--end page wrapper -->
@endsection
