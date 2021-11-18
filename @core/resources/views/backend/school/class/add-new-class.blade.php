@extends('backend.admin-master')
@section('site-title')
    {{__('Add New Class')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <!-- basic form start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                      <div class="header-wrap d-flex justify-content-between">
                          <h4 class="header-title">{{__('New Class')}}</h4>
                          <a href="{{route('admin.all.school.class')}}" class="btn btn-primary">{{__('All Classs')}}</a>
                      </div>
                        <x-error-msg/>
                        <x-flash-msg/>
                        <form action="{{route('admin.school.new.class')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">{{__('Name')}}</label>
                                <input type="text" class="form-control"  id="name" name="name" placeholder="{{__('Enter name')}}">
                            </div>
                            <div class="form-group">
                                <label for="description">{{__('Description')}}</label>
                                <input type="text" class="form-control" id="description" name="description"
                                       placeholder="{{__('Description')}}">
                            </div>
                            <div class="form-group">
                                <label for="edit_stage">{{__('Stage')}}</label>
                                <select name="stage_id" id="edit_stage" class="form-control">
                                    @foreach(\App\Stage::all() as $stage)
                                        <option value="{{$stage->id}}">{{$stage->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="edit_status">{{__('Status')}}</label>
                                <select name="status" class="form-control" id="edit_status">
                                    <option value="publish">{{__("Publish")}}</option>
                                    <option value="draft">{{__("Draft")}}</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add New Class')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
