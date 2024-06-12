@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="display-6 text-center mt-2 p-0 text-uppercase ">
                        {{__('plan de Mantenimiento ').$plan->name}} </h5>
                </div>
                <div class="card-body">
                    @include('partials.success')
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                role="tab" aria-controls="pills-home" aria-selected="true">Detalles del plan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-diario-tab" data-toggle="pill" href="#pills-diario"
                                role="tab" aria-controls="pills-diario" aria-selected="false">Diario</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="pills-semanal-tab" data-toggle="pill" href="#pills-semanal"
                                role="tab" aria-controls="pills-semanal" aria-selected="false">Semanal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-quincenal-tab" data-toggle="pill" href="#pills-quincenal"
                                role="tab" aria-controls="pills-quincenal" aria-selected="false">Quincenal</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="pills-mensual-tab" data-toggle="pill" href="#pills-mensual"
                                role="tab" aria-controls="pills-mensual" aria-selected="false">Mensual</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="pills-bimensual-tab" data-toggle="pill" href="#pills-bimensual"
                                role="tab" aria-controls="pills-bimensual" aria-selected="false">Bimensual</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="pills-trimestral-tab" data-toggle="pill" href="#pills-trimestral"
                                role="tab" aria-controls="pills-trimestral" aria-selected="false">Trimestral</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="pills-cuatrimestral-tab" data-toggle="pill" href="#pills-cuatrimestral"
                                role="tab" aria-controls="pills-cuatrimestral" aria-selected="false">Cuatrimestral</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="pills-semestral-tab" data-toggle="pill" href="#pills-semestral"
                                role="tab" aria-controls="pills-semestral" aria-selected="false">Semestral</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="pills-anual-tab" data-toggle="pill" href="#pills-anual"
                                role="tab" aria-controls="pills-anual" aria-selected="false">Anual</a>
                        </li>





                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                                role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        @include('plans.partials.detalles')
                        @include('plans.partials.diario')
                        @include('plans.partials.semanal')
                        @include('plans.partials.quincenal')
                        @include('plans.partials.mensual')
                        @include('plans.partials.bimensual')
                        @include('plans.partials.trimestral')
                        @include('plans.partials.cuatrimestral')
                        @include('plans.partials.semestral')
                        @include('plans.partials.anual')
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab">...</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endsection
    @section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $(() => {
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                });

                $(function () {
                    $('#myTab li:last-child a').tab('show')
                })
            });
        });

    </script>
    @endsection
