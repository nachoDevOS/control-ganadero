@extends('layouts-print.template-print')

@section('page_title', 'Reporte Planillas')

@section('content')
    @php
        $months = [
            '',
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre',
        ];
        
    @endphp

    <style>
        .report-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e0e0e0;
        }

        .logo-container img {
            max-height: 80px;
        }

        .title-container {
            text-align: center;
            flex-grow: 1;
        }

        .report-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 5px;
            color: #2c3e50;
        }

        .report-subtitle {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 5px;
            color: #7f8c8d;
        }

        .report-date {
            font-size: 14px;
            color: #95a5a6;
        }

        .qr-container {
            text-align: right;
        }

        .print-info {
            font-size: 10px;
            color: #95a5a6;
            margin-top: 5px;
        }

        .sales-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 12px;
        }

        .sales-table th {
            background-color: #34495e;
            color: white;
            padding: 10px;
            text-align: center;
            font-weight: 600;
        }

        .sales-table td {
            padding: 8px 10px;
            border-bottom: 1px solid #ecf0f1;
        }

        .sales-table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .item-row {
            background-color: #f1f3f5 !important;
        }

        .item-row th {
            background-color: #bdc3c7 !important;
            color: #2c3e50;
            padding: 5px;
        }

        .total-row {
            font-weight: 600;
            background-color: #eaf2f8 !important;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .currency {
            font-family: 'Courier New', monospace;
            font-weight: 600;
        }

        .no-records {
            text-align: center;
            padding: 20px;
            color: #7f8c8d;
            font-style: italic;
        }

        @media print {
            .report-header {
                border-bottom: 1px solid #ddd;
            }

            .sales-table th {
                background-color: #34495e !important;
                color: white !important;
                -webkit-print-color-adjust: exact;
            }

            .item-row th {
                background-color: #bdc3c7 !important;
                -webkit-print-color-adjust: exact;
            }

            .total-row {
                background-color: #eaf2f8 !important;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>

    <div class="report-header">
        <div class="logo-container">
            <?php $admin_favicon = Voyager::setting('admin.icon_image', ''); ?>
            @if ($admin_favicon == '')
                <img src="{{ voyager_asset('images/logo-icon-light.png') }}" alt="{{ Voyager::setting('admin.title') }}"
                    width="70px">
            @else
                <img src="{{ Voyager::image($admin_favicon) }}" alt="{{ Voyager::setting('admin.title') }}" width="70px">
            @endif
        </div>

        <div class="title-container">
            <h1 class="report-title">{{ Voyager::setting('admin.title') }}</h1>
            <h2 class="report-subtitle">PLANILLA DE REGISTRO</h2>
            <p class="report-date">
                @if ($start == $finish)
                    {{ date('d', strtotime($start)) }} de {{ $months[intval(date('m', strtotime($start)))] }} de
                    {{ date('Y', strtotime($start)) }}
                @else
                    {{ date('d', strtotime($start)) }} de {{ $months[intval(date('m', strtotime($start)))] }} de
                    {{ date('Y', strtotime($start)) }} Al
                    {{ date('d', strtotime($finish)) }} de {{ $months[intval(date('m', strtotime($finish)))] }} de
                    {{ date('Y', strtotime($finish)) }}
                @endif
            </p>
        </div>

        <div class="qr-container">
            <div id="qr_code">
                {{-- {!! QrCode::size(80)->generate('Total Cobrado: Bs'.number_format($amountTotal,2, ',', '.').', Recaudado en Fecha '.date('d', strtotime($start)).' de '.strtoupper($months[intval(date('m', strtotime($start)))] ).' de '.date('Y', strtotime($start))); !!} --}}
            </div>
            <p class="print-info">Impreso por: {{ Auth::user()->name }}<br>{{ date('d/m/Y h:i:s a') }}</p>
        </div>
    </div>


    <table class="sales-table">
        <thead>
            <tr>
                <th style="width: 5%">N&deg;</th>
                <th style="width: 10%">N&deg; LOMO</th>
                <th style="width: 12%">N&deg; CARIMBO</th>
                <th style="width: 5%">SEXO</th>
                <th style="width: 15%">RAZA</th>
                <th style="width: 15%">COLOR</th>
                <th style="width: 10%">CATEGORIA</th>
                <th style="width: 10%">MARCA</th>
                <th>OBSERVACION</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 1;
            @endphp
            @forelse ($planillas as $item)
                <tr>
                    <td style="width: 5%">{{ $count }}</td>
                    <td>{{ $item->nro_lomo }}</td>
                    <td>{{ $item->nro_carimbo }}</td>
                    <td style="text-align: center">{{ $item->sexo }}</td>
                    <td>{{ $item->raza ? $item->raza->nombre : '' }}</td>
                    <td>{{ $item->color ? $item->color->nombre : '' }}</td>
                    <td>{{ $item->categoria ? $item->categoria->nombre : '' }}</td>
                    <td style="text-align: center">{{ $item->marca ? $item->marca->nombre : '' }}</td>
                    <td>{{ $item->observacion }}</td>
                </tr>
                @php
                    $count++;
                @endphp
            @empty
                <tr>
                    <td colspan="9" class="no-records">No se encontraron registros.</td>
                </tr>
            @endforelse
        </tbody>
    </table>


@endsection

@section('css')
    <style>
        /* Estilos adicionales para impresión */
        @media print {
            body {
                font-size: 12px;
            }

            .report-header {
                margin-bottom: 10px;
            }

            .sales-table {
                font-size: 10px;
            }

            .sales-table th,
            .sales-table td {
                padding: 5px 8px;
            }
        }
    </style>
@stop
