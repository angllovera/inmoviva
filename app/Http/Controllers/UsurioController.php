<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsurioController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos
        $validatedData = $request->validate([
            'nombre' => 'required|string|regex:/^[a-zA-ZÀ-ÿ\s]+$/u|max:255', // Solo letras y espacios
            'email' => 'required|email|max:255',
            'telefono' => 'required|numeric|digits:8', // Solo números y máximo 8 dígitos
        ]);

        // Crear el cliente después de la validación
        Usuario::create($validatedData);

        // Redirigir con un mensaje de éxito
        return redirect()->route('clientes.index')->with('success', 'Cliente creado con éxito.');
    }


    public function destroy($id)
    {
        // Buscar al cliente por ID
        $cliente = Usuario::findOrFail($id);

        // Eliminar el cliente de la base de datos
        $cliente->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Cliente eliminado exitosamente.');
    }
}
