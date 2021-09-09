<?php

namespace App\Http\Composers;

use App\Models\OrganizationFloat;
use Auth;
use Illuminate\Contracts\View\View;

class GlobalComposer
{

    public function compose(View $view)
    {
        $available_balance = OrganizationFloat::where('org_id', Auth::user()->org_id)->value('available_balance');

        $view->with([
            'available_balance' => $available_balance,
        ]);
    }
}
