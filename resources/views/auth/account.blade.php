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
                        <div class="main__add-image">
                            <h5>Add new image in your collection:</h5>
                            <div class="form-group">
                                <form action="{{ route('add') }}" method="post" class="form-group img-form">
                                    {{ csrf_field() }}
                                    <input type="text" name="name" placeholder="Photo title" class="form-control name-input" required>
                                    <input type="text" name="width" placeholder="Width (optional)" class="form-control width-input">
                                    <input type="text" name="height" placeholder="Height (optional)" class="form-control hieght-input">
                                    <select name="section" class="form-control section-input">
                                        <option>Nature</option>
                                        <option>Animals</option>
                                        <option>City</option>
                                        <option>Cars</option>
                                        <option>Girls</option>
                                        <option>Beach</option>
                                        <option>Extreme</option>
                                    </select>
                                    <input type="file" name="image" class="img-input">
                                    <input type="submit" value="Post" class="btn btn-default btn-add">
                                </form>
                            </div>
                        </div>

                        <div class="main__portfolio">
                            
                        </div>
                    </div>

                    <div class="col-md-4">
                    <h3 class="main__h3-personal">Personal Info</h3>
                        <div class="main__avatar-big">
                            @if (file_exists(public_path() . '/img/avatars/' . Auth::user()->id . '.jpeg')) 
                            <img src="{{ URL::asset('img/avatars/' . Auth::user()->id . '.jpeg') }}" class="home__avatar" alt="avatar">
                            @else
                                <img src="{{ URL::asset('img/avatars/DefaultAvatar.png') }}" class="home__avatar" alt="avatar">
                            @endif
                            <p>( Click on photo, if u going to reset this )</p>   

                            <div class="main__avatar-choose">
                                <form action="{{ route('setAvatar') }}" method="post" enctype="multipart/form-data"> 
                                    {{ csrf_field() }}
                                    <input class="select" type="file" name="ava">
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