@extends('backend.admin-master')
@section('site-title')
    {{__('Add New Student')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <!-- basic form start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                      <div class="header-wrap d-flex justify-content-between">
                          <h4 class="header-title">{{__('New Student')}}</h4>
                          <a href="{{route('admin.all.frontend.student')}}" class="btn btn-primary">{{__('All Students')}}</a>
                      </div>
                        <x-error-msg/>
                        <x-flash-msg/>
                        <form action="{{route('admin.frontend.new.student')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">{{__('Name')}}</label>
                                <input type="text" class="form-control"  id="name" name="name" placeholder="{{__('Enter name')}}">
                            </div>
                            <div class="form-group">
                                <label for="phone">{{__('Phone')}}</label>
                                <input type="text" class="form-control"  id="phone" name="phone" placeholder="{{__('Phone')}}">
                            </div>
                            <div class="form-group">
                                <label for="class_room">{{__('Class Room')}}</label>
                                <input type="text" class="form-control"  id="class_room" name="class_room" placeholder="{{__('Class Room')}}">
                            </div>

                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add New Student')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
