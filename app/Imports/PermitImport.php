<?php
  
namespace App\Imports;

use DB;
use DateTime;
use Exception;
use App\Search;
use App\SearchAddress;
use Twilio\Rest\Client;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
  
class PermitImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        try {
            $row['_token'] = csrf_token();
            $date1 = ($row['permitstatusdate'] - 25569) * 86400;
            $row['permitstatusdate'] = date('Y-m-d', $date1);
            $date2 = ($row['permiteffectivedate'] - 25569) * 86400;
            $row['permiteffectivedate'] = date('Y-m-d',$date2);

            $row['propertyfulladdress'] = $row['propertyfulladdress'].', '.$row['propertycity'].', '.$row['propertystate'].' 0'.$row['propertyzipcode'];

            $array = [
                'masterpermitid' => $row['masterpermitid'],
                'sourceid' => $row['sourceid'],
                'sourcepermitid' => $row['sourcepermitid'],
                'fipscode' => $row['fipscode'],
                'location' => $row['location'],
                'propertyfulladdress' => $row['propertyfulladdress'],
                'propertyhousenumberprefix' => $row['propertyhousenumberprefix'],
                'propertyhousenumber' => $row['propertyhousenumber'],
                'propertyhousenumbersuffix' => $row['propertyhousenumbersuffix'],
                'propertydirection' => $row['propertydirection'],
                'propertystreetname' => $row['propertystreetname'],
                'propertymode' => $row['propertymode'],
                'propertyquadrant' => $row['propertyquadrant'],
                'propertyunitnumber' => $row['propertyunitnumber'],
                'propertycity' => $row['propertycity'],
                'propertystate' => $row['propertystate'],
                'propertyzipcode' => '0'.$row['propertyzipcode'],
                'propertyzipcodeplusfour' => $row['propertyzipcodeplusfour'],
                'permitnumber' => (string)$row['permitnumber'],
                'projectname' => $row['projectname'],
                'permittype' => $row['permittype'],
                'permitsubtype' => $row['permitsubtype'],
                'permitclass' => $row['permitclass'],
                'permitdescription' => $row['permitdescription'],
                'permitstatus' => $row['permitstatus'],
                'permitstatusdate' => $row['permitstatusdate'],
                'permiteffectivedate' => $row['permiteffectivedate'],
                'permitjobvalue' => $row['permitjobvalue'],
                'permitfee' => $row['permitfee'],
                'applicantname' => $row['applicantname'],
                '_token' => $row['_token']
            ];


            $check = Search::where('permitnumber',$array['permitnumber'])->first();
            $check1 = SearchAddress::where(['search_name'=>$array['propertyfulladdress'],'alarm'=>1])->first();
            
            if(isset($check1) && !empty($check1)){
                $phone = DB::table('alarm_notification')->where('user_id',$check1->user_id)->get()[0]->phone;
                $message = "Hello , This permit number ".$array['permitnumber']." status  ".$array['permitstatus'].".";
                $account_sid = config('app.TWILIO_SID');
                $auth_token = config('app.TWILIO_AUTH_TOKEN');
                $twilio_number = config('app.TWILIO_NUMBER');

                $client = new Client($account_sid, $auth_token);
                $client->messages->create($phone, 
                        ['from' => $twilio_number, 'body' => $message] );
            }
            if(empty($check) && !isset($check)){
                Search::insertGetId($array);
            }else{
                Search::where('permitnumber',$array['permitnumber'])->update($array); 
            }
        } catch (Exception $e) {
            
        }
    }

    public function batchSize(): int
    {
        return 500;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}