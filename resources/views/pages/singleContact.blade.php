@extends('layouts.layoutDashboard')
@section('content')
    <div class="container-fluid">
        {{-- Start: breadcrumbs --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('contact.view') }}">Contacts</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Details</li>
            </ol>
        </nav>
        {{-- End: breadcrumbs --}}

        {{-- Start: Contact card --}}
        <div class="card">
            <div class="bg-white border-b card-header d-flex justify-content-between">
                <h1 class="fs-5 fw-bolder">Contact Details</h1>
                <button type="button" class=" btn btn-success m-1" data-bs-toggle="modal"
                    data-bs-target="#deleteContactModal">
                    Add Favourite
                    <i class=" ti ti-heart"></i>
                </button>
            </div>
            <div class="card-body">
                <div class="flex-wrap row">

                    <div class=" col-lg-3 d-flex flex-column align-items-center align-items-lg-start">
                        <img src="{{ asset('assets/images/icons/user-4.jpg') }}" alt="avatar" class="mb-3 rounded-circle"
                            width="150"> <!-- ----------------data is on DB-------------- -->
                        <div class=" d-flex">
                            <div class="flex-grow-1 d-flex flex-column align-items-center align-items-lg-start">
                                <h6 class="mb-1 fw-semibold fs-4">Tharaka Harischandra</h6>
                                <!-- ----------------data is on DB-------------- -->
                                <span class="mb-1 fw-normal">UI/UX Designer</span>
                                <!-- ----------------data is on DB-------------- -->
                                <span class="px-3 py-1  rounded-3 text-bg-warning  ">Category - Familly</span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0 text-gray-500 fw-normal fs-4">
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 col-lg-4 d-flex flex-column align-items-center align-items-lg-start mt-lg-0">

                        <div class=" d-flex flex-lg-column flex-column ">
                            <div class=" d-flex align-items-center flex-column flex-lg-row">
                                <div
                                    class=" p-2 d-flex align-items-center justify-content-center bg-info rounded-2">
                                    <i class=" text-white ti ti-mail fs-6 "></i>
                                </div>
                                <div class="mt-2 ms-2 d-flex flex-column align-items-center mt-lg-0 align-items-lg-start">
                                    <h6 class="fw-semibold mb-1">Email</h6>
                                    <h6 class="fw-normal">tharakarz@gmail.com</h6>
                                    <!-- ----------------data is on DB-------------- -->
                                </div>
                            </div>


                            <div class="mt-lg-3 d-flex flex-column align-items-center align-items-lg-start  col-lg-12">
                                <div class=" d-flex align-items-center flex-column flex-lg-row">
                                    <div
                                        class="p-2 d-flex align-items-center justify-content-center bg-info rounded-2">
                                        <i class="fs-6 text-white ti ti-phone"></i>
                                    </div>
                                    <div
                                        class="mt-2 ms-2 d-flex flex-column align-items-center mt-lg-0 align-items-lg-start">
                                        <h6 class="fw-semibold mb-1">Phone</h6>
                                        <h6 class="fw-normal">077 540 5228</h6>
                                        <!-- ----------------data is on DB-------------- -->
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="mt-3 d-flex flex-column align-items-center align-items-lg-start">
                            <div class="d-flex align-items-center flex-column flex-lg-row ">
                                <div
                                    class="p-2 d-flex align-items-center justify-content-center bg-info rounded-2">
                                    <i class="fs-6 text-white ti ti-location"></i>
                                </div>
                                <div class="mt-2 ms-2 d-flex flex-column align-items-center mt-lg-0 align-items-lg-start">
                                    <h6 class="fw-semibold mb-1">Location</h6>
                                    <h6 class="fw-normal">Kandy</h6>
                                    <!-- ----------------data is on DB-------------- -->
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="mt-4 col-lg-5 mt-lg-0">
                        <div class=" d-flex flex-column align-items-center align-items-lg-start">
                            <h6 class="fw-semibold mb-1">Note </h6>
                            <h6 class="fw-normal"> Lorem ipsum dolor sit
                                amet consectetur, adipisicing elit. Dicta, iure molestiae fugiat, optio et veniam quisquam
                                exercitationem neque soluta quae perspiciatis saepe eligendi architecto quaerat? </h6>
                        </div>

                        <div class="mt-3 d-flex align-items-center justify-content-center mt-lg-4 d-lg-block">
                            <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal"
                                data-bs-target="#editContactModal">
                                Edit
                            </button>
                            <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal"
                                data-bs-target="#deleteContactModal">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            {{-- End: Contact card --}}

            {{-- Start: edit contact modal --}}
            <div class="modal fade" id="editContactModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Contact</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="">
                                <div class="flex-wrap row">
                                    <div class="mb-3 col-md-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="border-blue-200 form-control rounded-2" id="nameEdit"
                                            placeholder="Enter Name" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="name" class="form-label">Designation</label>
                                        <input type="text" class="border-blue-200 form-control rounded-2"
                                            id="designationEdit" placeholder="Enter Designation">
                                    </div>
                                </div>

                                <div class="flex-wrap row">
                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="border-blue-200 form-control rounded-2"
                                            id="emailEdit" placeholder="Enter Email" oninput="validateEditEmail(this)">
                                        <p id="editEmailError" class="text-danger"></p>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="editPhone" class="form-label">Edit Phone</label>
                                        <input type="number" class="border-blue-200 form-control rounded-2"
                                            id="editPhone" placeholder="Enter Phone" oninput="validateEditPhone(this)"
                                            required>
                                        <p id="editPhoneError" class="text-danger"></p>
                                    </div>
                                </div>

                                <div class="flex-wrap row">
                                    <div class="mb-3 col-md-6">
                                        <label for="location" class="form-label">Location</label>
                                        <input type="text" class="border-blue-200 form-control rounded-2"
                                            id="editLocation" placeholder="Enter Location" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="catEdit" class="form-label">Category</label>
                                        <select class="border-blue-200 form-select form-control rounded-2"
                                            aria-label="Default select example" id="catEdit">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="location" class="form-label">Note</label>
                                    <textarea class="border-blue-200 form-control rounded-2" id="noteEdit" rows="2" placeholder="Enter Note"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="editFormFile" class="form-label">Edit Avatar</label>
                                    <input type="file" class="border-blue-200 rounded-2 form-control form-input"
                                        id="editFormFile" accept="image/*" onchange="validateEditImageFile(this)">
                                    <p id="editFileError" class="text-danger"></p>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger m-1"
                                        data-bs-dismiss="modal">Discard</button>
                                    <button type="submit" class="btn btn-primary m-1">Save Changes</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            {{-- End: edit contact modal --}}

            {{-- Start: delede contact modal --}}
            <div class="modal fade" id="deleteContactModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="flex justify-end modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                            <img src="{{ asset('assets/images/icons/waning.gif') }}" alt="" width="100"
                                class="">
                            <h1 class="text-center modal-title fs-5 fw-bolder" id="exampleModalLabel">Are You Sure?</h1>
                            <p class="text-center text-gray-400">Do you really want to delete these records? This process
                                cannot be undone.</p>
                        </div>

                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-primary m-1"
                                data-bs-dismiss="modal">No</button>
                            <button type="button" class="btn btn-danger m-1">Yes</button>
                        </div>

                    </div>
                </div>
            </div>
            {{-- End: delede contact modal --}}

        </div>
    @endsection
