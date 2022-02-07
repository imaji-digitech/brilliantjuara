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
            default:
                break;
        }
    }

}
