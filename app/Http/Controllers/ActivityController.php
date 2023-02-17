<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $data = Content::whereIn('status', ['Y', 'N'])->where('type','2')->orderBy('seq')->get();
        $count = Content::whereIn('status', ['Y', 'N'])->where('type','2')->count();
$min = Content::whereIn('status', ['Y', 'N'])->where('type','2')->min('seq');
$max = Content::whereIn('status', ['Y', 'N'])->where('type','2')->max('seq');


        return view('activity.index')->with('data',$data)->with('min',$min)->with('max',$max)->with('count',$count);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('activity.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $max = Content::where('type',2)->max('seq');


        $ins = Content::create([
            'title_th' => $request->title_th,
            'title_en' => $request->title_en,
            'desciption_th' => $request->desciption_th,
            'desciption_en' => $request->desciption_en,
            'keyword' => $request->keyword,
            'detail_th' => $request->detail_th,
            'detail_en' => $request->detail_en,
            'image' => $request->image,
            'type' => 2,
            'seq' => $max+1,
            'status' => $request->status
        ]);



           return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);
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

    public function oneshow($id)
    {
        //

        $texs = Content::where('id',$id)->first();



        return view('front.content')->with('data',$texs);
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

        $datas = Content::where('type',2)->where('id',$id)->first();

        return view('activity.formedit')->with('content',$datas);
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


        $updateseq = Content::where('id',$id)->where('type',2)->update([
            'title_th' => $request->title_th,
            'title_en' => $request->title_en,
            'detail_th' => $request->detail_th,
            'detail_en' => $request->detail_en,
            'image' => $request->images,
            'desciption_th' => $request->desciption_th,
            'desciption_en' => $request->desciption_en,
            'status' => $request->status,
            'keyword' => $request->keyword,
        ]);

        return redirect()->route('activity.index')->with('success','System update successfully');
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


        $vat = Content::where('id',$id)->first();
        $seq = Content::where('seq','>',$vat->seq)->where('type',2)->get();
        $datase = $vat->seq;
        foreach ($seq as $key => $seq) {
            $updateseq = Content::where('id',$seq->id)->update([
                'seq' => $datase
            ]);

            $datase++;
        }

     $delete = Content::where('id',$id)->delete();



        return response()->json([
            'msg_return' => 'ลบสำเร็จ',
            'code_return' => 1,
        ]);
        }


        public function activity()
        {

            $tmp = Content::where('status','Y')->where('type',2)->orderby('seq','asc')->get();
            return view('front.activity')->with('tmp',$tmp);

        }
    }

