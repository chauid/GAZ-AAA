<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TransactionHistory
 *
 * @property int $id AUTO_INCREMENT
 * @property string $userID 사용자ID
 * @property string $coinName 코인명
 * @property string $transactionTime 거래시각
 * @property int|null $count 거래수량
 * @property int|null $buyPrice 매수가격
 * @property int|null $sellPrice 매도가격
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereBuyprice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereCoinname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereSellprice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereTransactiontime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereUserid($value)
 * @mixin \Eloquent
 */
class TransactionHistory extends Model
{
  protected $table = 'transactionhistory';
  protected $primaryKey = 'id';
}