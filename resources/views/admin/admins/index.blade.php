@extends('admin.layout.master')

@section("content")

<div class="content-body">
    <div class="table_buttons mb-1">
        <div class="flex items-center">
            <div>
                <a href="{{route("admins.create")}}"
                    class="btn btn-primary waves-effect waves-light m-2"><i class="fa fa-plus"></i> إضافة</a>
            </div>
            <form action="{{ route('admins.bulkDelete') }}" method="post" id="bulk_delete">
                @csrf
                <button type="submit" id="delete_product_main" data-route="http://127.0.0.1:8080/admin/users/delete/all"
                    class="btn btn-danger waves-effect waves-light m-2 delete_all_button !hidden"><i
                        class="fa fa-trash"></i> حذف المحدد</button>
            </form>
        </div>

    </div>



    <style>
        .bordered-table {
            width: 100%;

        }

        .bordered-table th,
        .bordered-table td {
            border-bottom: 1px solid #dbdade;
            /* border-bottom: 1px solid #434968; */
            padding: 12px;
            text-align: center;
            vertical-align: middle;
        }

        html.dark-style .bordered-table th,
        html.dark-style .bordered-table td {
            border-bottom: 1px solid #434968;
        }

        .table_btn {
            border: none;
            padding: 8px 14px;
            border-radius: 6px;
            color: #fff;
        }


        .product_image {
            width: 100px;
        }

        .add_new_product {
            text-decoration: none;
            border: none;
            padding: 10px 17px;
            border-radius: 0.25em;
            color: white;
            display: block;
            width: fit-content;
        }

        .addProduct_form {
            width: 400px;
        }

        .display_none {
            display: none;
        }

        input[type="checkbox"] {
            width: 20px;
            height: 20px;
            accent-color: red;
            border: 2px solid red;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            vertical-align: middle;
        }
    </style>

    <div class="flex gap-3">

    </div>

    <div class="table_container">
        <table class="bordered-table">
            <thead>
                <tr>
                    <th><input type="checkbox" name="" id="main_checkbox"></th>
                    <th>#</th>
                    <th>الصورة</th>
                    <th>اسم المستخدم</th>
                    <th>الاميل</th>
                    <th>الصلاحيات</th>
                    <th> عمليات</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($admins as $admin)
                <tr>
                <th><input type="checkbox" value="{{ $admin->id }}" class="product_checkbox"></th>
                <th>{{$admin->id}}</th>
                    <th class="flex justify-center items-center"><img class="w-10" src="{{ asset("storage/users/" . $admin->profile) }}" /></th>
                    <th>{{ $admin->name }}</th>
                    <th>{{$admin->email}}</th>
                    <th>{{$admin->roles->pluck('name')->implode(', ')}}</th>
                    <th class="product-action">
                        <a class="btn rounded-pill btn-primary" href="{{route('admins.edit', $admin->id)}}">
                            <i class="fa fa-edit"></i>
                        </a>
                        @if ($admin->name != 'Admin')
                            <a class="delete-row btn rounded-pill btn-danger mx-2 !text-white" onclick="event.preventDefault();document.getElementById('admin-delete-form').submit();"><i class="fa fa-trash"></i></a>
                        @endif

                        <form action="{{ route('admins.destroy', $admin->id) }}" method="POST" id="admin-delete-form">
                            @method('DELETE')
                            @csrf
                        </form>
                    </th>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

        @error('permission')
            <script>
                alert("{{ $message }}")
            </script>
        @enderror
        
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $("#main_checkbox").on("change", function(e) {
            if ($(this).is(':checked')) {
                $(".product_checkbox").prop("checked", true)
                $("#delete_product_main").removeClass("!hidden");
            } else {
                $(".product_checkbox").prop("checked", false)
                $("#delete_product_main").addClass("!hidden");
            }
        })

        $(".product_checkbox").on("change", function(event) {
            const checked = $(".product_checkbox:checked");
            if ($(this).is(':checked')) {
                $("#delete_product_main").removeClass("!hidden");
            } else {
                if (checked.length == 0) {
                    $("#delete_product_main").addClass("!hidden");
                }
            }
        })

        $("#bulk_delete").on("submit", (e) => {
            e.preventDefault();

            let productsId = [];
            $('.product_checkbox:checked').each(function() {
                productsId.push($(this).val());
            });

            if (productsId.length == 0) {
                alert("please check products to delete");
            }

            productsId.forEach((value, index) => {
                let inputs = `<input type="hidden" name="users[]" value="${value}"/>`;
                $("#bulk_delete").append(inputs)
            })


            document.getElementById("bulk_delete").submit();
        })
    </script>
    @endsection