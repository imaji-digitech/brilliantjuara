<?php

namespace App\Http\Livewire\Table;

use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;

    public $model;
    public $name;
    public $del;

    public $dataId;

    public $perPage = 10;
    public $sortField = "id";
    public $sortAsc = false;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function render()
    {
        $data = $this->get_pagination_data();

        return view($data['view'], $data);
    }
    protected $listeners = ["delete" => "delete"];

    public function deleteItem($id)
    {
        $this->del=$id;
        $this->emit('swal:confirm', [
            'title' => '',
            'icon' => 'warning',
            'confirmText' => 'Hapus',
            'text' => 'Periksa kembali',
            'method' => "delete"]);
    }
    public function delete(){
        $data = $this->model::find($this->del);
        $data->delete();
    }

    public function get_pagination_data()
    {
        switch ($this->name) {
            case 'user':
                $users = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => 'livewire.table.user',
                    "users" => $users,
                ];
                break;
            case 'room':
                ${$this->name} = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => "livewire.table.$this->name",
                    "{$this->name}s" =>  ${$this->name},
                ];
                break;
            case 'course':
                $course = $this->model::search($this->search,$this->dataId)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => "livewire.table.course",
                    "courses" =>  $course,
                ];
                break;
            case 'exam':
                $exam = $this->model::search($this->search,$this->dataId)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => "livewire.table.exam",
                    "exams" =>  $exam,
                ];
                break;
            case 'exam-step':
                $step = $this->model::search($this->search,$this->dataId)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => "livewire.table.exam-step",
                    "exams" =>  $step,
                ];
                break;
            case 'quest':
                $quest = $this->model::search($this->search,$this->dataId)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => "livewire.table.quest",
                    "quests" =>  $quest,
                ];
                break;
            case 'ownExam':
                $own = $this->model::search($this->search,$this->dataId)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => "livewire.table.own-exam",
                    "owns" =>  $own,
                ];
                break;
            case 'ownCourse':
                $own = $this->model::search($this->search,$this->dataId)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => "livewire.table.own-course",
                    "owns" =>  $own,
                ];
                break;
            case 'user-exam':
                $exam = $this->model::search($this->search,$this->dataId)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => "livewire.table.user-exam",
                    "exams" =>  $exam,
                ];
                break;
            case 'announcement':
                $announcement = $this->model::search($this->search,$this->dataId)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => "livewire.table.announcement",
                    "announcements" =>  $announcement,
                ];
                break;
            case 'banner':
                $banner = $this->model::search($this->search,$this->dataId)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => "livewire.table.banner",
                    "banners" =>  $banner,
                ];
                break;
            case 'event':
                $event = $this->model::search($this->search,$this->dataId)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => "livewire.table.event",
                    "events" =>  $event,
                ];
                break;
            case 'bundle':
                $bundle = $this->model::search($this->search,$this->dataId)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => "livewire.table.bundle",
                    "bundles" =>  $bundle,
                ];
                break;
            case 'bundle-detail':
                $bundle = $this->model::search($this->search,$this->dataId)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => "livewire.table.bundle-detail",
                    "bundles" =>  $bundle,
                ];
                break;
            case 'bundle-price':
                $bundle = $this->model::search($this->search,$this->dataId)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => "livewire.table.bundle-price",
                    "bundles" =>  $bundle,
                ];
                break;
            case 'token':
                $token = $this->model::search($this->search,$this->dataId)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => "livewire.table.token",
                    "tokens" =>  $token,
                ];
                break;
            case 'referral':
                $exam = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => "livewire.table.referral",
                    "referrals" =>  $exam,
                ];
                break;
            case 'referralCanUse':
                $exam = $this->model::search($this->search,$this->dataId)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => "livewire.table.referral-can-use",
                    "referrals" =>  $exam,
                ];
                break;
            case 'referralMe':
                $exam = $this->model::searchme($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => "livewire.table.referral-me",
                    "referrals" =>  $exam,
                ];
                break;
            case 'reportQuest':
                $exam = $this->model::query()
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => "livewire.table.report-quest",
                    "reportQuests" =>  $exam,
                ];
                break;
            case 'payment':
                $exam = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => "livewire.table.payment",
                    "payments" =>  $exam,
                ];
                break;
            case 'ranking':
                $exam = $this->model::seacrh()
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => "livewire.table.ranking",
                    "ranking" =>  $exam,
                ];
                break;
            default:
                break;
        }
    }

}
