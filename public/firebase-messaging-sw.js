// importScripts('https://www.gstatic.com/firebasejs/4.9.1/firebase.js');

importScripts("https://www.gstatic.com/firebasejs/7.6.1/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/7.6.1/firebase-messaging.js");
importScripts("https://www.gstatic.com/firebasejs/7.6.1/firebase-analytics.js");
importScripts("https://www.gstatic.com/firebasejs/7.6.1/firebase-auth.js");
importScripts("https://www.gstatic.com/firebasejs/7.6.1/firebase-firestore.js");

// Initialize Firebase
firebase.initializeApp({
    apiKey: "AIzaSyATyCbmV8_qWwsT7kdnQ8XoaA_1UBADmY4",
    authDomain: "base-2024.firebaseapp.com",
    projectId: "base-2024",
    storageBucket: "base-2024.appspot.com",
    messagingSenderId: "620286958548",
    appId: "1:620286958548:web:b1f0452ad27090a04ad441",
    measurementId: "G-V24CFNMXPK"
});

const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function(payload) {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);
    // Customize notification here
    const notificationTitle = payload.data.title;
    const notificationOptions = {
        title: payload.data.title,
        body: payload.data.body_ar,
    };

    return self.registration.showNotification(notificationTitle,
        notificationOptions);
});
