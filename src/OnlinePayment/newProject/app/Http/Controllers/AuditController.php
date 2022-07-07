<?php

namespace App\Http\Controllers;

use app\Http\Controllers\Controller;
use App\Service\AuditService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

/**
 * Class Audit Controller
 */
class AuditController extends Controller
{
    protected $auditService;

    /**
     * @param AuditService $auditService
     */
    public function __construct(AuditService $auditService){
        $this->auditService = $auditService;

    }

    /**
     * Retrieves the activity log of specific user
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showAudit()
    {
        try{
            $user_id = Auth::user()->id;
            $audits=$this->auditService->findAllBy('user_id', $user_id);
            return view('Audit.ShowAudits', compact('audits'))->with('status', 'Activity log');
        }
        catch (\Exception $exception){
            Log::error($exception);
            return Redirect::back()->withErrors(['error_msg', $exception]);
        }

    }
}
