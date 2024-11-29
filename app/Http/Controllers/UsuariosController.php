<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = DB::select('CALL sp_MostrarUsuarios()');
        return view('usuarios/usuarios', compact('usuarios'));
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
        $request->validate([
            'dni' => 'required|size:8',
            'nombres' => 'required|max:255',
            'apellido_paterno' => 'required|max:255',
            'apellido_materno' => 'required|max:255',
            'direccion' => 'required|max:255',
            'telefono' => 'required|numeric',
            'username' => 'required|unique:Usuario,user_name|max:255',
            'password' => 'required|min:6'
        ]);
        try {
            // Ejecutar el procedimiento almacenado para registrar el usuario 
            DB::statement('CALL sp_CrearUsuario(?, ?, ?, ?, ?, ?, ?, ?)', [
                $request->dni,
                $request->nombres,
                $request->apellido_paterno,
                $request->apellido_materno,
                $request->direccion,
                $request->telefono,
                $request->username,
                $request->password
            ]);

            // Redirigir al usuario con un mensaje de éxito
            return redirect()->route("login.index");
        } catch (\Exception $e) {
            return redirect()->route("registro.index")->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuarios $usuarios)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'id_usuario' => 'required|integer',
            'dni' => 'required|size:8',
            'nombres' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|numeric',
            'username' => 'required|string|max:255|unique:usuarios,username,' . $request->post('id_usuario') . ',id_usuario',
            'password' => 'nullable|string|min:8'
        ]);

        try {
            // Llamada al procedimiento almacenado para actualizar el usuario
            DB::statement('CALL sp_ActualizarUsuario(?, ?, ?, ?, ?, ?, ?, ?, ?)', [
                $request->post('id_usuario'),
                $request->post('dni'),
                $request->post('nombres'),
                $request->post('apellido_paterno'),
                $request->post('apellido_materno'),
                $request->post('direccion'),
                $request->post('telefono'),
                $request->post('username'),
                $request->post('password') 
            ]);

            // Redirecciona con un mensaje de éxito
            return redirect()->route('usuarios.index')
                ->with('success', 'Usuario actualizado correctamente.');
        } catch (\Exception $e) {
            // Manejo de errores
            return redirect()->route('usuarios.index')
                ->with('error', 'Error al actualizar el usuario: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // Llamada al procedimiento almacenado para eliminar el usuario
        DB::statement('CALL sp_EliminarUsuario(?)', array($request->post('dni')));
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }
}

