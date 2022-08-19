@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Bootstrap Tables Extended')

{{-- vendor style --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/daterange/daterangepicker.css')}}">
@endsection
@section('content')
    <!-- table Transactions start -->
    <section id="table-transactions">
        <div class="card">
            <div class="card-header">
                <!-- head -->
                <h5 class="card-title">Transactions</h5>
                <!-- Single Date Picker and button -->
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li>
                            <fieldset class="has-icon-left">
                                <input type="text" class="form-control single-daterange" />
                                <div class="form-control-position">
                                    <i class="bx bx-calendar font-medium-1"></i>
                                </div>
                            </fieldset>
                        </li>
                        <li class="ml-2"><button class="btn btn-primary">Download</button></li>
                    </ul>
                </div>
            </div>
            <!-- datatable start -->
            <div class="table-responsive">
                <table id="table-extended-transactions" class="table mb-0">
                    <thead>
                    <tr>
                        <th>status</th>
                        <th>name</th>
                        <th>card</th>
                        <th>date</th>
                        <th>amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><i class="bx bxs-circle success font-small-1 mr-50"></i><span>Paid</span></td>
                        <td class="text-bold-600">Mike Brennan</td>
                        <td><img src="{{asset('images/cards/amer-express.png')}}" class="mr-50" alt="card" height="25"
                                 width="35"> **** 7617</td>
                        <td>10.09.17</td>
                        <td class="text-bold-600">$1,934</td>
                    </tr>
                    <tr>
                        <td><i class="bx bxs-circle danger font-small-1 mr-50"></i><span>Expired</span></td>
                        <td class="text-bold-600">Devin Payne</td>
                        <td><img src="{{asset('images/cards/discover.png')}}" class="mr-50" alt="card" height="25"
                                 width="35"> **** 7617</td>
                        <td>11.08.18</td>
                        <td class="text-bold-600">$232</td>
                    </tr>
                    <tr>
                        <td><i class="bx bxs-circle danger font-small-1 mr-50"></i><span>Expired</span></td>
                        <td class="text-bold-600">Michael Pena</td>
                        <td><img src="{{asset('images/cards/mastercard.png')}}" class="mr-50" alt="card" height="25"
                                 width="35"> **** 7617</td>
                        <td>11.08.18</td>
                        <td class="text-bold-600">$564</td>
                    </tr>
                    <tr>
                        <td><i class="bx bxs-circle success font-small-1 mr-50"></i><span>Paid</span></td>
                        <td class="text-bold-600">Devin Payne</td>
                        <td><img src="{{asset('images/cards/visa.png')}}" class="mr-50" alt="card" height="25" width="35">
                            **** 7617</td>
                        <td>11.08.18</td>
                        <td class="text-bold-600">$232</td>
                    </tr>
                    <tr>
                        <td><i class="bx bxs-circle success font-small-1 mr-50"></i><span>Paid</span></td>
                        <td class="text-bold-600">Michael Pena</td>
                        <td><img src="{{asset('images/cards/discover.png')}}" class="mr-50" alt="card" height="25"
                                 width="35"> **** 7617</td>
                        <td>11.08.18</td>
                        <td class="text-bold-600">$564</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- datatable ends -->
        </div>
    </section>
    <!-- table Transactions end -->
    <!-- table success start -->
    <section id="table-success">
        <div class="card">
            <!-- datatable start -->
            <div class="table-responsive">
                <table id="table-extended-success" class="table mb-0">
                    <thead>
                    <tr>
                        <th>campaign</th>
                        <th>account details</th>
                        <th>category</th>
                        <th>amount</th>
                        <th>status</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-bold-600 pr-0"><img class="rounded-circle mr-1" src="{{asset('images/cards/1.png')}}"
                                                            alt="card">Headphones
                            Beats</td>
                        <td>Account number 4154 81** **** 7617</td>
                        <td class="text-bold-600"><i class="text-bold-600 bx bx-music mr-50"></i><span>Music</span>
                        </td>
                        <td class="text-bold-600">$1,934</td>
                        <td class="text-success">Success!</td>
                        <td>
                            <div class="dropdown">
                <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-bold-600 pr-0"><img class="rounded-circle mr-1" src="{{asset('images/cards/2.png')}}"
                                                            alt="card">Nike Lab</td>
                        <td>Account number 4154 81** **** 7617</td>
                        <td class="text-bold-600"><i class="text-bold-600 bx bx-tennis-ball mr-50"></i><span>Sports</span></td>
                        <td class="text-bold-600">$232</td>
                        <td class="text-danger">Failed!</td>
                        <td>
                            <div class="dropup">
                <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                </span>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-bold-600 pr-0"><img class="rounded-circle mr-1" src="{{asset('images/cards/3.png')}}"
                                                            alt="card">Pepsi
                            Drink
                        </td>
                        <td>Account number 4154 81** **** 7617</td>
                        <td class="text-bold-600"><i class="text-bold-600 bx bx-truck mr-50"></i><span>Transportation</span>
                        </td>
                        <td class="text-bold-600">$564</td>
                        <td class="text-success">Success!</td>
                        <td>
                            <div class="dropup">
                <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                </span>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-bold-600 pr-0"><img class="rounded-circle mr-1" src="{{asset('images/cards/4.png')}}"
                                                            alt="card">Headphones
                            Beats</td>
                        <td>Account number 4154 81** **** 7617</td>
                        <td class="text-bold-600"><i class="text-bold-600 bx bx-music mr-50"></i><span>Music</span>
                        </td>
                        <td class="text-bold-600">$232</td>
                        <td class="text-warning">Pending!</td>
                        <td>
                            <div class="dropdown">
                <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                </span>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-bold-600 pr-0"><img class="rounded-circle mr-1" src="{{asset('images/cards/5.png')}}"
                                                            alt="card">Headphones
                            Beats</td>
                        <td>Account number 4154 81** **** 7617</td>
                        <td class="text-bold-600"><i class="text-bold-600 bx bx-truck mr-50"></i><span>Transportation</span>
                        </td>
                        <td class="text-bold-600">$564</td>
                        <td class="text-success">Success!</td>
                        <td>
                            <div class="dropdown">
                <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                </span>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-bold-600 pr-0"><img class="rounded-circle mr-1" src="{{asset('images/cards/2.png')}}"
                                                            alt="card">Headphones
                            Beats</td>
                        <td>Account number 4154 81** **** 7617</td>
                        <td class="text-bold-600"><i class="text-bold-600 bx bx-truck mr-50"></i><span>Transportation</span>
                        </td>
                        <td class="text-bold-600">$894</td>
                        <td class="text-warning">Pending!</td>
                        <td>
                            <div class="dropdown">
                <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                </span>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- datatable ends -->
        </div>
    </section>
    <!-- table success ends -->
    <!-- table checkbox start -->
    <section id="table-chechbox">
        <div class="card">
            <!-- datatable start -->
            <div class="table-responsive">
                <table id="table-extended-chechbox" class="table table-transparent">
                    <thead>
                    <tr>
                        <th></th>
                        <th class="pl-0">name</th>
                        <th>date</th>
                        <th>member</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td class="text-bold-600 pl-0"><img src="{{asset('images/icon/pdf.png')}}" alt="file" class="mr-1"
                                                            height="36" width="27">
                            Music</td>
                        <td>11/04/2019</td>
                        <td>
                            <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="Lilian Nenez"
                                    class="avatar pull-up">
                                    <img src="{{asset('images/portrait/small/avatar-s-5.jpg')}}" alt="Avatar" height="30"
                                         width="30">
                                </li>
                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="Alberto Glotzbach"
                                    class="avatar pull-up">
                                    <img src="{{asset('images/portrait/small/avatar-s-6.jpg')}}" alt="Avatar" height="30"
                                         width="30">
                                </li>
                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="Alberto Glotzbach"
                                    class="avatar pull-up">
                                    <img src="{{asset('images/portrait/small/avatar-s-7.jpg')}}" alt="Avatar" height="30"
                                         width="30">
                                </li>
                            </ul>
                        </td>
                        <td>
                            <div class="dropdown">
                <span class="bx bx-dots-horizontal-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                </span>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="text-bold-600 pl-0"><img src="{{asset('images/icon/doc.png')}}" alt="file" class="mr-1"
                                                            height="36" width="27">Important
                            Documents</td>
                        <td><span>10/04/2019</span>
                        </td>
                        <td>
                            <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="Lilian Nenez"
                                    class="avatar pull-up">
                                    <img src="{{asset('images/portrait/small/avatar-s-1.jpg')}}" alt="Avatar" height="30"
                                         width="30">
                                </li>
                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="Alberto Glotzbach"
                                    class="avatar pull-up">
                                    <img src="{{asset('images/portrait/small/avatar-s-23.jpg')}}" alt="Avatar" height="30"
                                         width="30">
                                </li>
                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="Alberto Glotzbach"
                                    class="avatar pull-up">
                                    <img src="{{asset('images/portrait/small/avatar-s-3.jpg')}}" alt="Avatar" height="30"
                                         width="30">
                                </li>
                            </ul>
                        </td>
                        <td>
                            <div class="dropdown">
                <span class="bx bx-dots-horizontal-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                </span>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="text-bold-600 pl-0"><img src="{{asset('images/icon/sketch.png')}}" alt="file" class="mr-1"
                                                            height="36" width="27">Folder
                            Mobile
                            Itteractions</td>
                        <td><span>10/09/2019</span>
                        </td>
                        <td>
                            <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="Lilian Nenez"
                                    class="avatar pull-up">
                                    <img src="{{asset('images/portrait/small/avatar-s-10.jpg')}}" alt="Avatar" height="30"
                                         width="30">
                                </li>
                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="Alberto Glotzbach"
                                    class="avatar pull-up">
                                    <img src="{{asset('images/portrait/small/avatar-s-11.jpg')}}" alt="Avatar" height="30"
                                         width="30">
                                </li>
                            </ul>
                        </td>
                        <td>
                            <div class="dropdown">
                <span class="bx bx-dots-horizontal-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                </span>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="text-bold-600 pl-0"><img src="{{asset('images/icon/sketch.png')}}" alt="file" class="mr-1"
                                                            height="36" width="27">New_Version_Table_Design.sketch</td>
                        <td><span>10/04/2019</span>
                        </td>
                        <td>
                            <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="Lilian Nenez"
                                    class="avatar pull-up">
                                    <img src="{{asset('images/portrait/small/avatar-s-20.jpg')}}" alt="Avatar" height="30"
                                         width="30">
                                </li>
                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="Alberto Glotzbach"
                                    class="avatar pull-up">
                                    <img src="{{asset('images/portrait/small/avatar-s-16.jpg')}}" alt="Avatar" height="30"
                                         width="30">
                                </li>
                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="Alberto Glotzbach"
                                    class="avatar pull-up">
                                    <img src="{{asset('images/portrait/small/avatar-s-17.jpg')}}" alt="Avatar" height="30"
                                         width="30">
                                </li>
                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="Alberto Glotzbach"
                                    class="avatar pull-up">
                                    <img src="{{asset('images/portrait/small/avatar-s-11.jpg')}}" alt="Avatar" height="30"
                                         width="30">
                                </li>
                            </ul>
                        </td>
                        <td>
                            <div class="dropdown">
                <span class="bx bx-dots-horizontal-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                </span>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="text-bold-600 pl-0"><img src="{{asset('images/icon/psd.png')}}" alt="file" class="mr-1"
                                                            height="36" width="27">Presention Kit
                            Desktop.psd</td>
                        <td><span>10/03/2019</span>
                        </td>
                        <td></td>
                        <td>
                            <div class="dropup">
                <span class="bx bx-dots-horizontal-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                </span>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="text-bold-600 pl-0"><img src="{{asset('images/icon/pdf.png')}}" alt="file" class="mr-1"
                                                            height="36" width="27">Landing UI
                            Kit.pdf</td>
                        <td><span>10/04/2019</span>
                        </td>
                        <td>
                            <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="Lilian Nenez"
                                    class="avatar pull-up">
                                    <img src="{{asset('images/portrait/small/avatar-s-5.jpg')}}" alt="Avatar" height="30"
                                         width="30">
                                </li>
                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="Alberto Glotzbach"
                                    class="avatar pull-up">
                                    <img src="{{asset('images/portrait/small/avatar-s-6.jpg')}}" alt="Avatar" height="30"
                                         width="30">
                                </li>
                            </ul>
                        </td>
                        <td>
                            <div class="dropdown">
                <span class="bx bx-dots-horizontal-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                </span>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="text-bold-600 pl-0"><img src="{{asset('images/icon/sketch.png')}}" alt="file" class="mr-1"
                                                            height="36" width="27">Modeling 3d
                            Itteractions</td>
                        <td><span>05/04/2019</span>
                        </td>
                        <td></td>
                        <td>
                            <div class="dropdown">
                <span class="bx bx-dots-horizontal-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                </span>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="text-bold-600 pl-0"><img src="{{asset('images/icon/sketch.png')}}" alt="file" class="mr-1"
                                                            height="36" width="27">old_Version_Design.sketch</td>
                        <td><span>10/04/2019</span>
                        </td>
                        <td>
                            <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" title="Lilian Nenez"
                                    class="avatar pull-up">
                                    <img src="{{asset('images/portrait/small/avatar-s-5.jpg')}}" alt="Avatar" height="30"
                                         width="30">
                                </li>
                            </ul>
                        </td>
                        <td>
                            <div class="dropdown">
                <span class="bx bx-dots-horizontal-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                </span>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- datatable ends -->
        </div>
    </section>
    <!-- table checkbox ends -->

    <!-- table transactions statistics starts -->
    <section id="table-transactions-statistics">
        <div class="row match-height">
            <!-- table Transaction history start -->
            <div id="table-transactions-history" class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Transaction History</h5>
                        <div class="heading-elements">
                            <i class="bx bx-dots-horizontal-rounded font-medium-3 align-middle"></i>
                        </div>
                    </div>
                    <!-- table start -->
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center"><img class="rounded-circle mr-1"
                                                                                src="{{asset('images/cards/4.png')}}" height="32" width="32" alt="card">
                                        <div class="flex-content"><span class="font-medium-2">Food</span><br><span
                                                class="text-muted font-small-2">Food
                        Category</span></div>
                                    </div>
                                </td>
                                <td>
                                    <div class=" d-flex justify-content-end align-items-end flex-column">
                    <span class="font-medium-2">
                      <i class="text-bold-600 bx bx-time font-medium-2 mr-50"></i>$1,000
                    </span>
                                        <span class="text-muted font-small-2">02:56</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center"><img class="rounded-circle mr-1"
                                                                                src="{{asset('images/cards/6.png')}}" height="32" width="32" alt="card">
                                        <div class="flex-content"><span class="font-medium-2">iPhone 8</span><br><span
                                                class="text-muted font-small-2">Tech
                        Category</span></div>
                                    </div>
                                </td>
                                <td>
                                    <div class=" d-flex justify-content-end align-items-end flex-column">
                                        <span class="font-medium-2"><i class="text-bold-600 bx bx-time font-medium-2 mr-50"></i>$232</span>
                                        <span class="text-muted font-small-2">02:56</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center"><img class="rounded-circle mr-1"
                                                                                src="{{asset('images/cards/2.png')}}" height="32" width="32" alt="card">
                                        <div class="flex-content"><span class="font-medium-2">Beats</span><br><span
                                                class="text-muted font-small-2">Music
                        Category</span></div>
                                    </div>
                                </td>
                                <td>
                                    <div class=" d-flex justify-content-end align-items-end flex-column">
                                        <span class="font-medium-2"><i class="text-bold-600 bx bx-time font-medium-2 mr-50"></i>$342</span>
                                        <span class="text-muted font-small-2">02:56</span></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center"><img class="rounded-circle mr-1"
                                                                                src="{{asset('images/cards/1.png')}}" height="32" width="32" alt="card">
                                        <div class="flex-content"><span class="font-medium-2">Beats</span><br><span
                                                class="text-muted font-small-2">Music
                        Category</span></div>
                                    </div>
                                </td>
                                <td>
                                    <div class=" d-flex justify-content-end align-items-end flex-column">
                    <span class="font-medium-2"><i
                            class="text-bold-600 bx bx-time font-medium-2 mr-50"></i>$1,000</span>
                                        <span class="text-muted font-small-2">02:56</span></div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- table end -->
                </div>
            </div>
            <!-- table Transaction history ends -->
            <!-- table table statistics start -->
            <div id="table-statistics" class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h5 class="card-title">Statistics</h5>
                        <div class="heading-elements">
                            <ul class="list-inline">
                                <li class="mr-50"><i class="bx bxs-circle success font-small-1 mr-50"></i>Third </li>
                                <li class="mr-50"><i class="bx bxs-circle info font-small-1 mr-50"></i>Second </li>
                                <li class="mr-1"><i class="bx bxs-circle primary font-small-1 mr-50"></i>First </li>
                                <li><i class="bx bx-dots-horizontal-rounded font-medium-3 align-middle"></i></li>
                            </ul>
                        </div>
                    </div>
                    <!-- table start -->
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                            <tr>
                                <td class="w-25 pr-0">
                                    <div class="d-flex align-items-center text-bold-500"><img class="rounded-circle mr-1"
                                                                                              src="{{asset('images/portrait/small/avatar-s-1.jpg')}}" alt="avatar" height="32"
                                                                                              width="32">
                                        <div class="flex-content"> Steve White</div>
                                    </div>
                                </td>
                                <td class="w-75 pr-0">
                                    <div class="progress progress-bar-primary progress-sm mb-0">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="80"
                                             aria-valuemax="100" style="width:50%;"></div>
                                    </div>
                                </td>
                                <td class="w-25">50%</td>
                            </tr>
                            <tr>
                                <td class="w-25 pr-0">
                                    <div class="d-flex align-items-center text-bold-500"><img class="rounded-circle mr-1"
                                                                                              src="{{asset('images/portrait/small/avatar-s-2.jpg')}}" alt="avatar" height="32"
                                                                                              width="32">
                                        <div class="flex-content">Ray Magnet</div>
                                    </div>
                                </td>
                                <td class="w-75 pr-0">
                                    <div class="progress progress-bar-success progress-sm mb-0">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="80"
                                             aria-valuemax="100" style="width:10%;"></div>
                                    </div>
                                </td>
                                <td class="w-25">10%</td>
                            </tr>
                            <tr>
                                <td class="w-25 pr-0">
                                    <div class="d-flex align-items-center text-bold-500"><img class="rounded-circle mr-1"
                                                                                              src="{{asset('images/portrait/small/avatar-s-12.jpg')}}" alt="avatar" height="32"
                                                                                              width="32">
                                        <div class="flex-content"> Steve White</div>
                                    </div>
                                </td>
                                <td class="w-75 pr-0">
                                    <div class="progress progress-bar-warning progress-sm mb-0">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="80"
                                             aria-valuemax="100" style="width:70%;"></div>
                                    </div>
                                </td>
                                <td class="w-25">70%</td>
                            </tr>
                            <tr>
                                <td class="w-25 pr-0">
                                    <div class="d-flex align-items-center text-bold-500"><img class="rounded-circle mr-1"
                                                                                              src="{{asset('images/portrait/small/avatar-s-10.jpg')}}" alt="avatar" height="32"
                                                                                              width="32">
                                        <div class="flex-content"> Markus Blind</div>
                                    </div>
                                </td>
                                <td class="w-75 pr-0">
                                    <div class="progress progress-bar-info progress-sm mb-0">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="35" aria-valuemin="80"
                                             aria-valuemax="100" style="width:35%;"></div>
                                    </div>
                                </td>
                                <td class="w-25">35%</td>
                            </tr>
                            <tr>
                                <td class="w-25 pr-0">
                                    <div class="d-flex align-items-center text-bold-500"><img class="rounded-circle mr-1"
                                                                                              src="{{asset('images/portrait/small/avatar-s-10.jpg')}}" alt="avatar" height="32"
                                                                                              width="32">
                                        <div class="flex-content">jonny Blind</div>
                                    </div>
                                </td>
                                <td class="w-75 pr-0">
                                    <div class="progress progress-bar-danger progress-sm mb-0">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="80"
                                             aria-valuemax="100" style="width:55%;"></div>
                                    </div>
                                </td>
                                <td class="w-25">55%</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- table end -->
                </div>
            </div>
            <!-- table table statistics ends -->
        </div>
    </section>
    <!-- table transactions statistics ends -->
    <!-- table customer statistics starts -->
    <section id="table-customer-statistics">
        <div class="row match-height">
            <!-- table latest custoner start -->
            <div id="table-latest-customer" class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h5 class="card-title">Latest customer</h5>
                        <div class="heading-elements">
                            <button type="button" class="btn btn-outline-secondary">More</button>
                        </div>
                    </div>
                    <!-- table start -->
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>INFO</th>
                                <th class="text-right">PRICE</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle" src="{{asset('images/portrait/small/avatar-s-1.jpg')}}"
                                             alt="avatar" height="32" width="32">
                                        <div class="ml-1"><span class="text-bold-500">Stuart Bradley </span><br><span
                                                class="text-muted">promember@gmail.com</span></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-end">
                                        <div class="text-bold-500 text-right">$58.00</div>
                                        <i class="bx bx-chevron-right font-large-1 cursor-pointer"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle" src="{{asset('images/portrait/small/avatar-s-1.jpg')}}"
                                             alt="avatar" height="32" width="32">
                                        <div class="ml-1">
                                            <span class="text-bold-500">Miles Davis</span>
                                            <br>
                                            <span class="text-muted">music@yahoo.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-end">
                                        <div class="text-bold-500 text-right">$58.00</div>
                                        <i class="bx bx-chevron-right font-large-1 cursor-pointer"></i>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- table end -->
                </div>
            </div>
            <!-- table table latest customer ends -->
            <!-- table table statistics two start -->
            <div id="table-statistics-two" class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h5 class="card-title">Statistics</h5>
                        <div class="heading-elements">
                            <i class="bx bx-dots-horizontal-rounded font-medium-3 align-middle"></i>
                        </div>
                    </div>
                    <!-- table start -->
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover mb-0">
                            <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center text-bold-500"><i
                                            class="text-success bx bx-envelope align-middle font-medium-5 mr-50"></i>Inbox Messages</div>
                                </td>
                                <td class="text-right text-muted">142</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center text-bold-500"><i
                                            class="text-danger bx bx-group align-middle font-medium-5 mr-50"></i>New
                                        arrivals</div>
                                </td>
                                <td class="text-right text-muted">92</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center text-bold-500"><i
                                            class="text-info bx bx-calendar align-middle font-medium-5 mr-50"></i>Planned Meetings</div>
                                </td>
                                <td class="text-right text-muted">2</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center text-bold-500"><i
                                            class="text-secondary bx bx-map align-middle font-medium-5 mr-50"></i>Places to Visit</div>
                                </td>
                                <td class="text-right text-muted">3</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- table end -->
                </div>
            </div>
            <!-- table table statistics two ends -->
        </div>
    </section>
    <!-- table customer statistics ends -->
    <!-- table Marketing campaigns start -->
    <section id="table-Marketing">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Marketing campaigns</h5>
                <div class="heading-elements">
                    <ul class="list-inline">
                        <li><span class="badge badge-pill badge-light-success">42 ACTIVE</span></li>
                        <li><i class="bx bx-dots-vertical-rounded font-medium-3 align-middle"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-md-9 col-sm-12">
                            <div class="d-inline-block">
                                <!-- chart-1   -->
                                <div class="d-flex mr-5 market-statistics-1">
                                    <!-- chart-statistics-1 -->
                                    <div id="table-donut-chart-1"></div>
                                    <!-- data -->
                                    <div class="statistics-data ml-50 my-auto">
                                        <div class="statistics">
                                            <span class="font-medium-2 mr-50 text-bold-600">25,756</span><span
                                                class="text-success">(+16.2%)</span>
                                        </div>
                                        <div class="statistics-date"><i class="bx bx-radio-circle font-small-1 text-success mr-25"></i><small
                                                class="text-muted">May 12,
                                                12:30 am</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-inline-block">
                                <!-- chart-2 -->
                                <div class="d-flex mb-1 market-statistics-2">
                                    <!-- chart statistics-2 -->
                                    <div id="table-donut-chart-2"></div>
                                    <!-- data-2 -->
                                    <div class="statistics-data ml-50 my-auto">
                                        <div class="statistics">
                                            <span class="font-medium-2 mr-50 text-bold-600">5,352</span><span class="text-danger">(-4.9%)</span>
                                        </div>
                                        <div class="statistics-date"><i class="bx bx-radio-circle font-small-1 text-success mr-25"></i><small
                                                class="text-muted">May 12,
                                                12:30 am</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 text-md-right">
                            <button class="btn btn-primary glow">View Report</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <!-- table start -->
                <table id="table-marketing-campaigns" class="table mb-0">
                    <thead>
                    <tr>
                        <th>campaign</th>
                        <th>account details</th>
                        <th>budget</th>
                        <th>changes</th>
                        <th>status</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="group">
                        <td colspan="6">Today</td>
                    </tr>
                    <tr>
                        <td class="text-bold-600"><img class="rounded-circle mr-1" src="{{asset('images/cards/1.png')}}"
                                                       alt="card">Headphones
                            Beats</td>
                        <td>Account number 4154 81** **** 7617</td>
                        <td class="text-bold-600"><i
                                class="bx bx-trending-up text-success align-middle mr-50"></i><span>5.63%</span>
                        </td>
                        <td class="text-bold-600">$1,934</td>
                        <td class="text-success">Active</td>
                        <td>
                            <div class="dropdown">
                <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-bold-600"><img class="rounded-circle mr-1" src="{{asset('images/cards/2.png')}}"
                                                       alt="card">Nike Lab</td>
                        <td>Account number 4154 81** **** 7617</td>
                        <td class="text-bold-600"><i
                                class="bx bx-trending-up text-success align-middle mr-50"></i><span>9.32%</span></td>
                        <td class="text-bold-600">$232</td>
                        <td class="text-danger">Closed</td>
                        <td>
                            <div class="dropdown">
                <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                </span>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="group">
                        <td colspan="6">Yesterday</td>
                    </tr>
                    <tr>
                        <td class="text-bold-600"><img class="rounded-circle mr-1" src="{{asset('images/cards/3.png')}}"
                                                       alt="card">Pepsi Drink
                        </td>
                        <td>Account number 4154 81** **** 7617</td>
                        <td class="text-bold-600"><i
                                class="bx bx-trending-down text-danger align-middle mr-50"></i><span>-3.32%</span>
                        </td>
                        <td class="text-bold-600">$564</td>
                        <td class="text-success">Active</td>
                        <td>
                            <div class="dropdown">
                <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                </span>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-bold-600"><img class="rounded-circle mr-1" src="{{asset('images/cards/4.png')}}"
                                                       alt="card">Headphones
                            Beats</td>
                        <td>Account number 4154 81** **** 7617</td>
                        <td class="text-bold-600"><i
                                class="bx bx-trending-up text-success align-middle mr-50"></i><span>4.65%</span>
                        </td>
                        <td class="text-bold-600">$232</td>
                        <td class="text-danger">Closed</td>
                        <td>
                            <div class="dropdown">
                <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                </span>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-bold-600"><img class="rounded-circle mr-1" src="{{asset('images/cards/5.png')}}"
                                                       alt="card">Headphones
                            Beats</td>
                        <td>Account number 4154 81** **** 7617</td>
                        <td class="text-bold-600"><i
                                class="bx bx-trending-down text-danger align-middle mr-50"></i><span>-4.32%</span>
                        </td>
                        <td class="text-bold-600">$564</td>
                        <td class="text-success">Active</td>
                        <td>
                            <div class="dropup">
                <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                </span>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-bold-600"><img class="rounded-circle mr-1" src="{{asset('images/cards/2.png')}}"
                                                       alt="card">Headphones
                            Beats</td>
                        <td>Account number 4154 81** **** 7617</td>
                        <td class="text-bold-600"><i
                                class="bx bx-trending-down text-danger align-middle mr-50"></i><span>-4.99%</span>
                        </td>
                        <td class="text-bold-600">$894</td>
                        <td class="text-danger">Closed</td>
                        <td>
                            <div class="dropup">
                <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                </span>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <!-- table ends -->
            </div>
        </div>
    </section>
    <!-- table Marketing campaigns ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
    <script src="{{asset('vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
    <script src="{{asset('vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('vendors/js/pickers/daterange/moment.min.js')}}"></script>
    <script src="{{asset('vendors/js/pickers/daterange/daterangepicker.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
    <script src="{{asset('js/scripts/pages/table-extended.js')}}"></script>
@endsection
