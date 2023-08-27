<nav id="sidebar" class="side-bar relative">
    <p class="sidebar-app-title">
        {{Config::get('app.name')}}
    </p>
    <div class="relative">
        <ul class=" mb-16">
            <li>
                <a href="#" class="flex items-center @yield('admins')">
                    <i class="fal fa-user  pr-3"></i>
                    Admins
                </a>
            </li>
        </ul>

    </div>
    <button id="logout-btn" class=" absolute bottom-6 w-full text-center text-sm font-lato border-t border-gray-200 pt-3 pr-4">
            <i class="fal fa-sign-out-alt pr-4"></i>Logout
    </button>

    {{-- <form action="{{ route('admins.auth.signout') }}" method="POST" id="web-logout-form">
        @csrf

    </form> --}}
</nav>

<script type="text/javascript">
    $('#logout-btn').on('click', function(){
        console.log('logout btn clicked');
        // var storedData = JSON.parse(localStorage.getItem('vuex'));

        // var apiToken = storedData.TokenStore.token;

        // var url = `${storedData.ApiMethods.base_url}/api/management/logout`;
        // // console.log(url);

        // axios.post(url, {}, {
        //     headers: {
        //         Authorization: `Bearer ${apiToken}`
        //     }
        // }).then(function(response) {
        //     storedData.TokenStore.token = null;
        //     storedData.TokenStore.user = null;
        //     var updatedStoredData = JSON.stringify(storedData);
        //     localStorage.setItem('vuex', updatedStoredData);
        //     $('#web-logout-form').submit();
        // });

    });
</script>
