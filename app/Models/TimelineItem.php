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
}
