<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\TimelineItem;
use App\Models\Skill;
use App\Models\Feedback;
use App\Http\Requests\StoreFeedbackRequest;

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

	public function storeFeedback(StoreFeedbackRequest $request)
	{
		$validatedInputs = $request->validated();
		$feedback = new Feedback();

		foreach ($validatedInputs as $fieldName => $value) {
			$feedback->{$fieldName} = $value;
		}

		if ($feedback->save()) return response()->json(['message' => 'Your message was delivered. I will contact you by email.'], 200);

		return response()->json(['message' => 'There was some server error. Try please later'], 500);
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
