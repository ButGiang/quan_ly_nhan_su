<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Services\ThuongPhatService;
use App\Models\thuong_phat;

class RewardPunishmentController extends Controller
{
    protected $thuongphatService;

    public function __construct(ThuongPhatService $thuongphatService) {
        $this->thuongphatService = $thuongphatService;
    }

    public function reward_index() {

    }

    public function punishment_index() {
        
    }

    public function create() {

    }

    public function post_create(Request $request) {

    }

    public function edit() {

    }

    public function post_edit(Request $request) {

    }

    public function delete(Request $request) {

    }

    public function search(Request $request) {

    }
}
