<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserCoins
 *
 * @property string $userID 사용자ID
 * @property string $coinName 코인명
 * @property int|null $hasCount 보유수량
 * @property int|null $averagePrice 평균 단가
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoins newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoins newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoins query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoins whereAverageprice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoins whereCoinname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoins whereHascount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoins whereUserid($value)
 * @mixin \Eloquent
 */
class UserCoins extends Model
{
  protected $table = 'usercoins';
}