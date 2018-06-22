<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PortfolioItem extends Model
{
    protected $table = 'portfolio_items';

	public function usedSkills()
	{
		return $this->belongsToMany('App\Models\Skill', 'skill_portfolio_item');
	}

	public function comments()
	{
		return $this->hasMany('App\Models\PortfolioComment');
	}
}
