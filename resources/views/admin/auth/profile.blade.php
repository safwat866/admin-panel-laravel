@extends('admin.layout.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('admin/multipleFileUploader.css') }}">

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="tab-content">

                <div class="tab-pane active show" id="tabs-home-9" role="tabpanel">
                    <form action="{{ route('admin.profile.update') }}" method="POST" class="formAjax form-horizontal needs-validation" novalidate enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row">


                            <div class="settings-uploader col-md-12">
                                <div class="mb-3 w-100">
                                    <label class="form-label">{{ __('admin.image') }}</label>
                                    <input type="file" data-file="{{ $user->avatar }}" class="form-control " data-input="avatar" name="avatar" accept="image/*">
                                    <div class="files_uploader_container  p-2" data-container="avatar"></div>
                                </div>
                            </div>


                            <div class="col-md-6 ">
                                <x-admin.inputs.text type="text" name="name" value="{{ $user->name }}" label="{{ __('admin.name') }}" required placeholder="{{ __('admin.write') . __('admin.name') }}" inValidMessage="{{ __('site.this_field_is_required') }}"/>
                            </div>

                            <div class="col-md-6 ">
                                <x-admin.inputs.text type="email" name="email" value="{{ $user->email }}" label="{{ __('admin.email') }}" required placeholder="{{ __('admin.write') . __('admin.email') }}" inValidMessage="{{ __('site.this_field_is_required') }}"/>
                            </div>

                            <div class="col-md-6 ">
                                <x-admin.inputs.text type="number" name="phone" value="{{ $user->phone }}" label="{{ __('admin.phone') }}" required placeholder="{{ __('admin.write') . __('admin.phone') }}" inValidMessage="{{ __('site.this_field_is_required') }}"/>
                            </div>


                            <div class="col-md-6 ">
                                <x-admin.inputs.password name="password" label="{{ __('admin.password') }}" placeholder="{{ __('admin.write') . __('admin.password') }}" inValidMessage="{{ __('site.this_field_is_required') }}"/>
                            </div>

                            <div class="col-12 d-flex justify-content-center mt-3">
                                <x-admin.inputs.submitButton name="{{__('admin.save')}}"/>
                                <a href="{{ url()->previous() }}" type="reset" class="btn rounded-pill btn-outline-warning m-2">{{__('admin.back')}}</a>
                            </div>

                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>
@endsection
<x-admin.config validation toster/>

@section('js')
    <x-admin.inputs.formAjax/>
    @include('admin.shared.fileuploader.fileuploader')
@endsection
