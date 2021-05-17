<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="index.html">
                    <i class="icon_house_alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Videos</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{route('Admin-Video-Index')}}">Video Archive</a></li>
                    <li><a class="" href="{{route('Admin-Video-Create')}}">Video Insert</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_desktop"></i>
                    <span>Categories</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{route('Admin-Category-Index')}}">Category Archive</a></li>
                    <li><a class="" href="{{route('Admin-Category-Create')}}">Category Insert</a></li>
                </ul>
            </li>
            <li>
                <a class="" href="{{ route('Admin-Comment-Index') }}">
                    <i class="icon_genius"></i>
                    <span>Comments</span>
                </a>
            </li>
            <li>
                <a class="" href="chart-chartjs.html">
                    <i class="icon_piechart"></i>
                    <span>Requests</span>

                </a>

            </li>

            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_table"></i>
                    <span>Tickets</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="basic_table.html">Basic Table</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_documents_alt"></i>
                    <span>Tags</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="profile.html">Profile</a></li>
                </ul>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
