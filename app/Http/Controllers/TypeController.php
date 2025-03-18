<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Type;
use App\Models\User;


class TypeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 種別一覧
     */
    public function typeIndex()
    {
        // 種別一覧取得
        $types = Type::all();

        return view('type.index', [
            'types' => $types,
        ]);

    }

    /**
     * 種別登録
     */
    public function typeAdd(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 種別登録
            Type::create([
                'name' => $request->name,
            ]);

            return redirect('/types');
        }

        return view('type.add');
    }

    /**
     * 種別編集
     */
    public function typeEdit(Request $request, $id)
    {
        $types = Type::find($id);

        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 種別編集
            $types->name = $request->name;
            $types->save();

            return redirect('/types');
        }

        return view('type.edit', compact('types'));
    }

    /**
     * 種別削除
     */
    public function typeDelete(Request $request)
    {
        $types = Type::find($request->id);
        $types->delete();

        return redirect('/types');

    }



}