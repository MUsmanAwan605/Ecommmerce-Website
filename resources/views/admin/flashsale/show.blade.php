
@extends('admin.admin_dashboard')
@section('admin')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">eCommerce</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Products Details</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Settings</button>
                    <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

         <div class="card">
            <div class="row g-0">
              <div class="col-md-4 border-end">
                @php
                          $images = json_decode($Product->prod_img);

                @endphp

                <img src="{{ asset('/uploads/products_img/' . $images[0]) }}" class="img-fluid" alt="...">

                <div class="row mb-3 row-cols-auto g-2 justify-content-center mt-3">
                    @if (is_array($images))
                    @foreach ($images as $image)
                    @if (!$loop->first)
                    <div class="col"><img src="{{ asset('/uploads/products_img/' . $image) }}" width="70" class="border rounded cursor-pointer" alt=""></div>
                    @endif
                    @endforeach
                    {{-- <div class="col"><img src="{{ asset('/uploads/products_img/' . $images[2]) }}" width="70" class="border rounded cursor-pointer" alt=""></div> --}}
                    {{-- <div class="col"><img src="{{ asset('/uploads/products_img/' . $images[3]) }}" width="70" class="border rounded cursor-pointer" alt=""></div> --}}
                    {{-- <div class="col"><img src="{{ asset('/uploads/products_img/' . $images[4]) }}" width="70" class="border rounded cursor-pointer" alt=""></div> --}}

                    @endif
                </div>
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h4 class="card-title">{{ $Product->prod }}</h4>
                  <div class="d-flex gap-3 py-3">
                    <div class="cursor-pointer">
                        <i class='bx bxs-star text-warning'></i>
                        <i class='bx bxs-star text-warning'></i>
                        <i class='bx bxs-star text-warning'></i>
                        <i class='bx bxs-star text-warning'></i>
                        <i class='bx bxs-star text-secondary'></i>
                      </div>
                      <div>142 reviews</div>
                      <div class="text-success"><i class='bx bxs-cart-alt align-middle'></i> 134 orders</div>
                  </div>
                  <div class="mb-3">
                    <span class="price h4">{{ $Product->real_price }}</span>
                    {{-- <span class="text-muted">/per kg</span> --}}
                </div>
                  <p class="card-text fs-6">{{ $Product->desc }}</p>
                  <dl class="row">
                    <dt class="col-sm-3">Model:</dt>
                    <dd class="col-sm-9">{{ $Product->model }}</dd>

                    {{-- <dt class="col-sm-3">Color</dt>
                    <dd class="col-sm-9">{{ $Product->color }}</dd> --}}

                    <dt class="col-sm-3">Delivery</dt>
                    <dd class="col-sm-9">{{ $Product->delivery }} </dd>
                  </dl>
                  <hr>
                  <div class="row row-cols-auto row-cols-1 row-cols-md-3 align-items-center">
                    <div class="col">
                        <label class="form-label">Quantity</label>
                        <div class="input-group input-spinner">
                            <button class="btn btn-white" type="button" id="button-plus"> + </button>
                             <input type="text" class="form-control" value="1">
                            <button class="btn btn-white" type="button" id="button-minus"> − </button>
                        </div>
                    </div>
                    <div class="col">
                            <label class="form-label">Select size</label>
                            <div class="">
                            @php
                            $sizes=json_decode($Product->size)
                          @endphp
                          @foreach ($sizes as $size)
                          <label class="form-check form-check-inline">
                              <input type="radio"class="form-check-input"  name="select_size" checked="" class="custom-control-input">
                              <div class="form-check-label">
                                  {{ $size }}
                                </div>
                            </label>
                            @endforeach

                            </div>
                    </div>
                        <div class="col">
                            <label class="form-label">Select size</label>
                            <div class="">
                          @foreach ($Product->product_colors as $prod_color)
                          <label class="form-check form-check-inline">
                              <input type="radio"class="form-check-input"  name="select_size" checked="" class="custom-control-input">
                              <div class="form-check-label">
                                {{ $prod_color->color->name }}
                                </div>
                            </label>
                            @endforeach

                                  {{-- <label class="form-check form-check-inline">
                                    @foreach($sizes as $size)
                                <span class="badge bg-primary">{{ $size->size_id }}</span>
                            @endforeach
                                  </label> --}}
                            </div>
                    </div>

                        {{-- @endforeach --}}
                </div>
                <div class="d-flex gap-3 mt-3">
                    <a href="#" class="btn btn-primary">Buy Now</a>
                    <a href="#" class="btn btn-outline-primary"><span class="text">Add to cart</span> <i class='bx bxs-cart-alt'></i></a>
                </div>
                </div>
              </div>
            </div>
            <hr/>
            <div class="card-body">
                <ul class="nav nav-tabs nav-primary mb-0" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class='bx bx-comment-detail font-18 me-1'></i>
                                </div>
                                <div class="tab-title"> Product Description </div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class='bx bx-bookmark-alt font-18 me-1'></i>
                                </div>
                                <div class="tab-title">Tags</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab" aria-selected="false">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class='bx bx-star font-18 me-1'></i>
                                </div>
                                <div class="tab-title">Reviews</div>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="tab-content pt-3">
                    <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                        <p>{{ $Product->l_desc }}</p>
                    </div>
                    <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                        <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
                    </div>
                    <div class="tab-pane fade" id="primarycontact" role="tabpanel">
                        <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                    </div>
                </div>
            </div>

          </div>


            <h6 class="text-uppercase mb-0">Related Product</h6>
            <hr/>
             <div class="row row-cols-1 row-cols-lg-3">
                   <div class="col">
                    <div class="card">
                        <div class="row g-0">
                          <div class="col-md-4">
                            <img src="assets/images/products/16.png" class="img-fluid" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h6 class="card-title">Light Grey Headphone</h6>
                              <div class="cursor-pointer my-2">
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-secondary"></i>
                              </div>
                              <div class="clearfix">
                                <p class="mb-0 float-start fw-bold"><span class="me-2 text-decoration-line-through text-secondary">$240</span><span>$199</span></p>
                             </div>
                            </div>
                          </div>
                        </div>
                      </div>
                   </div>
                   <div class="col">
                    <div class="card">
                        <div class="row g-0">
                          <div class="col-md-4">
                            <img src="assets/images/products/17.png" class="img-fluid" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h6 class="card-title">Black Cover iPhone 8</h6>
                              <div class="cursor-pointer my-2">
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                              </div>
                              <div class="clearfix">
                                <p class="mb-0 float-start fw-bold"><span class="me-2 text-decoration-line-through text-secondary">$179</span><span>$110</span></p>
                             </div>
                            </div>
                          </div>
                        </div>
                      </div>
                   </div>
                   <div class="col">
                    <div class="card">
                        <div class="row g-0">
                          <div class="col-md-4">
                            <img src="assets/images/products/19.png" class="img-fluid" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h6 class="card-title">Men Hand Watch</h6>
                              <div class="cursor-pointer my-2">
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-secondary"></i>
                                <i class="bx bxs-star text-secondary"></i>
                              </div>
                              <div class="clearfix">
                                <p class="mb-0 float-start fw-bold"><span class="me-2 text-decoration-line-through text-secondary">$150</span><span>$120</span></p>
                             </div>
                            </div>
                          </div>
                        </div>
                      </div>
                   </div>
               </div>


    </div>
</div>
<!--end page wrapper -->
@endsection
