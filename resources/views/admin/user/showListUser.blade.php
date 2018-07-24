@extends('admin.layouts.index')

@section('content')
	<div id="page-wrapper">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-lg-12">
	                <h1 class="page-header">User
	                    <small>List</small>
	                </h1>
	            </div>
	            <!-- /.col-lg-12 -->
	            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                <thead>
	                    <tr align="center">
	                        <th>ID</th>
	                        <th>Username</th>
	                        <th>Email</th>
	                        {{-- <th>Authorization</th> --}}
	                        {{-- <th>Created At</th> --}}
	                        {{-- <th>Delete</th> --}}
	                        <th>Edit</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    {{-- <tr class="odd gradeX" align="center">
	                        <td>1</td>
	                        <td>quoctuan</td>
	                        <td>Superadmin</td>
	                        <td>Hiện</td>
	                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
	                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
	                    </tr> --}}
	                    @foreach($users as $user)
		                    <tr class="even gradeC" align="center">
		                        <td>{{$user->id}}</td>
		                        <td>{{$user->name}}</td>
		                        <td>{{$user->email}}</td>
		                        {{-- <td>{{$user->created_at}}</td> --}}
		                        {{-- <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td> --}}
		                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('editUser', ['id' => $user->id])}}">Edit</a></td>
		                    </tr>
	                    @endforeach
	                    {{-- <tr class="odd gradeX" align="center">
	                        <td>3</td>
	                        <td>kuteo</td>
	                        <td>Member</td>
	                        <td>Hiện</td>
	                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
	                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
	                    </tr> --}}
	                </tbody>
	            </table>
	        </div>
	        <!-- /.row -->
	    </div>
	    <!-- /.container-fluid -->
	</div>
@endsection