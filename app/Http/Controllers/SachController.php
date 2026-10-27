<?php

namespace App\Http\Controllers;

use App\Models\Sach;
use App\Models\LoaiSach;
use Illuminate\Http\Request;

class SachController extends Controller
{
    // Hiển thị danh sách sách
    public function index()
    {
        $saches = Sach::with('loaiSach')->get();

        return view('saches.index', compact('saches'));
    }

    // Hiển thị form thêm sách
    public function create()
    {
        $loaiSaches = LoaiSach::all();

        return view('saches.create', compact('loaiSaches'));
    }

    // Lưu sách mới
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ma_sach' => 'required|string|max:20|unique:sach,ma_sach',
            'ma_loai' => 'required|exists:loai_sach,ma_loai',
            'nhan_de' => 'required|string|max:255',
            'tac_gia' => 'required|string|max:150',
            'nha_xuat_ban' => 'required|string|max:150',
            'mo_ta' => 'nullable|string',
            'hinh_anh' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'so_trang' => 'required|integer|min:1',
            'gia_bia' => 'required|numeric|min:0',
            'so_luong' => 'required|integer|min:0',
        ]);

        Sach::create($validated);

        return redirect()
            ->route('saches.index')
            ->with('success', 'Thêm sách thành công!');
    }

    // Hiển thị chi tiết sách
    public function show(string $sach)
    {
        $sache = Sach::with('loaiSach')
            ->where('ma_sach', $sach)
            ->firstOrFail();

        return view('saches.show', compact('sache'));
    }

    // Hiển thị form sửa sách
    public function edit(string $sach)
    {
        $sache = Sach::where('ma_sach', $sach)
            ->firstOrFail();

        $loaiSaches = LoaiSach::all();

        return view('saches.edit', compact('sache', 'loaiSaches'));
    }

    // Cập nhật sách
    public function update(Request $request, string $sach)
    {
        $sache = Sach::where('ma_sach', $sach)
            ->firstOrFail();

        $validated = $request->validate([
            'ma_loai' => 'required|exists:loai_sach,ma_loai',
            'nhan_de' => 'required|string|max:255',
            'tac_gia' => 'required|string|max:150',
            'nha_xuat_ban' => 'required|string|max:150',
            'mo_ta' => 'nullable|string',
            'hinh_anh' => 'nullable|string|max:255',
            'so_trang' => 'required|integer|min:1',
            'gia_bia' => 'required|numeric|min:0',
            'so_luong' => 'required|integer|min:0',
        ]);

        $sache->update($validated);

        return redirect()
            ->route('saches.index')
            ->with('success', 'Cập nhật sách thành công!');
    }

    // Xóa sách
    public function destroy(string $sach)
    {
        $sache = Sach::where('ma_sach', $sach)
            ->firstOrFail();

        $sache->delete();

        return redirect()
            ->route('saches.index')
            ->with('success', 'Xóa sách thành công!');
    }
}