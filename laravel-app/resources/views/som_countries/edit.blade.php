@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5><i class="fa fa-globe"></i> Edit Som Country</h5>
                    <a class="btn btn-default"
                           href="{{url('somCountries')}}" style="color: blue;">
                           <i class="fa fa-chevron-left"></i> Back To List Data Country
                        </a>
                </div>
                <div class="col-sm-6">

                        <div class="col-sm-12 text-right">
                            <i class="fa fa-tachometer-alt"></i> <a href="{{url('admin')}}">Home</a>
                            <i class="fa fa-angle-right" style="color: blue;"></i>  <a href="{{url('somCountries')}}">Som Countries</a>
                            <i class="fa fa-angle-right" style="color: black;"></i> Edit Som Country
                        </div>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($somCountry, ['route' => ['somCountries.update', $somCountry->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('som_countries.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('somCountries.index') }}" class="btn btn-default">Cancel</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
