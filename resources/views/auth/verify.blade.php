@extends('layouts.layout1')
@section('content')
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                {{-- Logo --}}
                                @include('components.brandLogo')
                                <p class="text-center">Verify Your Email Address</p>
                                @if (session('resent'))
                                    <div class="alert alert-info py-3 " role="alert">
                                        {{ __('A fresh verification link has been sent to your email address.') }}
                                    </div>
                                @endif

                                <form class="" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <div class="mb-4">
                                        <h6 class=" text-center ">Before proceeding, please check your email for a
                                            verification link.</h6>
                                        <h6 class=" text-center ">If you did not receive the email,</h6>
                                    </div>
                                    <button type="submit"
                                        class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Re-Send</button>.

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Body Wrapper -->
@endsection
