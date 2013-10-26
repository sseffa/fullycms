@extends('backend/layout')
@section('content')
<div class="container">
    <div class="page-header">
        <h3>
            User Info
            <div class="pull-right">
                <button class="btn btn-primary" type="submit">Back</button>
            </div>
        </h3>
    </div>
    <h5><b>Name: </b>{{ $user->first_name . ' ' . $user->last_name }}</h5>
    <h5><b>Email: </b> {{ $user->email }}</h5>
    <h5><b>Last Login: </b> {{ $user->last_login }}</h5>
    <h5><b>Created: </b> {{ $user->created_at }}</h5>
    <h5><b>Updated: </b> {{ $user->updated_at }}</h5>
</div>
@stop