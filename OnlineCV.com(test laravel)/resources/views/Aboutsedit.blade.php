@extends('app.app')

@section('content')
    <form action="" method="post">
        @csrf
        <input type="text" name="id" placeholder="input id" value="{{$profiles['id']}}}"><br><br>
        <input type="text" name="about" placeholder="input about" value="{{$profiles['about']}}}"><br><br>
        <button type="submit">Update</button>
    </form>
@endsection

