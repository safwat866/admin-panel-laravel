@extends('admin.layout.master')

@section('css')
<link rel="stylesheet" href="{{ asset('admin/multipleFileUploader.css') }}">

@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="tab-content">

            <div class="tab-pane active show" id="tabs-home-9" role="tabpanel">
                <form action="{{ route("profile.update", auth()->user()->id) }}" method="POST" class="formAjax form-horizontal needs-validation" novalidate enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row">


                        <div class="settings-uploader col-md-12">
                            <div class="mb-3 w-100">
                                <label class="form-label">{{ __('admin.image') }}</label>
                                <input type="file" data-file="" class="form-control " data-input="avatar" name="avatar" accept="image/*">
                                <img src="{{ asset('storage/users/' . auth()->user()->profile ) }}" alt="" class="w-18 m-auto mt-2" id="user-profile">
                                <div class="files_uploader_container  p-2" data-container="avatar"></div>
                            </div>
                        </div>

                        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                        <script>
                            $("input[type='file']").on('change', function() {
                                if (this.files && this.files[0]) {
                                    $('#user-profile').attr('src', URL.createObjectURL(this.files[0]));
                                }
                            })
                        </script>


                        <div class="col-md-6 ">
                            <div class="mb-3">
                                <label for="input-name">الاسم : </label>
                                <input type="text" class="form-control @error('name') !border-red-600 @enderror" required

                                    name="name" id="input-name" value="{{ auth()->user()->name }}"
                                    placeholder=" اكتب الاسم">

                                @error('name')
                                <div class="invalid-feedback error_name !block">هذا الحقل مطلوب</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 ">
                            <div class="mb-3">
                                <label for="input-email">البريد الإلكتروني : </label>
                                <input type="email" class="form-control @error('email') !border-red-600 @enderror" required

                                    name="email" id="input-email" value="{{ auth()->user()->email }}"
                                    placeholder=" اكتب البريد الإلكتروني">

                                @error('email')
                                <div class="invalid-feedback error_name !block">هذا الحقل مطلوب</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 ">
                            <div class="mb-3">
                                <label for="input-phone">رقم الهاتف : </label>
                                <input type="number" class="form-control @error('number') !border-red-600 @enderror" required

                                    name="number" id="input-phone" value="{{ auth()->user()->number }}"
                                    placeholder=" اكتب رقم الهاتف">

                                @error('number')
                                <div class="invalid-feedback error_name !block">هذا الحقل مطلوب</div>
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
                                            <div class="invalid-feedback error_name !block">هذا الحقل مطلوب</div>
                                            @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-center mt-3">
                            <button type="submit" class="btn rounded-pill btn-primary  m-2 submit-button">حفظ</button>
                            <div class="btn rounded-pill btn-primary m-2 d-none uploadProgress"><i class="fas fa-spinner"></i></div>
                            <a href="" type="reset" class="btn rounded-pill btn-outline-warning m-2">رجوع</a>
                            </d>

                        </div>
                </form>

            </div>


        </div>
    </div>
</div>
@endsection