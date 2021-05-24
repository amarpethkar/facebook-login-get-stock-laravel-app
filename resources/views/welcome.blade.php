{{-- include app layout --}}
@extends('layouts.app')

{{-- stock content to be appned at app layout --}}
@section('content')
    <div class="container">
    <div>{{ session()->get('loggedInUser') }}</div>
        <div class="jumbotron text-center">
            <h1 id="heading">Welcome to Laravel Facebook Stock App</h1>
            <div id="profile"></div>
            <br>
            <hr>
        </div>
        <div id="loginHint" class="txt-align-center"></div>
    </div>

    <script>
        // If user is logged in show user profile else ask user to login using Facebook login button 
        if(loggedInUser) {
            let profile = `
                <h3>${loggedInUser.user_name}</h3>
                <ul class="list-group">
                    <li class="list-group-item">User ID: ${loggedInUser.user_fb_id}</li>
                    <li class="list-group-item">Email: ${loggedInUser.user_email}</li>
                </ul>
            `;
            document.getElementById('profile').innerHTML = profile;
            let loginHint = `
                <p>Click on Stock to get Stock Srice<p>
            `;
            document.getElementById('loginHint').innerHTML = loginHint;
        } else {
            let loginHint = `
                <p>Click on Facebook Log In Button<p>
            `;
            document.getElementById('loginHint').innerHTML = loginHint;
        }
    </script>
@endsection