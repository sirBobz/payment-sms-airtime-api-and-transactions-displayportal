<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * Class Account
 *
 * @property int $id
 * @property int $org_id
 * @property int $service_id
 * @property string $account
 * @property string $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Organization $organization
 * @property Service $service
 * @property Collection|AccountIdCredential[] $account_id_credentials
 * @property Collection|ValidationWebhook[] $validation_webhooks
 * @package App\Models
 * @property-read int|null $account_id_credentials_count
 * @property-read int|null $validation_webhooks_count
 * @method static \Illuminate\Database\Eloquent\Builder|Account newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Account newQuery()
 * @method static \Illuminate\Database\Query\Builder|Account onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Account query()
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereOrgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Account withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Account withoutTrashed()
 */
	class Account extends \Eloquent {}
}

namespace App\Models{
/**
 * Class AccountIdCredential
 *
 * @property int $id
 * @property int $account_id
 * @property string $credentials
 * @property string $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Account $account
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|AccountIdCredential newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AccountIdCredential newQuery()
 * @method static \Illuminate\Database\Query\Builder|AccountIdCredential onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AccountIdCredential query()
 * @method static \Illuminate\Database\Eloquent\Builder|AccountIdCredential whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountIdCredential whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountIdCredential whereCredentials($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountIdCredential whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountIdCredential whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountIdCredential whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|AccountIdCredential withTrashed()
 * @method static \Illuminate\Database\Query\Builder|AccountIdCredential withoutTrashed()
 */
	class AccountIdCredential extends \Eloquent {}
}

namespace App\Models{
/**
 * Class AirtimeServiceCredential
 *
 * @property int $id
 * @property int $service_id
 * @property int $telco_id
 * @property string $credentials
 * @property bool $status
 * @property string $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Telco $telco
 * @property Service $service
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeServiceCredential newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeServiceCredential newQuery()
 * @method static \Illuminate\Database\Query\Builder|AirtimeServiceCredential onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeServiceCredential query()
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeServiceCredential whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeServiceCredential whereCredentials($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeServiceCredential whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeServiceCredential whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeServiceCredential whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeServiceCredential whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeServiceCredential whereTelcoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeServiceCredential whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|AirtimeServiceCredential withTrashed()
 * @method static \Illuminate\Database\Query\Builder|AirtimeServiceCredential withoutTrashed()
 */
	class AirtimeServiceCredential extends \Eloquent {}
}

namespace App\Models{
/**
 * Class AirtimeTransaction
 *
 * @property int $id
 * @property int $status
 * @property int $billing_status
 * @property string $reference_name
 * @property string $request_id
 * @property int $org_id
 * @property int $telco_id
 * @property string $phone_number
 * @property float $amount
 * @property float $airtime
 * @property string $third_party_trans_id
 * @property Carbon $transaction_time
 * @property int $result_code
 * @property string $result_desc
 * @property string $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Organization $organization
 * @property Telco $telco
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeTransaction whereAirtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeTransaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeTransaction whereBillingStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeTransaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeTransaction whereOrgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeTransaction wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeTransaction whereReferenceName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeTransaction whereRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeTransaction whereResultCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeTransaction whereResultDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeTransaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeTransaction whereTelcoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeTransaction whereThirdPartyTransId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeTransaction whereTransactionTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AirtimeTransaction whereUpdatedAt($value)
 */
	class AirtimeTransaction extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ApiCredential
 *
 * @property int $id
 * @property int $org_id
 * @property string $consumer_key
 * @property string $consumer_secret
 * @property string $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Organization $organization
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|ApiCredential newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApiCredential newQuery()
 * @method static \Illuminate\Database\Query\Builder|ApiCredential onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ApiCredential query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApiCredential whereConsumerKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApiCredential whereConsumerSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApiCredential whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApiCredential whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApiCredential whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApiCredential whereOrgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApiCredential whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ApiCredential withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ApiCredential withoutTrashed()
 */
	class ApiCredential extends \Eloquent {}
}

namespace App\Models{
/**
 * Class BalanceNotification
 *
 * @property int $id
 * @property int $org_id
 * @property int $sent_status
 * @property int $status
 * @property string $threshold
 * @property string $emails
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceNotification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceNotification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceNotification query()
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceNotification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceNotification whereEmails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceNotification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceNotification whereOrgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceNotification whereSentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceNotification whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceNotification whereThreshold($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BalanceNotification whereUpdatedAt($value)
 */
	class BalanceNotification extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BillingDetail
 *
 * @property int $id
 * @property int $account_id
 * @property string $billing_rate
 * @property string $billing_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Account $account
 * @method static \Illuminate\Database\Eloquent\Builder|BillingDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BillingDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BillingDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|BillingDetail whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingDetail whereBillingRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingDetail whereBillingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillingDetail whereUpdatedAt($value)
 */
	class BillingDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ConfirmationWebhook
 *
 * @property int $id
 * @property int $org_id
 * @property int $service_id
 * @property string $url
 * @property string $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Organization $organization
 * @property Service $service
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|ConfirmationWebhook newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfirmationWebhook newQuery()
 * @method static \Illuminate\Database\Query\Builder|ConfirmationWebhook onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfirmationWebhook query()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfirmationWebhook whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfirmationWebhook whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfirmationWebhook whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfirmationWebhook whereOrgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfirmationWebhook whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfirmationWebhook whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfirmationWebhook whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|ConfirmationWebhook withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ConfirmationWebhook withoutTrashed()
 */
	class ConfirmationWebhook extends \Eloquent {}
}

namespace App\Models{
/**
 * Class FailedJob
 *
 * @property int $id
 * @property string $connection
 * @property string $queue
 * @property string $payload
 * @property string $exception
 * @property Carbon $failed_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob query()
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereConnection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereException($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereFailedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereQueue($value)
 */
	class FailedJob extends \Eloquent {}
}

namespace App\Models{
/**
 * Class MpesaB2cTransaction
 *
 * @property int $id
 * @property int $status
 * @property int $billing_status
 * @property string $reference_name
 * @property string $request_id
 * @property int $org_id
 * @property string $third_party_trans_id
 * @property Carbon $transaction_time
 * @property float $amount
 * @property string $short_code
 * @property string $originator_conversation_id
 * @property float $org_account_balance
 * @property string $phone_number
 * @property string $customer_name
 * @property int $result_code
 * @property string $result_desc
 * @property string $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Organization $organization
 * @package App\Models
 * @property float|null $charge
 * @property string|null $B2C_utility_account_available_funds
 * @property string|null $B2C_charges_paid_account_available_funds
 * @property string|null $B2C_recipientIs_registered_customer
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction whereB2CChargesPaidAccountAvailableFunds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction whereB2CRecipientIsRegisteredCustomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction whereB2CUtilityAccountAvailableFunds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction whereBillingStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction whereCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction whereCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction whereOrgAccountBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction whereOrgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction whereOriginatorConversationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction whereReferenceName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction whereRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction whereResultCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction whereResultDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction whereShortCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction whereThirdPartyTransId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction whereTransactionTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaB2cTransaction whereUpdatedAt($value)
 */
	class MpesaB2cTransaction extends \Eloquent {}
}

namespace App\Models{
/**
 * Class MpesaC2bTransaction
 * private $charge;
 *
 * @property int $id
 * @property int $status
 * @property int $billing_status
 * @property int $service_id
 * @property string $request_id
 * @property int $org_id
 * @property string $third_party_trans_id
 * @property Carbon $transaction_time
 * @property float $amount
 * @property string $short_code
 * @property string $bill_ref_number
 * @property int $org_account_balance
 * @property string $phone_number
 * @property string $customer_name
 * @property int $result_code
 * @property string $result_desc
 * @property string $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Organization $organization
 * @property Service $service
 * @package App\Models
 * @property float|null $charge
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaC2bTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaC2bTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaC2bTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaC2bTransaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaC2bTransaction whereBillRefNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaC2bTransaction whereBillingStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaC2bTransaction whereCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaC2bTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaC2bTransaction whereCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaC2bTransaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaC2bTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaC2bTransaction whereOrgAccountBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaC2bTransaction whereOrgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaC2bTransaction wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaC2bTransaction whereRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaC2bTransaction whereResultCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaC2bTransaction whereResultDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaC2bTransaction whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaC2bTransaction whereShortCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaC2bTransaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaC2bTransaction whereThirdPartyTransId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaC2bTransaction whereTransactionTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MpesaC2bTransaction whereUpdatedAt($value)
 */
	class MpesaC2bTransaction extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Organization
 *
 * @property int $id
 * @property string $name
 * @property string $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Collection|Account[] $accounts
 * @property Collection|AirtimeTransaction[] $airtime_transactions
 * @property Collection|ApiCredential[] $api_credentials
 * @property Collection|ConfirmationWebhook[] $confirmation_webhooks
 * @property Collection|MpesaB2cTransaction[] $mpesa_b2c_transactions
 * @property Collection|MpesaC2bTransaction[] $mpesa_c2b_transactions
 * @property Collection|OrganizationDetail[] $organization_details
 * @property Collection|OrganizationFloatTopUp[] $organization_float_top_ups
 * @property Collection|OrganizationFloat[] $organization_floats
 * @property Collection|SmsTransaction[] $sms_transactions
 * @property Collection|User[] $users
 * @package App\Models
 * @property-read int|null $accounts_count
 * @property-read int|null $airtime_transactions_count
 * @property-read int|null $api_credentials_count
 * @property-read int|null $confirmation_webhooks_count
 * @property-read int|null $mpesa_b2c_transactions_count
 * @property-read int|null $mpesa_c2b_transactions_count
 * @property-read int|null $organization_details_count
 * @property-read int|null $organization_float_top_ups_count
 * @property-read int|null $organization_floats_count
 * @property-read int|null $sms_transactions_count
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Organization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Organization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Organization query()
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereUpdatedAt($value)
 */
	class Organization extends \Eloquent {}
}

namespace App\Models{
/**
 * Class OrganizationDetail
 *
 * @property int $id
 * @property int $org_id
 * @property string $location
 * @property string $website
 * @property string $office_email
 * @property string $office_mobile
 * @property string $top_up_code
 * @property string $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Organization $organization
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationDetail newQuery()
 * @method static \Illuminate\Database\Query\Builder|OrganizationDetail onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationDetail whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationDetail whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationDetail whereOfficeEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationDetail whereOfficeMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationDetail whereOrgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationDetail whereTopUpCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationDetail whereWebsite($value)
 * @method static \Illuminate\Database\Query\Builder|OrganizationDetail withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OrganizationDetail withoutTrashed()
 */
	class OrganizationDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * Class OrganizationFloat
 *
 * @property int $id
 * @property int $org_id
 * @property float $available_balance
 * @property float $current_balance
 * @property string $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Organization $organization
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationFloat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationFloat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationFloat query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationFloat whereAvailableBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationFloat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationFloat whereCurrentBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationFloat whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationFloat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationFloat whereOrgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationFloat whereUpdatedAt($value)
 */
	class OrganizationFloat extends \Eloquent {}
}

namespace App\Models{
/**
 * Class OrganizationFloatTopUp
 *
 * @property int $id
 * @property int $org_id
 * @property float $amount
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Organization $organization
 * @package App\Models
 * @property string|null $reference_id
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationFloatTopUp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationFloatTopUp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationFloatTopUp query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationFloatTopUp whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationFloatTopUp whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationFloatTopUp whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationFloatTopUp whereOrgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationFloatTopUp whereReferenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationFloatTopUp whereUpdatedAt($value)
 */
	class OrganizationFloatTopUp extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PasswordReset
 *
 * @property int $id
 * @property string $email
 * @property string $token
 * @property Carbon $created_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereToken($value)
 */
	class PasswordReset extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Service
 *
 * @property int $id
 * @property string $name
 * @property string $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Collection|Account[] $accounts
 * @property Collection|AirtimeServiceCredential[] $airtime_service_credentials
 * @property Collection|ConfirmationWebhook[] $confirmation_webhooks
 * @property Collection|MpesaC2bTransaction[] $mpesa_c2b_transactions
 * @package App\Models
 * @property-read int|null $accounts_count
 * @property-read int|null $airtime_service_credentials_count
 * @property-read int|null $confirmation_webhooks_count
 * @property-read int|null $mpesa_c2b_transactions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 */
	class Service extends \Eloquent {}
}

namespace App\Models{
/**
 * Class SmsTransaction
 *
 * @property int $id
 * @property int $org_id
 * @property int $status
 * @property int $billing_status
 * @property string $reference_name
 * @property Carbon $transaction_time
 * @property string $request_id
 * @property int $telco_id
 * @property string $phone_number
 * @property string $message
 * @property string $sender_id
 * @property float $amount
 * @property string $third_party_trans_id
 * @property int $result_code
 * @property string $result_desc
 * @property string $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Organization $organization
 * @property Telco $telco
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|SmsTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsTransaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsTransaction whereBillingStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsTransaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsTransaction whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsTransaction whereOrgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsTransaction wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsTransaction whereReferenceName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsTransaction whereRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsTransaction whereResultCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsTransaction whereResultDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsTransaction whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsTransaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsTransaction whereTelcoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsTransaction whereThirdPartyTransId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsTransaction whereTransactionTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsTransaction whereUpdatedAt($value)
 */
	class SmsTransaction extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Telco
 *
 * @property int $id
 * @property string $name
 * @property string $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Collection|AirtimeServiceCredential[] $airtime_service_credentials
 * @property Collection|AirtimeTransaction[] $airtime_transactions
 * @property Collection|SmsTransaction[] $sms_transactions
 * @property Collection|TelcoPrefix[] $telco_prefixes
 * @package App\Models
 * @property-read int|null $airtime_service_credentials_count
 * @property-read int|null $airtime_transactions_count
 * @property-read int|null $sms_transactions_count
 * @property-read int|null $telco_prefixes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Telco newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Telco newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Telco query()
 * @method static \Illuminate\Database\Eloquent\Builder|Telco whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Telco whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Telco whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Telco whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Telco whereUpdatedAt($value)
 */
	class Telco extends \Eloquent {}
}

namespace App\Models{
/**
 * Class TelcoPrefix
 *
 * @property int $id
 * @property string $prefix
 * @property int $telco_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Telco $telco
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|TelcoPrefix newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TelcoPrefix newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TelcoPrefix query()
 * @method static \Illuminate\Database\Eloquent\Builder|TelcoPrefix whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelcoPrefix whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelcoPrefix wherePrefix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelcoPrefix whereTelcoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelcoPrefix whereUpdatedAt($value)
 */
	class TelcoPrefix extends \Eloquent {}
}

namespace App\Models{
/**
 * Class TelescopeEntriesTag
 *
 * @property string $entry_uuid
 * @property string $tag
 * @property TelescopeEntry $telescope_entry
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntriesTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntriesTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntriesTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntriesTag whereEntryUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntriesTag whereTag($value)
 */
	class TelescopeEntriesTag extends \Eloquent {}
}

namespace App\Models{
/**
 * Class TelescopeEntry
 *
 * @property int $sequence
 * @property string $uuid
 * @property string $batch_id
 * @property string $family_hash
 * @property bool $should_display_on_index
 * @property string $type
 * @property string $content
 * @property Carbon $created_at
 * @property TelescopeEntriesTag $telescope_entries_tag
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry query()
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry whereBatchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry whereFamilyHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry whereSequence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry whereShouldDisplayOnIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry whereUuid($value)
 */
	class TelescopeEntry extends \Eloquent {}
}

namespace App\Models{
/**
 * Class TelescopeMonitoring
 *
 * @property string $tag
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeMonitoring newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeMonitoring newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeMonitoring query()
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeMonitoring whereTag($value)
 */
	class TelescopeMonitoring extends \Eloquent {}
}

namespace App\Models{
/**
 * Class User
 *
 * @property int $id
 * @property int $org_id
 * @property string $name
 * @property string $email
 * @property string $phone_number
 * @property string $password
 * @property \Carbon\Carbon $email_verified_at
 * @property string $remember_token
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \App\Models\Organization $organization
 * @package App
 * @property string|null $ip_address
 * @property string|null $two_factor_code
 * @property \Illuminate\Support\Carbon|null $two_factor_expires_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOrgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ValidationWebhook
 *
 * @property int $id
 * @property int $account_id
 * @property string $validation_url
 * @property string $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Account $account
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|ValidationWebhook newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ValidationWebhook newQuery()
 * @method static \Illuminate\Database\Query\Builder|ValidationWebhook onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ValidationWebhook query()
 * @method static \Illuminate\Database\Eloquent\Builder|ValidationWebhook whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ValidationWebhook whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ValidationWebhook whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ValidationWebhook whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ValidationWebhook whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ValidationWebhook whereValidationUrl($value)
 * @method static \Illuminate\Database\Query\Builder|ValidationWebhook withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ValidationWebhook withoutTrashed()
 */
	class ValidationWebhook extends \Eloquent {}
}

