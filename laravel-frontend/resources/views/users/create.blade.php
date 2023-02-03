@extends('layouts.theme')

@section('content')

    <!-- Quote Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="fs-5 fw-medium text-primary">สำหรับผู้ดูแลระบบ</p>
                    <h1 class="display-5 mb-4">บริหารจัดการข้อมูลผู้ใช้งาน</h1>
                    <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita
                        erat ipsum et lorem et sit, sed stet lorem sit clita duo justo</p>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et
                        eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo</p>
                    <a class="d-inline-flex align-items-center rounded overflow-hidden border border-primary" href="">
                        <span class="btn-lg-square bg-primary" style="width: 55px; height: 55px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </span>
                        <span class="fs-5 fw-medium mx-4">061 992 1666</span>
                    </a>
                </div>

                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <form method="post" action="{{ route('user.store') }}">
                        @csrf
                    <h2 class="mb-4">เพิ่มผู้ใช้ใหม่</h2>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="fullname" placeholder="ชื่อ-นามสกุล">
                                <label for="name">ชื่อ-นามสกุล</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                                <label for="name">Username</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                                <label for="mail">Email</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="tel" placeholder="เบอร์โทรศัพท์">
                                <label for="mobile">เบอร์โทรศัพท์</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <select class="form-select" name="role">
                                    <option value="3" selected>ผู้ใช้ทั่วไป</option>
                                    <option value="2">ผู้จัดการ</option>
                                    <option value="1">SuperAdmin</option>
                                </select>
                                <label for="service">สิทธิ์การใช้งาน</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="password" placeholder="รหัสผ่าน">
                                <label for="name">รหัสผ่าน</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="ยืนยันรหัสผ่าน">
                                <label for="mail">ยืนยันรหัสผ่าน</label>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-primary w-100 py-3" type="submit">เพิ่มผู้ใช้ใหม่</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote Start -->

    @endsection
