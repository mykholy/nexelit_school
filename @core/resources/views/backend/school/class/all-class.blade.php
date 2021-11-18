@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0 !important;
        }

        div.dataTables_wrapper div.dataTables_length select {
            width: 60px;
            display: inline-block;
        }
    </style>
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
@endsection
@section('site-title')
    {{__('All Classes')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <x-error-msg/>
                                    <x-flash-msg/>
                                    <h4 class="header-title">{{__('All Classes')}}</h4>
                                    <div class="bulk-delete-wrapper">
                                        <div class="select-box-wrap">
                                            <select name="bulk_option" id="bulk_option">
                                                <option value="">{{{__('Bulk Action')}}}</option>
                                                <option value="delete">{{{__('Delete')}}}</option>
                                            </select>
                                            <button class="btn btn-primary btn-sm"
                                                    id="bulk_delete_btn">{{__('Apply')}}</button>
                                        </div>
                                    </div>
                                    <div class="data-tables datatable-primary">
                                        <table id="all_class_table" class="text-center">
                                            <thead class="text-capitalize">
                                            <tr>
                                                <th class="no-sort">
                                                    <div class="mark-all-checkbox">
                                                        <input type="checkbox" class="all-checkbox">
                                                    </div>
                                                </th>
                                                <th>{{__('ID')}}</th>
                                                <th>{{__('Name')}}</th>
                                                <th>{{__('Description')}}</th>
                                                <th>{{__('Stage')}}</th>
                                                <th>{{__('Status')}}</th>
                                                <th>{{__('Action')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($all_class as $data)
                                                <tr>
                                                    <td>
                                                        <div class="bulk-checkbox-wrapper">
                                                            <input type="checkbox" class="bulk-checkbox"
                                                                   name="bulk_delete[]" value="{{$data->id}}">
                                                        </div>
                                                    </td>
                                                    <td>{{$data->id}}</td>
                                                    <td>{{$data->name}}</td>
                                                    <td>{{$data->description}}</td>
                                                    <td>{{$data->stage->name}}</td>
                                                    <td>
                                                        <x-status-span :status="$data->status"/>
                                                    </td>
                                                    <td>
                                                        <x-delete-popover
                                                                :url="route('admin.school.delete.class',$data->id)"/>
                                                        <a href="#"
                                                           data-id="{{$data->id}}"
                                                           data-name="{{$data->name}}"
                                                           data-description="{{$data->description}}"
                                                           data-status="{{$data->status}}"
                                                           data-stage_id="{{$data->stage_id}}"
                                                           data-toggle="modal"
                                                           data-target="#class_edit_modal"
                                                           class="btn btn-xs btn-primary btn-sm mb-3 mr-1 class_edit_btn"
                                                        >
                                                            <i class="ti-pencil"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Primary table end -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="class_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Class Details Edit')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.school.class.update')}}" id="class_edit_modal_form" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="class_id" id="class_id">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{__('Name')}}</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="{{__('Enter name')}}">
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

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Save changes')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('backend.partials.media-upload.media-upload-markup')
@endsection

@section('script')
    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {

            $('#all_class_table').DataTable({
                "order": [[1, "desc"]],
                'columnDefs': [{
                    'targets': 'no-sort',
                    'orderable': false
                }]
            });

            $(document).on('click', '.class_edit_btn', function (e) {
                e.preventDefault();
                var form = $('#class_edit_modal_form');
                var el = $(this);
                var status = el.data('status');
                form.find('#class_id').val(el.data('id'));
                form.find('#name').val(el.data('name'));
                form.find('#description').val(el.data('description'));
                form.find('#edit_status option[value="'+status+'"]').attr('selected',true);
                form.find('#edit_stage option[value="'+el.data('stage_id')+'"]').attr('selected',true);
            });

            $(document).on('click', '#bulk_delete_btn', function (e) {
                e.preventDefault();

                var bulkOption = $('#bulk_option').val();
                var allCheckbox = $('.bulk-checkbox:checked');
                var allIds = [];
                allCheckbox.each(function (index, value) {
                    allIds.push($(this).val());
                });
                if (allIds != '' && bulkOption == 'delete') {
                    $(this).text('{{__('Deleting...')}}');
                    $.ajax({
                        'type': "POST",
                        'url': "{{route('admin.all.school.class.bulk.action')}}",
                        'data': {
                            _token: "{{csrf_token()}}",
                            ids: allIds
                        },
                        success: function (data) {
                            location.reload();
                        }
                    });
                }

            });

            $('.all-checkbox').on('change', function (e) {
                e.preventDefault();
                var value = $('.all-checkbox').is(':checked');
                var allChek = $(this).parent().parent().parent().parent().parent().find('.bulk-checkbox');
                //have write code here fr
                if (value == true) {
                    allChek.prop('checked', true);
                } else {
                    allChek.prop('checked', false);
                }
            });


        });
    </script>
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    @include('backend.partials.media-upload.media-js')
@endsection
