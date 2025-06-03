@extends('layouts.app')


@section('content')
<style>
    .field {
        background: url('/images/lineup.webp') center center/cover no-repeat;
        width: 800px;
        height: 500px;
    }
</style>
    <div class="container">
        <div class="dropzone draggable-dropzone--occupied">
            <div class="item">A</div>
        </div>
        <div class="dropzone draggable-dropzone--occupied">
            <div class="item">B</div>
        </div>
        <div class="dropzone draggable-dropzone--occupied">
            <div class="item">C</div>
        </div>
    </div>

    <div class="container field">
        <div class="dropzone"></div>
    </div>

    <style>
        .item {
            height: 100%;
        }

        .dropzone {
            outline: solid 1px;
            height: 50px;
        }

        .draggable-dropzone--occupied {
            background: lightgreen;
        }
    </style>
</div>

@endsection