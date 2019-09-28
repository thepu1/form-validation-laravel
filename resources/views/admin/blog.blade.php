@extends('admin.master')
@section('body')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <form action="{{route('add-blog')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card mt-5">
                        <div class="card-header text-center text-success">Form Validation Blog</div>
                        <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-2" for="name">Blog Name :</label>
                                <div class="col-md-10">
                                    <input type="text" name="blog_name" class="form-control" id="name">
                                    <span class="text-center text-danger">{{$errors->has('blog_name') ? $errors->first('blog_name') : ''}}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2" for="image">Blog Image :</label>
                                <div class="col-md-10">
                                    <input type="file" name="blog_image" class="form-control" id="image">
                                    <span class="text-center text-danger">{{$errors->has('blog_image') ? $errors->first('blog_image') : ''}}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2"></label>
                                <div class="col-md-10">
                                    <input type="submit" name="submit" class="btn btn-success btn-block" value="Submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <div class="card">
                   <div class="card-header text-center text-success">Blog Table</div>
                   <div class="card-body">
                       <table class="table-bordered table text-center">
                           <tr>
                               <th>Serial No</th>
                               <th>Blog Name</th>
                               <th>Blog Image</th>
                           </tr>
                           @php($i=1)
                           @foreach($blogs as $blog)
                               <tr>
                                   <td>{{$i++}}</td>
                                   <td>{{$blog->blog_name}}</td>
                                   <td><img src="{{asset($blog->blog_image)}}" alt="" width="150" height="100"></td>
                               </tr>
                               @endforeach
                       </table>
                   </div>
               </div>
            </div>
        </div>
    </div>
@endsection
