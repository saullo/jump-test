<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServiceOrderResource;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;

class ServiceOrderController extends Controller
{
    /**
     * Retorna todos os itens da tabela 'service_orders'
     */
    public function index(Request $request)
    {
        // Gera o modelo para buscar no banco de dados
        $serviceOrders = ServiceOrder::query();

        // Filtra os resultados caso o input 'vehiclePlate' esteja presente
        if ($request->has('vehiclePlate')) {
            $serviceOrders->where('vehiclePlate', $request->vehiclePlate);
        }

        // Gera a paginação
        $serviceOrders = $serviceOrders->paginate(5);

        // Retorna o resultado da pesquisa
        return ServiceOrderResource::collection($serviceOrders);
    }

    /**
     * Salva um item na tabela 'service_orders'
     */
    public function store(Request $request)
    {
        // Valida a requisição
        $validated = $request->validate([
            'vehiclePlate' => 'required|string|min:7|max:7',
            'entryDateTime' => 'required|date_format:Y-m-d H:i:s',
            'exitDateTime' => 'required|date_format:Y-m-d H:i:s',
            'priceType' => 'required|string',
            'price' => 'required|integer',
            'userId' => 'required|integer|exists:users,id'
        ]);

        // Salva no banco de dados
        $serviceOrder = ServiceOrder::create($validated);

        // Retorna o resultado
        return new ServiceOrderResource($serviceOrder);
    }
}
