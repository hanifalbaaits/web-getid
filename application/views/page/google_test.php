<html lang="en">

<head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id"
        content="889889866932-muc9eneo1n5427og9mp36crm5bj6jev1.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>

<body>
    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
    <br />
    <a href="#" onclick="signOut();">Sign out</a>
    <script>
    function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
    }

    function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function() {
            console.log('User signed out.');
        });
    }
    </script>
</body>

</html>