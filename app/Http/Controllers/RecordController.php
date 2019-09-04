<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class RecordController extends Controller
{
    public function get() {
        return $this->initLatest();
    }

    public function save() {
        /** @var Model $row */
        $row = $this->initLatest();
        $items = Input::get('items');
        $row->update([
            'esl' => (int) in_array('esl', $items),
            'care' => (int) in_array('care', $items),
            'contact' => (int) in_array('contact', $items),
            'compose' => (int) in_array('compose', $items),
            'computer' => (int) in_array('computer', $items),
            'compliment' => (int) in_array('compliment', $items),
            'communication' => (int) in_array('communication', $items),
            'notes' => Input::get('notes', ''),
        ]);
        return $row;
    }

    protected function initLatest() {
        $row = Record::where("created_at", ">", Carbon::now("PRC")->format("Y-m-d"))
            ->where("created_at", "<", Carbon::now("PRC")->addDays()->format("Y-m-d"))
            ->first();

        if (! $row) {
            $row = Record::create([
                'esl' => 0,
                'care' => 0,
                'contact' => 0,
                'compose' => 0,
                'computer' => 0,
                'compliment' => 0,
                'communication' => 0,
                'notes' => '',
            ]);
        }

        return $row;
    }
}
