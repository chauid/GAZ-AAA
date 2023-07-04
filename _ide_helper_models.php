<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
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
 * @method static \Illuminate\Database\Eloquent\Builder|Coins whereCoinName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coins whereCoinSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coins whereDefaultPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coins whereDelistingTerm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coins whereFluctuationRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coins whereNewsEffect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coins whereNewsTerm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coins whereOrderQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coins wherePrice($value)
 */
	class Coins extends \Eloquent {}
}

namespace App\Models{
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
 * @method static \Illuminate\Database\Eloquent\Builder|CoinsHistory whereClosingPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinsHistory whereCoinName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinsHistory whereHighPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinsHistory whereHistoryTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinsHistory whereLowPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinsHistory whereOpeningPrice($value)
 */
	class CoinsHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Comments
 *
 * @property int $id AUTO_INCREMENT
 * @property string $coinName 댓글 작성 코인
 * @property string $nickName 댓글 작성자 별명
 * @property string|null $comment 댓글 내용
 * @property \Illuminate\Support\Carbon $created_at 댓글 작성 시각
 * @property \Illuminate\Support\Carbon $updated_at 댓글 수정 시각
 * @method static \Illuminate\Database\Eloquent\Builder|Comments newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comments newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comments query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comments whereCoinname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comments whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comments whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comments whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comments whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comments whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|Comments whereCoinName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comments whereNickName($value)
 */
	class Comments extends \Eloquent {}
}

namespace App\Models{
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
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereBuyPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereCoinName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereSellPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereTransactionTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereUserID($value)
 */
	class TransactionHistory extends \Eloquent {}
}

namespace App\Models{
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
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoins whereAveragePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoins whereCoinName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoins whereHasCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoins whereUserID($value)
 */
	class UserCoins extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserLog
 *
 * @property int $id AUTO_INCREMENT
 * @property string $userID 사용자ID
 * @property string $action 로그인/로그아웃
 * @property string $ip 접속 IP
 * @property string $agent 접속 agent
 * @property string $language 사용 언어
 * @property string $connectionTime 접속 시각
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog whereAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog whereConnectiontime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog whereUserid($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog whereConnectionTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog whereUserID($value)
 */
	class UserLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserTags
 *
 * @property int $id AUTO_INCREMENT
 * @property string $tagName 태그명
 * @method static \Illuminate\Database\Eloquent\Builder|UserTags newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTags newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTags query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTags whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTags whereTagname($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|UserTags whereTagName($value)
 */
	class UserTags extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property string $userID 사용자ID
 * @property string $password 사용자 비밀번호
 * @property string $userName 사용자 이름
 * @property string $nickName 사용자 별명
 * @property string $phone 전화번호
 * @property string $birth 생년월일
 * @property int|null $asset 자산
 * @property int|null $profit 총 수익
 * @property int|null $loss 총 손실
 * @property int $userTagId 유저 태그ID
 * @property string $created_at 회원가입일
 * @property string $updated_at 회원정보 변경일
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAsset($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLoss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsertagid($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereNickName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereUserID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereUserName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereUserTagId($value)
 */
	class Users extends \Eloquent {}
}

