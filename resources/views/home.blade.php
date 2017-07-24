@extends('layouts.mainLayout')
    @section('title', 'home')
    @section('content')
    @section('h2')
        <div class="sub-title">
            <h2>All works</h2>
        </div>
    @endsection
    @section('addition')

        <form action="{{ route('selectBy') }}" method="post">
        {{ csrf_field() }}
        <select name="width" class="form-control home__addition__width-input">
                <option>Animals</option>
                <option>City</option>
                <option>Cars</option>
                <option>Girls</option>
                <option>Beach</option>
                <option>Extreme</option>
            </select>
            <select name="section" class="form-control home__addition__section-input">
                <option>Select section</option>
                <option>Animals</option>
                <option>Nature</option>
                <option>City</option>
                <option>Cars</option>
                <option>Girls</option>
                <option>Beach</option>
                <option>Extreme</option>
            </select>
            <input type="submit" value="Search" class="home__addition__button">
        </form>
    @endsection
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="home__content__all-images">
                        @if ($path_array->isNotEmpty())
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
                                            <div class="col-md-2">
                                                <a href="{{ route('addToCart', ['imageId' => $path['id']]) }}"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                            </div>
                                            <div class="col-md-1"></div>
                                        </div>
                                    </div>
                                    <p class="home__content__single-image__work">
                                        <a href="{{ route('showImage', ['imageId' => $path['id']]) }}"><img class="lazy" data-original="{{ 'img/works/' . $path['path'] }}" alt="{{ $path['name'] }}"></a>
                                    </p>
                                </div>
                            @endforeach
                        @else
                            @if (!empty(session('info')))
                                <div class="alert alert-info">
                                    {{ session('info') }}
                                </div>
                            @endif
                        @endif
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
