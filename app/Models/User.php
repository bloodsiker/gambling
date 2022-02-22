<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'phone',
        'secure_link',
        'secure_date_to'
    ];

    protected $dates = ['secure_date_to'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return $this
     */
    public function deactivateLink()
    {
        $this->secure_link = null;
        $this->secure_date_to = Carbon::now()->addDays(-1);
        $this->save();

        return $this;
    }

    public function generateNewLink()
    {
        $this->secure_link = Str::random(32);
        $this->secure_date_to = Carbon::now()->addDays(7);
        $this->save();

        return $this;
    }
}
