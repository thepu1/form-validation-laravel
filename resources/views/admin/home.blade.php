@extends('admin.master')
@section('body')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card mt-5">
                        <div class="card-header text-center text-success">Form Validation</div>
                        <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                       <div class="card-body">
                           <div class="form-group row">
                               <label class="col-md-2" for="name">Name :</label>
                               <div class="col-md-10">
                                   <input type="text" name="name" class="form-control" id="name">
                                   <span class="text-center text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                               </div>
                           </div>

                           <div class="form-group row">
                               <label class="col-md-2" for="email">Email :</label>
                               <div class="col-md-10">
                                   <input type="email" name="email" class="form-control" id="email">
                                   <span class="text-center text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                               </div>
                           </div>
                           <div class="form-group row">
                               <label class="col-md-2" for="image">Image :</label>
                               <div class="col-md-10">
                                   <input type="file" name="image" class="form-control" id="image">
                                   <span class="text-center text-danger">{{$errors->has('image') ? $errors->first('image') : ''}}</span>
                               </div>
                           </div>

                           <div class="form-group row">
                               <label class="col-md-2" for="gender">Gender :</label>
                               <div class="col-md-10">
                                   <input type="radio" name="gender" class="" id="gender" value="1"> Male
                                   <input type="radio" name="gender" class="" id="gender" value="0">
                                   <span class="text-center text-danger">{{$errors->has('gender') ? $errors->first('gender') : ''}}</span>
                               </div>
                           </div>

                           <div class="form-group row">
                               <label class="col-md-2"></label>
                               <div class="col-md-5">
                                   <input type="submit" name="submit" class="btn btn-success btn-block" value="Submit">
                               </div>
                           </div>

                       </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
