<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Response;
use App\Http\Requests\ExpenseRequest;
use Illuminate\Database\Eloquent\Collection;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return Collection
     */
    public function index() : Collection
    {
        return Expense::get();
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param ExpenseRequest $request
     * @return Response
     */
    public function store(ExpenseRequest $request) : Response
    {
       return response(
            Expense::create($request->all()), 
            201
        );
    }

    /**
     * Display the specified resource.
     * 
     * @param Expense $expense
     * @return Expense
     */
    public function show(Expense $expense) : Expense
    {
        return $expense;
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param ExpenseRequest $request
     * @param Expense $expense
     * @return Expense
     */
    public function update(ExpenseRequest $request, Expense $expense) : Expense
    {
        $expense->update($request->all());
        return $expense;
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param Expense $expense
     * @return array
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return [];
    }
}
