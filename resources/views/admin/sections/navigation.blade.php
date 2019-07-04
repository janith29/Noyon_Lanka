<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('admin.dashboard') }}" class="site_title">
                <span>{{ config('app.name') }}</span>
            </a>
        </div>

        <div class="clearfix"></div>
            @php

            use Illuminate\Support\Facades\DB;
            
            $email=auth()->user()->email;
            // $PICS = DB::select("SELECT * FROM `member` WHERE email = ' $email'");
            $PICS = DB::table('member')->where('email', $email)->get();
            $mbr_pic=null;
            foreach($PICS as $PIC)
                  {
                      $mbr_pic=$PIC->mbr_pic;
                  }
            @endphp
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src='\image\member\pic\{{$mbr_pic}}' alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <h2>{{ auth()->user()->name }}</h2>

                <h3>Admin</h3>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                 {{--This is how Im freakingly activate nav items--}}
                
                {{-- <h3>{{ __('views.backend.section.navigation.sub_header_0') }}</h3> --}}
                <ul class="nav side-menu">
                    <li>
                        {{-- <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_0_1') }}
                        </a> --}}
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Home
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Management</h3>

                {{--This is how Im freakingly activate nav items--}}
                @php ($IN = '')
                @php ($app = '')
                @php ($stor = '') 
                @php ($qf = '') 
                @php ($emp = '') 
                @php ($inver = '') 
                

                @if(!empty($Member))
                    @php ($emp = $Member->id)
                @endif
                @if(!empty($inverty))
                @php ($inver = $inverty->id)
                @endif
                @if(!empty($delivery))
                    @php ($IN = $delivery->id)
                @endif
                @if(!empty($Delivery))
                    @php ($app = $Delivery->id)
                @endif
                @if(!empty($stores))
                    @php ($stor = $stores->id)
                @endif
                @if(!empty($questionsforum))
                    @if(!empty($questionsforum->id))
                        @php ($qf =  $questionsforum->id)
                    @endif
                @endif 

                <ul class="nav side-menu">
                    <li class="@if (Request::is('admin/member') || Request::is('admin/searchMember') ||Request::is('admin/member/add') || Request::is('admin/member/'.$emp)|| Request::is('admin/member/edit/'.$emp)) active @endif">
                        <a href="{{ route('admin.member') }}">
                            <i class="fas fa-id-badge" aria-hidden="true"></i>
                            {{ "Member" }}
                        </a>
                    </li>
                    <li class="@if (Request::is('admin/inventory/add') ||Request::is('admin/inventory')||Request::is('admin/searchInventory')||Request::is('admin/inventory')||Request::is('admin/inventory/edit/'.$inver)||Request::is('admin/inventory/'.$inver)) active @endif">
                        <a href="{{ route('admin.inventory') }}">
                            <i class="fas fa-object-group" aria-hidden="true"></i>
                            {{ "Inventory " }}
                        </a>
                    </li>
                    <li class="@if (Request::is('admin/delivery') || Request::is('admin/delivery/add')|| Request::is('admin/delivery/today')||Request::is('admin/Selectdate')|| Request::is('admin/delivery/add?')|| Request::is('admin/delivery/add/'.$IN)|| Request::is('admin/searchdelivery')|| Request::is('admin/delivery/'.$app)) ) active @endif">
                        <a href="{{ route('admin.delivery') }}">
                            <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                            {{ "Delivery" }}
                        </a>
                    </li>
                    
                   
                </ul>
            </div>
            
        </div>
        <!-- /sidebar menu -->
    </div>
</div>
