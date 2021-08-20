<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method static create(array $array)
 */
class Game extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user1_id',
        'user2_id',
        'box_id'
    ];

    /**
     * Get the phone associated with the user.
     */
    public function user1(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user1_id');
    }

    /**
     * Get the phone associated with the user.
     */
    public function user2(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user2_id');
    }

    /**
     * Get the phone associated with the user.
     */
    public function box(): HasOne
    {
        return $this->hasOne(Box::class, 'id', 'box_id');
    }

    /**
     * Get the comments for the blog post.
     */
    public function logs()
    {
        return $this->hasMany(Log::class);
    }
}
