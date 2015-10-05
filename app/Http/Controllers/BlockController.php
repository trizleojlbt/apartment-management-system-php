<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use Redirect;
use App\Block;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data = Request::all();

        $rules = [
            'address'        => 'required',
            'area'           => 'required',
        ];

        $messages = [
            'address.required'    => 'Should not be empty.',
            'area.required'       => 'Should not be empty.'
        ];

        $validation = Validator::make($data, $rules, $messages);

        if ($validation->passes()) {
            $block = new Block;
            $block->block_address      = $data['address'];
            $block->block_area         = $data['area'];
            $block->save();
            return Redirect::to('/admin/manageblock');
            
        } else {
            return Redirect::back()->withInput()->withErrors($validation);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Block::all();
        return view('admin.manageblock')->with('blocks', $data);
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
        $data = Request::all();

        print_r($data);
        $block =  Block::find($id);

        $block->block_address      = $data['address'];
        $block->block_area         = $data['area'];

        $block->save();

        return Redirect::to('/admin/manageblock');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Block::destroy($id);

        $data = Block::all();

        return Redirect::to('/admin/manageblock')->with("blocks", $data);
    }
}
