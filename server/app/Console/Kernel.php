<?php

namespace App\Console;

use App\Enums\Prefecture;
use App\MlitApi\MlitApi;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
       $schedule->call(function (MlitApi $mlitApi) {
           $prefectures = Prefecture::PREFECTURES;

           foreach ($prefectures as $prefecture) {
               $mlitList = $mlitApi->mlitList($prefecture);
               $realEstateInformationList = [];
               foreach ($mlitList as $mlit) {
                   $collection = collect($mlit);
                   $filtered = $collection->only([
                       'Type',
                       'MunicipalityCode',
                       'Prefecture',
                       'Municipality',
                       'DistrictName',
                       'Area',
                       'UnitPrice',
                       'TradePrice',
                       'Period'
                   ]);
                   // ここの処理を関数化して処理できるとスマート
                   $converted = [];
                   $converted['type'] = $filtered['Type'];
                   $converted['municipality_code'] = $filtered['MunicipalityCode'];
                   $converted['prefecture'] = $filtered['Prefecture'];
                   $converted['municipality'] = $filtered['Municipality'];
                   $converted['district_name'] = empty($filtered['DistrictName']) ? '土地名なし' : $filtered['DistrictName'];
                   $converted['area'] = (int)$filtered['Area'];
                   $converted['trade_price'] = (int)$filtered['TradePrice'];
                   $converted['period'] = $filtered['Period'];
                   if (empty($filtered['UnitPrice'])) {
                       $result = $converted['trade_price'] / $converted['area'];
                       $converted['unit_price'] = round($result);
                   } else {
                       $converted['unit_price'] = (int)$filtered['UnitPrice'];
                   }

                   $realEstateInformationList[] = $converted;
               }
               DB::beginTransaction();
               try {
                   foreach ($realEstateInformationList as $realEstateInformation) {
                       DB::table('properties')->insert($realEstateInformation);
                   }
                   DB::commit();
               } catch (\Exception $e) {
                   DB::rollBack();
               }
           }
       })->quarterly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
