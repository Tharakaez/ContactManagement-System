@extends('layouts.layoutDashboard')

@section('content')
    <div class="container-fluid">
        <!--  Owl carousel -->
        <div class=" row">

            <div class="item col-lg-4">
                <div class="border-0 card zoom-in bg-white">
                    <div class="cursor-pointer card-body">
                        <div class="text-center d-flex flex-column align-items-center">
                            <img src="{{ asset('assets/images/icons/group.png') }}" class="mb-3" alt="" />
                            <p class="mb-1 cursor-pointer fw-semibold fs-3 text-success"> All Contacts </p>
                            <h5 class="mb-0 fw-semibold text-success">96</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item col-lg-4">
                <div class="border-0 card zoom-in bg-white">
                    <div class="cursor-pointer card-body">
                        <div class="text-center d-flex flex-column align-items-center">
                            <img src="{{ asset('assets/images/icons/group (1).png') }}" class="mb-3" alt="" />
                            <p class="mb-1 fw-semibold fs-3 text-warning "> Today Saved </p>
                            <h5 class="mb-0 fw-semibold text-warning ">3,650</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item col-lg-4">
                <div class="border-0 card zoom-in bg-white">
                    <div class="cursor-pointer card-body">
                        <div class="text-center d-flex flex-column align-items-center">
                            <img src="{{ asset('assets/images/icons/group (2).png') }}" class="mb-3" alt="" />
                            <p class="mb-1 fw-semibold fs-3 text-primary"> This Month Saved</p>
                            <h5 class="mb-0 fw-semibold text-primary">356</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="row">
            <div class="d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="p-4 cursor-pointer card-body">
                        <h5 class="mb-4 card-title fw-semibold">Recently Added</h5>
                        <div class="table-responsive">
                            <table class="table mb-0 align-middle text-nowrap ">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="mb-0 fw-semibold">Name</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="mb-0 fw-semibold">Email</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="mb-0 fw-semibold">Phone</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="mb-0 fw-semibold">Location</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border-bottom-0">
                                            <h6 class="mb-1 fw-semibold fs-4">Tharaka Harischandra</h6>
                                            <span class="fw-normal">UI/UX Designer</span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="mb-0 text-gray-500 fw-normal fs-4">tharakarz@gmail.com</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="mb-0 text-gray-500 fw-normal fs-4">077 540 5228</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="mb-0 text-gray-500 fw-normal fs-4">Kandy</h6>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td class="border-bottom-0">
                                            <h6 class="mb-1 fw-semibold fs-4">Tharaka Harischandra</h6>
                                            <span class="fw-normal">UI/UX Designer</span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="mb-0 text-gray-500 fw-normal fs-4">tharakarz@gmail.com</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="mb-0 text-gray-500 fw-normal fs-4">077 540 5228</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="mb-0 text-gray-500 fw-normal fs-4">Kandy</h6>
                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
