@extends('admin.layouts.index')

@section('content')
	<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Name</th>
{{--                             <th>Category Parent</th>
                            <th>Status</th> --}}
                            {{-- <th>Delete</th> --}}
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category as $cate)
                            <tr class="odd gradeX" align="center">
                                <td>{{$cate->id}}</td>
                                <td>{{$cate->categoryName}}</td>
                                {{-- <td>None</td>
                                <td>Hiện</td> --}}
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('deleteCate', ['id' => $cate->id])}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('editCate', ['id' => $cate->id])}}">Edit</a></td>
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