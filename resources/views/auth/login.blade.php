@extends('layouts.base')

@section('content')
<br>
<br>
<center><h4>iniciar sesion</h4></center>
<br>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('account_name') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-12 control-label">usuario</label>

                            <div class="col-md-12">
                                <input id="account_name" type="text" class="form-control" name="account_name" value="{{ old('account_name') }}"  autofocus>

                                @if ($errors->has('account_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-12 control-label">Password</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password"   >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<br>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-rounded bg-theme-5">
                                    Login
                                </button>

      
                            </div>
                        </div>
                    </form>
                    <br>

@endsection
