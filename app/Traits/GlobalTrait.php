<?php

namespace App\Traits;

use App\Models\Service;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use App\Models\Telco;
use App\Models\Account;
use App\Models\OrganizationFloat;

trait GlobalTrait
{

    public function getAccountBalance(){

        return OrganizationFloat::where('org_id', auth()->user()->org_id)->value('available_balance');

    }

    public function formatPayload($request)
    {

        $payload = [];

        $payload = $request->validated();

        $payload['org_id'] = auth()->user()->org_id;

        return $payload;
    }

    public function getServiceAccounts($service_name)
    {

        return Cache::remember($service_name . '_account_ids_' . Auth::user()->org_id, 60 * 15, function () use ($service_name) {
            return Account::where('service_id', $this->getServiceId($service_name))
                ->where('org_id', Auth::user()->org_id)->get();
        });
    }

    public function getServiceId($service_name)
    {

        return Cache::remember('service_ids_' . $service_name, 60 * 60 * 24, function () use ($service_name) {
            return Service::where('name', $service_name)->value('id');
        });
    }

    public function appyFilters($dbQuery, $requestData, $tableParams)
    {

        if (!empty($requestData)) {
            if (!empty($requestData['from'])) {
                $startDate = date_format(date_create($requestData['from']), "Y-m-d H:i:s");
                $dbQuery->where($tableParams['table'] . '.created_at', '>=', $startDate);
            }
            if (!empty($requestData['to'])) {
                $endDate = date_format(date_create($requestData['to']), "Y-m-d") . " 23:59:59";
                $dbQuery->where($tableParams['table'] . '.created_at', '<=', $endDate);
            }
            if (!empty($requestData['telco_name'])) {

                $dbQuery->where($tableParams['table'] . '.telco_id', '=', $this->getTelcoId($requestData['telco_name']));
            }
            if (!empty($requestData['reference_name'])) {
                $dbQuery->where($tableParams['table'] . '.reference_name', '=', $requestData['reference_name']);
            }
            if (!empty($requestData['status'])) {
                if ($requestData['status'] == 'Success') {
                    $dbQuery->where($tableParams['table'] . '.result_code', '=', 200);
                } else {
                    $dbQuery->where($tableParams['table'] . '.result_code', '<>', 200);
                }
            }
        }


        return $dbQuery;
    }

    public function getTelcoId($telco_name)
    {

        return Cache::remember('telcos_id_for_' . $telco_name, 10 * 60, function () use ($telco_name) {
            return Telco::where('name', '=', $telco_name)->value('id');
        });
    }

    public function getStatusCodeName($code): string
    {

        switch ($code) {
            case 5:
                $text = 'Partial completion';
                break;
            case 10:
                $text = 'Completed';
                break;
            case 29:
                $text = 'Scheduled';
                break;
            case 100:
                $text = 'Continue';
                break;
            case 101:
                $text = 'Switching Protocols';
                break;
            case 200:
                $text = 'OK';
                break;
            case 201:
                $text = 'Created';
                break;
            case 202:
                $text = 'Accepted';
                break;
            case 203:
                $text = 'Non-Authoritative Information';
                break;
            case 204:
                $text = 'No Content';
                break;
            case 205:
                $text = 'Reset Content';
                break;
            case 206:
                $text = 'Partial Content';
                break;
            case 300:
                $text = 'Multiple Choices';
                break;
            case 301:
                $text = 'Moved Permanently';
                break;
            case 302:
                $text = 'Moved Temporarily';
                break;
            case 303:
                $text = 'See Other';
                break;
            case 304:
                $text = 'Not Modified';
                break;
            case 305:
                $text = 'Use Proxy';
                break;
            case 400:
                $text = 'Bad Request';
                break;
            case 401:
                $text = 'Unauthorized';
                break;
            case 402:
                $text = 'Payment Required';
                break;
            case 403:
                $text = 'Forbidden';
                break;
            case 404:
                $text = 'Not Found';
                break;
            case 405:
                $text = 'Method Not Allowed';
                break;
            case 406:
                $text = 'Not Acceptable';
                break;
            case 407:
                $text = 'Proxy Authentication Required';
                break;
            case 408:
                $text = 'Request Time-out';
                break;
            case 409:
                $text = 'Conflict';
                break;
            case 410:
                $text = 'Gone';
                break;
            case 411:
                $text = 'Length Required';
                break;
            case 412:
                $text = 'Precondition Failed';
                break;
            case 413:
                $text = 'Request Entity Too Large';
                break;
            case 414:
                $text = 'Request-URI Too Large';
                break;
            case 415:
                $text = 'Unsupported Media Type';
                break;
            case 500:
                $text = 'Internal Server Error';
                break;
            case 501:
                $text = 'Not Implemented';
                break;
            case 502:
                $text = 'Bad Gateway';
                break;
            case 503:
                $text = 'Service Unavailable';
                break;
            case 504:
                $text = 'Gateway Time-out';
                break;
            case 505:
                $text = 'HTTP Version not supported';
                break;
            default:
                $text = 'Unknown http status code "' . htmlentities($code) . '"';
                break;
        }

        return $text;
    }
}
