<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bundle;
use App\Models\BundleDetail;
use App\Models\BundlePrice;
use App\Models\Room;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BundleController extends Controller
{
    public function index($room)
    {
        $room = Room::getRoom($room);
        $bundle = Bundle::class;
        return view('pages.bundle.index', compact('bundle', 'room'));
    }

    public function create($room)
    {
        $room = Room::getRoom($room);
        return view('pages.bundle.create', compact('room'));
    }

    public function edit($room, $id)
    {
//        dd("a");
        $room = Room::getRoom($room);
//        dd("asd");
        return view('pages.bundle.edit', compact('room', 'id'));
    }

    public function bundlePrice($room, $id)
    {
        $bundlePrice = BundlePrice::class;
        $room = Room::getRoom($room);
        return view('pages.bundle.bundle-price', compact('room', 'id', 'bundlePrice'));
    }

    public function bundlePriceCreate($room, $id)
    {
        $room = Room::getRoom($room);
        return view('pages.bundle.bundle-price-create', compact('room', 'id'));
    }

    public function bundleDetail($room, $id)
    {
        $room = Room::getRoom($room);
        $bundleDetail = BundleDetail::class;
        return view('pages.bundle.bundle-detail', compact('room', 'id', 'bundleDetail'));
    }

    public function bundleDetailCreate($room, $id)
    {
        $room = Room::getRoom($room);
        return view('pages.bundle.bundle-detail-create', compact('room', 'id'));
    }

    public function bundleToken($room, $id)
    {
        $room = Room::getRoom($room);
        $token = Token::class;
        return view('pages.bundle.bundle-token', compact('room', 'id', 'token'));
    }

    public function bundleTokenCreate($room, $id, $number)
    {
        for ($i = 0; $i < $number; $i++) {
            Token::create([
                'bundle_id' => $id,
                'user_id' => null,
                'token' => Str::random(),
            ]);
        }
        return redirect(route('admin.bundle.token.index', [$room, $id]));
    }

    public function export($room, $id)
    {
        $room = Room::getRoom($room);
        $bundle = Bundle::find($id);
        $fileName = $room->title . ' - ' . $bundle->title . '.csv';
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $callback = function () use ($bundle) {
            $delimiter = ';';
            $file = fopen('php://output', 'w');
            fputcsv($file, [''], $delimiter);
            fputcsv($file, ['no', 'token', 'dibuat pada', 'digunakan oleh', 'digunakan pada'], $delimiter);
            foreach ($bundle->tokens as $index=>$token) {
                fputcsv($file, [$index+1, $token->token, $token->created_at, ($token->user!=null)?$token->user->name:' - ', ($token->user!=null)?$token->updated_at:' - '], $delimiter);
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }
}
