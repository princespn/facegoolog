<?php

namespace App\Http\Controllers\Voyager;

use DB;
use Exception;
use DateTime;
use App\Imports\PermitImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataRestored;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadImagesDeleted;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Validator;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;
use TCG\Voyager\Http\Controllers\VoyagerBaseController as BaseVoyagerBaseController;

class UploadPermitController extends BaseVoyagerBaseController
{
    use BreadRelationshipParser;

    public function store(Request $request)
    {
        try{

            $slug = $this->getSlug($request);
            $file = $request->file('filename');
            $imgrealpath= $file[0]->getClientOriginalName();
            $filename = pathinfo($imgrealpath, PATHINFO_FILENAME);
            $extension = pathinfo($imgrealpath, PATHINFO_EXTENSION);
            $valid = ['xlsx','xls','xlsb'];
            if(in_array($extension, $valid)){
                DB::table('pemit_data_upload')->insertGetId(['filename'=> $imgrealpath]);
                Excel::import(new PermitImport,$file[0]);
                return redirect()->back()->withSuccess('Successfully uploaded Excel');
            }else{
                return redirect()->back()->withFail('Invalid file extension');
            }

        }catch(Exception $e){
            print_r($e,true);
            dd($e);
        }
        
    }

}