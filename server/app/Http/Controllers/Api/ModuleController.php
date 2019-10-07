<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Http\Resources\Module as ModuleResource;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ModuleResource::collection(Module::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $module = new Module();

        $module->name = $request->name;
        $module->schema = $request->schema;
        $module->record_collection = strtolower(preg_replace('/\s+/', '_', $request->name));
        $module->notification_list = $request->notification_list;
        $module->item_name = $request->item_name;

        $module->save();

        return new ModuleResource($module);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $module = Module::find($id);
        return new ModuleResource($module);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $module = Module::find($id);

        $module->name = $request->name;
        $module->schema = $request->schema;
        $module->record_collection = strtolower(preg_replace('/\s+/', '_', $request->name));
        $module->notification_list = $request->notification_list;
        $module->item_name = $request->item_name;

        $module->save();

        return new ModuleResource($module);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
