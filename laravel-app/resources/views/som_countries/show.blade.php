@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5><i class="fa fa-globe"></i> View Som Country</h5>
                    <a class="btn btn-default"
                           href="{{url('somCountries')}}" style="color: blue;">
                           <i class="fa fa-chevron-left"></i> Back To List Data Country
                        </a>
                </div>
                <div class="col-sm-6">
                    <div class="col-sm-12 text-right">
                        <i class="fa fa-tachometer-alt"></i> <a href="{{url('admin')}}">Home</a>
                        <i class="fa fa-angle-right" style="color: blue;"></i>  <a href="{{url('somCountries')}}">Som Countries</a>
                        <i class="fa fa-angle-right" style="color: black;"></i>  View Som Country
                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    @include('som_countries.show_fields')
                </div>
            </div>

        </div>
    </div>
@endsection
