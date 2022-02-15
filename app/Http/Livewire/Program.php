<?php

namespace App\Http\Livewire;

use App\Models\Bundle;
use App\Models\Payment;
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
    public $amount = 0;
    public $bundleActive;
    public $mount;
    public $total;
    protected $listeners = ["payment" => "payment"];

    public function increase()
    {
        $this->amount += 1;
    }

    public function decrease()
    {
        $this->amount -= 1;
    }

    public function setBundle($id)
    {

    }

    public function buy($id)
    {

        $this->bundleActive = Bundle::find($id);
        $total = $this->amount * $this->bundleActive->bundlePrices[0]->price;
        $this->total = $total;
//        dd($total);
        $this->emit('swal:confirm', ['title' => 'Periksa kembali',
            'icon' => 'info',
            'confirmText' => 'Proses',
            'text' => 'Pembelian Paket <br>' . $this->bundleActive->title . ' - ' . intval($this->amount) . 'x <br>' .
                'Total : ' . $total
            ,
            'method' => 'payment']);
    }

    public function payment()
    {
        Xendit::setApiKey(env('API_KEY'));
        $params = [
            'external_id' => auth()->id() . "",
            'payer_email' => auth()->user()->email,
            'description' => 'Pembelian Paket ' . $this->bundleActive->title . ' - ' . $this->amount . 'x',
            'amount' => $this->total,
        ];
        $createInvoice = Invoice::create($params);
        $url = $createInvoice['invoice_url'];
        Payment::create([
            'bundle_id' => $this->bundleActive->id,
            'payment_id' => $createInvoice['id'],
            'amount' => $this->amount,
            'status' => 1
        ]);
        $this->emit('redirect:new', $url);
    }

    public function mount()
    {
        $this->room = Room::getRoom($this->room);
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
                $myClass[$oe->course->room->title]['course'][$oe->exam_id] = $oe->toArray();
            }
        }
        $this->myClass = $myClass;
//        dd($myClass);
    }


    public function activateToken($id)
    {
        $this->program = $id;
        $token = Token::where('bundle_id', $this->program)->where('token', $this->token)->whereNull('user_id')->first();
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
                'title' => 'Selamat belajar brilli',
            ]);
        } else {
            $this->emit('notify', [
                'type' => 'danger',
                'title' => 'Token anda tidak valid atau telah terpakai',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.program');
    }
}
