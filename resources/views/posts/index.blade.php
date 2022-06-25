@extends('layouts.app')
@section('title')
    All Posts
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-publish-tab" data-coreui-toggle="pill" data-coreui-target="#pills-publish" type="button" role="tab" aria-controls="pills-publish" aria-selected="true">Publish</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-draft-tab" data-coreui-toggle="pill" data-coreui-target="#pills-draft" type="button" role="tab" aria-controls="pills-draft" aria-selected="false">Draft</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-thrash-tab" data-coreui-toggle="pill" data-coreui-target="#pills-thrash" type="button" role="tab" aria-controls="pills-thrash" aria-selected="false">Thrash</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-publish" role="tabpanel" aria-labelledby="pills-publish-tab">
                    @include('posts.tablist.publish')
                </div>
                <div class="tab-pane fade" id="pills-draft" role="tabpanel" aria-labelledby="pills-draft-tab">
                    @include('posts.tablist.draft')
                </div>
                <div class="tab-pane fade" id="pills-thrash" role="tabpanel" aria-labelledby="pills-thrash-tab">
                    @include('posts.tablist.thrash')
                </div>
            </div>
        </div>
    </div>
    @include('posts.modals.form')
@endsection
@include('posts.scripts.actionScript')
