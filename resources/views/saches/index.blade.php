@extends('layouts.app')

@section('title', 'Quản lý sách')

@section('content')

<style>
    .library-page {
        max-width: 1400px;
        margin: 0 auto;
    }

    .page-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 16px;
        margin-bottom: 26px;
    }

    .page-heading h2 {
        color: #172b4d;
        font-size: 28px;
        font-weight: 750;
        margin-bottom: 6px;
    }

    .page-heading p {
        color: #718096;
        margin-bottom: 0;
    }

    .btn-add-book {
        background: #1769ff;
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 12px 18px;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(23, 105, 255, .18);
        transition: .2s;
    }

    .btn-add-book:hover {
        background: #0954db;
        color: #fff;
        transform: translateY(-1px);
    }

    .stat-card {
        height: 100%;
        background: #fff;
        border: 1px solid #e8edf5;
        border-radius: 14px;
        padding: 20px;
        box-shadow: 0 3px 12px rgba(24, 39, 75, .035);
    }

    .stat-label {
        color: #718096;
        font-size: 14px;
        margin-bottom: 9px;
    }

    .stat-number {
        color: #172b4d;
        font-size: 27px;
        font-weight: 750;
        line-height: 1.2;
    }

    .stat-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: #edf4ff;
        font-size: 23px;
    }

    .book-table-card {
        border: 1px solid #e8edf5;
        border-radius: 14px;
        background: #fff;
        box-shadow: 0 4px 18px rgba(24, 39, 75, .045);
        overflow: hidden;
    }

    .table-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
        padding: 20px 22px;
        border-bottom: 1px solid #edf0f5;
    }

    .table-card-header h5 {
        color: #172b4d;
        font-size: 17px;
        font-weight: 700;
        margin: 0;
    }

    .book-count {
        background: #edf4ff;
        color: #1769ff;
        padding: 6px 11px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
    }

    .book-table {
        margin-bottom: 0;
        vertical-align: middle;
    }

    .book-table thead th {
        padding: 15px 13px;
        background: #f6f8fc;
        color: #63718a;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .35px;
        border-bottom: 1px solid #e8edf5;
        white-space: nowrap;
    }

    .book-table tbody td {
        padding: 14px 13px;
        color: #35445c;
        font-size: 13px;
        border-color: #edf0f5;
    }

    .book-table tbody tr {
        transition: background .15s;
    }

    .book-table tbody tr:hover {
        background: #f8faff;
    }

    .book-code {
        display: inline-block;
        padding: 6px 8px;
        background: #f0f4fa;
        border-radius: 6px;
        color: #52627a;
        font-weight: 700;
        font-size: 12px;
        white-space: nowrap;
    }

    .book-title {
        min-width: 160px;
        max-width: 240px;
        color: #172b4d;
        font-weight: 650;
        line-height: 1.5;
    }

    .book-cover-frame {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 66px;
        height: 84px;
        padding: 4px;
        margin: 0 auto;
        background: #f5f7fb;
        border: 1px solid #e7ebf2;
        border-radius: 8px;
    }

    .book-cover-frame img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        border-radius: 4px;
    }

    .no-cover {
        color: #9aa6b7;
        font-size: 10px;
        text-align: center;
    }

    .category-badge {
        display: inline-block;
        padding: 6px 9px;
        background: #eef6ff;
        color: #2864b4;
        border-radius: 6px;
        font-size: 12px;
        line-height: 1.4;
    }

    .book-price {
        color: #087f5b !important;
        font-weight: 700;
        white-space: nowrap;
    }

    .quantity-badge {
        display: inline-block;
        min-width: 34px;
        padding: 6px 9px;
        border-radius: 7px;
        background: #e8f8ef;
        color: #18834b;
        text-align: center;
        font-weight: 700;
    }

    .quantity-empty {
        background: #fff0f0;
        color: #c53030;
    }

    .action-buttons {
        display: flex;
        align-items: center;
        gap: 6px;
        white-space: nowrap;
    }

    .action-buttons .btn {
        border-radius: 7px;
        padding: 7px 10px;
        font-size: 12px;
        font-weight: 600;
    }

    .btn-view {
        color: #1769ff;
        background: #edf4ff;
        border: 1px solid #dce9ff;
    }

    .btn-view:hover {
        color: #fff;
        background: #1769ff;
    }

    .btn-edit {
        color: #986600;
        background: #fff6dc;
        border: 1px solid #ffebad;
    }

    .btn-edit:hover {
        color: #fff;
        background: #d99a00;
    }

    .btn-delete {
        color: #c53030;
        background: #fff0f0;
        border: 1px solid #ffd9d9;
    }

    .btn-delete:hover {
        color: #fff;
        background: #dc3545;
    }

    .empty-state {
        padding: 55px 20px !important;
        text-align: center;
        color: #718096 !important;
    }

    .empty-state-icon {
        font-size: 42px;
        margin-bottom: 12px;
    }

    .table-footer {
        padding: 16px 22px;
        border-top: 1px solid #edf0f5;
        color: #718096;
        font-size: 13px;
    }

    @media (max-width: 768px) {
        .page-heading h2 {
            font-size: 23px;
        }

        .stat-number {
            font-size: 23px;
        }

        .table-card-header {
            padding: 16px;
        }

        .book-table thead th,
        .book-table tbody td {
            padding: 11px 10px;
        }
    }
</style>



<div class="library-page">

{{-- Tiêu đề trang --}}
<div class="page-heading">
    <div>
        <h2>Quản lý sách</h2>
        <p>Quản lý danh mục và thông tin sách trong hệ thống.</p>
    </div>

    <a href="{{ route('saches.create') }}" class="btn btn-add-book">
        + Thêm sách mới
    </a>
</div>




{{-- Bảng danh sách --}}
<div class="book-table-card">

    <div class="table-card-header">
        <h5>Danh sách thông tin sách</h5>
    </div>

    <div class="table-responsive">
        <table class="table book-table">
            <thead>
                <tr>
                    <th>Mã sách</th>
                    <th>Nhan đề</th>
                    <th class="text-center">Ảnh bìa</th>
                    <th>Loại sách</th>
                    <th>Tác giả</th>
                    <th>Nhà xuất bản</th>
                    <th>Số trang</th>
                    <th>Giá bìa</th>
                    <th class="text-center">Số lượng</th>
                    <th>Thao tác</th>
                </tr>
            </thead>

            <tbody>
                @forelse($saches as $sach)
                    <tr>
                        <td>
                            <span class="book-code">
                                {{ $sach->ma_sach }}
                            </span>
                        </td>

                        <td>
                            <div class="book-title">
                                {{ $sach->nhan_de }}
                            </div>
                        </td>

                        <td class="text-center">
                            <div class="book-cover-frame">
                                @if ($sach->hinh_anh)
                                    <img
                                        src="{{ asset('storage/' . $sach->hinh_anh) }}"
                                        alt="Bìa {{ $sach->nhan_de }}"
                                        loading="lazy"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">

                                    <span class="no-cover" style="display:none;">
                                        Không có ảnh
                                    </span>
                                @else
                                    <span class="no-cover">
                                        Chưa có ảnh
                                    </span>
                                @endif
                            </div>
                        </td>

                        <td>
                            <span class="category-badge">
                                {{ $sach->loaiSach?->ten_loai ?? $sach->ma_loai }}
                            </span>
                        </td>

                        <td>{{ $sach->tac_gia }}</td>

                        <td>{{ $sach->nha_xuat_ban }}</td>

                        <td>{{ number_format($sach->so_trang) }}</td>

                        <td class="book-price">
                            {{ number_format((float) $sach->gia_bia, 0, ',', '.') }} đ
                        </td>

                        <td class="text-center">
                            <span class="quantity-badge {{ $sach->so_luong <= 0 ? 'quantity-empty' : '' }}">
                                {{ $sach->so_luong }}
                            </span>
                        </td>

                        <td>
                            <div class="action-buttons">

                                <a href="{{ route('saches.show', $sach) }}"
                                   class="btn btn-view">
                                    Xem
                                </a>

                                <a href="{{ route('saches.edit', $sach) }}"
                                   class="btn btn-edit">
                                    Sửa
                                </a>

                                <form action="{{ route('saches.destroy', $sach) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Bạn có chắc chắn muốn xóa sách {{ $sach->nhan_de }}?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-delete">
                                        Xóa
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="empty-state">
                            <div class="empty-state-icon">📚</div>
                            <h5 class="fw-bold">Chưa có sách trong hệ thống</h5>
                            <p>Hãy thêm cuốn sách đầu tiên để bắt đầu quản lý.</p>

                            <a href="{{ route('saches.create') }}"
                               class="btn btn-primary mt-2">
                                + Thêm sách mới
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    

</div>

</div>

@endsection