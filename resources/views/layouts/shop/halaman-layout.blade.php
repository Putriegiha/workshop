<!DOCTYPE html>
<html lang="en">
<head>
   @include('includes.head')
</head>
<body>
    @include('layouts..navbar')

    <div>
        @yield('konten')
    </div>

    
    

    <div>
        @yield('footer')
    </div>

    @include('includes.script')