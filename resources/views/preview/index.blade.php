@extends('layouts.app')
@section('title')
    Article Preview
@endsection
@section('content')
    <div class="row mb-5">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                @foreach ($data as $item)
                    @php
                        $rand   = mt_rand(1, 3);
                        $image  = 'gambar_'.$rand.'.jpg';
                    @endphp
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mt-4">
                        <div class="card" style="width: 150;">
                            <img src="{{ asset('images/'.$image) }}" class="card-img-top" alt="Gambar 1">
                            <div class="card-body">
                                <h4>{{ $item->title }}</h4>
                                <p class="card-text">{{ Str::substr($item->content, 0, 100) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection