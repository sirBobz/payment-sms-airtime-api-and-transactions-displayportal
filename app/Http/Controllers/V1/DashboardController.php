<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Cache;
use DB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        return view('V1.dashboard.dashboard')
            ->with('airtime_count', json_encode(array_column($this->getTransactionTotal("AirtimeTransaction", 'airtime_count'), 'count'), JSON_NUMERIC_CHECK))
            ->with('airtime_sum', json_encode(array_column($this->getTransactionSum("AirtimeTransaction", 'airtime_sum'), 'sum'), JSON_NUMERIC_CHECK))
            ->with('sms_count', json_encode(array_column($this->getTransactionTotal("SmsTransaction", 'sms_count'), 'count'), JSON_NUMERIC_CHECK))
            ->with('sms_sum', json_encode(array_column($this->getTransactionSum("SmsTransaction", 'sms_sums'), 'sum'), JSON_NUMERIC_CHECK))
            ->with('mpesa_c2b_count', json_encode(array_column($this->getTransactionTotal("MpesaC2bTransaction", 'mpesa_c2b_count'), 'count'), JSON_NUMERIC_CHECK))
            ->with('mpesa_c2b_sum', json_encode(array_column($this->getTransactionSum("MpesaC2bTransaction", 'mpesa_c2b_sum'), 'sum'), JSON_NUMERIC_CHECK))
            ->with('mpesa_b2c_count', json_encode(array_column($this->getTransactionTotal("MpesaB2cTransaction", 'mpesa_b2c_count'), 'count'), JSON_NUMERIC_CHECK))
            ->with('mpesa_b2c_sum', json_encode(array_column($this->getTransactionSum("MpesaB2cTransaction", 'mpesa_b2c_sum'), 'sum'), JSON_NUMERIC_CHECK));
    }


    private function getTransactionTotal($model, $model_totals)
    {
        return Cache::remember($model_totals . '_' . auth()->user()->org_id, 10 * 60, function () use ($model) {

            $modelName = '\App' . '\\' . 'Models' . '\\' . $model;

            $emptyMonth = array('count' => 0, 'month' => 0);

            $dataTotal = $modelName::select(DB::raw('count(id) as count'), DB::raw("MONTH(created_at)  as month"))
                ->where('org_id', auth()->user()->org_id)
                ->where('result_code', 200)
                ->whereRaw('year(`created_at`) = ?', array(date('Y')))
                ->groupBy('month')
                ->get()
                ->toArray();


            return $this->includeMonthsWithNoData($emptyMonth, $dataTotal);

        });

    }

    private function includeMonthsWithNoData($emptyMonth, $dataTotal): array
    {

        $monthlyArray = array();

        for ($i = 1; $i <= 12; $i++) {//generate an array with default values
            $emptyMonth['month'] = $i;
            $monthlyArray[$i - 1] = $emptyMonth;

        }

        foreach ($dataTotal as $key => $array) {//add the results to the default array
            $monthlyArray[$array['month'] - 1] = $array;
        }

        return $monthlyArray;

    }

    private function getTransactionSum($model, $model_sum)
    {

        return Cache::remember($model_sum . '_' . auth()->user()->org_id, 10 * 60, function () use ($model) {

            $modelName = '\App' . '\\' . 'Models' . '\\' . $model;

            $emptyMonth = array('sum' => 0, 'month' => 0);

            $dataTotal = $modelName::select(DB::raw("SUM(amount) as sum"), DB::raw("MONTH(created_at) as month"))
                ->where('org_id', auth()->user()->org_id)
                ->where('result_code', 200)
                ->whereRaw('year(`created_at`) = ?', array(date('Y')))
                ->groupBy('month')
                ->get()
                ->toArray();

            return $this->includeMonthsWithNoData($emptyMonth, $dataTotal);

        });

    }

}
