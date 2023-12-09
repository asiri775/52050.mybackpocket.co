<?php
namespace Modules\User\Models;
use App\BaseModel;

class UserWallet extends BaseModel
{
    protected $table = 'user_wallets';
    protected $fillable = [
        'holder_id',
        'balance',
    ];

 
}