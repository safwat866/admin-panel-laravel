@extends('admin.layout.master')

@section("content")

    <div class="content-body">
        <div class="table_buttons mb-1">
            <div class="flex items-center">
                <div>
                    <a href="http://127.0.0.1:8080/admin/users/create"
                        class="btn btn-primary waves-effect waves-light m-2"><i class="fa fa-plus"></i> إضافة</a>
                </div>
                <form action="" method="post" id="bulk_delete">
                    @csrf
                    <button type="button" id="delete_product_main" data-route="http://127.0.0.1:8080/admin/users/delete/all"
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
                border-bottom: 1px solid #dee2e6;
                padding: 8px;
                text-align: center;
                vertical-align: middle;
            }

            .bordered-table thead {
                background-color: #f8f9fa;
                font-weight: bold;
            }

            .bordered-table tbody tr:hover {
                background-color: #f1f1f1;
            }

            .table_btn {
                border: none;
                padding: 8px 14px;
                border-radius: 6px;
                color: #fff;
                margin: 5px;
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
                        <th> الصلاحية </th>
                        <th>عمليات</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <th><input type="checkbox" name="" class="product_checkbox"></th>
                        <th>Ahmed</th>
                        <th><img src="ff" class="w-14" /></th>
                        <th>Ahmed</th>
                        <th>ahmed</th>
                        <th>Ahmed</th>
                        <th>
                            <div class="flex justify-center">
                                <form action="" method="get">
                                    @csrf
                                    <button type="submit" class="table_btn">
                                        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="m3.99 16.854-1.314 3.504a.75.75 0 0 0 .966.965l3.503-1.314a3 3 0 0 0 1.068-.687L18.36 9.175s-.354-1.061-1.414-2.122c-1.06-1.06-2.122-1.414-2.122-1.414L4.677 15.786a3 3 0 0 0-.687 1.068zm12.249-12.63 1.383-1.383c.248-.248.579-.406.925-.348.487.08 1.232.322 1.934 1.025.703.703.945 1.447 1.025 1.934.058.346-.1.677-.348.925L19.774 7.76s-.353-1.06-1.414-2.12c-1.06-1.062-2.121-1.415-2.121-1.415z"
                                                fill="#000000" />
                                        </svg></button>
                                </form>
                                <form action="" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="table_btn"><svg width="20px" height="20px"
                                            viewBox="0 -0.5 21 21" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="Dribbble-Light-Preview"
                                                    transform="translate(-179.000000, -360.000000)" fill="#000000">
                                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                                        <path
                                                            d="M130.35,216 L132.45,216 L132.45,208 L130.35,208 L130.35,216 Z M134.55,216 L136.65,216 L136.65,208 L134.55,208 L134.55,216 Z M128.25,218 L138.75,218 L138.75,206 L128.25,206 L128.25,218 Z M130.35,204 L136.65,204 L136.65,202 L130.35,202 L130.35,204 Z M138.75,204 L138.75,200 L128.25,200 L128.25,204 L123,204 L123,206 L126.15,206 L126.15,220 L140.85,220 L140.85,206 L144,206 L144,204 L138.75,204 Z"
                                                            id="delete-[#1487]">
                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg></button>
                                </form>
                            </div>
                        </th>
                    </tr>

                </tbody>
            </table>
        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>
            $("#main_checkbox").on("change", function (e) {
                if ($(this).is(':checked')) {
                    $(".product_checkbox").prop("checked", true)
                    $(".product_checkbox").closest("tr").addClass("bg-blue-100");
                    $("#delete_product_main").removeClass("!hidden");
                } else {
                    $(".product_checkbox").prop("checked", false)
                    $(".product_checkbox").closest("tr").removeClass("bg-blue-100");
                    $("#delete_product_main").addClass("!hidden");
                }
            })

            $(".product_checkbox").on("change", function (event) {
                const checked = $(".product_checkbox:checked");
                if ($(this).is(':checked')) {
                    $(event.target).closest("tr").addClass("bg-blue-100");
                    $("#delete_product_main").removeClass("!hidden");
                } else {
                    if (checked.length == 0) {
                        $("#delete_product_main").addClass("!hidden");
                    }
                    $(event.target).closest("tr").removeClass("bg-blue-100");
                }
            })

            $("#bulk_delete").on("submit", (e) => {
                e.preventDefault();

                let productsId = [];
                $('.product_checkbox:checked').each(function () {
                    productsId.push($(this).val());
                });

                if (productsId.length == 0) {
                    alert("please check products to delete");
                }

                productsId.forEach((value, index) => {
                    let inputs = `<input type="hidden" name="products[]" value="${value}"/>`;
                    $("#bulk_delete").append(inputs)
                })


                document.getElementById("bulk_delete").submit();
            })
        </script>


@endsection