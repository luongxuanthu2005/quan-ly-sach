@extends('layouts.app')

@section('title', 'Thêm sách mới')

@section('content')

<div class="mb-4">
    <h2 class="fw-bold">Thêm sách mới</h2>
    <p class="text-muted">
        Nhập thông tin sách cần thêm vào hệ thống.
    </p>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-white py-3">
        Thông tin sách
    </div>

<div class="card-body">

    <form action="{{ route('saches.store') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        <div class="row">

            {{-- Mã sách --}}
            <div class="col-md-6 mb-3">
                <label class="form-label">Mã sách *</label>

                <input type="text"
                       name="ma_sach"
                       class="form-control"
                       value="{{ old('ma_sach') }}"
                       maxlength="20"
                       placeholder="Ví dụ: S011"
                       required>

                @error('ma_sach')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror

                <small class="text-muted">
                    Mã sách không được trùng với sách đã có.
                </small>
            </div>

            {{-- Loại sách --}}
            <div class="col-md-6 mb-3">
                <label class="form-label">Loại sách *</label>

                <select name="ma_loai"
                        class="form-select"
                        required>

                    <option value="">-- Chọn loại sách --</option>

                    @foreach($loaiSaches as $loai)
                        <option value="{{ $loai->ma_loai }}"
                            @selected(old('ma_loai') == $loai->ma_loai)>
                            {{ $loai->ten_loai }}
                        </option>
                    @endforeach

                </select>

                @error('ma_loai')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            {{-- Nhan đề --}}
            <div class="col-md-6 mb-3">
                <label class="form-label">Nhan đề *</label>

                <input type="text"
                       name="nhan_de"
                       class="form-control"
                       value="{{ old('nhan_de') }}"
                       maxlength="255"
                       required>

                @error('nhan_de')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            {{-- Tác giả --}}
            <div class="col-md-6 mb-3">
                <label class="form-label">Tác giả *</label>

                <input type="text"
                       name="tac_gia"
                       class="form-control"
                       value="{{ old('tac_gia') }}"
                       maxlength="150"
                       required>

                @error('tac_gia')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            {{-- Nhà xuất bản --}}
            <div class="col-md-6 mb-3">
                <label class="form-label">Nhà xuất bản *</label>

                <input type="text"
                       name="nha_xuat_ban"
                       class="form-control"
                       value="{{ old('nha_xuat_ban') }}"
                       maxlength="150"
                       required>

                @error('nha_xuat_ban')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            {{-- Ảnh bìa --}}
            <div class="col-md-6 mb-3">
                <label for="hinh_anh" class="form-label">
                    Ảnh bìa sách
                </label>

                <input type="file"
                       name="hinh_anh"
                       id="hinh_anh"
                       class="form-control"
                       accept=".jpg,.jpeg,.png,.webp">

                <small class="text-muted">
                    Định dạng JPG, JPEG, PNG hoặc WEBP; tối đa 2 MB.
                </small>

                @error('hinh_anh')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror

                {{-- Xem trước ảnh --}}
                <div class="mt-3">
                    <img id="preview-image"
                         src="#"
                         alt="Ảnh xem trước"
                         style="display: none; max-width: 150px; max-height: 200px; object-fit: contain;">
                </div>
            </div>

            {{-- Số trang --}}
            <div class="col-md-4 mb-3">
                <label class="form-label">Số trang *</label>

                <input type="number"
                       name="so_trang"
                       class="form-control"
                       min="1"
                       value="{{ old('so_trang', 100) }}"
                       required>

                @error('so_trang')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            {{-- Giá bìa --}}
            <div class="col-md-4 mb-3">
                <label class="form-label">Giá bìa (VNĐ) *</label>

                <input type="number"
                       name="gia_bia"
                       class="form-control"
                       min="0"
                       step="0.01"
                       value="{{ old('gia_bia') }}"
                       required>

                @error('gia_bia')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            {{-- Số lượng --}}
            <div class="col-md-4 mb-3">
                <label class="form-label">Số lượng *</label>

                <input type="number"
                       name="so_luong"
                       class="form-control"
                       min="0"
                       value="{{ old('so_luong', 0) }}"
                       required>

                @error('so_luong')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            {{-- Mô tả --}}
            <div class="col-12 mb-3">
                <label class="form-label">Mô tả</label>

                <textarea name="mo_ta"
                          class="form-control"
                          rows="4"
                          placeholder="Nhập mô tả sách...">{{ old('mo_ta') }}</textarea>

                @error('mo_ta')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

        </div>

        {{-- Nút chức năng --}}
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">
                Lưu sách
            </button>

            <a href="{{ route('saches.index') }}"
               class="btn btn-secondary">
                Quay lại
            </a>
        </div>

    </form>

</div>

</div>

{{-- JavaScript xem trước ảnh --}}

<script>
    document.getElementById('hinh_anh').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const preview = document.getElementById('preview-image');

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    });
</script>

@endsection