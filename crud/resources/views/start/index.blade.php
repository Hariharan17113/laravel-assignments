@extends('posts.layout')
@section('content')
    <table class="table table-striped table-responsive-lg table-hover" >
        <div class="pull-right">
            <a class="btn btn-primary" href=" {{ route('welcome') }}">
                <i class="fas fa-home"></i>
            </a>
        </div>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
        </tr>
        <?php $i=0; ?>
        @foreach ($posts as $key => $value)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $value->title }}</td>
                <td>{{ $value->description }}</td>
            </tr>
        @endforeach
    </table>

@endsection


