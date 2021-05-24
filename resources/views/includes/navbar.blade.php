

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Laravel Facebook Stock</a>
        <div class="collapse navbar-collapse">
            <div id="navigation" class='nav-width'></div>
            <div id="actionBtn" class=''></div>
        </div>
    </div>
</nav>

{{-- Update navbar based on user logged in status. If user is not logged in show facebook logoin button else show navbar and logout button --}}
<script>
    if(loggedInUser) {
        let nav = `
            <ul class="nav navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href='/stock/${loggedInUser.user_fb_id}'>Stock</a>
                </li>
            </ul>
        
        `;
        document.getElementById('navigation').innerHTML = nav;

        let btn = `
            <ul class="nav navbar-nav me-auto mb-2 mb-md-0 navbar-right">
                <li><a id="logout" href='#' onClick="logout()"><button type="button" class="btn btn-outline-secondary">Log Out</button></a></li>
            </ul>
        `;
        document.getElementById('actionBtn').innerHTML = btn;
    } else {
        let btn = `
            <ul class="nav navbar-nav me-auto mb-2 mb-md-0 navbar-right">
                <li class="nav-item">
                    <fb:login-button 
                        id="fb-btn"
                        scope="public_profile,email"
                        onlogin="checkLoginState();">
                    </fb:login-button>
                </li>
            </ul>
        `;
        document.getElementById('actionBtn').innerHTML = btn;
    }
</script>