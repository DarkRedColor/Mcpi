@extends('layouts.dashboard')


@section('content')

    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pb-1 mb-5 border-bottom">
        <h1 class="h2">{{__('message.test',['des'=>'123455']) }}</h1>
    </div>
    @php
        $datas=session('datas');
//lang_ = app()->getLocale();
//$dats->{'name_'.$lang}
    @endphp

    {!! Form::open(['action' => ['App\Http\Controllers\Mcpi\CaesarController@store']]) !!}
    <div class="d-flex justify-content-center align-items-center pb-1 ">
        <div class="d-inline-flex ">
            <div class="form-group">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary active">
                        <input type="radio" name="options" id="option1" value="crypt" checked> Crypt
                    </label>
                    <label class="btn btn-secondary">
                        <input type="radio" name="options" id="option2" value="decrypt"> Decrypt
                    </label>
                </div>
            </div>
        </div>
    </div>


    <br>
    <br>
    <div class="col-md-6">
        <div class="d-inline-flex">
            <div class="form-group ">
                {{ Form::textarea('message', isset($datas['message'])? $datas['message']:'', ['class' => 'form-control ' . ($errors->has('message') ? ' is-invalid' : '') , 'placeholder'=>'Mess'], ) }}
                @if ($errors->has('message'))
                    <div class="invalid-feedback">
                        {{ $errors->getBag('default')->first('message') }}
                    </div>
                @endif
            </div>

            <div class="form-group">

                {{ Form::textarea('cryptmess',  isset($datas['cryptmess'])? $datas['cryptmess']:'', ['class' => 'form-control ' . ($errors->has('cryptmess') ? ' is-invalid' : ''), 'disabled' ]) }}
                @if ($errors->has('cryptmess'))
                    <div class="invalid-feedback">
                        {{ $errors->getBag('default')->first('cryptmess') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="d-inline-block">
            <div class="form-group ">
                {{ Form::label('key', 'Key') }}
                {{ Form::select('key', ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25'] , ['class' => 'form-control ' . ($errors->has('is_closed') ? ' is-invalid' : ''),isset($datas['key'])? $datas['key']:'']) }}
                @if ($errors->has('key'))
                    <div class="invalid-feedback">
                        {{ $errors->getBag('default')->first('key') }}
                    </div>
                @endif
            </div>
            <div class="form-group ">
                {{ Form::text('cryptograma', isset($datas['cryptograma'])?  $datas['cryptograma'] :'', ['class' => 'form-control ' . ($errors->has('cryptograma') ? ' is-invalid' : '') , 'placeholder'=>'Criptograma'], ) }}
                @if ($errors->has('cryptograma'))
                    <div class="invalid-feedback">
                        {{ $errors->getBag('default')->first('cryptograma') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group ">
            {{ Form::button('Submit', ['type' => 'submit', 'class' => 'btn btn-primary ']) }}
        </div>
    </div>
    {!! Form::close() !!}

@endsection
