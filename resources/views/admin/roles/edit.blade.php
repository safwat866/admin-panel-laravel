@extends('admin.layout.master')

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('routes.admin.roles.create') }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="formAjax needs-validation" action="{{ route("roles.update", $role->id) }}" method="post"
                            novalidate>
                            @method("PUT")
                            @csrf
                            <div class="">
                                <div class="col-md-6 p-2 col-12">
                                    <label for="input-name">الاسم</label>
                                    <input type="text" class="form-control" required="" name="name" id="input-name" value="{{ $role->name }}" placeholder=" اكتب الاسم">
                                </div>

                                <div class="card overflow-hidden my-4 p-0 !max-w-[350px]" style="height: 360px">
                                    <div class="card-header bg-primary text-white header-elements">
                                        <span class="me-2">
                                            <label class="switch switch-info" for="gtx_2">
                                               
                                                </span>
                                                <span class="switch-label text-white">إعدادات الموقع </span>
                                            </label>
                                        </span>

                                        <div class="card-header-elements ms-auto">
                                            <label class="switch switch-info check_container" for="checkChilds_gtx_2">
                                                <input type="checkbox" id="checkChilds_gtx_2" class="switch-input checkChilds checkChilds_gtx_2" data-parent="gtx_2">
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label text-white">اختر الكل</span>
                                            </label>

                                        </div>
                                    </div>
                                    <!--  -->
                                   @foreach ($permissions as $permission)
                                    <div class="mt-3 mx-3">
                                            <div class="">
                                                <label class="switch switch-info check_container mb-2" for="{{ $permission->id }}">
                                                    <input type="checkbox"  class="switch-input childs gtx_2" name="permissions[]" id="{{ $permission->id }}" data-parent="gtx_2" value="{{ $permission->name }}"

                                                        @foreach ($permissionsWithRule as $pwr )
                                                            @if ($pwr->name == $permission->name)
                                                                checked
                                                            @endif
                                                        @endforeach
                                                    
                                                    >
                                                    <span class="switch-toggle-slider">
                                                        <span class="switch-on"></span>
                                                        <span class="switch-off"></span>
                                                    </span>
                                                    <span class="switch-label"> {{ $permission->name }} </span>
                                                </label>

                                            </div>
                                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                            </div>
                                            <div class="ps__rail-y" style="top: 0px; right: 324px;">
                                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                            </div>
                                        </div>
                                   @endforeach
                                    <!--  -->
                                </div>
                                <div class="col-12 d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn rounded-pill btn-primary  m-2 submit-button waves-effect waves-light">تعديل</button>
                                    <a href="{{ url()->previous() }}" type="reset"
                                        class="btn rounded-pill btn-outline-warning m-2">{{ __('admin.back') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection