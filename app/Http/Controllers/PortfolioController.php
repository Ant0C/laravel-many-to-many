<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use App\Models\Portfolio;
use Illuminate\Support\Str;
use App\Models\Type;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $trashed = $request->input('trashed');
        if($trashed){
            $portfolio = Portfolio::onlyTrashed()->get();
        }else{
            $portfolio = Portfolio::all();
        }

        return view('portfolios.index', compact('portfolio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('portfolios.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePortfolioRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePortfolioRequest $request)
    {
        $data = $request->validated();
        //dd($data);
        $data ['slug'] = Str::slug($data['name']);

        $portfolio = Portfolio::create($data);

        return to_route('portfolios.show',$portfolio);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portfolio $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        return view('portfolios.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        $types = Type::all();
        return view('portfolios.edit', compact('portfolio','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePortfolioRequest $request
     * @param  \App\Models\Portfolio $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        $data = $request->validated();
        
        if($data['name'] !== $portfolio->name){
            $data ['slug'] = Str::slug($data['name']);
        }

        $portfolio->update($data);

        return to_route('portfolios.show',$portfolio);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        if($portfolio->trashed()){
            $portfolio->forceDelete();
        } else{
            $portfolio->delete();
        }

        return back();
    }
}
