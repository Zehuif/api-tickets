<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    private $purchase;

    public function __construct(Purchase $purchase)
    {
        $this->purchase = $purchase;
    }

    public function index()
    {
        return $this->purchase->getAllPurchase();
    }

    public function store(Request $request)
    {
        return $this->purchase->storePurchase($request);
    }

    public function show($id)
    {
        return $this->purchase->getPurchaseByClientId($id);
    }
}
