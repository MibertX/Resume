<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PortfolioComment extends Model
{
    protected $table = 'portfolio_comments';

	public function portfolio_item()
	{
		return $this->belongsTo('App\Models\PortfolioItem', 'portfolio_item_id');
	}
}
