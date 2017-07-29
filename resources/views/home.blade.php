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
                <option>Width</option>
                <option>500</option>
                <option>800</option>
                <option>1200</option>
                <option>1900</option>
                <option>2500</option>
            </select>
            <select name="section" class="form-control home__addition__section-input">
                <option>Section</option>
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

        @if (!empty(session('info')))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif

            <div class="row">
                <div class="col-md-1">
                    <div class="up-button">
                        <a href="#up" class="up-button-text">Up ^</a>
                    </div>
                </div>
                <div class="col-md-10">

                    <div class="home__content__all-images">

                        @if (!isset($info))
                            @foreach($pathArray as $path)
                                <div class="home__content__single-image">
                                    <div class="home__content__single-image__info">
                                        <div class="row">

                                            @if (isset($names))
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
                                            @endif

                                            <div class="col-md-4">
                                                <div class="home__content__single-image__info-title" >{{ $path['name'] }}</div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="home__content__single-image__info-price">{{ $path['price'] }} $</div>
                                            </div>
                                            <div class="col-md-1">
		                                        <input type="hidden" value="{{ $path['id'] }}" class="img-id">
                                                <button class="add-to-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
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
                            @foreach ($info as $point)

                                <div class="home__content__single-image">
                                    <div class="home__content__single-image__info">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-1">
                                                <div class="home__content__single-image__info-avatar"><img src="{{ URL::asset('img/avatars/' . $point['avatar']) }}" alt="avatar" class="small__avatar"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="home__content__single-image__info-name">{{ $point['users.name'] . '  ' . $point['country'] }}</div>
                                            </div>
                                            <div class="col-md-4">
                                                 <div class="home__content__single-image__info-title" >{{ $point['images.name'] }}</div> 
                                            </div>
                                            <div class="col-md-1">
                                                 <div class="home__content__single-image__info-price">{{ $point['price'] }} $</div> 
                                            </div>
                                            <div class="col-md-1 product-row">
                                                <input type="hidden" value="{{ $point['id'] }}" class="img-id">
                                                <button class="add-to-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>                                            </div>
                                            <div class="col-md-1"></div>
                                        </div>
                                    </div>
                                    <p class="home__content__single-image__work">
                                        <a href="{{ route('showImage', ['imageId' => $point['id']]) }}"><img class="lazy" data-original="{{ 'img/works/' . $point['path'] }}" alt="{{ $point['name'] }}"></a>
                                    </p>
                                </div>

                            @endforeach
                        @endif
                        
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
<script>
    $(function() {
        $("img.lazy").lazyload();
    });

    $(window).bind("load", function() {
        var timeout = setTimeout(function() {
            $("img.lazy").trigger("sporty")
        }, 5000);
    });
</script>
    @endsection
