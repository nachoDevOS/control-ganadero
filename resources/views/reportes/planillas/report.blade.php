@extends('voyager::master')

@section('page_title', 'Reporte Excel')

@section('page_header')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body" style="padding: 0px">
                        <div class="col-md-8" style="padding: 0px">
                            <h1 class="page-title">
                                <i class="fa-solid fa-print"></i> Exportar a Excel
                            </h1>
                        </div>
                        <div class="col-md-4" style="margin-top: 30px">
                            <form name="form_search" id="form-search" action="{{route('reportes-planillas.list')}}" method="post">
                                @csrf
                                <input type="hidden" name="print">

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-line">
                                            <input type="date" class="form-control" name="start" required>
                                            <small>Inicio</small>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-line">
                                            <input type="date" class="form-control" name="finish" required>
                                            <small>Fin</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="type" id="type" class="form-control select2" >
                                            <option value="" selected>--Todos--</option>
                                            <option value="1ra">1ra</option>
                                            <option value="2da">2da</option>
                                        </select>
                                        <small>Tipo de Registro</small>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="categoria_id" id="categoria_id" class="form-control select2" >
                                            <option value="" selected>--Todos--</option>
                                            @foreach ($categorias as $item)
                                                <option value="{{$item->id}}">{{$item->nombre}}</option>
                                            @endforeach
                                        </select>
                                        <small>Categorias</small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="color_id" id="color_id" class="form-control select2">
                                            <option value="" selected>--Todos--</option>
                                            @foreach ($colores as $item)
                                                <option value="{{$item->id}}">{{$item->nombre}}</option>
                                            @endforeach
                                        </select>
                                        <small>Color</small>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="carimbo" class="form-control" name="carimbo" >
                                        <small>Carimbo</small>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="raza_id" id="raza_id" class="form-control select2">
                                            <option value="" selected>--Todos--</option>
                                            @foreach ($razas as $item)
                                                <option value="{{$item->id}}">{{$item->nombre}}</option>
                                            @endforeach
                                        </select>
                                        <small>Raza</small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="marca_id" id="marca_id" class="form-control select2" >
                                            <option value="" selected>--Todos--</option>
                                            @foreach ($marcas as $item)
                                                <option value="{{$item->id}}">{{$item->nombre}}</option>
                                            @endforeach
                                        </select>
                                        <small>Marca</small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="estado" id="estado" class="form-control select2" >
                                            <option value="2" selected>--Todos--</option>
                                            <option value="1">Sin Observacion</option>
                                            <option value="0">Con Observacion</option>
                                        </select>
                                        <small>Estado</small>
                                    </div>
                                </div>
                                
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary" style="padding: 5px 10px"> <i class="voyager-settings"></i> Generar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div id="div-results" style="min-height: 100px">
                
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>

    </style>
@stop

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#form-search').on('submit', function(e){
                e.preventDefault();
                $('#div-results').loading({message: 'Cargando...'});
                $.post($('#form-search').attr('action'), $('#form-search').serialize(), function(res){
                    $('#div-results').html(res);
                })
                .fail(function() {
                    toastr.error('Ocurrió un error!', 'Oops!');
                })
                .always(function() {
                    $('#div-results').loading('toggle');
                    $('html, body').animate({
                        scrollTop: $("#div-results").offset().top - 70
                    }, 500);
                });
            });
        });

        function report_print(){
            $('#form-search').attr('target', '_blank');
            $('#form-search input[name="print"]').val(1);
            window.form_search.submit();
            $('#form-search').removeAttr('target');
            $('#form-search input[name="print"]').val('');
        }

        // function report_excel(){
        //     $('#form-search input[name="print"]').val(2);
        //     window.form_search.submit();
        //     $('#form-search').removeAttr('target');
        //     $('#form-search input[name="print"]').val('');
        // }
    </script>

@stop