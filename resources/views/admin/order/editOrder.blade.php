@extends('admin.layouts.index')

@section('content')
	<div id="page-wrapper">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-lg-12">
	                <h1 class="page-header">Order
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
	                <form action="{{route('updateOrderInfo', ['id' => $order->id])}}" method="POST">
	                	{{csrf_field()}}
	                    <div class="form-group">
	                        <label>ID</label>
	                        <input class="form-control" name="id" value="{{$order->id}}" disabled />
	                    </div>
	                    <div class="form-group">
	                        <label>Email</label>
	                        <input class="form-control" name="email" value="{{$order->user->email}}" disabled />
	                    </div>
	                    <div class="form-group">
	                        <label>Username</label>
	                        {{-- <select class="form-control" name="cateId">
                                <option value="{{$order->category_id}}">{{$order->category->categoryName}}</option>
                                @foreach($categories as $category)
                                	@continue($category->id == $order->category_id)
	                                <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                @endforeach
                            </select> --}}
	                        <input class="form-control" name="username" value="{{$order->user->name}}" disabled />
	                    </div>
	                    <div class="form-group">
	                        <label>Total Money</label>
	                        <input class="form-control" name="totalMoney" value="{{$order->total_money}}" disabled />
	                    </div>
	                    <div class="form-group">
	                        <label>Status</label>
	                        <select class="form-control" name="status">
                                <option value="{{$order->status}}">{{$order->status}}</option>
                                <?php $statusTypes = ['Completed', 'Cancelled', 'Waiting']; ?>
                                @foreach($statusTypes as $status)
                                	@continue(strcmp($status, $order->status) == 0)
	                                <option value="{{$status}}">{{$status}}</option>
                                @endforeach
                            </select>
	                        {{-- <input class="form-control" name="username" value="{{$order->user->name}}" disabled /> --}}
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