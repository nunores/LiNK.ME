<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Person;
use App\Models\User;
use App\Models\Post;
use App\Models\Report;
use Illuminate\Support\Facades\Log;

class ReportController extends Controller
{
    public function reportPost($id)
    {
        $report = new Report();
        $this->authorize('reportPost', $report);
        $existing_reports = Report::all()->where("user_id", "=", Auth::user()->id)->where("post_id", "=", $id);
        foreach ($existing_reports as $existing_report) {
            $existing_report->delete();
        }
        $report->user_id = Auth::user()->id;
        $report->post_id = $id;
        $report->comment_id = null;
        $report->save();
        return $report;
    }

    public function reportComment($id)
    {
        $report = new Report();
        $this->authorize('reportComment', $report);
        $existing_reports = Report::all()->where("user_id", "=", Auth::user()->id)->where("comment_id", "=", $id);
        foreach ($existing_reports as $existing_report) {
            $existing_report->delete();
        }
        $report->user_id = Auth::user()->id;
        $report->comment_id = $id;
        $report->post_id = null;
        $report->save();
        return $report;
    }
}
