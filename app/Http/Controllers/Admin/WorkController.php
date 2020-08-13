<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Work;

class WorkController extends Controller
{
    public function add()
{
    return view('admin.work.create');
}

public function create(Request $request)
{
    $this->validate($request, Work::$rules);

      $work = new Work;
      $form = $request->all();

      // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
      if (isset($form['image'])) {
        $path = $request->file('file')->store('public/image');
        $news->file_path = basename($path);
      } else {
          $news->file_path = null;
      }

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['file']);

      // データベースに保存する
      $news->fill($form);
      $news->save();

    return redirect('admin/work/create');
}

public function edit()
{
    return view('admin.work.edit');
}

public function update()
{
    return redirect('admin/work/edit');
}
}
