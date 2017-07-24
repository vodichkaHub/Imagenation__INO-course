@extends('layouts.mainLayout')

@section('content')
    <div class="admin__list">
        @if (isset($users))
            @if ($users->isNotEmpty())
                @foreach($users as $user)
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-1">
                            @if (isset($user->avatar))
                                <img src="{{ URL::asset('img/avatars/' . $user->avatar) }}" alt="avatar" class="small__avatar">
                            @else
                                <img src="{{ URL::asset('img/avatars/DefaultAvatar.png') }}" alt="avatar" class="small__avatar">
                            @endif
                        </div>
                        <div class="col-md-6">
                            <p class="listOfUsers">ID: {{ $user->id }}  </p>
                            <p class="listOfUsers">NAME: {{ $user->name }}  </p>
                            <p class="listOfUsers">LOGIN: {{ $user->login }}  </p>
                            <p class="listOfUsers">CONTRY: {{ $user->country }}  </p>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('listOfWorks', ['id' => $user->id]) }}" class="admin__link">List of works |</a>
                            @if($user->ban == 0)
                                <a href="{{ route('setBan', ['id' => $user->id]) }}" class="admin__link">Ban</a>
                            @else
                                <a href="{{ route('unsetBan', ['id' => $user->id]) }}" class="admin__link">Remove ban</a>
                            @endif
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                @endforeach
            @else
                <p>List is empty</p>
            @endif
        @else 
            @if ($works->isNotEmpty())
                @foreach($works as $work)
                    <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-6">
                        <p class="listOfWorks">TITLE: {{ $work->name }} |</p>
                        <p class="listOfWorks">WIDTH: {{ $work->width }} |</p>
                        <p class="listOfWorks">HEIGHT: {{ $work->height }} |</p>
                        <p class="listOfWorks">SECTION: {{ $work->title }} |</p>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('showImage', ['imageId' => $work->id]) }}" class="admin__link">Show image |</a>
                        <a href="{{ route('deleteImg', ['image_id' => $work->id]) }}" class="admin__link">Delete</a>
                    </div>
                    <div class="col-md-2"></div>
                    </div>
                @endforeach
            @else
                <p>List is empty</p>
            @endif
        @endif
    </div>

@endsection