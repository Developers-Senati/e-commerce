<?php

namespace App\Http\Controllers;

use App\Models\DashboardUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chart = new Chart;
        $chart->labels(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo']);
        $chart->dataset('Ventas', 'bar', [10, 20, 30, 40, 50])
            ->color('#ff0000')
            ->backgroundColor('#ffcccc');

        $chart2 = new Chart;
        $chart2->labels(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo']);
        $chart2->dataset('Ventas', 'line', [10, 20, 30, 40, 50])
            ->color('#ff0000')
            ->backgroundColor('#ffcccc');

        $chart3 = new Chart;
        $chart3->labels(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo']);
        $chart3->labels(['Producto A', 'Producto B', 'Producto C']);
        $chart3->dataset('Ventas', 'pie', [30, 50, 20])
            ->color(['#ff0000', '#00ff00', '#0000ff']);

        $chart4 = new Chart;
        $chart4->labels(['Producto A', 'Producto B', 'Producto C']);
        $chart4->dataset('Distribución de Ventas', 'doughnut', [25, 50, 25])
            ->color(['#1abc9c', '#2ecc71', '#3498db']);

        $chart5 = new Chart;
        $chart5->labels(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo']);
        $chart5->dataset('Usuarios Registrados', 'line', [10, 20, 35, 50, 70])
            ->color('#2980b9')
            ->backgroundColor('rgba(41, 128, 185, 0.5)');

        $chart6 = new Chart;
        $chart6->labels(['Comunicación', 'Trabajo en Equipo', 'Liderazgo', 'Resolución de Problemas']);
        $chart6->dataset('Habilidades', 'radar', [80, 90, 70, 85])
            ->color('#8e44ad')
            ->backgroundColor('rgba(142, 68, 173, 0.3)');

        $chart7 = new Chart;
        $chart7->labels(['Segmento A', 'Segmento B', 'Segmento C']);
        $chart7->dataset('Proporción de Clientes', 'polarArea', [30, 45, 25])
            ->color(['#e67e22', '#16a085', '#f39c12']);

        $chart8 = new Chart;
        $chart8->dataset('Clientes', 'bubble', [
            ['x' => 5, 'y' => 10, 'r' => 15],  // x = ingresos, y = satisfacción, r = tamaño
            ['x' => 15, 'y' => 20, 'r' => 25],
            ['x' => 25, 'y' => 30, 'r' => 35],
        ]);

        $chart9 = new Chart;
        $chart9->labels(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo']);
        $chart9->dataset('Ventas', 'bar', [5, 10, 15, 20, 25])
            ->color('#2ecc71')
            ->backgroundColor('#27ae60');
        $chart9->dataset('Proyección', 'line', [6, 12, 18, 24, 30])
            ->color('#3498db')
            ->backgroundColor('rgba(52, 152, 219, 0.3)');

        $chart10 = new Chart;
        $chart10->labels(['Progreso']);
        $chart10->dataset('Cumplimiento', 'doughnut', [75])  // 75% de cumplimiento
            ->color(['#1abc9c', '#ecf0f1']);

        $chart11 = new Chart;
        $chart11->dataset('Relación Precio-Demanda', 'scatter', [
            ['x' => 5, 'y' => 100],
            ['x' => 10, 'y' => 80],
            ['x' => 15, 'y' => 60],
            ['x' => 20, 'y' => 40],
        ]);

        $chart12 = new Chart;
        $chart12->labels(['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes']);
        $chart12->dataset('Velas', 'candlestick', [
            ['o' => 10, 'h' => 15, 'l' => 5, 'c' => 12], // apertura, máximo, mínimo, cierre
            ['o' => 12, 'h' => 18, 'l' => 8, 'c' => 16],
            ['o' => 16, 'h' => 20, 'l' => 14, 'c' => 19],
        ]);


        return view('usuarios/funciones-usuario/dashboard', compact('chart', 'chart2', 'chart3', 'chart4', 'chart5', 'chart6', 'chart7', 'chart8', 'chart9', 'chart10', 'chart11', 'chart12'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DashboardUser $dashboardUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DashboardUser $dashboardUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DashboardUser $dashboardUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DashboardUser $dashboardUser)
    {
        //
    }
}
