@extends('admin.layout.master')

@section('css')
<link rel="stylesheet" href="{{ asset('admin/multipleFileUploader.css') }}">
@endsection

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('routes.admin.admins.add') }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                    <form class="formAjax form-horizontal needs-validation" novalidate action="{{ route("admins.store") }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">صورة</label>
                                        <input type="file" class="form-control " data-input="avatar" name="avatar">
                                        <div class="files_uploader_container  p-2" data-container="avatar"></div>
                                    </div>
                                </div>

                                <div class="col-md-6 ">
                                    <div class="mb-3">
                                        <label for="input-first_name">الاسم الأول : </label>
                                        <input type="text" value="{{ old("name") }}" class="form-control @error('name') !border-red-600 @enderror" required

                                            name="name" id="input-first_name" value=""
                                            placeholder=" اكتب الاسم الأول">

                                            @error("name")
                                                <div class="invalid-feedback error_first_name !block">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 ">
                                    <div class="mb-3">
                                        <label for="input-email">البريد الإلكتروني : </label>
                                        <input type="email" class="form-control @error('email') !border-red-600 @enderror" required

                                            name="email" id="input-email" value=""
                                            placeholder=" اكتب البريد الإلكتروني"
                                            value="{{ old("email") }}">

                                            @error("email")
                                                <div class="invalid-feedback error_first_name !block">{{ $message }}</div>
                                            @enderror
                                           
                                    </div>
                                </div>


                                <div class="mb-3 col">
                                    <div class="mb-3">
                                        <label for="input-phone">رقم الهاتف : </label>
                                        <input type="number" class="form-control @error('number') !border-red-600 @enderror" required

                                            name="number" id="input-phone" value=""
                                            placeholder=" اكتب رقم الهاتف"
                                            value="{{ old( "number") }}">

                                            @error("number")
                                                <div class="invalid-feedback error_first_name !block">{{ $message }}</div>
                                            @enderror

                                           
                                    </div>
                                </div>

                                <div class="col-md-6 ">
                            <div class="mb-3">
                                <div class="form-password-toggle">
                                    <label for="input-password">كلمة المرور : </label>
                                    <div class="input-group">
                                        <input type="password" class="form-control @error('password') !border-red-600 @enderror" id="input-password"
                                            value=""
                                            name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password-password" />
                                        <span id="password-password" class="input-group-text cursor-pointer @error('password') !border-red-600 @enderror"><i
                                                class="ti ti-eye-off"></i></span>
                                            </div>
                                            @error('password')
                                            <div class="invalid-feedback error_name !block">{{ $message }}</div>
                                            @enderror
                                </div>
                            </div>
                        </div>


                                <div class="col-12 d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn rounded-pill btn-primary  m-2 submit-button">إضافة</button>
                                    <div class="btn rounded-pill btn-primary m-2 d-none uploadProgress"><i class="fas fa-spinner"></i></div>
                                    <a href="{{ route("users.index") }}" type="reset"
                                        class="btn rounded-pill btn-outline-warning m-2">رجوع</a>
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