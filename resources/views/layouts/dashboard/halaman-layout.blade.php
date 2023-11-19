<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body>
    <div class="d-flex">

        @include('layouts.dashboard.sidebar')

        <div class="col">
            @include('layouts.dashboard.navbar')
            <div class="py-3 container-fluid">
                @yield('konten')
            </div>
        </div>

    </div>

    @include('includes.script')
</body>

</html>