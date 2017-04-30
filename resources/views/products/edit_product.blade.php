@extends('layouts.app')
@section('title') Edit Product @endsection
@section('page_level_plugins_head')
    <link href="{{URL::asset('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{url('products')}}">Products</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="">Edit Product</a>
                </li>
            </ul>
            <div class="page-toolbar"></div>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Products
            <small>Edit</small>
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN VALIDATION STATES-->
                <div class="portlet light portlet-fit portlet-form bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-plus font-black"></i>
                            <span class="caption-subject font-black sbold uppercase">Edit Product</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="{{url('update_product',$product)}}" id="add_product_form" method="post" class="form-horizontal">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Category
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="category">
                                            @foreach($categories as $category)
                                                <option @if($category->id == $product->id_category) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Kodi
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" name="code"  data-required="1" class="form-control"  value="{{$product->code}}" placeholder="Vendos kodin e artikullit" /> </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Ngjyra
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" name="color"  data-required="1" class="form-control" value="{{$product->color}}" placeholder="Vendos ngjyren e artikullit"/> </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Numeracioni
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="numbering_from"  data-required="1" class="form-control" value="{{explode("-", $product->numbering)[0] }}" placeholder="Numri me i vogel"/>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="numbering_to"  data-required="1" class="form-control" value="{{explode("-", $product->numbering)[1] }}" placeholder="Numri me i madh"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Sasia
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" name="quantity"  data-required="1" class="form-control" value="{{$product->quantity}}" placeholder="Vendos sasine e artikullit"/> </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Cmimi i Blerjes
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" name="price_bought"  data-required="1" class="form-control" value="{{$product->price_bought}}" placeholder="Vendos cmimin me te cilin u ble artikulli"/> </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Cmimi me Dogane
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" name="price_customs"  data-required="1" class="form-control" value="{{$product->price_with_customs}}" placeholder="Vendos cmimin pas zhdganimit te artikullit"/> </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Cmimi i Shumices
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" name="price_wholesale"  data-required="1" class="form-control" value="{{$product->price_wholesale}}" placeholder="Vendos cmimin e shumices per artikullin"/> </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Cmimi i Klientit
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" name="price_customer"  data-required="1" class="form-control" value="{{$product->price_customer}}" placeholder="Vendos cmimin per klientin per artikullin"/> </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Description
                                    </label>
                                    <div class="col-md-9">
                                        <textarea class="wysihtml5 form-control" rows="6" name="description" data-error-container="#editor1_error">{{$product->description}}</textarea>
                                        <div id="editor1_error"> </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Note
                                    </label>
                                    <div class="col-md-9">
                                        <textarea class="wysihtml5 form-control" rows="6" name="note" data-error-container="#editor2_error">{{$product->note}}</textarea>
                                        <div id="editor2_error"> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">Submit</button>
                                        <button type="button" class="btn grey-salsa btn-outline">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END VALIDATION STATES-->
            </div>
        </div>
    </div>
@endsection
@section('page_level_plugins_foot')
    <script src="{{URL::asset('assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}" type="text/javascript"></script>
@endsection
@section('page_level_scripts_foot')
    <script src="{{URL::asset('assets/pages/scripts/form-validation.js')}}" type="text/javascript"></script>
@endsection