<!-- FireBase -->
<!-- The core Firebase JS SDK is always required and must be listed first -->
{{-- <script src="https://www.gstatic.com/firebasejs/7.6.1/firebase.js"></script> --}}
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-messaging.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-firestore.js"></script>


<script>
    // Your web app's Firebase configuration
    // TODO: change this configuration
    const firebaseConfig = {
        apiKey: "AIzaSyATyCbmV8_qWwsT7kdnQ8XoaA_1UBADmY4",
        authDomain: "base-2024.firebaseapp.com",
        projectId: "base-2024",
        storageBucket: "base-2024.appspot.com",
        messagingSenderId: "620286958548",
        appId: "1:620286958548:web:b1f0452ad27090a04ad441",
        measurementId: "G-V24CFNMXPK"
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    //firebase.analytics();

    const messaging = firebase.messaging();
    window.fcmMessageing = messaging;

    //messaging.usePublicVapidKey("");

    Notification.requestPermission().then((permission) => {
        if (permission === 'granted') {

        } else {

        }
    });

    messaging.getToken().then((currentToken) => {
        if (currentToken) {

            // console.log(currentToken)

            function setDevice(guardType) {
                let options = {
                    url: '/',
                    method: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        device_id: currentToken,
                        device_type: 'web',
                        guard: guardType,
                    },
                };
                $.ajax(options);
            }

            @if (
                $authType == 'admin' &&
                    auth()->guard('admin')->check() &&
                    empty(session()->get('admin_device_id')))
            setDevice('{{ $authType }}');
            @elseif (
                $authType == 'provider' &&
                    auth()->guard('provider')->check() &&
                    empty(session()->get('provider_device_id')))
            setDevice('{{ $authType }}');
            @elseif ($authType == 'web' && auth()->check() && empty(session()->get('web_device_id')))
            setDevice('{{ $authType }}');
            @endif






        }
    }).catch((err) => {
        console.log('An error occurred while retrieving token. ', err);
    });

    messaging.onMessage(function (payload) {

        {{--if (payload['data']['guard'] == '{{ $authType }}') {--}}
        pushFcmNotification(payload);
        // }

    });

    function pushFcmNotification(payload) {
        let countNotify = $('#countNotify');
        countNotify.text(parseInt(countNotify.text()) + 1);
        let x = document.getElementById("soundNotify");
        x.play();
        toastr.options.onclick = function () {
            window.location.href = payload['notification']['click_action'];
        }

        toastr.info(payload['notification']['body'], payload['notification']['title']);

    }
</script>
