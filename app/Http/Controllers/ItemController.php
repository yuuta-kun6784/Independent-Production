<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Type;
use App\Models\User;

class ItemController extends Controller
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
     * 商品一覧
     */
    public function itemIndex()
    {
        // 商品一覧取得
        $items = Item::all();
        $types = Type::all();

        return view('item.index', [
            'items' => $items,
            'types' => $types,
        ]);
    }

    /**
     * 商品登録
     */
    public function itemAdd(Request $request)
    {
        $types = Type::all();
        $users = User::all();

        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
                'type' => 'required|exists:types,id',
                'detail' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type_id' => $request->type,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }

        return view('item.add', compact('types', 'users'));
    }

    /**
     * 商品編集
     */
    public function itemEdit(Request $request, $id)
    {
        $items = Item::find($id);
        $types = Type::all();
        $users = User::all();
        $users = Auth::user();


        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
                'type' => 'required|exists:types,id',
                'detail' => 'required|max:100',
            ]);

            // 商品編集
            $items = Item::find($id);
            $items->name = $request->name;
            $items->type_id = $request->type;
            $items->detail = $request->detail;
            $items->save();

            return redirect('/items');
        }

        return view('item.edit', compact('types', 'items', 'users'));
    }

    /**
     * 商品削除
     */
    public function itemDelete(Request $request)
    {
        $items = Item::find($request->id);
        $items->delete();

        return redirect('/items');

    }







}
