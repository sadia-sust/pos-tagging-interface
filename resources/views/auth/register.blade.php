@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Guest Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div style="margin: 10px;padding: 10px;">
                            <label for="name" class="col-md-4 control-label">Username / Reg no</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="reg"  required autofocus>

                            </div>
                        </div>


                        <div class="form-group" style="margin: 10px;padding: 10px;">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection