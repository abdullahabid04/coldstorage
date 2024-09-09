@extends('layouts.client')

@section('content')

    <div class="pb-5">
        <div class="row g-4">
            <div class="col-12 col-xxl-6">
                <div class="mb-8">
                    <h2 class="mb-2">Ecommerce Dashboard</h2>
                    <h5 class="text-body-tertiary fw-semibold">Here’s what’s going on at your business right now</h5>
                </div>
                <div class="row align-items-center g-4">
                    <div class="col-12 col-md-auto">
                        <div class="d-flex align-items-center"><span class="fa-stack"
                                                                     style="min-height: 46px;min-width: 46px;"><svg
                                    class="svg-inline--fa fa-square fa-stack-2x dark__text-opacity-50 text-success-light"
                                    data-fa-transform="down-4 rotate--10 left-4" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="square" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.1875em 0.75em;"><g
                                        transform="translate(224 256)"><g
                                            transform="translate(-128, 128)  scale(1, 1)  rotate(-10 0 0)"><path
                                                fill="currentColor"
                                                d="M0 96C0 60.7 28.7 32 64 32H384c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96z"
                                                transform="translate(-224 -256)"></path></g></g></svg>
                                <!-- <span class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-success-light" data-fa-transform="down-4 rotate--10 left-4"></span> Font Awesome fontawesome.com --><svg
                                    class="svg-inline--fa fa-circle fa-stack-2x stack-circle text-stats-circle-success"
                                    data-fa-transform="up-4 right-3 grow-2" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.6875em 0.25em;"><g
                                        transform="translate(256 256)"><g
                                            transform="translate(96, -128)  scale(1.125, 1.125)  rotate(0 0 0)"><path
                                                fill="currentColor"
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512z"
                                                transform="translate(-256 -256)"></path></g></g></svg>
                                <!-- <span class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-success" data-fa-transform="up-4 right-3 grow-2"></span> Font Awesome fontawesome.com --><svg
                                    class="svg-inline--fa fa-star fa-stack-1x text-success"
                                    data-fa-transform="shrink-2 up-8 right-6" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512" data-fa-i2svg="" style="transform-origin: 0.9375em 0em;"><g
                                        transform="translate(288 256)"><g
                                            transform="translate(192, -256)  scale(0.875, 0.875)  rotate(0 0 0)"><path
                                                fill="currentColor"
                                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"
                                                transform="translate(-288 -256)"></path></g></g></svg>
                                <!-- <span class="fa-stack-1x fa-solid fa-star text-success " data-fa-transform="shrink-2 up-8 right-6"></span> Font Awesome fontawesome.com --></span>
                            <div class="ms-3">
                                <h4 class="mb-0">57 new orders</h4>
                                <p class="text-body-secondary fs-9 mb-0">Awating processing</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-auto">
                        <div class="d-flex align-items-center"><span class="fa-stack"
                                                                     style="min-height: 46px;min-width: 46px;"><svg
                                    class="svg-inline--fa fa-square fa-stack-2x dark__text-opacity-50 text-warning-light"
                                    data-fa-transform="down-4 rotate--10 left-4" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="square" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.1875em 0.75em;"><g
                                        transform="translate(224 256)"><g
                                            transform="translate(-128, 128)  scale(1, 1)  rotate(-10 0 0)"><path
                                                fill="currentColor"
                                                d="M0 96C0 60.7 28.7 32 64 32H384c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96z"
                                                transform="translate(-224 -256)"></path></g></g></svg>
                                <!-- <span class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-warning-light" data-fa-transform="down-4 rotate--10 left-4"></span> Font Awesome fontawesome.com --><svg
                                    class="svg-inline--fa fa-circle fa-stack-2x stack-circle text-stats-circle-warning"
                                    data-fa-transform="up-4 right-3 grow-2" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.6875em 0.25em;"><g
                                        transform="translate(256 256)"><g
                                            transform="translate(96, -128)  scale(1.125, 1.125)  rotate(0 0 0)"><path
                                                fill="currentColor"
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512z"
                                                transform="translate(-256 -256)"></path></g></g></svg>
                                <!-- <span class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-warning" data-fa-transform="up-4 right-3 grow-2"></span> Font Awesome fontawesome.com --><svg
                                    class="svg-inline--fa fa-pause fa-stack-1x text-warning"
                                    data-fa-transform="shrink-2 up-8 right-6" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="pause" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 320 512" data-fa-i2svg="" style="transform-origin: 0.6875em 0em;"><g
                                        transform="translate(160 256)"><g
                                            transform="translate(192, -256)  scale(0.875, 0.875)  rotate(0 0 0)"><path
                                                fill="currentColor"
                                                d="M48 64C21.5 64 0 85.5 0 112V400c0 26.5 21.5 48 48 48H80c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H48zm192 0c-26.5 0-48 21.5-48 48V400c0 26.5 21.5 48 48 48h32c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H240z"
                                                transform="translate(-160 -256)"></path></g></g></svg>
                                <!-- <span class="fa-stack-1x fa-solid fa-pause text-warning " data-fa-transform="shrink-2 up-8 right-6"></span> Font Awesome fontawesome.com --></span>
                            <div class="ms-3">
                                <h4 class="mb-0">5 orders</h4>
                                <p class="text-body-secondary fs-9 mb-0">On hold</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-auto">
                        <div class="d-flex align-items-center"><span class="fa-stack"
                                                                     style="min-height: 46px;min-width: 46px;"><svg
                                    class="svg-inline--fa fa-square fa-stack-2x dark__text-opacity-50 text-danger-light"
                                    data-fa-transform="down-4 rotate--10 left-4" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="square" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.1875em 0.75em;"><g
                                        transform="translate(224 256)"><g
                                            transform="translate(-128, 128)  scale(1, 1)  rotate(-10 0 0)"><path
                                                fill="currentColor"
                                                d="M0 96C0 60.7 28.7 32 64 32H384c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96z"
                                                transform="translate(-224 -256)"></path></g></g></svg>
                                <!-- <span class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-danger-light" data-fa-transform="down-4 rotate--10 left-4"></span> Font Awesome fontawesome.com --><svg
                                    class="svg-inline--fa fa-circle fa-stack-2x stack-circle text-stats-circle-danger"
                                    data-fa-transform="up-4 right-3 grow-2" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.6875em 0.25em;"><g
                                        transform="translate(256 256)"><g
                                            transform="translate(96, -128)  scale(1.125, 1.125)  rotate(0 0 0)"><path
                                                fill="currentColor"
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512z"
                                                transform="translate(-256 -256)"></path></g></g></svg>
                                <!-- <span class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-danger" data-fa-transform="up-4 right-3 grow-2"></span> Font Awesome fontawesome.com --><svg
                                    class="svg-inline--fa fa-xmark fa-stack-1x text-danger"
                                    data-fa-transform="shrink-2 up-8 right-6" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 384 512" data-fa-i2svg="" style="transform-origin: 0.75em 0em;"><g
                                        transform="translate(192 256)"><g
                                            transform="translate(192, -256)  scale(0.875, 0.875)  rotate(0 0 0)"><path
                                                fill="currentColor"
                                                d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"
                                                transform="translate(-192 -256)"></path></g></g></svg>
                                <!-- <span class="fa-stack-1x fa-solid fa-xmark text-danger " data-fa-transform="shrink-2 up-8 right-6"></span> Font Awesome fontawesome.com --></span>
                            <div class="ms-3">
                                <h4 class="mb-0">15 products</h4>
                                <p class="text-body-secondary fs-9 mb-0">Out of stock</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="bg-body-secondary mb-6 mt-4">
                <div class="row flex-between-center mb-4 g-3">
                    <div class="col-auto">
                        <h3>Total sells</h3>
                        <p class="text-body-tertiary lh-sm mb-0">Payment received across all channels</p>
                    </div>
                    <div class="col-8 col-sm-4"><select class="form-select form-select-sm"
                                                        id="select-gross-revenue-month">
                            <option>Mar 1 - 31, 2022</option>
                            <option>April 1 - 30, 2022</option>
                            <option>May 1 - 31, 2022</option>
                        </select></div>
                </div>
                <div class="echart-total-sales-chart"
                     style="min-height: 320px; width: 100%; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;"
                     _echarts_instance_="ec_1725883139523">
                    <div
                        style="position: relative; width: 1017px; height: 320px; padding: 0px; margin: 0px; border-width: 0px;">
                        <canvas data-zr-dom-id="zr_0" width="1017" height="320"
                                style="position: absolute; left: 0px; top: 0px; width: 1017px; height: 320px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas>
                        <canvas data-zr-dom-id="zr_1" width="1017" height="320"
                                style="position: absolute; left: 0px; top: 0px; width: 1017px; height: 320px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas>
                        <canvas data-zr-dom-id="zr_2" width="1017" height="320"
                                style="position: absolute; left: 0px; top: 0px; width: 1017px; height: 320px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas>
                    </div>
                    <div class=""></div>
                </div>
            </div>
            <div class="col-12 col-xxl-6">
                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h5 class="mb-1">Total orders<span
                                                class="badge badge-phoenix badge-phoenix-warning rounded-pill fs-9 ms-2"><span
                                                    class="badge-label">-6.8%</span></span></h5>
                                        <h6 class="text-body-tertiary">Last 7 days</h6>
                                    </div>
                                    <h4>16,247</h4>
                                </div>
                                <div class="d-flex justify-content-center px-4 py-6">
                                    <div class="echart-total-orders"
                                         style="height: 85px; width: 115px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;"
                                         _echarts_instance_="ec_1725883139529">
                                        <div
                                            style="position: relative; width: 115px; height: 85px; padding: 0px; margin: 0px; border-width: 0px;">
                                            <canvas data-zr-dom-id="zr_0" width="115" height="85"
                                                    style="position: absolute; left: 0px; top: 0px; width: 115px; height: 85px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas>
                                        </div>
                                        <div class=""></div>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="bullet-item bg-primary me-2"></div>
                                        <h6 class="text-body fw-semibold flex-1 mb-0">Completed</h6>
                                        <h6 class="text-body fw-semibold mb-0">52%</h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="bullet-item bg-primary-subtle me-2"></div>
                                        <h6 class="text-body fw-semibold flex-1 mb-0">Pending payment</h6>
                                        <h6 class="text-body fw-semibold mb-0">48%</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h5 class="mb-1">New customers<span
                                                class="badge badge-phoenix badge-phoenix-warning rounded-pill fs-9 ms-2"> <span
                                                    class="badge-label">+26.5%</span></span></h5>
                                        <h6 class="text-body-tertiary">Last 7 days</h6>
                                    </div>
                                    <h4>356</h4>
                                </div>
                                <div class="pb-0 pt-4">
                                    <div class="echarts-new-customers"
                                         style="height: 180px; width: 100%; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;"
                                         _echarts_instance_="ec_1725883139524">
                                        <div
                                            style="position: relative; width: 451px; height: 180px; padding: 0px; margin: 0px; border-width: 0px;">
                                            <canvas data-zr-dom-id="zr_0" width="451" height="180"
                                                    style="position: absolute; left: 0px; top: 0px; width: 451px; height: 180px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas>
                                            <canvas data-zr-dom-id="zr_2" width="451" height="180"
                                                    style="position: absolute; left: 0px; top: 0px; width: 451px; height: 180px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas>
                                        </div>
                                        <div class=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h5 class="mb-2">Top coupons</h5>
                                        <h6 class="text-body-tertiary">Last 7 days</h6>
                                    </div>
                                </div>
                                <div class="pb-4 pt-3">
                                    <div class="echart-top-coupons"
                                         style="height: 115px; width: 100%; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;"
                                         _echarts_instance_="ec_1725883139525">
                                        <div
                                            style="position: relative; width: 451px; height: 115px; padding: 0px; margin: 0px; border-width: 0px;">
                                            <canvas data-zr-dom-id="zr_0" width="451" height="115"
                                                    style="position: absolute; left: 0px; top: 0px; width: 451px; height: 115px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas>
                                        </div>
                                        <div class=""></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="bullet-item bg-primary me-2"></div>
                                        <h6 class="text-body fw-semibold flex-1 mb-0">Percentage discount</h6>
                                        <h6 class="text-body fw-semibold mb-0">72%</h6>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="bullet-item bg-primary-lighter me-2"></div>
                                        <h6 class="text-body fw-semibold flex-1 mb-0">Fixed card discount</h6>
                                        <h6 class="text-body fw-semibold mb-0">18%</h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="bullet-item bg-info-dark me-2"></div>
                                        <h6 class="text-body fw-semibold flex-1 mb-0">Fixed product discount</h6>
                                        <h6 class="text-body fw-semibold mb-0">10%</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h5 class="mb-2">Paying vs non paying</h5>
                                        <h6 class="text-body-tertiary">Last 7 days</h6>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center pt-3 flex-1">
                                    <div class="echarts-paying-customer-chart"
                                         style="height: 100%; width: 100%; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;"
                                         _echarts_instance_="ec_1725883139528">
                                        <div
                                            style="position: relative; width: 451px; height: 144px; padding: 0px; margin: 0px; border-width: 0px;">
                                            <canvas data-zr-dom-id="zr_0" width="451" height="144"
                                                    style="position: absolute; left: 0px; top: 0px; width: 451px; height: 144px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas>
                                        </div>
                                        <div class=""></div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="bullet-item bg-primary me-2"></div>
                                        <h6 class="text-body fw-semibold flex-1 mb-0">Paying customer</h6>
                                        <h6 class="text-body fw-semibold mb-0">30%</h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="bullet-item bg-primary-subtle me-2"></div>
                                        <h6 class="text-body fw-semibold flex-1 mb-0">Non-paying customer</h6>
                                        <h6 class="text-body fw-semibold mb-0">70%</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-body-emphasis pt-7 border-y">
        <div
            data-list="{&quot;valueNames&quot;:[&quot;product&quot;,&quot;customer&quot;,&quot;rating&quot;,&quot;review&quot;,&quot;time&quot;],&quot;page&quot;:6}">
            <div class="row align-items-end justify-content-between pb-5 g-3">
                <div class="col-auto">
                    <h3>Latest reviews</h3>
                    <p class="text-body-tertiary lh-sm mb-0">Payment received across all channels</p>
                </div>
                <div class="col-12 col-md-auto">
                    <div class="row g-2 gy-3">
                        <div class="col-auto flex-1">
                            <div class="search-box">
                                <form class="position-relative"><input
                                        class="form-control search-input search form-control-sm" type="search"
                                        placeholder="Search" aria-label="Search">
                                    <svg class="svg-inline--fa fa-magnifying-glass search-box-icon" aria-hidden="true"
                                         focusable="false" data-prefix="fas" data-icon="magnifying-glass" role="img"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                              d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"></path>
                                    </svg>
                                    <!-- <span class="fas fa-search search-box-icon"></span> Font Awesome fontawesome.com -->
                                </form>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-sm btn-phoenix-secondary bg-body-emphasis bg-body-hover me-2"
                                    type="button">All products
                            </button>
                            <button class="btn btn-sm btn-phoenix-secondary bg-body-emphasis bg-body-hover action-btn"
                                    type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                    aria-expanded="false" data-bs-reference="parent">
                                <svg class="svg-inline--fa fa-ellipsis" data-fa-transform="shrink-2" aria-hidden="true"
                                     focusable="false" data-prefix="fas" data-icon="ellipsis" role="img"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""
                                     style="transform-origin: 0.4375em 0.5em;">
                                    <g transform="translate(224 256)">
                                        <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                            <path fill="currentColor"
                                                  d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z"
                                                  transform="translate(-224 -256)"></path>
                                        </g>
                                    </g>
                                </svg>
                                <!-- <span class="fas fa-ellipsis-h" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive mx-n1 px-1 scrollbar">
                <table class="table fs-9 mb-0 border-top border-translucent">
                    <thead>
                    <tr>
                        <th class="white-space-nowrap fs-9 ps-0 align-middle">
                            <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                                     id="checkbox-bulk-reviews-select" type="checkbox"
                                                                     data-bulk-select="{&quot;body&quot;:&quot;table-latest-review-body&quot;}">
                            </div>
                        </th>
                        <th class="sort white-space-nowrap align-middle" scope="col"></th>
                        <th class="sort white-space-nowrap align-middle" scope="col" style="min-width:360px;"
                            data-sort="product">PRODUCT
                        </th>
                        <th class="sort align-middle" scope="col" data-sort="customer" style="min-width:200px;">
                            CUSTOMER
                        </th>
                        <th class="sort align-middle" scope="col" data-sort="rating" style="min-width:110px;">RATING
                        </th>
                        <th class="sort align-middle" scope="col" style="max-width:350px;" data-sort="review">REVIEW
                        </th>
                        <th class="sort text-start ps-5 align-middle" scope="col" data-sort="status">STATUS</th>
                        <th class="sort text-end align-middle" scope="col" data-sort="time">TIME</th>
                        <th class="sort text-end pe-0 align-middle" scope="col"></th>
                    </tr>
                    </thead>
                    <tbody class="list" id="table-latest-review-body">
                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs-9 align-middle ps-0">
                            <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox"
                                                                     data-bulk-select-row="{&quot;product&quot;:&quot;Fitbit Sense Advanced Smartwatch with Tools for Heart Health, Stress Management &amp; Skin Temperature Trends, Carbon/Graphite, One Size (S &amp; L Bands)&quot;,&quot;productImage&quot;:&quot;/products/60x60/1.png&quot;,&quot;customer&quot;:{&quot;name&quot;:&quot;Richard Dawkins&quot;,&quot;avatar&quot;:&quot;&quot;},&quot;rating&quot;:5,&quot;review&quot;:&quot;This Fitbit is fantastic! I was trying to be in better shape and needed some motivation, so I decided to treat myself to a new Fitbit.&quot;,&quot;status&quot;:{&quot;title&quot;:&quot;Approved&quot;,&quot;badge&quot;:&quot;success&quot;,&quot;icon&quot;:&quot;check&quot;},&quot;time&quot;:&quot;Just now&quot;}">
                            </div>
                        </td>
                        <td class="align-middle product white-space-nowrap py-0"><a
                                class="d-block rounded-2 border border-translucent"
                                href="apps/e-commerce/landing/product-details.html"><img
                                    src="assets/img//products/60x60/1.png" alt="" width="53"></a></td>
                        <td class="align-middle product white-space-nowrap"><a class="fw-semibold"
                                                                               href="apps/e-commerce/landing/product-details.html">Fitbit
                                Sense Advanced Smartwatch with Tools fo...</a></td>
                        <td class="align-middle customer white-space-nowrap"><a
                                class="d-flex align-items-center text-body" href="apps/e-commerce/landing/profile.html">
                                <div class="avatar avatar-l">
                                    <div class="avatar-name rounded-circle"><span>R</span></div>
                                </div>
                                <h6 class="mb-0 ms-3 text-body">Richard Dawkins</h6>
                            </a></td>
                        <td class="align-middle rating white-space-nowrap fs-10">
                            <svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                            </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                            </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                            </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                            </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                            </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com -->
                        </td>
                        <td class="align-middle review" style="min-width:350px;">
                            <p class="fs-9 fw-semibold text-body-highlight mb-0">This Fitbit is fantastic! I was trying
                                to be in better shape and needed some motivation, so I decided to treat myself to a new
                                Fitbit.</p>
                        </td>
                        <td class="align-middle text-start ps-5 status"><span
                                class="badge badge-phoenix fs-10 badge-phoenix-success"><span class="badge-label">Approved</span><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-check ms-1"
                                    style="height:12.8px;width:12.8px;"><polyline
                                        points="20 6 9 17 4 12"></polyline></svg></span></td>
                        <td class="align-middle text-end time white-space-nowrap">
                            <div class="hover-hide">
                                <h6 class="text-body-highlight mb-0">Just now</h6>
                            </div>
                        </td>
                        <td class="align-middle white-space-nowrap text-end pe-0">
                            <div class="position-relative">
                                <div class="hover-actions">
                                    <button class="btn btn-sm btn-phoenix-secondary me-1 fs-10">
                                        <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false"
                                             data-prefix="fas" data-icon="check" role="img"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                  d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path>
                                        </svg><!-- <span class="fas fa-check"></span> Font Awesome fontawesome.com -->
                                    </button>
                                    <button class="btn btn-sm btn-phoenix-secondary fs-10">
                                        <svg class="svg-inline--fa fa-trash" aria-hidden="true" focusable="false"
                                             data-prefix="fas" data-icon="trash" role="img"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                  d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
                                        </svg><!-- <span class="fas fa-trash"></span> Font Awesome fontawesome.com -->
                                    </button>
                                </div>
                            </div>
                            <div class="btn-reveal-trigger position-static">
                                <button
                                    class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                    type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                    aria-expanded="false" data-bs-reference="parent">
                                    <svg class="svg-inline--fa fa-ellipsis fs-10" aria-hidden="true" focusable="false"
                                         data-prefix="fas" data-icon="ellipsis" role="img"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                              d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z"></path>
                                    </svg>
                                    <!-- <span class="fas fa-ellipsis-h fs-10"></span> Font Awesome fontawesome.com -->
                                </button>
                                <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a
                                        class="dropdown-item" href="#!">Export</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#!">Remove</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs-9 align-middle ps-0">
                            <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox"
                                                                     data-bulk-select-row="{&quot;product&quot;:&quot;iPhone 13 pro max-Pacific Blue-128GB storage&quot;,&quot;productImage&quot;:&quot;/products/60x60/2.png&quot;,&quot;customer&quot;:{&quot;name&quot;:&quot;Ashley Garrett&quot;,&quot;avatar&quot;:&quot;/team/40x40/59.webp&quot;},&quot;rating&quot;:3,&quot;review&quot;:&quot;The order was delivered ahead of schedule. To give us additional time, you should leave the packaging sealed with plastic.&quot;,&quot;status&quot;:{&quot;title&quot;:&quot;Approved&quot;,&quot;badge&quot;:&quot;success&quot;,&quot;icon&quot;:&quot;check&quot;},&quot;time&quot;:&quot;Just now&quot;}">
                            </div>
                        </td>
                        <td class="align-middle product white-space-nowrap py-0"><a
                                class="d-block rounded-2 border border-translucent"
                                href="apps/e-commerce/landing/product-details.html"><img
                                    src="assets/img//products/60x60/2.png" alt="" width="53"></a></td>
                        <td class="align-middle product white-space-nowrap"><a class="fw-semibold"
                                                                               href="apps/e-commerce/landing/product-details.html">iPhone
                                13 pro max-Pacific Blue-128GB storage</a></td>
                        <td class="align-middle customer white-space-nowrap"><a
                                class="d-flex align-items-center text-body" href="apps/e-commerce/landing/profile.html">
                                <div class="avatar avatar-l"><img class="rounded-circle"
                                                                  src="assets/img/team/40x40/59.webp" alt=""></div>
                                <h6 class="mb-0 ms-3 text-body">Ashley Garrett</h6>
                            </a></td>
                        <td class="align-middle rating white-space-nowrap fs-10">
                            <svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                            </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                            </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                            </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star text-warning-light" data-bs-theme="light"
                                 aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"></path>
                            </svg>
                            <!-- <span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star text-warning-light" data-bs-theme="light"
                                 aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"></path>
                            </svg>
                            <!-- <span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span> Font Awesome fontawesome.com -->
                        </td>
                        <td class="align-middle review" style="min-width:350px;">
                            <p class="fs-9 fw-semibold text-body-highlight mb-0">The order was delivered ahead of
                                schedule. To give us additional time, you should leave the packaging sealed with
                                plastic.</p>
                        </td>
                        <td class="align-middle text-start ps-5 status"><span
                                class="badge badge-phoenix fs-10 badge-phoenix-success"><span class="badge-label">Approved</span><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-check ms-1"
                                    style="height:12.8px;width:12.8px;"><polyline
                                        points="20 6 9 17 4 12"></polyline></svg></span></td>
                        <td class="align-middle text-end time white-space-nowrap">
                            <div class="hover-hide">
                                <h6 class="text-body-highlight mb-0">Just now</h6>
                            </div>
                        </td>
                        <td class="align-middle white-space-nowrap text-end pe-0">
                            <div class="position-relative">
                                <div class="hover-actions">
                                    <button class="btn btn-sm btn-phoenix-secondary me-1 fs-10">
                                        <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false"
                                             data-prefix="fas" data-icon="check" role="img"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                  d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path>
                                        </svg><!-- <span class="fas fa-check"></span> Font Awesome fontawesome.com -->
                                    </button>
                                    <button class="btn btn-sm btn-phoenix-secondary fs-10">
                                        <svg class="svg-inline--fa fa-trash" aria-hidden="true" focusable="false"
                                             data-prefix="fas" data-icon="trash" role="img"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                  d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
                                        </svg><!-- <span class="fas fa-trash"></span> Font Awesome fontawesome.com -->
                                    </button>
                                </div>
                            </div>
                            <div class="btn-reveal-trigger position-static">
                                <button
                                    class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                    type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                    aria-expanded="false" data-bs-reference="parent">
                                    <svg class="svg-inline--fa fa-ellipsis fs-10" aria-hidden="true" focusable="false"
                                         data-prefix="fas" data-icon="ellipsis" role="img"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                              d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z"></path>
                                    </svg>
                                    <!-- <span class="fas fa-ellipsis-h fs-10"></span> Font Awesome fontawesome.com -->
                                </button>
                                <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a
                                        class="dropdown-item" href="#!">Export</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#!">Remove</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs-9 align-middle ps-0">
                            <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox"
                                                                     data-bulk-select-row="{&quot;product&quot;:&quot;Apple MacBook Pro 13 inch-M1-8/256GB-space&quot;,&quot;productImage&quot;:&quot;/products/60x60/3.png&quot;,&quot;customer&quot;:{&quot;name&quot;:&quot;Woodrow Burton&quot;,&quot;avatar&quot;:&quot;/team/40x40/58.webp&quot;},&quot;rating&quot;:4.5,&quot;review&quot;:&quot;It's a Mac, after all. Once you've gone Mac, there's no going back. My first Mac lasted over nine years, and this is my second.&quot;,&quot;status&quot;:{&quot;title&quot;:&quot;Pending&quot;,&quot;badge&quot;:&quot;warning&quot;,&quot;icon&quot;:&quot;clock&quot;},&quot;time&quot;:&quot;Just now&quot;}">
                            </div>
                        </td>
                        <td class="align-middle product white-space-nowrap py-0"><a
                                class="d-block rounded-2 border border-translucent"
                                href="apps/e-commerce/landing/product-details.html"><img
                                    src="assets/img//products/60x60/3.png" alt="" width="53"></a></td>
                        <td class="align-middle product white-space-nowrap"><a class="fw-semibold"
                                                                               href="apps/e-commerce/landing/product-details.html">Apple
                                MacBook Pro 13 inch-M1-8/256GB-space</a></td>
                        <td class="align-middle customer white-space-nowrap"><a
                                class="d-flex align-items-center text-body" href="apps/e-commerce/landing/profile.html">
                                <div class="avatar avatar-l"><img class="rounded-circle"
                                                                  src="assets/img/team/40x40/58.webp" alt=""></div>
                                <h6 class="mb-0 ms-3 text-body">Woodrow Burton</h6>
                            </a></td>
                        <td class="align-middle rating white-space-nowrap fs-10">
                            <svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                            </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                            </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                            </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                            </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star-half-stroke star-icon text-warning" aria-hidden="true"
                                 focusable="false" data-prefix="fas" data-icon="star-half-stroke" role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M288 376.4l.1-.1 26.4 14.1 85.2 45.5-16.5-97.6-4.8-28.7 20.7-20.5 70.1-69.3-96.1-14.2-29.3-4.3-12.9-26.6L288.1 86.9l-.1 .3V376.4zm175.1 98.3c2 12-3 24.2-12.9 31.3s-23 8-33.8 2.3L288.1 439.8 159.8 508.3C149 514 135.9 513.1 126 506s-14.9-19.3-12.9-31.3L137.8 329 33.6 225.9c-8.6-8.5-11.7-21.2-7.9-32.7s13.7-19.9 25.7-21.7L195 150.3 259.4 18c5.4-11 16.5-18 28.8-18s23.4 7 28.8 18l64.3 132.3 143.6 21.2c12 1.8 22 10.2 25.7 21.7s.7 24.2-7.9 32.7L438.5 329l24.6 145.7z"></path>
                            </svg>
                            <!-- <span class="fa fa-star-half-alt star-icon text-warning"></span> Font Awesome fontawesome.com -->
                        </td>
                        <td class="align-middle review" style="min-width:350px;">
                            <p class="fs-9 fw-semibold text-body-highlight mb-0">It's a Mac, after all. Once you've gone
                                Mac, there's no going back. My first Mac lasted over nine years, and this is my
                                second.</p>
                        </td>
                        <td class="align-middle text-start ps-5 status"><span
                                class="badge badge-phoenix fs-10 badge-phoenix-warning"><span class="badge-label">Pending</span><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-clock ms-1"
                                    style="height:12.8px;width:12.8px;"><circle cx="12" cy="12" r="10"></circle><polyline
                                        points="12 6 12 12 16 14"></polyline></svg></span></td>
                        <td class="align-middle text-end time white-space-nowrap">
                            <div class="hover-hide">
                                <h6 class="text-body-highlight mb-0">Just now</h6>
                            </div>
                        </td>
                        <td class="align-middle white-space-nowrap text-end pe-0">
                            <div class="position-relative">
                                <div class="hover-actions">
                                    <button class="btn btn-sm btn-phoenix-secondary me-1 fs-10">
                                        <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false"
                                             data-prefix="fas" data-icon="check" role="img"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                  d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path>
                                        </svg><!-- <span class="fas fa-check"></span> Font Awesome fontawesome.com -->
                                    </button>
                                    <button class="btn btn-sm btn-phoenix-secondary fs-10">
                                        <svg class="svg-inline--fa fa-trash" aria-hidden="true" focusable="false"
                                             data-prefix="fas" data-icon="trash" role="img"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                  d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
                                        </svg><!-- <span class="fas fa-trash"></span> Font Awesome fontawesome.com -->
                                    </button>
                                </div>
                            </div>
                            <div class="btn-reveal-trigger position-static">
                                <button
                                    class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                    type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                    aria-expanded="false" data-bs-reference="parent">
                                    <svg class="svg-inline--fa fa-ellipsis fs-10" aria-hidden="true" focusable="false"
                                         data-prefix="fas" data-icon="ellipsis" role="img"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                              d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z"></path>
                                    </svg>
                                    <!-- <span class="fas fa-ellipsis-h fs-10"></span> Font Awesome fontawesome.com -->
                                </button>
                                <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a
                                        class="dropdown-item" href="#!">Export</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#!">Remove</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs-9 align-middle ps-0">
                            <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox"
                                                                     data-bulk-select-row="{&quot;product&quot;:&quot;Apple iMac 24\&quot; 4K Retina Display M1 8 Core CPU, 7 Core GPU, 256GB SSD, Green (MJV83ZP/A) 2021&quot;,&quot;productImage&quot;:&quot;/products/60x60/4.png&quot;,&quot;customer&quot;:{&quot;name&quot;:&quot;Eric McGee&quot;,&quot;avatar&quot;:&quot;/team/40x40/avatar.webp&quot;,&quot;avatarPlaceholder&quot;:true},&quot;rating&quot;:3,&quot;review&quot;:&quot;Personally, I like the minimalist style, but I wouldn't choose it if I were searching for a computer that I would use frequently. It's not horrible in terms of speed and power, but the&quot;,&quot;status&quot;:{&quot;title&quot;:&quot;Pending&quot;,&quot;badge&quot;:&quot;warning&quot;,&quot;icon&quot;:&quot;clock&quot;},&quot;time&quot;:&quot;Nov 09, 3:23 AM&quot;}">
                            </div>
                        </td>
                        <td class="align-middle product white-space-nowrap py-0"><a
                                class="d-block rounded-2 border border-translucent"
                                href="apps/e-commerce/landing/product-details.html"><img
                                    src="assets/img//products/60x60/4.png" alt="" width="53"></a></td>
                        <td class="align-middle product white-space-nowrap"><a class="fw-semibold"
                                                                               href="apps/e-commerce/landing/product-details.html">Apple
                                iMac 24" 4K Retina Display M1 8 Core CPU...</a></td>
                        <td class="align-middle customer white-space-nowrap"><a
                                class="d-flex align-items-center text-body" href="apps/e-commerce/landing/profile.html">
                                <div class="avatar avatar-l"><img class="rounded-circle avatar-placeholder"
                                                                  src="assets/img/team/40x40/avatar.webp" alt=""></div>
                                <h6 class="mb-0 ms-3 text-body">Eric McGee</h6>
                            </a></td>
                        <td class="align-middle rating white-space-nowrap fs-10">
                            <svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                            </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                            </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                            </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star text-warning-light" data-bs-theme="light"
                                 aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"></path>
                            </svg>
                            <!-- <span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star text-warning-light" data-bs-theme="light"
                                 aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"></path>
                            </svg>
                            <!-- <span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span> Font Awesome fontawesome.com -->
                        </td>
                        <td class="align-middle review" style="min-width:350px;">
                            <p class="fs-9 fw-semibold text-body-highlight mb-0">Personally, I like the minimalist
                                style, but I wouldn't choose it if I were searching for a computer that I would use
                                frequently. It's...<a href="#!">See more</a></p>
                        </td>
                        <td class="align-middle text-start ps-5 status"><span
                                class="badge badge-phoenix fs-10 badge-phoenix-warning"><span class="badge-label">Pending</span><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-clock ms-1"
                                    style="height:12.8px;width:12.8px;"><circle cx="12" cy="12" r="10"></circle><polyline
                                        points="12 6 12 12 16 14"></polyline></svg></span></td>
                        <td class="align-middle text-end time white-space-nowrap">
                            <div class="hover-hide">
                                <h6 class="text-body-highlight mb-0">Nov 09, 3:23 AM</h6>
                            </div>
                        </td>
                        <td class="align-middle white-space-nowrap text-end pe-0">
                            <div class="position-relative">
                                <div class="hover-actions">
                                    <button class="btn btn-sm btn-phoenix-secondary me-1 fs-10">
                                        <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false"
                                             data-prefix="fas" data-icon="check" role="img"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                  d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path>
                                        </svg><!-- <span class="fas fa-check"></span> Font Awesome fontawesome.com -->
                                    </button>
                                    <button class="btn btn-sm btn-phoenix-secondary fs-10">
                                        <svg class="svg-inline--fa fa-trash" aria-hidden="true" focusable="false"
                                             data-prefix="fas" data-icon="trash" role="img"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                  d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
                                        </svg><!-- <span class="fas fa-trash"></span> Font Awesome fontawesome.com -->
                                    </button>
                                </div>
                            </div>
                            <div class="btn-reveal-trigger position-static">
                                <button
                                    class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                    type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                    aria-expanded="false" data-bs-reference="parent">
                                    <svg class="svg-inline--fa fa-ellipsis fs-10" aria-hidden="true" focusable="false"
                                         data-prefix="fas" data-icon="ellipsis" role="img"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                              d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z"></path>
                                    </svg>
                                    <!-- <span class="fas fa-ellipsis-h fs-10"></span> Font Awesome fontawesome.com -->
                                </button>
                                <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a
                                        class="dropdown-item" href="#!">Export</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#!">Remove</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs-9 align-middle ps-0">
                            <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox"
                                                                     data-bulk-select-row="{&quot;product&quot;:&quot;Razer Kraken v3 x Wired 7.1 Surroung Sound Gaming headset&quot;,&quot;productImage&quot;:&quot;/products/60x60/5.png&quot;,&quot;customer&quot;:{&quot;name&quot;:&quot;Kim Carroll&quot;,&quot;avatar&quot;:&quot;/team/40x40/avatar.webp&quot;,&quot;avatarPlaceholder&quot;:true},&quot;rating&quot;:4,&quot;review&quot;:&quot;It performs exactly as expected. There are three of these in the family.&quot;,&quot;status&quot;:{&quot;title&quot;:&quot;Pending&quot;,&quot;badge&quot;:&quot;warning&quot;,&quot;icon&quot;:&quot;clock&quot;},&quot;time&quot;:&quot;Nov 09, 2:15 PM&quot;}">
                            </div>
                        </td>
                        <td class="align-middle product white-space-nowrap py-0"><a
                                class="d-block rounded-2 border border-translucent"
                                href="apps/e-commerce/landing/product-details.html"><img
                                    src="assets/img//products/60x60/5.png" alt="" width="53"></a></td>
                        <td class="align-middle product white-space-nowrap"><a class="fw-semibold"
                                                                               href="apps/e-commerce/landing/product-details.html">Razer
                                Kraken v3 x Wired 7.1 Surroung Sound Gam...</a></td>
                        <td class="align-middle customer white-space-nowrap"><a
                                class="d-flex align-items-center text-body" href="apps/e-commerce/landing/profile.html">
                                <div class="avatar avatar-l"><img class="rounded-circle avatar-placeholder"
                                                                  src="assets/img/team/40x40/avatar.webp" alt=""></div>
                                <h6 class="mb-0 ms-3 text-body">Kim Carroll</h6>
                            </a></td>
                        <td class="align-middle rating white-space-nowrap fs-10">
                            <svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                            </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                            </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                            </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                            </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star text-warning-light" data-bs-theme="light"
                                 aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"></path>
                            </svg>
                            <!-- <span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span> Font Awesome fontawesome.com -->
                        </td>
                        <td class="align-middle review" style="min-width:350px;">
                            <p class="fs-9 fw-semibold text-body-highlight mb-0">It performs exactly as expected. There
                                are three of these in the family.</p>
                        </td>
                        <td class="align-middle text-start ps-5 status"><span
                                class="badge badge-phoenix fs-10 badge-phoenix-warning"><span class="badge-label">Pending</span><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-clock ms-1"
                                    style="height:12.8px;width:12.8px;"><circle cx="12" cy="12" r="10"></circle><polyline
                                        points="12 6 12 12 16 14"></polyline></svg></span></td>
                        <td class="align-middle text-end time white-space-nowrap">
                            <div class="hover-hide">
                                <h6 class="text-body-highlight mb-0">Nov 09, 2:15 PM</h6>
                            </div>
                        </td>
                        <td class="align-middle white-space-nowrap text-end pe-0">
                            <div class="position-relative">
                                <div class="hover-actions">
                                    <button class="btn btn-sm btn-phoenix-secondary me-1 fs-10">
                                        <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false"
                                             data-prefix="fas" data-icon="check" role="img"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                  d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path>
                                        </svg><!-- <span class="fas fa-check"></span> Font Awesome fontawesome.com -->
                                    </button>
                                    <button class="btn btn-sm btn-phoenix-secondary fs-10">
                                        <svg class="svg-inline--fa fa-trash" aria-hidden="true" focusable="false"
                                             data-prefix="fas" data-icon="trash" role="img"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                  d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
                                        </svg><!-- <span class="fas fa-trash"></span> Font Awesome fontawesome.com -->
                                    </button>
                                </div>
                            </div>
                            <div class="btn-reveal-trigger position-static">
                                <button
                                    class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                    type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                    aria-expanded="false" data-bs-reference="parent">
                                    <svg class="svg-inline--fa fa-ellipsis fs-10" aria-hidden="true" focusable="false"
                                         data-prefix="fas" data-icon="ellipsis" role="img"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                              d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z"></path>
                                    </svg>
                                    <!-- <span class="fas fa-ellipsis-h fs-10"></span> Font Awesome fontawesome.com -->
                                </button>
                                <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a
                                        class="dropdown-item" href="#!">Export</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#!">Remove</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs-9 align-middle ps-0">
                            <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox"
                                                                     data-bulk-select-row="{&quot;product&quot;:&quot;PlayStation 5 DualSense Wireless Controller&quot;,&quot;productImage&quot;:&quot;/products/60x60/6.png&quot;,&quot;customer&quot;:{&quot;name&quot;:&quot;Barbara Lucas&quot;,&quot;avatar&quot;:&quot;/team/40x40/57.webp&quot;},&quot;rating&quot;:4,&quot;review&quot;:&quot;The controller is quite comfy for me. Despite its increased size, the controller still fits well in my hands.&quot;,&quot;status&quot;:{&quot;title&quot;:&quot;Approved&quot;,&quot;badge&quot;:&quot;success&quot;,&quot;icon&quot;:&quot;check&quot;},&quot;time&quot;:&quot;Nov 08, 8:53 AM&quot;}">
                            </div>
                        </td>
                        <td class="align-middle product white-space-nowrap py-0"><a
                                class="d-block rounded-2 border border-translucent"
                                href="apps/e-commerce/landing/product-details.html"><img
                                    src="assets/img//products/60x60/6.png" alt="" width="53"></a></td>
                        <td class="align-middle product white-space-nowrap"><a class="fw-semibold"
                                                                               href="apps/e-commerce/landing/product-details.html">PlayStation
                                5 DualSense Wireless Controller</a></td>
                        <td class="align-middle customer white-space-nowrap"><a
                                class="d-flex align-items-center text-body" href="apps/e-commerce/landing/profile.html">
                                <div class="avatar avatar-l"><img class="rounded-circle"
                                                                  src="assets/img/team/40x40/57.webp" alt=""></div>
                                <h6 class="mb-0 ms-3 text-body">Barbara Lucas</h6>
                            </a></td>
                        <td class="align-middle rating white-space-nowrap fs-10">
                            <svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                            </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                            </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                            </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                            </svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star text-warning-light" data-bs-theme="light"
                                 aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"></path>
                            </svg>
                            <!-- <span class="fa-regular fa-star text-warning-light" data-bs-theme="light"></span> Font Awesome fontawesome.com -->
                        </td>
                        <td class="align-middle review" style="min-width:350px;">
                            <p class="fs-9 fw-semibold text-body-highlight mb-0">The controller is quite comfy for me.
                                Despite its increased size, the controller still fits well in my hands.</p>
                        </td>
                        <td class="align-middle text-start ps-5 status"><span
                                class="badge badge-phoenix fs-10 badge-phoenix-success"><span class="badge-label">Approved</span><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-check ms-1"
                                    style="height:12.8px;width:12.8px;"><polyline
                                        points="20 6 9 17 4 12"></polyline></svg></span></td>
                        <td class="align-middle text-end time white-space-nowrap">
                            <div class="hover-hide">
                                <h6 class="text-body-highlight mb-0">Nov 08, 8:53 AM</h6>
                            </div>
                        </td>
                        <td class="align-middle white-space-nowrap text-end pe-0">
                            <div class="position-relative">
                                <div class="hover-actions">
                                    <button class="btn btn-sm btn-phoenix-secondary me-1 fs-10">
                                        <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false"
                                             data-prefix="fas" data-icon="check" role="img"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                  d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path>
                                        </svg><!-- <span class="fas fa-check"></span> Font Awesome fontawesome.com -->
                                    </button>
                                    <button class="btn btn-sm btn-phoenix-secondary fs-10">
                                        <svg class="svg-inline--fa fa-trash" aria-hidden="true" focusable="false"
                                             data-prefix="fas" data-icon="trash" role="img"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                  d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
                                        </svg><!-- <span class="fas fa-trash"></span> Font Awesome fontawesome.com -->
                                    </button>
                                </div>
                            </div>
                            <div class="btn-reveal-trigger position-static">
                                <button
                                    class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                    type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                    aria-expanded="false" data-bs-reference="parent">
                                    <svg class="svg-inline--fa fa-ellipsis fs-10" aria-hidden="true" focusable="false"
                                         data-prefix="fas" data-icon="ellipsis" role="img"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                              d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z"></path>
                                    </svg>
                                    <!-- <span class="fas fa-ellipsis-h fs-10"></span> Font Awesome fontawesome.com -->
                                </button>
                                <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a
                                        class="dropdown-item" href="#!">Export</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#!">Remove</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="row align-items-center py-1">
                <div class="pagination d-none"></div>
                <div class="col d-flex fs-9">
                    <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body" data-list-info="data-list-info">1 to 6
                        <span class="text-body-tertiary"> Items of </span>15</p><a class="fw-semibold" href="#!"
                                                                                   data-list-view="*">View all
                        <svg class="svg-inline--fa fa-angle-right ms-1" data-fa-transform="down-1" aria-hidden="true"
                             focusable="false" data-prefix="fas" data-icon="angle-right" role="img"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""
                             style="transform-origin: 0.3125em 0.5625em;">
                            <g transform="translate(160 256)">
                                <g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)">
                                    <path fill="currentColor"
                                          d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"
                                          transform="translate(-160 -256)"></path>
                                </g>
                            </g>
                        </svg>
                        <!-- <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span> Font Awesome fontawesome.com -->
                    </a><a class="fw-semibold d-none" href="#!" data-list-view="less">View Less</a>
                </div>
                <div class="col-auto d-flex">
                    <button class="btn btn-link px-1 me-1 disabled" type="button" title="Previous"
                            data-list-pagination="prev" disabled="">
                        <svg class="svg-inline--fa fa-chevron-left me-2" aria-hidden="true" focusable="false"
                             data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 320 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                  d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"></path>
                        </svg><!-- <span class="fas fa-chevron-left me-2"></span> Font Awesome fontawesome.com -->
                        Previous
                    </button>
                    <button class="btn btn-link px-1 ms-1" type="button" title="Next" data-list-pagination="next">Next
                        <svg class="svg-inline--fa fa-chevron-right ms-2" aria-hidden="true" focusable="false"
                             data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 320 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                  d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"></path>
                        </svg><!-- <span class="fas fa-chevron-right ms-2"></span> Font Awesome fontawesome.com -->
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row gx-6">
        <div class="col-12 col-xl-6">
            <div
                data-list="{&quot;valueNames&quot;:[&quot;country&quot;,&quot;users&quot;,&quot;transactions&quot;,&quot;revenue&quot;,&quot;conv-rate&quot;],&quot;page&quot;:5}">
                <div class="mb-5 mt-7">
                    <h3>Top regions by revenue</h3>
                    <p class="text-body-tertiary">Where you generated most of the revenue</p>
                </div>
                <div class="table-responsive scrollbar">
                    <table class="table fs-10 mb-0">
                        <thead>
                        <tr>
                            <th class="sort border-top border-translucent ps-0 align-middle" scope="col"
                                data-sort="country" style="width:32%">COUNTRY
                            </th>
                            <th class="sort border-top border-translucent align-middle" scope="col" data-sort="users"
                                style="width:17%">USERS
                            </th>
                            <th class="sort border-top border-translucent text-end align-middle" scope="col"
                                data-sort="transactions" style="width:16%">TRANSACTIONS
                            </th>
                            <th class="sort border-top border-translucent text-end align-middle" scope="col"
                                data-sort="revenue" style="width:20%">REVENUE
                            </th>
                            <th class="sort border-top border-translucent text-end pe-0 align-middle" scope="col"
                                data-sort="conv-rate" style="width:17%">CONV. RATE
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                            <td class="align-middle py-4">
                                <h4 class="mb-0 fw-normal">377,620</h4>
                            </td>
                            <td class="align-middle text-end py-4">
                                <h4 class="mb-0 fw-normal">236</h4>
                            </td>
                            <td class="align-middle text-end py-4">
                                <h4 class="mb-0 fw-normal">$15,758</h4>
                            </td>
                            <td class="align-middle text-end py-4 pe-0">
                                <h4 class="mb-0 fw-normal">10.32%</h4>
                            </td>
                        </tr>
                        </tbody>
                        <tbody class="list" id="table-regions-by-revenue">
                        <tr>
                            <td class="white-space-nowrap ps-0 country" style="width:32%">
                                <div class="d-flex align-items-center">
                                    <h6 class="mb-0 me-3">1. </h6><a href="#!">
                                        <div class="d-flex align-items-center"><img src="assets/img/country/india.png"
                                                                                    alt="" width="24">
                                            <p class="mb-0 ps-3 text-primary fw-bold fs-9">India</p>
                                        </div>
                                    </a>
                                </div>
                            </td>
                            <td class="align-middle users" style="width:17%">
                                <h6 class="mb-0">92896<span class="text-body-tertiary fw-semibold ms-2">(41.6%)</span>
                                </h6>
                            </td>
                            <td class="align-middle text-end transactions" style="width:17%">
                                <h6 class="mb-0">67<span class="text-body-tertiary fw-semibold ms-2">(34.3%)</span></h6>
                            </td>
                            <td class="align-middle text-end revenue" style="width:17%">
                                <h6 class="mb-0">$7560<span class="text-body-tertiary fw-semibold ms-2">(36.9%)</span>
                                </h6>
                            </td>
                            <td class="align-middle text-end pe-0 conv-rate" style="width:17%">
                                <h6>14.01%</h6>
                            </td>
                        </tr>
                        <tr>
                            <td class="white-space-nowrap ps-0 country" style="width:32%">
                                <div class="d-flex align-items-center">
                                    <h6 class="mb-0 me-3">2. </h6><a href="#!">
                                        <div class="d-flex align-items-center"><img src="assets/img/country/china.png"
                                                                                    alt="" width="24">
                                            <p class="mb-0 ps-3 text-primary fw-bold fs-9">China</p>
                                        </div>
                                    </a>
                                </div>
                            </td>
                            <td class="align-middle users" style="width:17%">
                                <h6 class="mb-0">50496<span class="text-body-tertiary fw-semibold ms-2">(32.8%)</span>
                                </h6>
                            </td>
                            <td class="align-middle text-end transactions" style="width:17%">
                                <h6 class="mb-0">54<span class="text-body-tertiary fw-semibold ms-2">(23.8%)</span></h6>
                            </td>
                            <td class="align-middle text-end revenue" style="width:17%">
                                <h6 class="mb-0">$6532<span class="text-body-tertiary fw-semibold ms-2">(26.5%)</span>
                                </h6>
                            </td>
                            <td class="align-middle text-end pe-0 conv-rate" style="width:17%">
                                <h6>23.56%</h6>
                            </td>
                        </tr>
                        <tr>
                            <td class="white-space-nowrap ps-0 country" style="width:32%">
                                <div class="d-flex align-items-center">
                                    <h6 class="mb-0 me-3">3. </h6><a href="#!">
                                        <div class="d-flex align-items-center"><img src="assets/img/country/usa.png"
                                                                                    alt="" width="24">
                                            <p class="mb-0 ps-3 text-primary fw-bold fs-9">USA</p>
                                        </div>
                                    </a>
                                </div>
                            </td>
                            <td class="align-middle users" style="width:17%">
                                <h6 class="mb-0">45679<span class="text-body-tertiary fw-semibold ms-2">(24.3%)</span>
                                </h6>
                            </td>
                            <td class="align-middle text-end transactions" style="width:17%">
                                <h6 class="mb-0">35<span class="text-body-tertiary fw-semibold ms-2">(19.7%)</span></h6>
                            </td>
                            <td class="align-middle text-end revenue" style="width:17%">
                                <h6 class="mb-0">$5432<span class="text-body-tertiary fw-semibold ms-2">(16.9%)</span>
                                </h6>
                            </td>
                            <td class="align-middle text-end pe-0 conv-rate" style="width:17%">
                                <h6>10.23%</h6>
                            </td>
                        </tr>
                        <tr>
                            <td class="white-space-nowrap ps-0 country" style="width:32%">
                                <div class="d-flex align-items-center">
                                    <h6 class="mb-0 me-3">4. </h6><a href="#!">
                                        <div class="d-flex align-items-center"><img
                                                src="assets/img/country/south-korea.png" alt="" width="24">
                                            <p class="mb-0 ps-3 text-primary fw-bold fs-9">South Korea</p>
                                        </div>
                                    </a>
                                </div>
                            </td>
                            <td class="align-middle users" style="width:17%">
                                <h6 class="mb-0">36453<span class="text-body-tertiary fw-semibold ms-2">(19.7%)</span>
                                </h6>
                            </td>
                            <td class="align-middle text-end transactions" style="width:17%">
                                <h6 class="mb-0">22<span class="text-body-tertiary fw-semibold ms-2">(9.54%)</span></h6>
                            </td>
                            <td class="align-middle text-end revenue" style="width:17%">
                                <h6 class="mb-0">$4673<span class="text-body-tertiary fw-semibold ms-2">(11.6%)</span>
                                </h6>
                            </td>
                            <td class="align-middle text-end pe-0 conv-rate" style="width:17%">
                                <h6>8.85%</h6>
                            </td>
                        </tr>
                        <tr>
                            <td class="white-space-nowrap ps-0 country" style="width:32%">
                                <div class="d-flex align-items-center">
                                    <h6 class="mb-0 me-3">5. </h6><a href="#!">
                                        <div class="d-flex align-items-center"><img src="assets/img/country/vietnam.png"
                                                                                    alt="" width="24">
                                            <p class="mb-0 ps-3 text-primary fw-bold fs-9">Vietnam</p>
                                        </div>
                                    </a>
                                </div>
                            </td>
                            <td class="align-middle users" style="width:17%">
                                <h6 class="mb-0">15007<span class="text-body-tertiary fw-semibold ms-2">(11.9%)</span>
                                </h6>
                            </td>
                            <td class="align-middle text-end transactions" style="width:17%">
                                <h6 class="mb-0">17<span class="text-body-tertiary fw-semibold ms-2">(6.91%)</span></h6>
                            </td>
                            <td class="align-middle text-end revenue" style="width:17%">
                                <h6 class="mb-0">$2456<span class="text-body-tertiary fw-semibold ms-2">(10.2%)</span>
                                </h6>
                            </td>
                            <td class="align-middle text-end pe-0 conv-rate" style="width:17%">
                                <h6>6.01%</h6>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row align-items-center py-1">
                    <div class="pagination d-none"></div>
                    <div class="col d-flex fs-9">
                        <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body" data-list-info="data-list-info">1
                            to 5 <span class="text-body-tertiary"> Items of </span>10</p>
                    </div>
                    <div class="col-auto d-flex">
                        <button class="btn btn-link px-1 me-1 disabled" type="button" title="Previous"
                                data-list-pagination="prev" disabled="">
                            <svg class="svg-inline--fa fa-chevron-left me-2" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="chevron-left" role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"></path>
                            </svg><!-- <span class="fas fa-chevron-left me-2"></span> Font Awesome fontawesome.com -->
                            Previous
                        </button>
                        <button class="btn btn-link px-1 ms-1" type="button" title="Next" data-list-pagination="next">
                            Next
                            <svg class="svg-inline--fa fa-chevron-right ms-2" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="chevron-right" role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"></path>
                            </svg><!-- <span class="fas fa-chevron-right ms-2"></span> Font Awesome fontawesome.com -->
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-6">
            <div class="mx-n4 mx-lg-n6 ms-xl-0 h-100">
                <div class="h-100 w-100">
                    <div
                        class="h-100 bg-body-emphasis leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom"
                        id="map" style="min-height: 300px; position: relative;" tabindex="0">
                        <div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(0px, 0px, 0px);">
                            <div class="leaflet-pane leaflet-tile-pane">
                                <div class="leaflet-layer "
                                     style="z-index: 1; filter: brightness(101%) contrast(101%) hue-rotate(23deg) saturate(225%); opacity: 1;">
                                    <div class="leaflet-tile-container leaflet-zoom-animated"
                                         style="z-index: 18; transform: translate3d(1px, 1px, 0px) scale(1.31951);"><img
                                            alt="" src="https://a.basemaps.cartocdn.com/light_all/1/0/0.png"
                                            class="leaflet-tile leaflet-tile-loaded"
                                            style="width: 256px; height: 256px; transform: translate3d(-99px, -11px, 0px); opacity: 1;"><img
                                            alt="" src="https://b.basemaps.cartocdn.com/light_all/1/1/0.png"
                                            class="leaflet-tile leaflet-tile-loaded"
                                            style="width: 256px; height: 256px; transform: translate3d(157px, -11px, 0px); opacity: 1;"><img
                                            alt="" src="https://b.basemaps.cartocdn.com/light_all/1/0/1.png"
                                            class="leaflet-tile leaflet-tile-loaded"
                                            style="width: 256px; height: 256px; transform: translate3d(-99px, 245px, 0px); opacity: 1;"><img
                                            alt="" src="https://c.basemaps.cartocdn.com/light_all/1/1/1.png"
                                            class="leaflet-tile leaflet-tile-loaded"
                                            style="width: 256px; height: 256px; transform: translate3d(157px, 245px, 0px); opacity: 1;">
                                    </div>
                                </div>
                            </div>
                            <div class="leaflet-pane leaflet-overlay-pane"></div>
                            <div class="leaflet-pane leaflet-shadow-pane"></div>
                            <div class="leaflet-pane leaflet-marker-pane">
                                <div
                                    class="leaflet-marker-icon marker-cluster marker-cluster-small leaflet-zoom-animated leaflet-interactive"
                                    tabindex="0" role="button"
                                    style="margin-left: -20px; margin-top: -20px; width: 40px; height: 40px; transform: translate3d(258px, 382px, 0px); z-index: 382;">
                                    <div><span>8</span></div>
                                </div>
                                <div
                                    class="leaflet-marker-icon marker-cluster marker-cluster-small leaflet-zoom-animated leaflet-interactive"
                                    tabindex="0" role="button"
                                    style="margin-left: -20px; margin-top: -20px; width: 40px; height: 40px; transform: translate3d(86px, 357px, 0px); z-index: 357;">
                                    <div><span>6</span></div>
                                </div>
                                <div
                                    class="leaflet-marker-icon marker-cluster marker-cluster-small leaflet-zoom-animated leaflet-interactive"
                                    tabindex="0" role="button"
                                    style="margin-left: -20px; margin-top: -20px; width: 40px; height: 40px; transform: translate3d(537px, 402px, 0px); z-index: 402;">
                                    <div><span>2</span></div>
                                </div>
                                <div
                                    class="leaflet-marker-icon marker-cluster marker-cluster-medium leaflet-zoom-animated leaflet-interactive"
                                    tabindex="0" role="button"
                                    style="margin-left: -20px; margin-top: -20px; width: 40px; height: 40px; transform: translate3d(314px, 280px, 0px); z-index: 280;">
                                    <div><span>10</span></div>
                                </div>
                                <div
                                    class="leaflet-marker-icon marker-cluster marker-cluster-medium leaflet-zoom-animated leaflet-interactive"
                                    tabindex="0" role="button"
                                    style="margin-left: -20px; margin-top: -20px; width: 40px; height: 40px; transform: translate3d(52px, 225px, 0px); z-index: 225;">
                                    <div><span>37</span></div>
                                </div>
                                <div
                                    class="leaflet-marker-icon marker-cluster marker-cluster-large leaflet-zoom-animated leaflet-interactive"
                                    tabindex="0" role="button"
                                    style="margin-left: -20px; margin-top: -20px; width: 40px; height: 40px; transform: translate3d(207px, 206px, 0px); z-index: 206;">
                                    <div><span>100</span></div>
                                </div>
                            </div>
                            <div class="leaflet-pane leaflet-tooltip-pane"></div>
                            <div class="leaflet-pane leaflet-popup-pane"></div>
                            <div class="leaflet-proxy leaflet-zoom-animated"></div>
                        </div>
                        <div class="leaflet-control-container">
                            <div class="leaflet-top leaflet-left">
                                <div class="leaflet-control-zoom leaflet-bar leaflet-control"><a
                                        class="leaflet-control-zoom-in" href="#" title="Zoom in" role="button"
                                        aria-label="Zoom in" aria-disabled="false"><span aria-hidden="true">+</span></a><a
                                        class="leaflet-control-zoom-out leaflet-disabled" href="#" title="Zoom out"
                                        role="button" aria-label="Zoom out" aria-disabled="true"><span
                                            aria-hidden="true">−</span></a></div>
                            </div>
                            <div class="leaflet-top leaflet-right"></div>
                            <div class="leaflet-bottom leaflet-left"></div>
                            <div class="leaflet-bottom leaflet-right">
                                <div class="leaflet-control-attribution leaflet-control"><a href="https://leafletjs.com"
                                                                                            title="A JavaScript library for interactive maps">
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="12" height="8"
                                             viewBox="0 0 12 8" class="leaflet-attribution-flag">
                                            <path fill="#4C7BE1" d="M0 0h12v4H0z"></path>
                                            <path fill="#FFD500" d="M0 4h12v3H0z"></path>
                                            <path fill="#E0BC00" d="M0 7h12v1H0z"></path>
                                        </svg>
                                        Leaflet</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-body-emphasis pt-6 pb-9 border-top">
        <div class="row g-6">
            <div class="col-12 col-xl-6">
                <div class="me-xl-4">
                    <div>
                        <h3>Projection vs actual</h3>
                        <p class="mb-1 text-body-tertiary">Actual earnings vs projected earnings</p>
                    </div>
                    <div class="echart-projection-actual"
                         style="height: 300px; width: 100%; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;"
                         _echarts_instance_="ec_1725883139526">
                        <div
                            style="position: relative; width: 465px; height: 300px; padding: 0px; margin: 0px; border-width: 0px;">
                            <canvas data-zr-dom-id="zr_0" width="465" height="300"
                                    style="position: absolute; left: 0px; top: 0px; width: 465px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas>
                        </div>
                        <div class=""></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6">
                <div>
                    <h3>Returning customer rate</h3>
                    <p class="mb-1 text-body-tertiary">Rate of customers returning to your shop over time</p>
                </div>
                <div class="echart-returning-customer"
                     style="height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;"
                     _echarts_instance_="ec_1725883139527">
                    <div
                        style="position: relative; width: 489px; height: 300px; padding: 0px; margin: 0px; border-width: 0px;">
                        <canvas data-zr-dom-id="zr_0" width="489" height="300"
                                style="position: absolute; left: 0px; top: 0px; width: 489px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas>
                        <canvas data-zr-dom-id="zr_1" width="489" height="300"
                                style="position: absolute; left: 0px; top: 0px; width: 489px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas>
                        <canvas data-zr-dom-id="zr_2" width="489" height="300"
                                style="position: absolute; left: 0px; top: 0px; width: 489px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas>
                        <canvas data-zr-dom-id="zr_3" width="489" height="300"
                                style="position: absolute; left: 0px; top: 0px; width: 489px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas>
                    </div>
                    <div class=""></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
