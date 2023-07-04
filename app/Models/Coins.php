<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Coins
 *
 * @property string $coinName 코인명
 * @property string $coinSymbol 코인 심볼
 * @property int|null $price 코인 가격
 * @property int|null $delisted 상폐여부
 * @property int|null $delistingTerm 상폐기간
 * @property string|null $news 코인 뉴스
 * @property int|null $newsTerm 코인 뉴스 기간
 * @property int|null $newsEffect 코인뉴스 영향력
 * @property int $defaultPrice 기본가
 * @property int $fluctuationRate 시세 변동률
 * @property int $orderQuantity 시간당 주문량: 매수+, 매도-
 * @method static \Illuminate\Database\Eloquent\Builder|Coins newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coins newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coins query()
 * @method static \Illuminate\Database\Eloquent\Builder|Coins whereCoinname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coins whereCoinsymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coins whereDefaultprice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coins whereDelisted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coins whereDelistingterm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coins whereFluctuationrate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coins whereNews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coins whereNewseffect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coins whereNewsterm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coins whereOrderquantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coins whereprice($value)
 * @mixin \Eloquent
 */
class Coins extends Model
{
  protected $table = 'coins';
}