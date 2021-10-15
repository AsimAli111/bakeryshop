@extends('adminpannel.index')
@section('key')
        <div style="" class="row text-center">
            <h3>Aylıq satış statistikası</h3>
        </div>
            <img style="width: 600px;height: 400px" src="{{asset('/images/home.jpg')}}">
    <script>
        $('.active').removeClass('active');
        $('.home_page').addClass('active');
    </script>
    @endsection
