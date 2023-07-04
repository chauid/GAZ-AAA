<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CoinsHistory
 *
 * @property int $id AUTO_INCREMENT
 * @property string $coinName 코인명
 * @property string $historyTime 기록 시각
 * @property int|null $openingPrice 시가
 * @property int|null $closingPrice 종가
 * @property int|null $lowPrice 저가
 * @property int|null $highPrice 고가
 * @property int|null $delisted 상폐여부
 * @method static \Illuminate\Database\Eloquent\Builder|CoinsHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoinsHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoinsHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|CoinsHistory whereClosingprice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinsHistory whereCoinname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinsHistory whereDelisted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinsHistory whereHighprice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinsHistory whereHistorytime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinsHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinsHistory whereLowprice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinsHistory whereOpeningprice($value)
 * @mixin \Eloquent
 */
class CoinsHistory extends Model
{
  protected $table = 'coinshistory';
  protected $primaryKey = 'id';
}