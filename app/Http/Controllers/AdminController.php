<?php

namespace App\Http\Controllers;

use App\Models\Pic;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $pictures = Pic::all();
        return view('admin', ['pictures' => $pictures]);
    }

    public function discardApprovalStatus(Request $request) {
        $picInternalId = $request->get('id');

        if ($pic = Pic::find($picInternalId)) {
            $pic->is_approved = null;
            $pic->save();
        } else {
            abort(404);
        }
        return true;
    }
}
