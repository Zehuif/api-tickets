<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    public function getAllEvents()
    {
        return $this->all();
    }

    public function storeEvents(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string',
                'artista' => 'required|string',
                'informacion' => 'required|string',
                'precio' => 'required|integer',
                'inicio_evento' => 'required|date',
                'duracion' => 'required|integer',
                'capacidad' => 'required|integer',
                'disponibilidad' => 'required|boolean'
            ]);

            $newEvent = new Event();

            $newEvent->nombre = $request->nombre;
            $newEvent->artista = $request->artista;
            $newEvent->informacion = $request->informacion;
            $newEvent->precio = $request->precio;
            $newEvent->inicio_evento = $request->inicio_evento;
            $newEvent->duracion = $request->duracion;
            $newEvent->capacidad = $request->capacidad;
            $newEvent->disponibilidad = $request->disponibilidad;

            $newEvent->save();

            return response()->json($newEvent, 200);

        }catch (\Exception $e){
            return response()->json([
                'message' => 'Error al validar los datos',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function getEventById($id)
    {
        try {
            $event = $this->find($id);

            if ($event) {
                return response()->json($event, 200);
            } else {
                return response()->json([
                    'message' => 'Evento no encontrado'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al obtener el evento',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function getAvailableEvents()
    {
        try {
            $events = $this->where('disponibilidad', true)->get();
            
            if ($events) {
                $filteredEvents = $events->map(function ($event) {
                    return [
                        'nombre' => $event->nombre,
                        'artista' => $event->artista,
                        'informacion' => $event->informacion,
                        'inicio_evento' => $event->inicio_evento,
                        'precio' => $event->precio
                    ];
                });
                return response()->json($filteredEvents, 200);
            } else {
                return response()->json([
                    'message' => 'No hay eventos disponibles'
                ], 404);
            }

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al obtener los eventos',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function updateEventAvailability($id)
    {
        try {
            $event = $this->find($id);

            if ($event) {
                $event->disponibilidad = !$event->disponibilidad;
                $event->update();

                return response()->json($event, 200);
            } else {
                return response()->json([
                    'message' => 'Evento no encontrado'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar la disponibilidad del evento',
                'error' => $e->getMessage()
            ], 400);
        }
    }
}
