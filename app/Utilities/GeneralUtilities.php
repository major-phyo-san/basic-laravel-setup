<?php

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

if(!function_exists('CurrentTime')){
    function CurrentTime(): string {
        return  now()->format('Y-m-d H:i:s');
    }
}

if(!function_exists('CurrentDate')){
    function CurrentDate(): string {
        return now()->format('Y-m-d');
    }
}

if(!function_exists('DayStartEndTimestamps')){
    function DayStartEndTimestamps(DateTime $date): Collection {
        $start_timestamp = $date->format('Y-m-d') . ' 00:00:00';
        $end_timestamp = $date->format('Y-m-d') . ' 23:59:59';

        return collect(['start_timestamp'=>$start_timestamp,'end_timestamp'=>$end_timestamp]);
    }
}

if(!function_exists('MonthStartEndDates')){
    function MonthStartEndDates(DateTime $date): Collection {
        $month_end_dates = [
            "01" => "-31",
            "02" => "-28",
            "03" => "-31",
            "04" => "-30",
            "05" => "-31",
            "06" => "-30",
            "07" => "-31",
            "08" => "-31",
            "09" => "-30",
            "10" => "-31",
            "11" => "-30",
            "12" => "-31"
        ];
        $year = intval($date->format('Y'));
        if( (0 == $year%4) & (0 != $year%100) | (0 == $year%400) )
            $month_end_dates["02"] = "-29";

        $month_start_date = $date->format('Y-m') . '-01';
        $month_end_date = $date->format('Y-m') . $month_end_dates[$date->format('m')];

        return collect(['start_date'=>$month_start_date,'end_date'=>$month_end_date]);
    }
}

if(!function_exists('UploadFileToServer')){
    function UploadFileToServer(Request $request, string $file_name, string $path): array{
        $file = $request->file($file_name);
        $file_path = $file->store($path, 'public');
        $file_url = Storage::url($file_path);

        return [
            "file_path" => $file_path,
            "file_url" => $file_url
        ];
    }
}

if(!function_exists('DeleteFileFromServer')){
    function DeleteFileFromServer(string $file_path): bool{
        if(Storage::disk('public')->exists($file_path)){
            Storage::disk('public')->delete($file_path);

            return true;
        }

        return false;
    }
}

if(!function_exists('SendSMSVerificationCode')){
    function SendSMSVerificationCode(string $phone_number, string $verification_code): ResponseInterface {
        $app_name = Config::get('app.name');
        $message = 'Your+verification+code+for+'.$app_name.'+is+'.$verification_code;
        $SMSPohKey = Config::get('services.smspoh');
        $client = new Client();
        $url = 'https://smspoh.com/api/http/send?key='.$SMSPohKey.'&message='.$message.'&recipients='.$phone_number.'&sender='.'SMSPoh';
        $response = $client->get($url);

        return $response;
    }
}
