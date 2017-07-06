<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DashboardAssets;

class DashboardAssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboardAssets.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $output_dir = public_path("/uploads/photos");
        if (isset($_FILES["photos"])) {
            $ret = array();
            $error = $_FILES["photos"]["error"];
            
            if (! is_array($_FILES["photos"]["name"])) {
                // $fileName = $_FILES["photos"]["name"];
                // move_uploaded_file($_FILES["photos"]["tmp_name"], $output_dir . $fileName);
                // $ret[] = $fileName;
                $photo = $request->photos;
                $filename = $photo->store('photos');
                $photo->move(public_path("/uploads/photos"), $filename);
                $ret[] = $filename;

                DashboardAssets::create([
                    'filename' => $filename
                ]);
            } else {
                
                // $fileCount = count($_FILES["photos"]["name"]);
                $fileCount = count($request->photos);
                for ($i = 0; $i < $fileCount; $i++) {

                    // $filename = $_FILES["photos"]["name"][$i];
                    // move_uploaded_file($_FILES["photos"]["tmp_name"][$i], $filename);
                    $photo = $request->photos[$i];
                    $filename = $photo->store('photos');
                    $photo->move(public_path("/uploads/photos"), $filename);
                    $ret[] = $filename;

                    DashboardAssets::create([
                        'filename' => $filename
                    ]);
                }
            }
            echo json_encode($ret);
        }

        //return response()->json('SUCCESS');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
