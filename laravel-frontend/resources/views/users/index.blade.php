@extends('layouts.theme')

@section('content')

    <!-- Quote Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="fs-5 fw-medium text-primary">สำหรับผู้ดูแลระบบ</p>
                    <h1 class="display-5 mb-4">รายชื่อผู้ใช้งาน</h1>
                    <p>
                        <a href="{{ route('user.create') }}" class="btn btn-primary rounded-pill py-2 px-3">เพิ่มผู้ใช้ใหม่</a>
                    </p>
                    <a class="d-inline-flex align-items-center rounded overflow-hidden border border-primary" href="">
                        <span class="btn-lg-square bg-primary" style="width: 55px; height: 55px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </span>
                        <span class="fs-5 fw-medium mx-4">061 992 1666</span>
                    </a>
                    <div>
                        @if ($message = Session::get('success'))
                            {{ $message }}
                        @endif
                    </div>
                </div>

                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.5s">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Email</th>
                            <th>Username</th>
                            <th>ชื่อผู้ใช้</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>Role</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                        @forelse ($userlist as $data)
                          <tr>
                            <td>{{ $data['email'] }}</td>
                            <td>{{ $data['username'] }}</td>
                            <td>{{ $data['fullname'] }}</td>
                            <td>{{ $data['tel'] }}</td>
                            <td>{{ $data['role'] }}</td>
                            <td>
                                <form action="{{ route('user.destroy', $data['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $data['id'] }}">
                                    <a href="{{ route('user.edit', $data['id']) }}" class="btn btn-success rounded-pill py-2 px-3">Edit</a>
                                    <button type="submit" class="btn btn-danger rounded-pill py-2 px-3">Delete</button>
                                </form>
                            </td>
                          </tr>
                        @empty
                          <tr>
                            <td colspan="6">No data</td>
                          </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote Start -->

    @endsection
