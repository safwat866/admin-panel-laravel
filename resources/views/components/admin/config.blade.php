@section('config-css')

    @if ($sweetAlert2)
        <link rel="stylesheet" href="{{ asset('/') }}dashboard/assets/vendor/libs/sweetalert2/sweetalert2.css">
    @endif

    @if ($datePickr)
        <link rel="stylesheet" href="{{ asset('/') }}dashboard/assets/vendor/libs/flatpickr/flatpickr.css">
    @endif

    @if ($toster)
        <link rel="stylesheet" href="{{ asset('/') }}dashboard/assets/vendor/libs/toastr/toastr.css">
    @endif


    @if ($validation)
        <link rel="stylesheet" href="{{ asset('/') }}dashboard/assets/vendor/libs/@form-validation/umd/styles/index.min.css">
    @endif

    @if ($select2)
        <link rel="stylesheet" href="{{ asset('/') }}dashboard/assets/vendor/libs/select2/select2.css">
    @endif

    @if ($stepper)
        <link rel="stylesheet" href="{{ asset('/') }}dashboard/assets/vendor/libs/bs-stepper/bs-stepper.css" />
    @endif
    @if ($fancyBox)
        <link rel="stylesheet" href="{{ asset('/') }}dashboard/assets/vendor/libs/fancybox/dist/jquery.fancybox.css" />
    @endif


@stop

@section('config-js')

    @if ($sweetAlert2)
        <script src="{{ asset('/') }}dashboard/assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
    @endif

    @if ($datePickr)
        <script src="{{ asset('/') }}dashboard/assets/vendor/libs/flatpickr/flatpickr.js"></script>
        @if (locale() == 'ar')
            <script src="{{ asset('/') }}dashboard/assets/vendor/libs/flatpickr/flatpickrAr.js"></script>
        @endif

        <script>
            flatpickr('.birth_date', {
                disableMobile: true,
                locale: "{{ app()->getLocale() }}",
                dateFormat: "Y-m-d",
                mode:"single",
                maxDate:'{{ now()->subYears(15)->format('Y-m-d') }}'
            });

            flatpickr('.date', {
                disableMobile: true,
                locale: "{{ app()->getLocale() }}",
                dateFormat: "Y-m-d",
                mode:"single",
            });
        </script>
    @endif



    @if ($validation)
        <script src="{{ asset('/') }}dashboard/assets/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
        <script src="{{ asset('/') }}dashboard/assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
        <script src="{{ asset('/') }}dashboard/assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>
        <script src="{{ asset('/') }}dashboard/assets/js/form-validation.js"></script>
    @endif

    @if ($select2)
        <script src="{{ asset('/') }}dashboard/assets/vendor/libs/select2/select2.js"></script>
        <script>
            $('.select2').select2({
                "language": {
                    "noResults": function(){
                        return "{{ __('admin.noResults') }}";
                    }
                }});
            $('.modal .select2').select2({
                dropdownParent: $('.modal'),
                "language": {
                    "noResults": function(){
                        return "{{ __('admin.noResults') }}";
                    }
                }});


            $('.offcanvas .select2').select2({
                dropdownParent: $('.offcanvas-body'),
                "language": {
                    "noResults": function(){
                        return "{{ __('admin.noResults') }}";
                    }
                }});
        </script>
    @endif

    @if ($stepper)
        <script src="{{ asset('/') }}dashboard/assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
        <script src="{{ asset('/') }}dashboard/assets/js/form-wizard-icons.js"></script>
    @endif

    @if ($ckeditor)
        <script src="https://cdn.ckeditor.com/4.16.2/full-all/ckeditor.js"></script>
    @endif

    @if ($scrollbar)
        <script>
            $('.contentHolder').each((index, element) => {
                new PerfectScrollbar(element);
            });
        </script>
    @endif

    @if ($validateNumber)
        <script>
            // Get all input elements with type="number"
            const numberInputs = document.querySelectorAll('input[type="number"]');

            // Loop through all number input elements and add event listeners
            numberInputs.forEach(function(input) {
                input.addEventListener('input', function(event) {
                    // Get the input value
                    let inputValue = event.target.value;

                    // Remove non-numeric characters using regular expression
                    inputValue = inputValue.replace(/[^\d.-]/g, '');

                    // Update the input value with only numbers
                    event.target.value = inputValue;
                });
            });
        </script>
    @endif

    @if ($fancyBox)
        <script src="{{ asset('/') }}dashboard/assets/vendor/libs/fancybox/dist/jquery.fancybox.min.js"></script> @endif
              @if ($toster)
        <script src="{{ asset('/') }}dashboard/assets/vendor/libs/toastr/toastr.js"></script>
    @endif

@stop
