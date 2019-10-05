<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Record;
use App\Http\Resources\Record as RecordResource;
use Illuminate\Http\Request;

class RecordController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($module)
    {
        $recordModel = new Record($module);

        return RecordResource::collection($recordModel->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $module)
    {
        $recordModel = new Record($module);
        $recordModel->fill($request->all());
        $recordModel->save();

        return new RecordResource($recordModel);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($module, $id)
    {
        $recordModel = new Record($module);

        return new RecordResource($recordModel->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $module, $id)
    {
        $recordModel = new Record($module);
        $record = $recordModel->find($id);
        $record->setTable($module);
        $record->fill($request->all());
        $record->save();

        return new RecordResource($record);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($module, $id)
    {
        //
    }
}
