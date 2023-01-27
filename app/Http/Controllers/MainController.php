<?php

namespace App\Http\Controllers;

use App\Models\Pic;
use App\Services\RandomPicService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MainController extends Controller
{
    private RandomPicService $randomPicService;

    public function __construct(RandomPicService $randomPicService)
    {
        $this->randomPicService = $randomPicService;
    }

    /**
     * Show picture page
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        try {
            $picLink = $this->randomPicService->getPicUri();
        } catch (\Exception $exception) {
            abort(500, 'Picture service is not available.');
        }

        Pic::firstOrCreate([
            'external_id' => $this->randomPicService->getIdByUri($picLink),
            'link' => $picLink
        ]);

        return view('main', ['picLink' => $picLink]);
    }

    public function approve(Request $request) {
        $picId = $request->get('picId');
        $status = $request->get('isApproved') === 'true';
        if ($pic = Pic::where('link', $picId)->first()) {
            $pic->is_approved = $status;
            $pic->save();
        } else {
            abort(404);
        }
        return true;
    }
}
