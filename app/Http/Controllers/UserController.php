<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterPostRequest;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use \Symfony\Component\Console\Output\ConsoleOutput;

/** 사용자 컨트롤러 */
class UserController extends Controller
{

  /** 로그인 인증 */
  public function login(Request $request)
  {
    $out = new ConsoleOutput();

    $credentials = $request->only('id', 'pw');
    $out->writeln($credentials);

    // $auth = Auth::attempt($credentials);
    // $out->writeln($auth);
    // $user = Users::where('userID', $request['userID'])->first();
    // $out->write($request);
    return response(array('data' => 'ok'), Response::HTTP_OK);
    // return response($credentials, Response::HTTP_NOT_FOUND);

    // if (empty($user)) {
    //   $out->writeln('not found ID matching');
    //   return response()->json(['message' => 'failded!', 'error' => 'No matching userID'], 200);
    // }

    // if (Hash::check($credentials['password'], $user['password'])) {
    //   $out->writeln('success');
    //   Auth::login($user);
    //   $test = Auth::check();
    //   if ($test) $out->writeln('logined');
    //   else $out->writeln('not logined..');
    //   return redirect()->route('home');
    // } else {
    //   $out->writeln('failed');
    //   return response()->json(['message' => 'failed!', 'error' => 'Incorrect password'], 400);
    // }
  }

  /** 회원가입 */
  public function register(RegisterPostRequest $request): Response
  {
    // $out = new ConsoleOutput();
    // $validated = $request->validateWithBag();
    // try {
    //   $data = 'ok good';
    //   return response(array('data' => 'ok'), Response::HTTP_OK);
    // } catch (ValidationException $ex) {
    //   return response(array('data' => $ex), Response::HTTP_UNPROCESSABLE_ENTITY);
    // }
    $credentials = $request->only('id', 'pw', 'username', 'nickname', 'phone', 'birth');
    try {
      // $validatedData = $request->validate([
      //   'id' => 'required|string',
      //   'pw' => 'required',
      //   'username' => 'required',
      //   'nickname' => 'required',
      //   'phone' => 'required',
      //   'birth' => 'required',
      // ]);
      session()->put('id', $credentials['id']);
      return response(array('data' => session()->get('id')), Response::HTTP_OK);
    } catch (ValidationException $ex) {
      return response(array('data' => $ex), Response::HTTP_UNPROCESSABLE_ENTITY);
    }
    // if ($validated) {
    //   return response(array('data' => 'failure'), Response::HTTP_UNPROCESSABLE_ENTITY);
    // } else {
    //   return response(array('data' => 'failure1'), Response::HTTP_UNPROCESSABLE_ENTITY);
    // }
    // $out->writeln($validated);


    // $createUser = new Users();
    // $user->userID = $validatedData['userID'];
    // $user->password = $request['password'];
    // $user->UserName = $validatedData['UserName'];
    // $user->NickName = $validatedData['NickName'];
    // $user->Phone = $request['Phone'];
    // $user->Birth = $request['Birth'];
    // $user->created_at = now();
    // $user->save();

  }
}