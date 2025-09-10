
<div class="col-md-12 text-right">

    <button type="button" onclick="report_excel()" class="btn btn-success"><i class="fa-solid fa-file-excel"></i> Excel</button>
    <button type="button" onclick="report_print()" class="btn btn-dark"><i class="glyphicon glyphicon-print"></i> Imprimir</button>

</div>
<div class="col-md-12">
<div class="panel panel-bordered">
    <div class="panel-body">
        <div class="table-responsive">    
            <table id="dataTable" style="width:100%"  class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th style="text-align: center">N&deg;</th>
                            <th style="text-align: center">N&deg; Lomo</th>
                            <th style="text-align: center">N&deg; Carimbo</th>
                            <th style="text-align: center">Sexo</th>
                            <th style="text-align: center">Raza</th>
                            <th style="text-align: center">Color</th>
                            <th style="text-align: center">Categoria</th>
                            <th style="text-align: center">Marca</th>
                            <th style="text-align: center">Observacion</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @forelse ($planillas as $item)
                            <tr>
                                <td>{{ $count }}</td>
                                <td>{{ $item->nro_lomo }}</td>
                                <td>{{ $item->nro_carimbo }}</td>
                                <td>{{ $item->sexo }}</td>
                                <td>{{ $item->raza?$item->raza->nombre:'' }}</td>
                                <td>{{ $item->color?$item->color->nombre:'' }}</td>
                                <td>{{ $item->categoria?$item->categoria->nombre:'' }}</td>
                                <td>{{ $item->marca?$item->marca->nombre:'' }}</td>
                                <td>{{ $item->observacion }}</td>          
                            </tr>
                            @php
                                $count++;     
                            @endphp
                                
                        @empty
                            <tr style="text-align: center">
                                <td colspan="9">No se encontraron registros.</td>
                            </tr>
                        @endforelse                
                    </tbody>
                </table>
      
            
        </div>
    </div>
</div>
</div>

<script>
$(document).ready(function(){

})
</script>