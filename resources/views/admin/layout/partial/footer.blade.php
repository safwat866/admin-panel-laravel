
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>


    <script src="{{ asset('/') }}dashboard/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('/') }}dashboard/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('/') }}dashboard/assets/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('/') }}dashboard/assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="{{ asset('/') }}dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('/') }}dashboard/assets/vendor/libs/hammer/hammer.js"></script>
    <script src="{{ asset('/') }}dashboard/assets/vendor/libs/i18n/i18n.js"></script>
    <script src="{{ asset('/') }}dashboard/assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="{{ asset('/') }}dashboard/assets/vendor/js/menu.js"></script>
    <script src="{{ asset('/') }}dashboard/assets/js/main.js"></script>
    <script src="{{ asset('/') }}dashboard/assets/vendor/libs/toastr/toastr.js"></script>
    <script src="{{ asset('/') }}dashboard/assets/vendor/libs/block-ui/block-ui.js"></script>

    <script !src="">
        // Get all input elements with type="number"
        const numberInputs = document.querySelectorAll('input[type="number"]');

        // Loop through all number input elements and add event listeners
        numberInputs.forEach(function(input) {
            input.addEventListener('input', function(event) {
                // Get the input value
                let inputValue = event.target.value;

                // Remove non-numeric characters using regular expression
                inputValue = inputValue.replace(/\D/g, '');

                // Update the input value with only numbers
                event.target.value = inputValue;
            });
        });
    </script>
    {{-- <x-socket /> --}}

    <script>
        localStorage.setItem('adminLang', $('html').attr('lang'))
    </script>

    <x-admin.firebase authType="admin"/>

    @yield('config-js')
    @yield('js')


