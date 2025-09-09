<div class="col-md-12">
    <div class="table-responsive">
        <table id="dataTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="text-align: center">ID</th>
                    <th style="text-align: center; width: 10%">Nº Lomo</th>
                    <th style="text-align: center; width: 10%">Nº Carimbo</th>                    
                    <th style="text-align: center; width: 5%">Sexo</th>
                    <th style="text-align: center">Raza</th>
                    <th style="text-align: center">Color</th>
                    <th style="text-align: center">Categoria</th>
                    <th style="text-align: center">Marca</th>
                    <th style="text-align: center">F. Registro</th>

                    <th style="text-align: center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td style="width: 8%">{{ $item->nro_lomo }} <br>
                        @if ($item->estado==0)  
                            <label class="label label-warning">En Observación</label>
                        @endif
                    </td>
                    <td style="width: 8%">{{ $item->nro_carimbo }}</td>
                    <td style="width: 5%; text-align: center">{{ $item->sexo }}</td>
                    <td>{{ $item->raza ? $item->raza->nombre : '' }}</td>
                    <td>{{ $item->color ? $item->color->nombre : '' }}</td>
                    <td>{{ $item->categoria ? $item->categoria->nombre : '' }}</td>
                    <td>{{ $item->marca ? $item->marca->nombre : '' }}</td>
                    <td style="text-align: center; width: 15%">{{ date('d/m/Y h:i a', strtotime($item->registro)) }} <br>
                        <small>{{ \Carbon\Carbon::parse($item->registro)->diffForHumans() }}</small>

                    </td>

     
                    <td style="width: 22%" class="no-sort no-click bread-actions text-right">
                        @if (auth()->user()->hasPermission('read_planillas'))
                            <a href="{{ route('voyager.planillas.show', ['id' => $item->id]) }}" title="Ver" class="btn btn-sm btn-warning view">
                                <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm">Ver</span>
                            </a>
                        @endif
                        @if (auth()->user()->hasPermission('edit_planillas'))
                            <a href="{{ route('voyager.planillas.edit', ['id' => $item->id]) }}" title="Editar" class="btn btn-sm btn-primary edit">
                                <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">Editar</span>
                            </a>
                        @endif
                        @if (auth()->user()->hasPermission('delete_planillas'))
                            <a href="#" onclick="deleteItem('{{ route('voyager.planillas.destroy', ['id' => $item->id]) }}')" title="Eliminar" data-toggle="modal" data-target="#modal-delete" class="btn btn-sm btn-danger delete">
                                <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Eliminar</span>
                            </a>
                        @endif
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="10">
                            <h5 class="text-center" style="margin-top: 50px">
                                <img src="{{ asset('images/empty.png') }}" width="120px" alt="" style="opacity: 0.8">
                                <br><br>
                                No hay resultados
                            </h5>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="col-md-12">
    <div class="col-md-4" style="overflow-x:auto">
        @if(count($data)>0)
            <p class="text-muted">Mostrando del {{$data->firstItem()}} al {{$data->lastItem()}} de {{$data->total()}} registros.</p>
        @endif
    </div>
    <div class="col-md-8" style="overflow-x:auto">
        <nav class="text-right">
            {{ $data->links() }}
        </nav>
    </div>
</div>

<script>
   
   var page = "{{ request('page') }}";
    $(document).ready(function(){
        $('.page-link').click(function(e){
            e.preventDefault();
            let link = $(this).attr('href');
            if(link){
                page = link.split('=')[1];
                list(page);
            }
        });
    });
</script>