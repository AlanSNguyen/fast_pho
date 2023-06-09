@extends('layouts.users.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/users/cart/detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/users/photocopy.css') }}">
    <style>
        .section-title {
            margin-bottom: 6px;
        }
    </style>
@endpush
@section('content')
    <div class="container row col-xl-12 photo">
        <div class="col-xl-9">
            <div class="step mb-2">
                <h2 class="section-title">Thông tin giao hàng</h2>
                <div class="line_ show">
                </div>
                <div class="panel" style="padding: 0 10px;">
                    <div class="step-sections " step="1">
                        <div class="section">
                            <div class="section-header">
                            </div>
                            <div class="section-content section-customer-information no-mb">
                                <div class="logged-in-customer-information">&nbsp;
                                    <div class="logged-in-customer-information-avatar-wrapper">
                                        <div class="logged-in-customer-information-avatar gravatar">
                                            <img class="rounded-circle"
                                                src="{{ asset('storage/' . auth()->user()->avatar) . '?' . now() }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <p class="logged-in-customer-information-paragraph">
                                        @auth
                                            {{ auth()->user()->name }}
                                        @endauth
                                    </p>
                                </div>
                                <div class="fieldset col-xl-12">
                                    <div class="field field-show-floating-label row col-xl-12">
                                        <div class="field-input-wrapper col-xl-6">
                                            <label class="field-label" for="full_name">Họ và
                                                tên</label>
                                            <input placeholder="Họ và tên" autocapitalize="off" spellcheck="false"
                                                class="field-input" size="30" type="text" id="full_name"
                                                autocomplete="false" @auth value="{{ auth()->user()->name }}" @endauth
                                                required="">
                                        </div>
                                        <div class="field-input-wrapper col-xl-6">
                                            <label class="field-label" for="phone">Số điện
                                                thoại</label>
                                            <input autocomplete="false" placeholder="Số điện thoại" autocapitalize="off"
                                                spellcheck="false" class="field-input" size="30" maxlength="15"
                                                type="tel" id="phone"
                                                @auth value="{{ auth()->user()->phone }}" @endauth required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section-content">
                                <div class="fieldset">
                                    <form autocomplete="off" id="form_update_shipping_method" class="field default"
                                        accept-charset="UTF-8" method="post">
                                        <input name="utf8" type="hidden" value="✓">
                                        <div class="content-box mt0">
                                            <div id="form_update_location_customer_shipping"
                                                class="order-checkout__loading radio-wrapper content-box-row content-box-row-padding content-box-row-secondary "
                                                for="customer_pick_at_location_false">
                                                <input name="utf8" type="hidden" value="✓">
                                                <div class="order-checkout__loading--box">
                                                    <div class="order-checkout__loading--circle"></div>
                                                </div>
                                                <div class="field field-required  field-show-floating-label row col-xl-12">
                                                    <div class="field-input-wrapper col-xl-6">
                                                        <label class="field-label" for="address">Thời gian nhận
                                                            hàng (nếu có)</label>
                                                        <input placeholder="Thời gian nhận hàng (nếu có)"
                                                            autocapitalize="off" spellcheck="false" class="field-input"
                                                            size="30" type="text" id="time_receive">
                                                    </div>
                                                    <div class="field-input-wrapper col-xl-6">
                                                        <label class="field-label" for="address">Địa
                                                            chỉ</label>
                                                        <input placeholder="Địa chỉ" autocapitalize="off" spellcheck="false"
                                                            class="field-input" size="30" type="text" id="address"
                                                            @auth value="{{ auth()->user()->address }}" @endauth
                                                            required="">
                                                    </div>
                                                </div>
                                                <div class="row col-xl-12" id="location"
                                                    style="padding: 0 25px; width: 100%;">
                                                    <div
                                                        class="col-xl-4 field field-show-floating-label field-required field-third ">
                                                        <div class="field-input-wrapper field-input-wrapper-select">
                                                            <label class="field-label" for="customer_shipping_province">
                                                                Tỉnh / thành </label>
                                                            <select class="field-input" id="customer_shipping_province"
                                                                name="customer_shipping_province" required="">
                                                                <option value="01" selected="">Hà Nội</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-xl-4 field field-show-floating-label field-required field-third ">
                                                        <div class="field-input-wrapper field-input-wrapper-select">
                                                            <label class="field-label"
                                                                for="customer_shipping_district">Quận /
                                                                huyện</label>
                                                            <select class="field-input" id="customer_shipping_district"
                                                                name="customer_shipping_district">
                                                                <option value="null">Chọn quận / huyện
                                                                </option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div
                                                        class="col-xl-4 field field-show-floating-label field-required  field-third  ">
                                                        <div class="field-input-wrapper field-input-wrapper-select">
                                                            <label class="field-label" for="customer_shipping_ward">Phường
                                                                / xã</label>
                                                            <select class="field-input" id="customer_shipping_ward"
                                                                name="customer_shipping_ward">
                                                                <option data-code="null" value="null">Chọn phường / xã
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="group">
            </div>
            <div class="mb-2">
                <h2 class="section-title">Phương thức thanh toán</h2>
                <div class="line_ show">
                </div>
                <div class="panel" style="padding: 0 10px;">
                    <div class="section">
                        <div class="section-header">
                        </div>
                        <div class="section-content mb-1">
                            <div class="content-box">
                                <div class="radio-wrapper content-box-row">
                                    <label class="two-page" for="payment_method_">
                                        <div class="radio-input payment-method-checkbox">
                                            <input id="payment_method_" class="input-radio" name="payment"
                                                type="radio" value="0" checked="">
                                        </div>

                                        <div class="radio-content-input">
                                            <img class="main-img"
                                                src="https://hstatic.net/0/0/global/design/seller/image/payment/cod.svg?v=4">
                                            <div class="content-wrapper">
                                                <span class="radio-label-primary">Thanh toán khi nhận hàng
                                                    (COD)</span>
                                                <span class="quick-tagline hidden"></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="radio-wrapper content-box-row">
                                    <label class="two-page" for="payment_method__">
                                        <div class="radio-input payment-method-checkbox">
                                            <input id="payment_method__" class="input-radio" name="payment"
                                                type="radio" value="1">
                                        </div>

                                        <div class="radio-content-input">
                                            <img class="main-img"
                                                src="https://hstatic.net/0/0/global/design/seller/image/payment/other.svg?v=4">
                                            <div class="content-wrapper">
                                                <span class="radio-label-primary">Chuyển khoản qua ngân hàng</span>
                                                <span class="quick-tagline hidden"></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="sidebox-order">
                <div class="sidebox-order-inner">
                    <div class="sidebox-order_title">
                        <h3>Thông tin đơn hàng</h3>
                    </div>
                    <div class="sidebox-order_total">
                        <p>Tổng tiền:
                            <span class="total-price">--</span>
                        </p>
                    </div>
                    <div class="sidebox-order_text">
                    </div>
                    <div class="sidebox-order_action">
                        <a href="#" id="btn-create-order" class="button dark btncart-checkout">ĐẶT ĐƠN</a>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="#" id="btn-create-photo" class="step-footer-continue-btn btn mb-2">
                    <span>Thêm bản ghi</span>
                    <i class="btn-spinner icon icon-button-spinner"></i>
                </a>
                {{-- <a href="#" id="btn-calculate-total" class="step-footer-continue-btn btn mb-2">
                    <span>Tính tổng tiền</span>
                    <i class="btn-spinner icon icon-button-spinner"></i>
                </a> --}}
            </div>
            <ul class="mt-2 list-type">
                <label for="">Các loại giấy:</label>
                <li class="mt-1">1. A4 80gsm dày hơn và có tính chất cứng tốt hơn, nó thường được sử dụng trong các công
                    việc yêu cầu
                    giấy bền hơn như in sách, báo, tài liệu quan trọng, hay các công việc cần độ mịn cao như in brochure,
                    catalog.</li>
                <li class="mt-1">2. A4 70gsm thường nhẹ hơn và giá thành thấp hơn so với A4 80gsm. Do đó, nó thích hợp
                    cho các tài liệu
                    hàng ngày, như in ấn nội bộ, các tài liệu làm việc, ghi chú, hoặc các tài liệu không yêu cầu độ bền và
                    độ mịn cao.</li>
            </ul>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/users/photocopy.js') }}" type="module"></script>
@endpush
