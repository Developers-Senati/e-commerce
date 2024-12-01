<?php

namespace App\Http\Controllers;

use App\Models\Reclamaciones;
use App\Models\Reclamos;
use Illuminate\Http\Request;

class ReclamosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reclamos = Reclamos::all(); // Obtener todos los reclamos
        return view('footer_pages.servicio_cliente.reclamaciones.index', compact('reclamos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('footer_pages.servicio_cliente.reclamaciones.create');
    }





    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'tipo_documento' => 'required|string|max:20',
            'numero_documento' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'nombres' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'departamento' => 'required|string|max:255',
            'provincia' => 'required|string|max:255',
            'distrito' => 'required|string|max:255',
            'celular' => 'required|string|max:255',
            'correo_electronico' => 'required|email|max:255',
            'medio_respuesta' => 'required|string|max:255',
            // Modificado para aceptar un array de valores
            'tipo_bien' => 'required|array',
            'descripcion_bien' => 'nullable|string|max:500',  // Validación del campo
            // Validar que cada valor del array sea uno de los valores permitidos
            'tipo_bien.*' => 'in:Producto,Servicio',
            'monto_reclamado' => 'required|numeric',
            'motivo_contacto' => 'required|string|max:255',
            'detalle' => 'required|string|max:800',
            'pedido' => 'required|string|max:300',
        ]);

        // Convertir el array de tipo_bien en una cadena separada por comas
        $tipoBien = implode(',', $request->input('tipo_bien'));

        // Crear la reclamación en la base de datos
        Reclamos::create([
            'tipo_documento' => $request->tipo_documento,
            'numero_documento' => $request->numero_documento,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'nombres' => $request->nombres,
            'apoderado' => $request->apoderado,
            'direccion' => $request->direccion,
            'urbanizacion' => $request->urbanizacion,
            'departamento' => $request->departamento,
            'provincia' => $request->provincia,
            'distrito' => $request->distrito,
            'referencia' => $request->referencia,
            'telefono' => $request->telefono,
            'celular' => $request->celular,
            'correo_electronico' => $request->correo_electronico,
            'medio_respuesta' => $request->medio_respuesta,
            'tipo_bien' => $tipoBien,  // Guardar como cadena separada por comas
            'descripcion_bien' => $request->descripcion_bien,
            'monto_reclamado' => $request->monto_reclamado,
            'motivo_contacto' => $request->motivo_contacto,
            'detalle' => $request->detalle,
            'pedido' => $request->pedido,
        ]);

        return redirect()->route('home.index')->with('success', 'Reclamación enviada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Recuperar el reclamo por su ID
        $reclamo = Reclamos::findOrFail($id);

        // Pasar el reclamo a la vista
        return view('footer_pages.servicio_cliente.reclamaciones.show', compact('reclamo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reclamos $reclamos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reclamos $reclamos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Encontrar el reclamo por su ID
        $reclamo = Reclamos::findOrFail($id);

        // Eliminar el reclamo
        $reclamo->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('reclamaciones.index')
            ->with('success', 'Reclamación eliminada exitosamente.');
    }
}
