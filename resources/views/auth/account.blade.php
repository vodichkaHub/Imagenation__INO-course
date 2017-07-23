@extends('layouts.mainLayout')
@section('title', 'Account')
    @section('content')

            <div class="container-fluid">

            @if (session('success') != null)
            <div class="alert alert-info">
                <p>{{ session('success') }}</p>
            </div>
            @endif

            @if (session('Error') || $errors->any())
            <div class="row">
                <div class="col-md-12">
                <div class="alert alert-info">
                    <p class="error">{{ session('Error') }}</p>
                </div>
                    @if ($errors->any())
                        <div class="alert alert-info">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            @endif

            @if (!empty($message))
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info">
                            {{ $message }}
                            <a href="{{ route('hideMessage') }}">| OK</a>
                        </div>
                    </div>
                </div>
            @endif

                <div class="main">
                    <h1 class="main__profile">Profile</h1>
                    
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="main__h2-portfolio">Portfolio</h3>
                        @if (Auth::user()->ban == 0)
                            <div class="main__add-image">
                                <h5>Add new image in your collection:</h5>
                                <div class="form-group">
                                    <form action="{{ route('add') }}" method="post" enctype="multipart/form-data" class="form-group img-form">
                                        {{ csrf_field() }}
                                        <input type="text" name="name" placeholder="Photo title" class="form-control name-input" required>
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
                        @else
                            <div class="alert alert-info">
                                <p>You can`t post new photos, because you have been banned. Write to administrator for getting info</p>
                            </div>
                        @endif
                    </div>

                    <div class="col-md-4 account__info-block">
                    <h3 class="main__h3-personal">Personal Info</h3>
                        <div class="main__avatar-big">
                            @if (file_exists(public_path() . '/img/avatars/' . Auth::id() . '.jpeg')) 
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="main__portfolio">
                        @if (!empty($path_array))
                            @foreach ($path_array as $path)
                                <div class="main__portfolio__work">
                                    <div class="main__portfolio__work-info">
                                        
                                    </div>

                                    <div class="main__portfolio__work-image">
                                        <img class="lazy" data-original="{{ 'img/works/' . $path['path'] }}" alt="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>You have no photos yet) You can start easily! Just fill form above ^^^</p>
                        @endif
                        </div>
                    </div>
                </div>
            </div>

<script>
    $(function() {
        $("img.lazy").lazyload({
            effect : "fadeIn",
            event : "sporty"
        });
    });

    $(window).bind("load", function() {
        var timeout = setTimeout(function() {
            $("img.lazy").trigger("sporty")
        }, 5000);
    });
</script>   
    @endsection