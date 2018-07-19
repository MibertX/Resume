<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TimelineItem extends Model
{
    protected $table = 'timeline_items';

	public function improvedSkills()
	{
		return $this->belongsToMany('App\Models\Skill', 'skill_timeline_item');
	}

	public function getFormattedPeriodDateAttribute()
	{
		$startDate = new \DateTime($this->start_date);
		$endDate = new \DateTime($this->end_date);

		return strtoupper(
			$startDate->format('M Y') . ' - ' 
			. $endDate->format('M Y')
		);
	}
}
