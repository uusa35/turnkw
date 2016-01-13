<?php

namespace App\Http\Controllers\Backend;

use App\Core\PrimaryImageService;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Core\PrimaryEmailService;
use Laracasts\Flash\Flash;


class MaintenanceController extends Controller
{

    use PrimaryEmailService;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.modules.maintenance.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.maintenance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateMaintenanceRequest $request)
    {

        //dd($request->all());

        //public function CreateImage($currentImage, $folderName, $thumbResize, $largeResize)


        foreach($request->file('images') as $key => $file) {;

            $fileName = $file->getClientOriginalName();

            $file->move(storage_path('app/uploads'), $fileName);

            $request->merge(['images'.'['.$key.']' => $fileName]);
        }

        $this->sendMaintenanceRequest($request->all());

        Flash::success('email has been sent successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
