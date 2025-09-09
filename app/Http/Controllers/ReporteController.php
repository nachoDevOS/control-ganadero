<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Color;
use App\Models\Marca;
use App\Models\Planilla;
use App\Models\Raza;
use Illuminate\Http\Request;
use Whoops\Run;

class ReporteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function indexPlanilla()
    {
        $categorias = Categoria::withTrashed()->get();
        $marcas = Marca::withTrashed()->get();
        $colores = Color::withTrashed()->get();
        $razas = Raza::withTrashed()->get();

        return view('reportes.planillas.report', compact('categorias', 'marcas', 'colores', 'razas'));
    }


    public function listPlanilla(Request $request)
    {
        $detail = $request->detail;
        $start = $request->start;
        $finish = $request->finish;

        $planillas = Planilla::with(['marca', 'categoria', 'raza', 'color'])
            ->whereDate('registro', '>=', $start)
            ->whereDate('registro', '<=', $finish)
         
            ->whereRaw($request->estado!=2? 'estado = '.$request->estado : 1)
            ->whereRaw($request->categoria_id? 'categoria_id = '.$request->categoria_id : 1)
            ->whereRaw($request->color_id? 'color_id = '.$request->color_id : 1)
            ->whereRaw($request->raza_id? 'raza_id = '.$request->raza_id : 1)
            ->whereRaw($request->marca_id? 'marca_id = '.$request->marca_id : 1)

            ->where('deleted_at', null)
            ->orderBy('registro', 'ASC')
            ->get();

        // dump($planillas);
        // return 1;
        
        if($request->print){
            return view('reportes.planillas.print', compact('planillas', 'start', 'finish'));
        }else{
            return view('reportes.planillas.list', compact('saplanillasles'));
        }
    }
}
