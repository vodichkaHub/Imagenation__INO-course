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
                                    <div class="row">
                                        
                                        @foreach($names as $name)
                                            @if ($name['id'] == $path['user_id'])
                                                <div class="col-md-1"></div>
                                                <div class="col-md-1">
                                                    <div class="home__content__single-image__info-avatar"><img src="{{ URL::asset('img/avatars/' . $name['avatar']) }}" alt="avatar" class="small__avatar"></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="home__content__single-image__info-name">{{ $name['name'] . '  ' . $name['country'] }}</div>
                                                </div>
                                            @endif
                                        @endforeach
                                        <div class="col-md-4">
                                            <div class="home__content__single-image__info-title" >{{ $path['name'] }}</div>
                                        </div>
                                        <div class="col-md-3">
                                            <!--znachki-->
                                        </div>
                                    </div>
                                </div>
                                <p class="home__content__single-image__work">
                                    <img class="lazy" data-original="{{ 'img/works/' . $path['path'] }}" alt="{{ $path['name'] }}">
                                </p>
                            </div>
                        @endforeach

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
