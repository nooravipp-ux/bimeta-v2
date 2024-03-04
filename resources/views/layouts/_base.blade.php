<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="utf-8">
    <link href="{{asset('asset/dist/images/logo.svg')}}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Enigma admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Enigma Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Bimeta V2</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{asset('assets/dist/css/app.css')}}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css" />
    @yield('css')
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="py-5 md:py-0">
    <!-- BEGIN: Mobile Menu -->
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="Midone - HTML Admin Template" class="w-6" src="{{asset('assets/dist/images/logo.svg')}}">
            </a>
            <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2"
                    class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
        <div class="scrollable">
            <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle"
                    class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            <ul class="scrollable__content py-2">
                <li>
                    <a href="{{route('dashboard')}}" class="menu menu--active">
                        <div class="menu__icon"> <i data-lucide="pie-chart"></i> </div>
                        <div class="menu__title"> Dashboard </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="shopping-bag"></i> </div>
                        <div class="menu__title"> Sales Order <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{route('sales.index')}}" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="file-text"></i> </div>
                                <div class="menu__title"> PO Customer </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Tracking Order </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('index-price.index')}}" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="smartphone"></i> </div>
                                <div class="menu__title"> Calculator Index</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="layers"></i> </div>
                        <div class="menu__title"> Production <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{route('production.todo-list.index')}}" class="menu">
                                <div class="menu__icon"> <i data-lucide="list"></i> </div>
                                <div class="menu__title"> Todo List Order </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('production.spk.index')}}" class="menu">
                                <div class="menu__icon"> <i data-lucide="clipboard"></i> </div>
                                <div class="menu__title"> SPK </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('production.spk.monitoring.index')}}" class="menu">
                                <div class="menu__icon"> <i data-lucide="eye"></i> </div>
                                <div class="menu__title"> Monitoring </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Material Used </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="home"></i> </div>
                        <div class="menu__title"> Gudang <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{route('warehouse.delivery.index')}}" class="menu">
                                <div class="menu__icon"> <i data-lucide="truck"></i> </div>
                                <div class="menu__title"> Pengiriman </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-lucide="archive"></i> </div>
                                <div class="menu__title"> Stock <i data-lucide="chevron-down"
                                        class="menu__sub-icon "></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="{{route('warehouse.finish-goods.index')}}" class="menu">
                                        <div class="menu__icon"> <i data-lucide="package"></i> </div>
                                        <div class="menu__title"> Barang Jadi </div>
                                    </a>
                                </li>
                                <!-- <li>
                                        <a href="" class="menu">
                                            <div class="menu__icon"> <i data-lucide="archive"></i> </div>
                                            <div class="menu__title"> Intermediete Goods </div>
                                        </a>
                                    </li> -->
                                <li>
                                    <a href="{{route('warehouse.raw-material.index')}}" class="menu">
                                        <div class="menu__icon"> <i data-lucide="layers"></i> </div>
                                        <div class="menu__title"> Bahan Baku </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="shopping-cart"></i> </div>
                        <div class="menu__title"> Pembelian <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{route('procurement.purchase-order.index')}}" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Purchase Order </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Penerimaan Barang </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="dollar-sign"></i> </div>
                        <div class="menu__title"> Keuangan <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-dark-categories.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Invoice </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="database"></i> </div>
                        <div class="menu__title"> Master Data <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{route('goods.index')}}" class="menu">
                                <div class="menu__icon"> <i data-lucide="database"></i> </div>
                                <div class="menu__title"> Barang </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('customer.index')}}" class="menu">
                                <div class="menu__icon"> <i data-lucide="database"></i> </div>
                                <div class="menu__title"> Customers </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('supplier.index')}}" class="menu">
                                <div class="menu__icon"> <i data-lucide="database"></i> </div>
                                <div class="menu__title"> Suppliers </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('material.index')}}" class="menu">
                                <div class="menu__icon"> <i data-lucide="database"></i> </div>
                                <div class="menu__title"> Materials </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('substance.index')}}" class="menu">
                                <div class="menu__icon"> <i data-lucide="database"></i> </div>
                                <div class="menu__title"> Substances </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="settings"></i> </div>
                        <div class="menu__title"> Settings <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-lucide="user"></i> </div>
                                <div class="menu__title"> User Management <i data-lucide="chevron-down"
                                        class="menu__sub-icon "></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-dark-crud-data-list.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="users"></i> </div>
                                        <div class="menu__title"> Users </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-dark-crud-form.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                        <div class="menu__title"> Role </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-dark-crud-form.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                        <div class="menu__title"> Permissions </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Mobile Menu -->
    <!-- BEGIN: Top Bar -->
    <div class="top-bar-boxed top-bar-boxed--top-menu h-[70px] md:h-[65px] z-[51] border-b border-white/[0.08] mt-12 md:mt-0 -mx-3 sm:-mx-8 md:-mx-0 px-3 md:border-b-0 relative md:fixed md:inset-x-0 md:top-0 sm:px-8 md:px-10 md:pt-10 md:bg-gradient-to-b md:from-slate-100 md:to-transparent dark:md:from-darkmode-700">
        <div class="h-full flex items-center">
            <!-- BEGIN: Logo -->
            <a href="" class="logo -intro-x hidden md:flex xl:w-[180px] block">
                <img alt="Midone - HTML Admin Template" class="logo__image w-6"
                    src="{{asset('assets/dist/images/logo.svg')}}">
                <span class="logo__text text-white text-lg ml-3"> BIMETA </span>
            </a>
            <!-- END: Logo -->
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
                <ol class="breadcrumb breadcrumb-light">
                    <li class="breadcrumb-item"><a href="#">Application</a></li>
                    @yield('active-url')
                </ol>
            </nav>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Search -->
            <div class="intro-x relative mr-3 sm:mr-6">
                <div class="search hidden sm:block">
                    <input type="text" class="search__input form-control border-transparent" placeholder="Search...">
                    <i data-lucide="search" class="search__icon dark:text-slate-500"></i>
                </div>
            </div>
            <!-- END: Search -->
            <!-- BEGIN: Account Menu -->
            <div class="intro-x dropdown w-8 h-8">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110"
                    role="button" aria-expanded="false" data-tw-toggle="dropdown">
                    <img alt="Midone - HTML Admin Template" src="{{asset('assets/dist/images/profile-1.jpg')}}">
                </div>
                <div class="dropdown-menu w-56">
                    <ul
                        class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                        <li class="p-2">
                            <div class="font-medium">{{Auth::user()->name}}</div>
                            <div class="text-xs text-white/60 mt-0.5 dark:text-slate-500">Production</div>
                        </li>
                        <li>
                            <hr class="dropdown-divider border-white/[0.08]">
                        </li>
                        <li>
                            <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="user"
                                    class="w-4 h-4 mr-2"></i> Profile </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="lock"
                                    class="w-4 h-4 mr-2"></i> Reset Password </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="help-circle"
                                    class="w-4 h-4 mr-2"></i> Help </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider border-white/[0.08]">
                        </li>
                        <li>
                            <a href="" class="dropdown-item hover:bg-white/5" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i
                                    data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END: Account Menu -->
        </div>
    </div>
    <!-- END: Top Bar -->
    <!-- BEGIN: Top Menu -->
    <nav class="top-nav">
        <ul>
            <li>
                <a href="{{route('dashboard')}}" class="top-menu">
                    <div class="top-menu__icon"> <i data-lucide="pie-chart"></i> </div>
                    <div class="top-menu__title"> Dashboard </div>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="top-menu">
                    <div class="top-menu__icon"> <i data-lucide="shopping-bag"></i> </div>
                    <div class="top-menu__title"> Sales Order <i data-lucide="chevron-down"
                            class="top-menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="{{route('sales.index')}}" class="top-menu">
                            <div class="top-menu__icon"> <i data-lucide="file-text"></i> </div>
                            <div class="top-menu__title"> PO Customer </div>
                        </a>
                    </li>
                    <!-- <li>
                            <a href="" class="top-menu">
                                <div class="top-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="top-menu__title"> Tracking Order </div>
                            </a>
                        </li> -->
                    <li>
                        <a href="{{route('index-price.index')}}" class="top-menu">
                            <div class="top-menu__icon"> <i data-lucide="smartphone"></i> </div>
                            <div class="top-menu__title"> Kalkulator Index Harga</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="top-menu">
                    <div class="top-menu__icon"> <i data-lucide="layers"></i> </div>
                    <div class="top-menu__title"> Produksi <i data-lucide="chevron-down"
                            class="top-menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="{{route('production.todo-list.index')}}" class="top-menu">
                            <div class="top-menu__icon"> <i data-lucide="list"></i> </div>
                            <div class="top-menu__title"> Todo List Order </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('production.spk.index')}}" class="top-menu">
                            <div class="top-menu__icon"> <i data-lucide="clipboard"></i> </div>
                            <div class="top-menu__title"> SPK </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('production.spk.monitoring.index')}}" class="top-menu">
                            <div class="top-menu__icon"> <i data-lucide="eye"></i> </div>
                            <div class="top-menu__title"> Monitoring </div>
                        </a>
                    </li>
                    <li>
                        <a href="" class="top-menu">
                            <div class="top-menu__icon"> <i data-lucide="clipboard"></i> </div>
                            <div class="top-menu__title"> Pemakaian Kertas </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="top-menu">
                    <div class="top-menu__icon"> <i data-lucide="home"></i> </div>
                    <div class="top-menu__title"> Gudang <i data-lucide="chevron-down"
                            class="top-menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="{{route('warehouse.delivery.index')}}" class="top-menu">
                            <div class="top-menu__icon"> <i data-lucide="truck"></i> </div>
                            <div class="top-menu__title"> Pengiriman </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="top-menu">
                            <div class="top-menu__icon"> <i data-lucide="archive"></i> </div>
                            <div class="top-menu__title"> Stok <i data-lucide="chevron-down"
                                    class="top-menu__sub-icon"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{route('warehouse.finish-goods.index')}}" class="top-menu">
                                    <div class="top-menu__icon"> <i data-lucide="package"></i> </div>
                                    <div class="top-menu__title">Finish Goods</div>
                                </a>
                            </li>
                            <!-- <li>
                                    <a href="#" class="top-menu">
                                        <div class="top-menu__icon"> <i data-lucide="archive"></i> </div>
                                        <div class="top-menu__title">Intermediete Goods</div>
                                    </a>
                                </li> -->
                            <li>
                                <a href="{{route('warehouse.raw-material.index')}}" class="top-menu">
                                    <div class="top-menu__icon"> <i data-lucide="layers"></i> </div>
                                    <div class="top-menu__title">Raw Material</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="top-menu">
                    <div class="top-menu__icon"> <i data-lucide="shopping-cart"></i> </div>
                    <div class="top-menu__title"> Pengadaan <i data-lucide="chevron-down"
                            class="top-menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="{{route('procurement.purchase-order.index')}}" class="top-menu">
                            <div class="top-menu__icon"> <i data-lucide="file-text"></i> </div>
                            <div class="top-menu__title"> Purchase Order </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('procurement.goods-receive.index')}}" class="top-menu">
                            <div class="top-menu__icon"> <i data-lucide="file-text"></i> </div>
                            <div class="top-menu__title"> Penerimaan Barang </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="top-menu">
                    <div class="top-menu__icon"> <i data-lucide="dollar-sign"></i> </div>
                    <div class="top-menu__title"> Keuangan <i data-lucide="chevron-down"
                            class="top-menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="{{route('finance.invoice.index')}}" class="top-menu">
                            <div class="top-menu__icon"> <i data-lucide="file-text"></i> </div>
                            <div class="top-menu__title"> Invoice </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="top-menu">
                    <div class="top-menu__icon"> <i data-lucide="database"></i> </div>
                    <div class="top-menu__title"> Master Data <i data-lucide="chevron-down"
                            class="top-menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="{{route('goods.index')}}" class="top-menu">
                            <div class="top-menu__icon"> <i data-lucide="database"></i> </div>
                            <div class="top-menu__title">Barang</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('customer.index')}}" class="top-menu">
                            <div class="top-menu__icon"> <i data-lucide="database"></i> </div>
                            <div class="top-menu__title">Customer</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('supplier.index')}}" class="top-menu">
                            <div class="top-menu__icon"> <i data-lucide="database"></i> </div>
                            <div class="top-menu__title">Supplier</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('material.index')}}" class="top-menu">
                            <div class="top-menu__icon"> <i data-lucide="database"></i> </div>
                            <div class="top-menu__title">Material</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('substance.index')}}" class="top-menu">
                            <div class="top-menu__icon"> <i data-lucide="database"></i> </div>
                            <div class="top-menu__title">Substances</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="top-menu">
                    <div class="top-menu__icon"> <i data-lucide="settings"></i> </div>
                    <div class="top-menu__title"> Settings <i data-lucide="chevron-down" class="top-menu__sub-icon"></i>
                    </div>
                </a>
                <ul class="">
                    <li>
                        <a href="javascript:;" class="top-menu">
                            <div class="top-menu__icon"> <i data-lucide="user"></i> </div>
                            <div class="top-menu__title"> User Management <i data-lucide="chevron-down"
                                    class="top-menu__sub-icon"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{route('settings.user-management.user.index')}}" class="top-menu">
                                    <div class="top-menu__icon"> <i data-lucide="users"></i> </div>
                                    <div class="top-menu__title">Users</div>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('settings.user-management.role.index')}}" class="top-menu">
                                    <div class="top-menu__icon"> <i data-lucide="refresh-cw"></i> </div>
                                    <div class="top-menu__title">Roles</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="" class="top-menu">
                            <div class="top-menu__icon"> <i data-lucide="settings"></i> </div>
                            <div class="top-menu__title">Numbering Scheme</div>
                        </a>
                    </li>
                    <li>
                        <a href="" class="top-menu">
                            <div class="top-menu__icon"> <i data-lucide="settings"></i> </div>
                            <div class="top-menu__title">Backup Database</div>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- END: Top Menu -->


    <!-- BEGIN: Content -->
    @yield('main-content')

    <!-- BEGIN: JS Assets-->
    <script
        src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script> -->
    <script src="{{asset('assets/dist/js/app.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    
    @yield('script')
    <!-- END: JS Assets-->
</body>

</html>