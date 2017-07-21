@extends('layouts.mainLayout')
    @section('title', 'home')
    @section('content')
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="home__content__all-images">

                        @foreach($path_array as $path)
                            <div class="home__content__single-image">
                                <div class="home__content__single-image__info">

                                    @foreach($names as $name)
                                        @if ($name['id'] == $path['user_id'])
                                            <div class="home__content__single-image__info-avatar"><img src="{{ URL::asset('img/avatars/' . $name['avatar']) }}" alt="avatar" class="small__avatar"></div>
                                            <div class="home__content__single-image__info-name">{{ $name['name'] }}</div>
                                        @endif
                                    @endforeach
                                    
                                    <div class="home__content__single-image__info-title" >{{ $path['name'] }}</div>
                                </div>
                                <p class="home__content__single-image__work">
                                    <img src="{{ URL::asset('img/works/' . $path['path']) }}" alt="{{ $path['name'] }}">
                                </p>
                            </div>
                        @endforeach

                    </div>
                    <div class="home__content__link-more">
                        <p><a href="#">More</a></p>
                    </div>
                </div>
            </div>
        </div>

    @endsection
