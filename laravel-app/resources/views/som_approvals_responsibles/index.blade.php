@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6" style="display:flex;">
                    <h1><i class="fas fa-glass-martini"></i> Approvals Resp</h1>
                    <a class="btn btn-black ml-3" 
                       href="#" style="background-color:#07a2d8;">
                        <i class="fa fa-id-card" aria-hidden="true"></i>  Show Data
                    </a>
                    <a class="btn btn-black ml-3" 
                       href="{{ route('somApprovalsResponsibles.create', ['som_form_approvals_id'=>$som_form_approvals_id]) }}">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>  Add Data
                    </a>
                </div>
                <div class="col-sm-6">
                    <div class="float-right">                                                
                        <a href="#">
                            <i class="fa fa-palette"></i> Home
                        </a>
                        <span>
                            <i class="fa fa-chevron-right"></i> Approvals Resp
                        </span>                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        <div class="row">
            <div class="col-12-lg ml-4 mb-4">
                <a href="{{ route('somFormApprovals.index', ['somforms_id'=>$breadcrumbs[3]['id'] ]) }}">
                    <i class="fa fa-chevron-circle-left"></i> Back To List Data Approvals
                </a>
            </div>
        </div>  

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-3" >
                <div class="row">
                    <div class="col-md-1">
                        <span>Approvals</span>
                    </div>
                    <div class="col-md-8 breadcrumbs-menu">
                        <a href="{{ route('somProjectsPhases.index' , [ 'project_id'=>$breadcrumbs[0]['id'] ]) }}">
                            {!! $breadcrumbs[0]['name'] !!}
                        </a>  /
                        <a href="{{ route('somProjectsMilestones.index' , ['phases_id'=>$breadcrumbs[1]['id'] ]) }}">
                            {!! $breadcrumbs[1]['name'] !!}
                        </a>  / 
                        <a href="{{ route('somForms.index', ['milestones_id'=>$breadcrumbs[2]['id'] ]) }}">
                            {!! $breadcrumbs[2]['name'] !!}
                        </a>  /
                        <a href="{{ route('somFormApprovals.index', ['somforms_id'=>$breadcrumbs[3]['id'] ]) }}">
                            {!! $breadcrumbs[3]['name'] !!}
                        </a>  /  
                        <span>{!! $breadcrumbs[4]['name'] !!}</span>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-0">
                @include('som_approvals_responsibles.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

