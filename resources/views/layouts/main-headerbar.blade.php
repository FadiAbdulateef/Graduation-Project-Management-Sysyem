<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light text-sm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        {{--        <li class="nav-item d-none d-sm-inline-block">--}}
        {{--            <a href="index3.html" class="nav-link">Home</a>--}}
        {{--        </li>--}}
        {{--        <li class="nav-item d-none d-sm-inline-block">--}}
        {{--            <a href="#" class="nav-link">Contact</a>--}}
        {{--        </li>--}}
        {{--        <li class="nav-item d-none d-sm-inline-block">--}}
        {{--            <button id="mybtn" onclick="darkmode()">Dark</button>--}}
        {{--        </li>--}}
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                               aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <div class="hidden sm:flex sm:items-center sm:ml-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="group flex items-center text-sm font-medium text-gray-900 hover:text-gray-900 hover:border-gray-300 focus:outline-none focus:text-white focus:border-gray-300 transition duration-150 ease-in-out">

                        @if((Auth::user()->graduate))
                            <div class="ml-2 group-hover:pl-4 transition-padding border-gray-400">
                                <img src="{{URL::asset('assets/img/graduat_defualt.jpg')}}" class="h-10 w-10 transform transition ease-in-out duration-150 group-hover:scale-125 rounded-full" alt="graduate Image">
                            </div>
                        @elseif((Auth::user()->supervisor))
                            <div class="ml-2 group-hover:pl-4 transition-padding border-gray-400">
                                <img src="{{URL::asset('assets/img/supervisor.jpg')}}" class="h-10 w-10 transform transition ease-in-out duration-150 group-hover:scale-125 rounded-full" alt="supervisor Image">
                            </div>
                        @else
{{--                            <div class="ml-2 group-hover:pl-4 transition-padding border-gray-400">--}}
{{--                                <img src="{{URL::asset('assets/img/admin.jpg')}}" class="h-10 w-10 transform transition ease-in-out duration-150 group-hover:scale-125 rounded-full" alt="admin Image">--}}
{{--                            </div>--}}
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-user mr-2"></i>
                            </a>
                        @endif
                    </button>
                </x-slot>
                <ul class="nav nav-pills nav-header flex-column">
                    <x-slot name="content">
                        <!-- Authentication -->
{{--                        <x-dropdown-link class="border-b pb-3 border-gray-200" :href="route('profile.index')">--}}
{{--                            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}--}}
{{--                            الملف الشخصي--}}
{{--                            <img src="{{URL::asset('assets/img/admin.jpg')}}" class="fas fa-users mr-2" alt="admin Image">--}}
{{--                        </x-dropdown-link>--}}

                        <a href="{{ route('profile.index') }}" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> الملف الشخصي
{{--                            <span class="float-right text-muted text-sm">2 days</span>--}}
                        </a>

                        <li class="nav-item ">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link class="pt-3" :href="route('logout')" onclick="event.preventDefault()
                                                this.closest('form').submit()">
                                    <svg version="1.1" id="Layer_13" class="fa nav-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         width="10%" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
<path fill="#E03736" opacity="1.000000" stroke="none"
      d="
M96.468658,513.000000
	C95.275696,512.331787 94.656944,511.290497 93.811287,511.051178
	C80.712402,507.344879 68.884377,501.412323 59.427570,491.190979
	C62.308628,490.479675 64.941750,490.031097 67.575035,490.030151
	C166.660965,489.994049 265.746918,489.999146 364.832855,489.998749
	C364.118561,499.240784 360.188385,506.429443 351.673157,510.734680
	C350.830719,511.160645 350.132355,511.871582 349.683563,512.725098
	C265.645782,513.000000 181.291550,513.000000 96.468658,513.000000
z"/>
                                        <path fill="#FBAD2B" opacity="1.000000" stroke="none"
                                              d="
M65.883675,16.957582
	C72.908234,10.379419 81.588608,6.956995 90.515884,3.982657
	C92.603722,3.287046 94.625916,2.394408 96.339157,1.296208
	C180.354233,1.000000 264.708466,1.000000 349.531342,1.000003
	C350.260925,1.642552 350.354034,2.671764 350.808319,2.868970
	C356.544434,5.359082 359.977203,10.011720 362.405731,15.740641
	C360.072418,16.453775 358.105469,16.964590 356.138428,16.965101
	C259.386841,16.990208 162.635254,16.971476 65.883675,16.957582
z"/>
                                        <path fill="#FAA82C" opacity="1.000000" stroke="none"
                                              d="
M65.536331,16.979729
	C162.635254,16.971476 259.386841,16.990208 356.138428,16.965101
	C358.105469,16.964590 360.072418,16.453775 362.436768,16.090155
	C366.354889,24.511721 365.496857,32.455265 359.035278,39.741302
	C355.692474,39.479515 353.061157,39.031094 350.429657,39.029835
	C248.914215,38.981319 147.398773,38.973705 45.883335,38.960682
	C50.157970,29.741550 57.778545,23.464087 65.536331,16.979729
z"/>
                                        <path fill="#EE7330" opacity="1.000000" stroke="none"
                                              d="
M186.167389,264.996552
	C183.696396,257.464020 184.562683,250.252243 188.984711,243.222198
	C192.182404,243.421722 194.646698,243.962280 197.111252,243.963455
	C287.321655,244.006683 377.532043,244.009338 467.742432,243.955170
	C470.532288,243.953506 473.321716,243.291336 476.111359,242.937103
	C480.606689,249.531906 480.886963,256.743744 478.573242,264.618530
	C380.666992,264.997406 283.417175,264.996979 186.167389,264.996552
z"/>
                                        <path fill="#FAA52C" opacity="1.000000" stroke="none"
                                              d="
M45.563042,39.102222
	C147.398773,38.973705 248.914215,38.981319 350.429657,39.029835
	C353.061157,39.031094 355.692474,39.479515 358.714844,39.884010
	C355.336029,46.372841 349.295898,48.881783 342.419891,48.924599
	C314.091309,49.100994 285.761017,48.998623 257.431335,48.998650
	C211.270630,48.998688 165.108841,48.846622 118.950485,49.176136
	C112.627640,49.221272 105.831276,50.595718 100.112244,53.222771
	C88.835236,58.402885 83.067413,67.924469 82.991714,80.565842
	C82.968765,84.398499 82.972534,88.231316 82.550156,92.393738
	C79.780960,92.147079 77.431274,91.100143 75.069481,91.072067
	C61.438606,90.910019 47.804874,90.988701 34.172108,90.985840
	C32.858204,72.667809 34.976532,55.084133 45.563042,39.102222
z"/>
                                        <path fill="#E23D35" opacity="1.000000" stroke="none"
                                              d="
M364.899353,489.582855
	C265.746918,489.999146 166.660965,489.994049 67.575035,490.030151
	C64.941750,490.031097 62.308628,490.479675 59.284245,490.884094
	C54.594349,485.948395 50.295635,480.848145 46.415394,475.384766
	C146.757294,475.014465 246.680725,475.007416 346.604156,474.998688
	C348.435944,474.998535 350.380676,475.364990 352.070862,474.870483
	C354.171661,474.255829 356.062073,472.922028 358.043335,471.898834
	C362.070526,476.965485 364.893219,482.514984 364.899353,489.582855
z"/>
                                        <path fill="#E85A33" opacity="1.000000" stroke="none"
                                              d="
M428.114380,319.049561
	C417.120605,330.156372 406.151764,341.287994 395.126343,352.363312
	C383.032654,364.511627 370.854767,376.576263 358.775909,388.739258
	C351.816071,395.747620 343.104889,397.140625 334.407257,394.521301
	C325.578674,391.862579 319.796600,385.427856 317.885071,375.738708
	C316.127899,366.832092 318.729095,359.752960 324.920197,353.573212
	C337.050232,341.465424 349.159058,329.336304 361.972412,317.248535
	C364.793518,317.521881 366.918182,317.964539 369.044281,317.971558
	C386.298492,318.028412 403.553192,317.962769 420.807129,318.050293
	C423.244507,318.062622 425.678711,318.700958 428.114380,319.049561
z"/>
                                        <path fill="#EF7730" opacity="1.000000" stroke="none"
                                              d="
M475.968567,242.633453
	C473.321716,243.291336 470.532288,243.953506 467.742432,243.955170
	C377.532043,244.009338 287.321655,244.006683 197.111252,243.963455
	C194.646698,243.962280 192.182404,243.421722 189.301361,243.045151
	C194.242035,235.583359 201.352570,232.831589 210.548843,232.870255
	C270.593323,233.122757 330.639404,233.000092 390.684967,233.000092
	C392.512115,233.000092 394.339264,233.000107 397.466064,233.000107
	C391.253754,226.777390 385.732422,221.246796 380.423096,215.169067
	C382.594299,214.414627 384.553009,214.032639 386.512695,214.027344
	C403.941498,213.980316 421.370667,214.040436 438.799133,213.953445
	C441.237762,213.941269 443.673248,213.303497 446.110199,212.955307
	C456.015411,222.746811 465.920624,232.538315 475.968567,242.633453
z"/>
                                        <path fill="#E23F35" opacity="1.000000" stroke="none"
                                              d="
M357.898987,471.583252
	C356.062073,472.922028 354.171661,474.255829 352.070862,474.870483
	C350.380676,475.364990 348.435944,474.998535 346.604156,474.998688
	C246.680725,475.007416 146.757294,475.014465 46.357544,475.030090
	C39.500595,466.350433 36.019493,456.577148 35.402901,445.457336
	C49.824169,445.014618 63.815754,445.052643 77.806320,444.950714
	C79.890244,444.935547 81.969368,444.261963 84.050720,443.893005
	C88.120346,451.236176 92.667580,458.443359 100.975525,461.280457
	C106.897812,463.302887 113.332962,464.824371 119.544930,464.844849
	C192.438141,465.085236 265.332611,465.073608 338.226135,464.886261
	C345.684540,464.867096 352.072113,466.602142 357.898987,471.583252
z"/>
                                        <path fill="#ED6F31" opacity="1.000000" stroke="none"
                                              d="
M186.103775,265.358459
	C283.417175,264.996979 380.666992,264.997406 478.374695,264.996948
	C475.442566,269.606720 472.052490,274.217438 468.013885,278.726746
	C465.400452,278.417236 463.435944,278.033325 461.470551,278.028442
	C442.990387,277.982422 424.510010,278.001190 406.029724,278.001221
	C339.933502,278.001221 273.837250,277.983154 207.741180,278.078400
	C205.493134,278.081665 203.246719,279.224060 200.999542,279.835510
	C193.387024,277.913574 188.944611,272.631927 186.103775,265.358459
z"/>
                                        <path fill="#EC6931" opacity="1.000000" stroke="none"
                                              d="
M201.377869,280.039001
	C203.246719,279.224060 205.493134,278.081665 207.741180,278.078400
	C273.837250,277.983154 339.933502,278.001221 406.029724,278.001221
	C424.510010,278.001190 442.990387,277.982422 461.470551,278.028442
	C463.435944,278.033325 465.400452,278.417236 467.707092,278.867462
	C454.938293,292.330994 441.827759,305.552399 428.415771,318.911682
	C425.678711,318.700958 423.244507,318.062622 420.807129,318.050293
	C403.553192,317.962769 386.298492,318.028412 369.044281,317.971558
	C366.918182,317.964539 364.793518,317.521881 362.276489,317.116150
	C373.750153,305.560486 385.615509,294.169708 397.480865,282.778931
	C397.146271,282.187347 396.811676,281.595764 396.477051,281.004181
	C394.760284,281.004181 393.043518,281.004181 391.326752,281.004181
	C330.055450,281.004120 268.784149,281.010986 207.512863,280.972046
	C205.593826,280.970825 203.675064,280.496368 201.377869,280.039001
z"/>
                                        <path fill="#E85A33" opacity="1.000000" stroke="none"
                                              d="
M34.166451,389.993286
	C34.118294,368.969513 34.070137,347.945740 34.552486,326.459290
	C47.658260,325.997742 60.236019,326.136322 72.807129,325.908203
	C76.158806,325.847382 79.490120,324.663727 82.830780,323.995575
	C82.875420,346.685394 82.920059,369.375183 82.570854,392.400879
	C79.640556,391.824707 77.118683,390.174530 74.565208,390.124084
	C61.103348,389.858124 47.633518,389.995728 34.166451,389.993286
z"/>
                                        <path fill="#EC6931" opacity="1.000000" stroke="none"
                                              d="
M82.897018,323.531250
	C79.490120,324.663727 76.158806,325.847382 72.807129,325.908203
	C60.236019,326.136322 47.658260,325.997742 34.625065,325.995239
	C34.117878,304.970306 34.068619,283.946777 34.550259,262.460571
	C47.300488,261.998993 59.526726,262.229980 71.735001,261.863007
	C75.461510,261.751007 79.138596,259.994720 82.838318,258.991455
	C82.879959,280.349945 82.921616,301.708466 82.897018,323.531250
z"/>
                                        <path fill="#EF7730" opacity="1.000000" stroke="none"
                                              d="
M82.904739,258.527649
	C79.138596,259.994720 75.461510,261.751007 71.735001,261.863007
	C59.526726,262.229980 47.300488,261.998993 34.623062,261.996643
	C34.115822,240.971008 34.066666,219.946640 34.549850,198.459946
	C47.657513,197.998810 60.235313,197.863556 72.806496,198.092331
	C76.159760,198.153366 79.492752,199.328552 82.835052,199.992218
	C82.880424,219.349411 82.925797,238.706619 82.904739,258.527649
z"/>
                                        <path fill="#F2812F" opacity="1.000000" stroke="none"
                                              d="
M445.970276,212.648468
	C443.673248,213.303497 441.237762,213.941269 438.799133,213.953445
	C421.370667,214.040436 403.941498,213.980316 386.512695,214.027344
	C384.553009,214.032639 382.594299,214.414627 380.292938,214.863342
	C365.354462,200.625839 350.758148,186.146927 336.416534,171.195328
	C338.796692,170.482407 340.921478,170.040756 343.047699,170.033752
	C360.302032,169.976990 377.556885,170.042725 394.810944,169.954926
	C397.248077,169.942535 399.682037,169.302322 402.117462,168.952698
	C416.688416,183.415680 431.259399,197.878647 445.970276,212.648468
z"/>
                                        <path fill="#F3882F" opacity="1.000000" stroke="none"
                                              d="
M82.902527,199.528366
	C79.492752,199.328552 76.159760,198.153366 72.806496,198.092331
	C60.235313,197.863556 47.657513,197.998810 34.624153,197.996170
	C34.116745,178.303802 34.067379,158.612869 34.550251,138.459473
	C46.825031,137.998001 58.569946,138.136078 70.308968,137.933243
	C75.070641,137.850967 79.472527,138.113586 82.833176,141.995728
	C82.878784,161.018661 82.924385,180.041580 82.902527,199.528366
z"/>
                                        <path fill="#F3882F" opacity="1.000000" stroke="none"
                                              d="
M401.977631,168.645538
	C399.682037,169.302322 397.248077,169.942535 394.810944,169.954926
	C377.556885,170.042725 360.302032,169.976990 343.047699,170.033752
	C340.921478,170.040756 338.796692,170.482407 336.279785,170.887146
	C330.485809,165.110916 324.211304,159.736618 319.894257,153.090759
	C314.071198,144.126480 316.599091,134.590393 322.914856,126.876671
	C328.631683,119.894485 336.463196,116.881294 346.025543,118.769409
	C351.478119,119.846039 355.720581,122.156998 359.509399,125.968750
	C373.583038,140.127548 387.722839,154.220612 401.977631,168.645538
z"/>
                                        <path fill="#E54B34" opacity="1.000000" stroke="none"
                                              d="
M34.094975,390.457581
	C47.633518,389.995728 61.103348,389.858124 74.565208,390.124084
	C77.118683,390.174530 79.640556,391.824707 82.505035,392.864990
	C82.888504,404.608063 82.852341,416.224396 83.041748,427.837006
	C83.124466,432.908844 83.669029,437.973114 84.027283,443.466919
	C81.969368,444.261963 79.890244,444.935547 77.806320,444.950714
	C63.815754,445.052643 49.824169,445.014618 35.356522,445.030548
	C34.588470,443.659424 34.047478,442.280518 34.043129,440.899933
	C33.990612,424.240723 34.017384,407.581268 34.094975,390.457581
z"/>
                                        <path fill="#F6952D" opacity="1.000000" stroke="none"
                                              d="
M82.901337,141.531647
	C79.472527,138.113586 75.070641,137.850967 70.308968,137.933243
	C58.569946,138.136078 46.825031,137.998001 34.624443,137.995636
	C34.117439,122.634407 34.068481,107.274529 34.095818,91.450241
	C47.804874,90.988701 61.438606,90.910019 75.069481,91.072067
	C77.431274,91.100143 79.780960,92.147079 82.481705,92.857071
	C82.874611,109.016335 82.922050,125.041954 82.901337,141.531647
z"/>
</svg>

                                    {{ __('تسجيل الخروج') }}

                                </x-dropdown-link>
                            </form>
                        </li>
                    </x-slot>
                </ul>
            </x-dropdown>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </div>
    </ul>
</nav>
<!-- /.navbar -->

