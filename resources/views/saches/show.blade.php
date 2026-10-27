@extends('layouts.app')

@section('title', 'Chi tiết sách')

@section('content')

<style>
    .book-detail {
        max-width: 1050px;
        margin: 0 auto;
    }

    .book-card {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.07);
        background: #fff;
    }

    .book-header {
        padding: 24px 28px;
        background: linear-gradient(135deg, #0d6efd, #4f8dfd);
        color: white;
    }

    .book-header h2 {
        margin-bottom: 6px;
        font-weight: 700;
    }

    .book-content {
        padding: 28px;
    }

    .book-cover-area {
        height: 390px;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f4f7fb;
        border: 1px solid #e8edf5;
        border-radius: 12px;
    }

    .book-cover {
        max-width: 100%;
        max-height: 350px;
        object-fit: contain;
        border-radius: 6px;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.12);
    }

    .no-cover {
        color: #8a94a6;
        text-align: center;
    }

    .no-cover .cover-icon {
        font-size: 60px;
        margin-bottom: 10px;
    }

    .book-title {
        color: #1e293b;
        font-size: 27px;
        font-weight: 700;
        line-height: 1.4;
        margin-bottom: 10px;
    }

    .book-author {
        color: #64748b;
        font-size: 15px;
        margin-bottom: 22px;
    }

    .book-price {
        color: #dc3545;
        font-size: 27px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .book-info {
        border: 1px solid #e9edf3;
        border-radius: 10px;
        overflow: hidden;
    }

    .book-info-row {
        display: flex;
        gap: 12px;
        padding: 13px 15px;
        border-bottom: 1px solid #e9edf3;
    }

    .book-info-row:last-child {
        border-bottom: none;
    }

    .book-info-label {
        flex: 0 0 135px;
        color: #64748b;
        font-size: 14px;
    }

    .book-info-value {
        flex: 1;
        color: #263449;
        font-weight: 500;
        overflow-wrap: anywhere;
    }

    .book-description {
        margin-top: 22px;
        padding: 18px;
        background: #f8fafc;
        border-radius: 10px;
    }

    .book-description h5 {
        font-weight: 700;
        margin-bottom: 10px;
    }

    .book-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 24px;
    }

    .book-actions .btn {
        padding: 10px 18px;
        border-radius: 8px;
    }

    @media (max-width: 767px) {
        .book-content {
            padding: 18px;
        }

        .book-cover-area {
            height: 300px;
            margin-bottom: 22px;
        }

        .book-cover {
            max-height: 260px;
        }

        .book-title {
            font-size: 23px;
        }

        .book-info-label {
            flex-basis: 110px;
        }

        .book-header {
            padding: 20px;
        }
    }
</style>

<div class="book-detail">

{{-- Tiêu đề trang --}}
<div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
    <div>
        <h2 class="fw-bold mb-1">Chi tiết sách</h2>
        <p class="text-muted mb-0">
            Thông tin đầy đủ về cuốn sách trong hệ thống
        </p>
    </div>

    <a href="{{ route('saches.index') }}" class="btn btn-outline-secondary">
        ← Danh sách sách
    </a>
</div>

{{-- Thông báo --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="book-card">

    {{-- Phần đầu --}}
    <div class="book-header">
        <h2>Thông tin sách</h2>
        <div>
            Mã sách:
            <span class="fw-bold">{{ $sache->ma_sach }}</span>
        </div>
    </div>

    <div class="book-content">
        <div class="row g-4">

            {{-- Ảnh bìa --}}
            <div class="col-md-5">
                <div class="book-cover-area">

                    @if ($sache->hinh_anh)
                        <img
                            src="{{ asset('storage/' . $sache->hinh_anh) }}"
                            alt="Bìa sách {{ $sache->nhan_de }}"
                            class="book-cover"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">

                        <div class="no-cover" style="display:none;">
                            <div class="cover-icon">📚</div>
                            <div>Không thể tải ảnh bìa</div>
                        </div>
                    @else
                        <div class="no-cover">
                            <div class="cover-icon">📚</div>
                            <div>Chưa có ảnh bìa</div>
                        </div>
                    @endif

                </div>
            </div>

            {{-- Thông tin sách --}}
            <div class="col-md-7">

                <h1 class="book-title">
                    {{ $sache->nhan_de }}
                </h1>

                <p class="book-author">
                    Tác giả: {{ $sache->tac_gia }}
                </p>

                <div class="book-price">
                    {{ number_format((float) $sache->gia_bia, 0, ',', '.') }} VNĐ
                </div>

                <div class="book-info">

                    <div class="book-info-row">
                        <div class="book-info-label">Mã sách</div>
                        <div class="book-info-value">{{ $sache->ma_sach }}</div>
                    </div>

                    <div class="book-info-row">
                        <div class="book-info-label">Loại sách</div>
                        <div class="book-info-value">
                            {{ $sache->loaiSach?->ten_loai ?? $sache->ma_loai }}
                        </div>
                    </div>

                    <div class="book-info-row">
                        <div class="book-info-label">Nhà xuất bản</div>
                        <div class="book-info-value">{{ $sache->nha_xuat_ban }}</div>
                    </div>

                    <div class="book-info-row">
                        <div class="book-info-label">Số trang</div>
                        <div class="book-info-value">{{ $sache->so_trang }} trang</div>
                    </div>

                    <div class="book-info-row">
                        <div class="book-info-label">Số lượng</div>
                        <div class="book-info-value">
                            @if ($sache->so_luong > 0)
                                <span class="badge bg-success">
                                    Còn {{ $sache->so_luong }} cuốn
                                </span>
                            @else
                                <span class="badge bg-danger">Hết hàng</span>
                            @endif
                        </div>
                    </div>

                </div>

            </div>
        </div>

        {{-- Mô tả --}}
        <div class="book-description">
            <h5>📖 Mô tả sách</h5>

            @if ($sache->mo_ta)
                <p class="mb-0" style="white-space: pre-line;">
                    {{ $sache->mo_ta }}
                </p>
            @else
                <p class="text-muted mb-0">
                    Chưa có mô tả cho cuốn sách này.
                </p>
            @endif
        </div>

        {{-- Nút thao tác --}}
        <div class="book-actions">
            <a href="{{ route('saches.edit', $sache) }}"
               class="btn btn-warning">
                ✏️ Sửa thông tin
            </a>

            <a href="{{ route('saches.index') }}"
               class="btn btn-outline-secondary">
                Danh sách sách
            </a>
        </div>

    </div>
</div>

</div>

@endsection