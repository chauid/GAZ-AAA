<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Coins;
use App\Models\CoinsHistory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \Symfony\Component\Console\Output\ConsoleOutput;

use function PHPUnit\Framework\isNull;

/** 코인 컨트롤러 */
class CoinController extends Controller
{

  /** 코인명, 가격 */
  public function getMinCoinInfo(Request $request): JsonResponse
  {
    $out = new ConsoleOutput();
    $coinList = Coins::select('coinName', 'coinSymbol', 'price')->get();
    return response()->json(
      [
        $content = array(
          'message' => 'ok',
          'coinlist' => $coinList,
        ),
        $status = count($coinList) > 0 ? Response::HTTP_OK : Response::HTTP_NOT_FOUND
      ]
    );
  }

  /** 코인 기록 조회
   * @param Request $request->query('symbol') 코인심볼
   * @param Request $request->query('unit') 조회 단위: 'minute10' | 'minute30' | 'day' | 'hour' | 'week'
   * @param Request $request->query('count') 조회 개수(코인심볼 == null) = 코인 개수 * 조회 개수(day)
   */
  public function getCoinHistory(Request $request): Response
  {
    $out = new ConsoleOutput();

    $symbol = $request->query('symbol');
    $unit = $request->query('unit');
    $count = $request->query('count');

    if (empty($symbol)) {
      if (empty($count) || !is_numeric($count)) {
        return response(array(
          'message' => '[Bad Params]: count is empty or not numeric',
        ), Response::HTTP_BAD_REQUEST);
      }

      $count = $request->query('count');
      $history = CoinsHistory::all()->sortDesc()->take($count * Coins::count());

      return response(array(
        'message' => 'ok',
        'history' => $history,
      ), Response::HTTP_OK);
    } else {
      $validateSymbol = Coins::select('coinSymbol')->get();
      $validateArray = array();
      foreach ($validateSymbol as $item) {
        $validateArray[] = $item['coinSymbol'];
      }

      if (!in_array($symbol, $validateArray)) {
        return response(array(
          'message' => '[Bad Params]: symbol is invalid',
        ), Response::HTTP_BAD_REQUEST);
      }

      if (!in_array($unit, array('minute10', 'minute30', 'day', 'hour', 'week'))) {
        return response(array(
          'message' => '[Bad Params]: unit is invalid',
        ), Response::HTTP_BAD_REQUEST);
      }

      return response(array(
        'message' => 'ok',
        'history' => 'arr',
      ), Response::HTTP_OK);
    }
  }

  /** 댓글 목록 조회 */
  public function getComments(): Response
  {
    $out = new ConsoleOutput();
    $test_id = "asdf";
    $test_pw = "1234";
    $credential = array('userID' => $test_id, 'password' => $test_id);
    if (Auth::attempt($credential)) {
      $out->writeln('ok');
    } else {
      $out->writeln('bad');
    }
    return response(array('data' => 'ok'), Response::HTTP_OK);
  }
}
