<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UploadRequest;
use App\DashboardHome;
use Carbon\Carbon;

class DashboardHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rand1 = md5(uniqid(rand(), true).'-'.date('+1').'-'.mt_rand());
        $rand2 = md5(uniqid(rand(), true).'-'.date('+2').'-'.mt_rand());
        $rand3 = md5(uniqid(rand(), true).'-'.date('+3').'-'.mt_rand());
        $rand4 = md5(uniqid(rand(), true).'-'.date('+4').'-'.mt_rand());

        return view('dashboardHome.index', compact([
            'rand1',
            'rand2',
            'rand3',
            'rand4',
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validating
        $this->validate(
            request(), [
                'head_text_1' => 'required|min:3',
                'head_text_2' => 'required|min:3',
                'head_text_3' => 'required|min:3',
                'head_intro' => 'required|min:3',
                'mid_content_img_id_1' => 'required|min:3',
                'mid_content_img_id_2' => 'required|min:3',
                'mid_content_img_id_3' => 'required|min:3',
                'mid_content_text_1' => 'required|min:3',
                'mid_content_text_2' => 'required|min:3',
                'mid_content_text_3' => 'required|min:3',
                'mid_content_desc_1' => 'required|min:3',
                'mid_content_desc_2' => 'required|min:3',
                'mid_content_desc_3' => 'required|min:3',
                'mid_content_bg_id' => 'required|min:3',
                'mid_content_intro_1' => 'required|min:3',
                'mid_content_intro_2' => 'required|min:3'
            ]
        );

        $dashboardHome = DashboardHome::create($request->all());

        // foreach ($request->photos as $photo) {
        //     $filename = $photo->store('photos');

        //     $photo->move(public_path("/uploads/photos"), $filename);

        //     PagesPhotos::create([
        //         'page_id' => $page->id,
        //         'filename' => $filename
        //     ]);
        // }

        // flash message
        \Session::flash('flash_message', 'Homepage is successfully updated.');

        return redirect('edit_dashboard_home', $dashboardHome->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($dashboardHome)
    {
        $dHome = DashboardHome::where('id', $dashboardHome)->get();

        return view('dashboardHome.edit', compact('dHome'));
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
        // validating
        $this->validate(
            request(), [
                'head_text_1' => 'required|min:3',
                'head_text_2' => 'required|min:3',
                'head_text_3' => 'required|min:3',
                'head_intro' => 'required|min:3',
                'mid_content_img_id_1' => 'required|min:3',
                'mid_content_img_id_2' => 'required|min:3',
                'mid_content_img_id_3' => 'required|min:3',
                'mid_content_text_1' => 'required|min:3',
                'mid_content_text_2' => 'required|min:3',
                'mid_content_text_3' => 'required|min:3',
                'mid_content_desc_1' => 'required|min:3',
                'mid_content_desc_2' => 'required|min:3',
                'mid_content_desc_3' => 'required|min:3',
                'mid_content_bg_id' => 'required|min:3',
                'mid_content_intro_1' => 'required|min:3',
                'mid_content_intro_2' => 'required|min:3'
            ]
        );

        DashboardHome::find($id)->update($request->all());

        // flash message
        \Session::flash('flash_message', 'Homepages is successfully updated.');

        return redirect('edit_dashboard_home', $id);
    }

}
