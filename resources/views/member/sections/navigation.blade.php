<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('member.dashboard') }}" class="site_title">
                
                    <span>{{ config('app.name') }}</span>
            </a>
        </div>

        <div class="clearfix"></div>
        @php
    
        use Illuminate\Support\Facades\DB;
        $email=auth()->user()->email;
        $members = DB::table('member')->where('email', $email)->get();
        $mbr_pic = "pandding";
        $id=null;
            foreach($members as $member)
            {
                $mbr_pic=$member->mbr_pic;
                $id=$member->id;
            }
        @endphp
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img  src="\image\member\pic\{{$mbr_pic}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <h2>{{ auth()->user()->name }}</h2>
                <h3>Other</h3>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('member.dashboard') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Home
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Management</h3>

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
                    <li class="@if (Request::is('member/member') || Request::is('member/member/edit/'.$id) || Request::is('member/member/edit/editmember')) active @endif">
                        <a href="{{ route('member.member') }}">
                            <i class="fas fa-id-badge" aria-hidden="true"></i>
                            {{ "Member" }}
                        </a>
                    </li>
                    <li class="@if (Request::is('member/inverty/add') ||Request::is('member/inverty')||Request::is('member/searchInverty')||Request::is('member/inverty')||Request::is('admin/inverty/edit/'.$inver)||Request::is('member/inverty/'.$inver)) active @endif">
                        <a href="{{ route('member.inverty') }}">
                            <i class="fas fa-object-group" aria-hidden="true"></i>
                            {{ "Inverty " }}
                        </a>
                    </li>
                    <li class="@if (Request::is('member/delivery') || Request::is('member/delivery/add')|| Request::is('member/delivery/add?')|| Request::is('member/delivery/add/'.$IN)|| Request::is('member/searchdelivery')|| Request::is('member/delivery/today')|| Request::is('member/delivery/'.$app)) ) active @endif">
                        <a href="{{ route('member.delivery') }}">
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
