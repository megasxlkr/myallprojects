@extends('app.app')

@section('content')

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">
                @if(isset($data))
                    <form action="{{route('profile-update-result')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" value="{{$data->name}}" class="form-control" id="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nickname</label>
                            <input type="text" name="nickname" value="{{$data->nickname}}" class="form-control" id="nickname" placeholder="Name">
                        </div> <div class="form-group">
                            <label for="exampleInputEmail1">Hakkında</label>
                            <input type="text" name="about" value="{{$data->about}}" class="form-control" id="about" placeholder="Name">
                        </div>
                        <input hidden name="id" value="{{$data->id}}">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                @else
                    Kullanıcı bulunamadı;
                @endif


            </div>
        </section>
    </main>

@endsection
