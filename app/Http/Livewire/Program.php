<?php

namespace App\Http\Livewire;

use App\Models\Bundle;
use App\Models\Payment;
use App\Models\PublicBanner;
use App\Models\ReferralCode;
use App\Models\ReferralCodeUse;
use App\Models\Room;
use App\Models\Token;
use App\Models\UserOwnCourse;
use App\Models\UserOwnExam;
use Livewire\Component;
use Xendit\Invoice;
use Xendit\Xendit;

class Program extends Component
{
    public $room;
    public $myClass;
    public $program;
    public $token;
    public $amount;
    public $checkOut;
    public $bundleActive;
    public $mount;
    public $total;
    public $referral;
    public $referralBundle;
    public $referralMsg;
    public $referralDiscount = 0;
    public $referralUse;
    public $banners;
    protected $listeners = ["payment" => "payment"];

    public function buy($id,$minus)
    {
        $this->amount[$id] = 1;
        $this->checkOut = $id;
        $this->bundleActive = Bundle::find($id);
        $total = $this->amount[$id] * $this->bundleActive->bundlePrices[0]->price;
        $this->total = $total - $minus;
        if ($this->bundleActive->referral_can_use!=2){
            $this->referralDiscount=0;
            $this->referralUse=null;
        }
        if(isset($this->referralBundle->id)) {
            if ($this->referralBundle->id != $this->bundleActive->id) {
                $this->referralDiscount = 0;
                $this->referralUse = null;
            }
        }
        $this->emit('swal:confirm', ['title' => 'Periksa kembali',
            'icon' => 'info',
            'confirmText' => 'Proses',
            'text' => 'Pembelian Paket <br>' . $this->bundleActive->title . ' - ' . intval($this->amount[$id]) . 'x <br>' .
                'Total : ' . ($total - $minus - $this->referralDiscount)
            ,
            'method' => 'payment']);
    }

    public function payment()
    {
        $id = $this->checkOut;
        Xendit::setApiKey(env('API_KEY'));
        $params = [
            'external_id' => auth()->id() . "",
            'payer_email' => auth()->user()->email,
            'description' => 'Pembelian Paket ' . $this->bundleActive->title . ' - ' . $this->amount[$id] . 'x',
            'amount' => $this->total - $this->referralDiscount,
        ];
        $createInvoice = Invoice::create($params);
        $url = $createInvoice['invoice_url'];
        if ($this->referralUse != null) {
            Payment::create([
                'bundle_id' => $this->bundleActive->id,
                'payment_id' => $createInvoice['id'],
                'amount' => $this->amount[$id],
                'status' => 1,
                'user_id' => auth()->id(),
                'referral_code_id' => $this->referralUse->id,
                'link'=>$url
            ]);
            ReferralCodeUse::create([
                'referral_code_id' => $this->referralUse->id,
                'user_id' => auth()->id()
            ]);
        } else {
            Payment::create([
                'bundle_id' => $this->bundleActive->id,
                'payment_id' => $createInvoice['id'],
                'amount' => $this->amount[$id],
                'status' => 1,
                'user_id' => auth()->id(),
                'link'=>$url
            ]);
        }
        $this->emit('redirect:new', $url);
    }

    public function mount()
    {
        $this->room = Room::getRoom($this->room);
        $this->banners = PublicBanner::whereRoomId($this->room->id)->get();
        $this->myclass();
    }

    public function myclass()
    {
        $ownExam = auth()->user()->userOwnExams;
        $ownCourse = auth()->user()->userOwnCourses;
        $myClass = [];
        foreach ($ownExam as $oe) {
            if ($oe->exam->room_id == $this->room->id) {
                $myClass[$oe->exam->room->title]['exam'][$oe->exam_id] = $oe->toArray();
            }
        }
        foreach ($ownCourse as $oe) {
            if ($oe->course->room_id == $this->room->id) {
                $myClass[$oe->course->room->title]['course'][$oe->course_id] = $oe->toArray();
            }
        }
        $this->myClass = $myClass;
    }

    public function activateToken($id)
    {
        $this->program = $id;
        $token = Token::where('bundle_id', $this->program)->where('token', $this->token[$id])->whereNull('user_id')->first();
        if ($token != null) {
            $token->update(['user_id' => auth()->id()]);
            foreach ($token->bundle->bundleDetails as $item) {
                if ($item->exam_id != null) {
                    $uoe = UserOwnExam::where('user_id', auth()->id())->where('exam_id', $item->exam_id)->get();
                    if ($uoe->count() == 0) {
                        UserOwnExam::create(['user_id' => auth()->id(), 'exam_id' => $item->exam_id]);
                    }
                }
                if ($item->course_id != null) {
                    $uoe = UserOwnCourse::where('user_id', auth()->id())->where('course_id', $item->course_id)->get();
                    if ($uoe->count() == 0) {
                        UserOwnCourse::create(['user_id' => auth()->id(), 'course_id' => $item->course_id]);
                    }
                }
            }
            $this->emit('notify', [
                'type' => 'success',
                'title' => 'Selamat belajar sobat brilli, program yang anda redeem ada di KELASKU',
            ]);
        } else {
            $this->emit('notify', [
                'type' => 'danger',
                'title' => 'Token anda tidak valid atau telah terpakai',
            ]);
        }
        $this->myclass();
    }

    public function checkReferral($id)
    {
        $this->referralBundle = Bundle::find($id);
        if (isset($this->referral[$id])) {
            if ($this->referral[$id] == null) {
                $this->referralMsg[$id] = "Referral harus diisi";
            } else {
                $r = ReferralCode::whereCode($this->referral[$id])->first();
                if ($r != null) {
                    if ($r->user_id == auth()->id()) {
                        $this->referralMsg[$id] = "Referral tidak dapat digunakan";
                    } else {
                        $b = ReferralCodeUse::whereReferralCodeId($r->id)->whereUserId(auth()->id())->get();
//                        if ($b->count()!=0) {
//                            $this->referralMsg = "Referral telah anda gunakan";
//                        } else {
                        $this->referralMsg[$id] = "Potongan sebesar " . $this->referralBundle->referral_discount . ' ';
                        $this->referralDiscount = $this->referralBundle->referral_discount;
                        $this->referralUse = $r;
//                        }
                    }
                } else {
                    $this->referralMsg[$id] = "Referral tidak dapat digunakan";
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.program');
    }
}
