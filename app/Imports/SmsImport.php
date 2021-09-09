<?php

namespace App\Imports;

use App\Models\SmsTransaction;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithEvents;
use App\Notifications\ImportHasFailedNotification;
use Exception;
use Maatwebsite\Excel\Events\AfterImport;
use App\Events\ImportFailed;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

class SmsImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, ShouldQueue, WithValidation
{
    use Importable;

    private object $request;
    private $user;

    public function  __construct($request, $user)
    {
        $this->request = $request;
        $this->user = $user;
    }

    /**
     * @param array $row
     *
     * @return Model|null
     */
    public function model(array $row)
    {

        return new SmsTransaction([
            'phone_number'  => $row['phone_number'] ?? $row['number'] ?? $row['phone'] ?? $row['mobile'] ?? $row['mobile_number'] ?? $row['msisdn'] ?? null,
            'message'        => $this->request->message,
            'reference_name' => $this->request->reference_name,
            'org_id'        => $this->user->org_id,
            'transaction_time' => $this->request->send_time,
            'sender_id'   => $this->request->sender_id,
            'request_id'    => Str::random(5) . str_replace("-", "", Str::uuid()->toString()) . Str::random(5),
            'status'  => 29
        ]);
    }

    public function rules(): array
    {
        return [
            '*.phone_number' => 'sometimes|numeric|digits_between:9,12',
            '*.number' => 'sometimes|numeric|digits_between:9,12',
            '*.phone' => 'sometimes|numeric|digits_between:9,12',
            '*.mobile' => 'sometimes|numeric|digits_between:9,12',
            '*.mobile_number' => 'sometimes|numeric|digits_between:9,12',
            '*.msisdn' => 'sometimes|numeric|digits_between:9,12',
        ];
    }

    // public function registerEvents(): array
    // {

    //     return [
    //          // Using a class with an __invoke method.
    //           ImportFailed::class => new ImportFailed(),

    //     ];
    // }

    public function batchSize(): int
    {
        return 300;
    }

    public function chunkSize(): int
    {
        return 300;
    }
}
