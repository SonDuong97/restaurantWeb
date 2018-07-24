@extends('admin.layouts.index')

@section('content')
	<div id="page-wrapper">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-lg-12">
	                <h1 class="page-header">Product
	                    <small>List</small>
	                </h1>
	            </div>
	            <!-- /.col-lg-12 -->
	            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                <thead>
	                    <tr align="center">
	                        <th>ID</th>
	                        <th>Name</th>
	                        <th>Price</th>
	                        <th>Description</th>
	                        <th>Category</th>
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
	                    @foreach($eating as $product)
		                    <tr class="even gradeC" align="center">
		                        <td>{{$product->id}}</td>
		                        <td>{{$product->eatingName}}</td>
		                        <td>{{$product->cost}} USD</td>
		                        <td>{{$product->description}}</td>
		                        <td>{{$product->category->categoryName}}</td>
		                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('deleteEating', ['id' => $product->id])}}"> Delete</a></td>
		                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('editProduct', ['id' => $product->id])}}">Edit</a></td>
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