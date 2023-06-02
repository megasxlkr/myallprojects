@extends('app.app')

@section('content')

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">
                @if(isset($data))
                    <form action="{{route('all-profile-update-results')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">UserName</label>
                            <input type="text" name="username" value="{{$data->username}}" class="form-control" id="username" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" name="email" value="{{$data->email}}" class="form-control" id="email" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">İş Durumu</label>
                            <input type="text" name="isdurumu" value="{{$data->isdurumu}}" class="form-control" id="isdurumu" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hakkımda</label>
                            <input type="text" name="hakkimda" value="{{$data->hakkimda}}" class="form-control" id="hakkimda" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Telefon Numarası:</label>
                            <input type="text" name="phone" value="{{$data->phone}}" class="form-control" id="phone" placeholder="Name">
                        </div>

                        <input hidden name="id" value="{{$data->id}}">
                        <button type="submit" class="btn btn-primary">Güncelle</button>
                    </form>
                @else
                    Kullanıcı bulunamadı;
                @endif


            </div>
        </section>
    </main>

@endsection
