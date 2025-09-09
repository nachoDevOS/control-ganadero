<?php

namespace App\Http\Controllers;

use App\Models\Planilla;
use Illuminate\Http\Request;

class PlanillaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->custom_authorize('browse_planillas');

        return view('planillas.browse');
    }
    
    public function list(){

        $search = request('search') ?? null;
        $paginate = request('paginate') ?? 10;

        $data = Planilla::with(['categoria', 'marca', 'raza', 'color'])
                    ->where(function($query) use ($search) {
                        $query->where(function($q) use ($search) {
                            if ($search) {
                                $q->where('id', $search)
                                ->orWhere('nro_lomo', 'like', "%$search%")
                                ->orWhere('nro_carimbo', 'like', "%$search%")
                                ->orWhere('observaciones', 'like', "%$search%");
                            } else {
                                $q->whereRaw('1 = 1'); // Siempre verdadero cuando no hay búsqueda
                            }
                        });
                    })
                    ->whereNull('deleted_at')
                    ->orderBy('id', 'DESC')
                    ->paginate($paginate);

        return view('planillas.list', compact('data'));
    }
}
