@extends('layout')

@section('title') User Form @endsection

@section('main_content')
    <h1 style="text-align: center">User Info Form</h1>
    <div style="width: 50%; margin: auto">


    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="/userForm/chek" class="alert alert-dark">
        @csrf
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" placeholder="Enter email" class="form-control"> <br>

        <label for="name">Name</label><br>
        <input type="text" name="name" id="name" placeholder="Enter name" class="form-control"> <br>

        <label for="message">Message</label>
        <textarea name="message" id="message" placeholder="Enter message" class="form-control"></textarea> <br>

        <button type="submit" class="btn btn-success" style="width: 100px; margin: auto">Send</button>
    </form>
    <br>

    <h1 style="text-align: center">All infos</h1>
    @foreach($userInfos as $el)
        <div class="alert alert-dark">
            <h3>{{$el->email}}</h3>
            <b>{{$el->name}}</b>
            <p>{{$el->message}}</p>
            <p>{{$el->created_at}}</p>
        </div>
    @endforeach
    </div>
@endsection
