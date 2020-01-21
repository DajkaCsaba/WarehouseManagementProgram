@extends('layouts.app')

@section('content')
<div class="col-sm-2 col-md-2 col-lg-2">

</div>
<div class="col-sm-8 col-md-8 col-lg-8">
     <div class="jumbotron" style="background-image: url(/img/jumbotron-background.jpg); color:#fff;">
     <h1>Regisztráció</h1>
     </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body" style="margin:5%;">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <!--                                válalati név                      -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Válalati név</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--                                Raktárnév                            -->
                        <div class="form-group{{ $errors->has('storageName') ? ' has-error' : '' }}">
                            <label for="storageName" class="col-md-4 control-label">Raktárnév</label>

                            <div class="col-md-6">
                               <input id="storageName" type="text" class="form-control" name="storageName" value="{{ old('storageName') }}" required autofocus>

                               @if ($errors->has('storageName'))
                                    <span class="help-block">
                                       <strong>{{ $errors->first('storageName') }}</strong>
                                    </span>
                               @endif
                            </div>
                        </div>
                        <!--                                Válalat címe                        -->
                        <div class="form-group{{ $errors->has('storageAddress') ? ' has-error' : '' }}">
                            <label for="storageAddress" class="col-md-4 control-label">Cím</label>

                            <div class="col-md-6">
                               <input id="storageAddress" type="text" class="form-control" name="storageAddress" value="{{ old('storageAddress') }}" required autofocus>

                               @if ($errors->has('storageAddress'))
                                    <span class="help-block">
                                       <strong>{{ $errors->first('storageAddress') }}</strong>
                                    </span>
                               @endif
                            </div>
                        </div>
                        <!--                                Válalat adószáma                       -->
                        <div class="form-group{{ $errors->has('taxNumber') ? ' has-error' : '' }}">
                            <label for="taxNumber" class="col-md-4 control-label">Adószám</label>

                            <div class="col-md-6">
                               <input id="taxNumber" type="text" class="form-control" name="taxNumber" value="{{ old('taxNumber') }}" required autofocus>

                               @if ($errors->has('taxNumber'))
                                    <span class="help-block">
                                       <strong>{{ $errors->first('taxNumber') }}</strong>
                                    </span>
                               @endif
                            </div>
                        </div>
                        <!--                                e-mail                           -->
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--                                Jelszó                           -->
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Jelszó</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <!--                                Jelszó újra                           -->
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Jelszó újra</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-basic pull-right" style="margin-top:2%;">
                                   Regisztráció
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
