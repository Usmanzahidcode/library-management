<link rel="stylesheet" href="{{asset('assets/css/bootstraplocal.css')}}">
<style>
    body {
        display: flex;
        flex-direction: column;
        height: 100vh;
        justify-content: space-between;
    }

    html {
        height: 100vh;
        position: relative;
        overflow: hidden;
    }
    .absolute-element {
        position: absolute;
        right: 30px;
        bottom: 50%;
        transform: translate(0px, 50%);
        background-color: #3498db;
        color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        z-index: 9999; /* Places the element above other elements */
        animation: slideInRight 1s ease-in-out;

    }

    @keyframes slideInRight {
        0% {
            transform: translate(100%, 50%);
            opacity: 0;
        }
        100% {
            transform: translate(0, 50%);
            opacity: 1;
        }
    }
</style>
<div class="absolute-element">
    @if(Auth::check())
        <p class="m-0">Logged in as: {{Auth::user()->name}} - {{Auth::user()->email}}</p>
    @else
        <p class="m-0">User logged out</p>
    @endif
</div>
