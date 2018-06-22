<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
	public $timestamps = false;
    protected $table = 'skills';

	public function timelineItems()
	{
		return $this->belongsToMany('App\Models\TimelineItem', 'skill_timeline_item');
	}
	
	public function portfolioItems()
	{
		return $this->belongsToMany('App\Models\PortfolioItem', 'skill_portfolio_item');
	}
}
