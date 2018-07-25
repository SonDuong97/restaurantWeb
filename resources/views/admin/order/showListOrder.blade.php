@extends('admin.layouts.index')

@section('content')
	<div id="page-wrapper">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-lg-12">
	                <h1 class="page-header">Order
	                    <small>List</small>
	                </h1>
	            </div>
	            <!-- /.col-lg-12 -->
	            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                <thead>
	                    <tr align="center">
	                        <th>ID</th>
	                        <th>Email</th>
	                        <th>Username</th>
	                        <th>Total</th>
	                        <th>Status</th>
	                        {{-- <th>Delete</th> --}}
	                        <th>Edit</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    {{-- <tr class="odd gradeX" align="center">
	                        <td>1</td>
	                        <td>Áo Thun Nana</td>
	                        <td>200.000 VNĐ</td>
	                        <td>3 Minutes Age</td>
	                        <td>Hiện</td>
	                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
	                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
	                    </tr> --}}
	                    @foreach($orders as $order)
		                    <tr class="even gradeC" align="center">
		                        <td>{{$order->id}}</td>
		                        <td>{{$order->user->email}}</td>
		                        <td>{{$order->user->name}}</td>
		                        <td>{{$order->total_money}}</td>
		                        <td>{{$order->status}}</td>
		                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('editOrder', ['id' => $order->id])}}">Edit</a></td>
		                    </tr>
	                    @endforeach
	                </tbody>
	            </table>
	        </div>
	        <!-- /.row -->
	    </div>
	    <!-- /.container-fluid -->
	</div>
@endsection