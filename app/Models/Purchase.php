<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Purchase extends Model
{
    use HasFactory;
    public $timestamps = false;


    public function getAllPurchase()
    {
        return $this->all();
    }

    public function storePurchase(Request $request)
    {
        try {
            $request->validate([
                'event_id' => 'required|integer|exists:events,id',
                'client_id' => 'required|integer|exists:clients,id',
                'metodo_pago' => 'required|string',
            ]);

            // Verificar si el evento tiene disponibilidad
            $disponibilidad = Event::find($request->event_id)->disponibilidad;
            if (!$disponibilidad) {
                return response()->json([
                    'message' => 'El evento no tiene disponibilidad o no esta disponible para la compra'
                ], 400);
            }

            $newPurchase = new Purchase();

            $newPurchase->event_id = $request->event_id;
            $newPurchase->client_id = $request->client_id;
            $newPurchase->metodo_pago = $request->metodo_pago;

            $newPurchase->save();

            // Verificar si la compra supera la capacidad del evento, 
            // si es así, se cambia la disponibilidad del evento
            $purchaseCount = $this->where('event_id', $request->event_id)->count();
            $event = Event::find($request->event_id);
            //print_r($purchaseCount);
            if ($purchaseCount >= $event->capacidad) {
                $event->disponibilidad = false;
                $event->update();
            }

            return response()->json($newPurchase, 200);

        }catch (\Exception $e){
            return response()->json([
                'message' => 'Error al validar los datos',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function getPurchaseByClientId($id)
    {
        try {
            $purchase = $this->where('client_id', $id)->get();

            if ($purchase->isEmpty()){
                return response()->json([
                    'message' => 'No se encontraron compras para el cliente'
                ], 404);
            }

            return response()->json($purchase, 200);

        }catch (\Exception $e){
            return response()->json([
                'message' => 'Error al obtener las compras',
                'error' => $e->getMessage()
            ], 400);
        }
    }
    
}
