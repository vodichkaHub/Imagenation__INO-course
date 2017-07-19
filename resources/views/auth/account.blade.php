@extends('layouts.mainLayout')
@section('title', 'Account')
    @section('content')

            <div class="container-fluid">
                <div class="main">
                    <h1 class="main__profile">Profile</h1>
                    
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="main__h2-portfolio">Portfolio</h3>
                        <h5 class="main__add-image">Add new image in your collection:</h5>
                    </div>

                    <div class="col-md-4">
                    <h3 class="main__h3-personal">Personal Info</h3>
                        <div class="main__avatar-big">
                            @if (file_exists(public_path() . '/img/avatars/' . Auth::user()->id . '.jpeg')) 
                            <img src="{{ URL::asset('img/avatars/' . Auth::user()->id . '.jpeg') }}" class="home__avatar" alt="avatar">
                            @else
                                <img src="{{ URL::asset('img/avatars/DefaultAvatar.png') }}" class="home__avatar" alt="avatar">
                            @endif
                            <p>(Click on photo, if u going to reset this)</p>   

                            <div class="main__avatar-choose">
                                <form action="{{ route('setAvatar') }}" method="post" enctype="multipart/form-data"> 
                                    {{ csrf_field() }}
                                    <input class="select" type="file" name="ava">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" value="Set" class="btn btn-default btn-set">
                                </form>
                            </div>
                        </div>

                        <div class="main__info">
                            <ul class="main__info-ul">
                                <li>Login: {{ Auth::user()->login }}</li>
                                <li>Email: {{ Auth::user()->email  }}</li>
                                <li>Name: {{ Auth::user()->name }}</li>
                                <li>Country: {{ Auth::user()->country  }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>   
    @endsection