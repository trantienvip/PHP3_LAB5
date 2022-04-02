<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tintuc;
use Illuminate\Http\Request;

class TintucController extends Controller
{
    public function index()
    {
        // Eloquent
        // all: lay ra toan bo cac ban ghi
        // $categories = Tintuc::all();
        // get: lay ra toan bo cac ban ghi, ket hop dc cac dieu kien #
        // get se nam cuoi cung cua doan truy van
        $tintucs = Tintuc::select('*')
            ->with('category')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('tintuc.index', compact('tintucs'));
        // dd('Danh sach category', $categories, $categoriesGet);
    }

    public function delete(Tintuc $tintuc)
    {
        // Neu muon su dung model binding
        // 1. Dinh nghia kieu tham so truyen vao la model tuong ung
        // 2. Tham so o route === ten tham so truyen vao ham
        if ($tintuc->delete()) {
            return redirect()->route('tintuc.index');
        }

        // // Cach 1: destroy, tra ve id cua thang duoc xoa
        // // Chi ap dung khi nhan vao tham so la gia tri
        // // Neu k xoa duoc thi tra ve 0
        // $categoryDelete = Category::destroy($id);
        // if ($categoryDelete !== 0) {
        //     return redirect()->route('categories.index');
        // }
        // dd($categoryDelete);

        // Cach 2: delete, tra ve true hoac false
        // $category = Category::find($id);
        // $category->delete();
    }
    public function edit($id)
    {
        // Neu khong sd model binding
        $cate = Category::all();
        // $id bây giờ không phải 1 số mà là đối tương Category có id = id trên param

        // 1. Nếu việc gọi đến phương thức mà không có cú pháp gọi hàm
        // -> trả về 1 collection (array object), giống all()
        // dd($id);
        // $cate = $id->category; // $id là 1 thể hiện của model Category
        // ->products()->select('name')->paginate(10));
        // 2. Nếu việc gọi đến phương thức có cú pháp gọi hàm
            // -> tiến hành query tiếp được và get() hoặc paginate()
        $tintuc = Tintuc::find($id);
        return view('tintuc.create', compact('cate', 'tintuc'));
    }

    public function update(Request $request, $id)
    {
        $tintuc = Tintuc::find($id);
        $tintuc->name = $request->name;
        $tintuc->description = $request->description;
        $tintuc->product_id = $request->product_id;
        $tintuc->save();
        return redirect()->route('tintuc.index');
    }
}
