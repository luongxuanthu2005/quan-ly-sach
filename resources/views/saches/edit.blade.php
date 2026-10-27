@extends('layouts.app')

@section('title', 'Cập nhật sách')

@section('content')

<div class="mb-4">
    <h2 class="fw-bold">Cập nhật thông tin sách</h2>

    <p class="text-muted">
        Đang chỉnh sửa sách mã: {{ $sache->ma_sach }}
    </p>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-white py-3">
        Thông tin cần cập nhật
    </div>

    <div class="card-body">

        <form action="{{ route('saches.update', $sache) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Mã sách *</label>

                    <input type="text"
                           name="ma_sach"
                           class="form-control"
                           value="{{ old('ma_sach', $sache->ma_sach) }}"
                           maxlength="20"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Loại sách *</label>

                    <select name="ma_loai"
                            class="form-select"
                            required>

                        @foreach($loaiSaches as $loai)
                            <option value="{{ $loai->ma_loai }}"
                                @selected(old('ma_loai', $sache->ma_loai) == $loai->ma_loai)>

                                {{ $loai->ten_loai }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nhan đề *</label>

                    <input type="text"
                           name="nhan_de"
                           class="form-control"
                           value="{{ old('nhan_de', $sache->nhan_de) }}"
                           maxlength="255"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Tác giả *</label>

                    <input type="text"
                           name="tac_gia"
                           class="form-control"
                           value="{{ old('tac_gia', $sache->tac_gia) }}"
                           maxlength="150"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nhà xuất bản *</label>

                    <input type="text"
                           name="nha_xuat_ban"
                           class="form-control"
                           value="{{ old('nha_xuat_ban', $sache->nha_xuat_ban) }}"
                           maxlength="150"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Đường dẫn hình ảnh</label>

                    <input type="text"
                           name="hinh_anh"
                           class="form-control"
                           value="{{ old('hinh_anh', $sache->hinh_anh) }}"
                           maxlength="255">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Số trang *</label>

                    <input type="number"
                           name="so_trang"
                           class="form-control"
                           min="1"
                           value="{{ old('so_trang', $sache->so_trang) }}"
                           required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Giá bìa (VNĐ) *</label>

                    <input type="number"
                           name="gia_bia"
                           class="form-control"
                           min="0"
                           step="0.01"
                           value="{{ old('gia_bia', $sache->gia_bia) }}"
                           required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Số lượng *</label>

                    <input type="number"
                           name="so_luong"
                           class="form-control"
                           min="0"
                           value="{{ old('so_luong', $sache->so_luong) }}"
                           required>
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">Mô tả</label>

                    <textarea name="mo_ta"
                              class="form-control"
                              rows="4">{{ old('mo_ta', $sache->mo_ta) }}</textarea>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">
                Lưu thay đổi
            </button>

            <a href="{{ route('saches.index') }}"
               class="btn btn-secondary">
                Hủy
            </a>

        </form>

    </div>
</div>

@endsection