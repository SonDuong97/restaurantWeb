@extends('admin.layouts.index')

@section('content')
	<div id="page-wrapper">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-lg-12">
	                <h1 class="page-header">Product
	                    <small>Edit</small>
	                </h1>
	            </div>
	            <!-- /.col-lg-12 -->
	            <div class="col-lg-7" style="padding-bottom:120px">
	            	@if (count($errors) > 0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $error)
								{{$error}}<br>
							@endforeach
						</div>
	            	@endif

	            	@if(session('notification'))
	            		<div class="alert alert-success">
	            			{{session('notification')}}
	            		</div>
	            	@endif
	                <form action="{{route('updateEatingInfo', ['id' => $eating->id])}}" method="POST">
	                	{{csrf_field()}}
	                    <div class="form-group">
	                        <label>Name</label>
	                        <input class="form-control" name="txtName" value="{{$eating->eatingName}}" />
	                    </div>
	                    <div class="form-group">
	                        <label>Price</label>
	                        <input class="form-control" name="txtPrice" value="{{$eating->cost}}" " />
	                    </div>
	                    <div class="form-group">
	                        <label>Category</label>
	                        <select class="form-control" name="cateId">
                                <option value="{{$eating->category_id}}">{{$eating->category->categoryName}}</option>
                                @foreach($categories as $category)
                                	@continue($category->id == $eating->category_id)
	                                <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                @endforeach
                            </select>
	                        {{-- <input class="form-control" name="txtOrder" placeholder="Please Enter Category Keywords" /> --}}
	                    </div>
	                    <div class="form-group">
	                        <label>Intro</label>
	                        <textarea class="form-control" rows="3" name="txtIntro">{{$eating->description}}</textarea>
	                    </div>
	                    
	                    {{-- <div class="form-group">
	                        <label>Content</label>
	                        <textarea class="form-control" rows="3" name="txtContent"></textarea>
	                    </div>
	                    <div class="form-group">
	                        <label>Images</label>
	                        <input type="file" name="fImages">
	                    </div>
	                    
	                    <div class="form-group">
	                        <label>Product Description</label>
	                        <textarea class="form-control" rows="3"></textarea>
	                    </div>
	                    <div class="form-group">
	                        <label>Product Status</label>
	                        <label class="radio-inline">
	                            <input name="rdoStatus" value="1" checked="" type="radio">Visible
	                        </label>
	                        <label class="radio-inline">
	                            <input name="rdoStatus" value="2" type="radio">Invisible
	                        </label>
	                    </div> --}}
	                    <button type="submit" class="btn btn-default">Product Edit</button>
	                    {{-- <button type="reset" class="btn btn-default">Reset</button> --}}
	                <form>
	            </div>
	        </div>
	        <!-- /.row -->
	    </div>
	    <!-- /.container-fluid -->
	</div>
@endsection