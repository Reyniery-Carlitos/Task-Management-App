<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    private $successMessage;
    private $noDataFoundMessage;

    public function __construct() {
        $this->successMessage = 'Status successfully returned';
        $this->noDataFoundMessage = 'No data found :(';
    }

    public function list () {
        $statuses = Status::all();

        if (isset($statuses) ) {
            return response()->json([
                'data' => $statuses,
                'message' => $this->successMessage
            ]);
        } else {
            return response()->json([
                'message' => $this->noDataFoundMessage
            ], 404);
        }
    }

    public function listById ($id) {
        $status = Status::find($id);
        
        if (isset($status)) {
            return response()->json([
                'data' => $status,
                'message' => $this->successMessage
            ]);
        } else {
            return response()->json([
                'message' => $this->noDataFoundMessage
            ], 404);
        }
    }
}
