<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\TimelineItem;
use App\Models\Skill;

class LandingController extends Controller
{
    public function index()
	{
		return view('landing', array(
			'user' => User::find(1),
			'skills' => Skill::all(),
			'timelineItemsByType' => self::getTimelineItemsByType() ?: array()
		));
	}

	public static function getTimelineItemsByType()
	{
		$timelineItems = TimelineItem::with('improvedSkills')->orderBy('start_date', 'DESC')->get();
		
		if (!$timelineItems) return false;
		
		$timelineItemsByType = [];
		
		foreach ($timelineItems as $timelineItem) {
			if (!isset($timelineItemsByType[$timelineItem->type])) {
				$timelineItemsByType[$timelineItem->type] = [];
			}

			$timelineItemsByType[$timelineItem->type][] = $timelineItem;
		}
		
		return $timelineItemsByType;
	}
}
