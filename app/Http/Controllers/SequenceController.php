<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class SequenceController extends Controller
{
    //

    public function up(Request $request)
    {

      //  $sequence_a = Content::where('type',1)->where('seq',   $request->no)->first();

        switch($request->name):
            case "news":
               $sequence_a = Content::where('type',1)->where('seq',   $request->no)->first();
               $sequence_b = Content::where('type',1)->where('seq', --$request->no)->first();
            break;
            case "activity":
                $sequence_a = Content::where('type',2)->where('seq',   $request->no)->first();
                $sequence_b = Content::where('type',2)->where('seq', --$request->no)->first();
            break;

            case "video":
                $sequence_a = Content::where('type',3)->where('seq',   $request->no)->first();
                $sequence_b = Content::where('type',3)->where('seq', --$request->no)->first();
            break;
        endswitch;

       $sequence_a->seq = --$sequence_a->seq;
       $sequence_b->seq = ++$sequence_b->seq;
       $sequence_b->save();
       $sequence_a->save();



        return response("success up");

    }

    public function down(Request $request)
    {

        switch($request->name):
            case "news":
               $sequence_a = Content::where('type',1)->where('seq',   $request->no)->first();
               $sequence_b = Content::where('type',1)->where('seq', ++$request->no)->first();
                break;

            case "activity":
                $sequence_a = Content::where('type',2)->where('seq',   $request->no)->first();
                $sequence_b = Content::where('type',2)->where('seq', ++$request->no)->first();
                 break;

                 case "video":
                    $sequence_a = Content::where('type',3)->where('seq',   $request->no)->first();
                    $sequence_b = Content::where('type',3)->where('seq', ++$request->no)->first();
                break;
        endswitch;

       $sequence_a->seq = ++$sequence_a->seq;
       $sequence_b->seq = --$sequence_b->seq;
       $sequence_b->save();
       $sequence_a->save();

        return response("success down");
    }
}
