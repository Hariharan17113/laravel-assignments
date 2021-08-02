@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
{{--                    <a href="{{ route('posts.index') }}">Click to View Posts</a>--}}
{{--                        <a href="/daily/xlsx" class="btn btn-success">Export to .xlsx</a>--}}
{{--                        <a href="/daily/xls" class="btn btn-primary">Export to .xls</a>--}}
                        <div>@include('layouts.graph')</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
