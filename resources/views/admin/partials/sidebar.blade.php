<!-- زر إخفاء/إظهار Sidebar -->
<button id="toggleSidebar" class="btn btn-primary position-fixed shadow-sm p-1"
    style="top:70px; right:0; z-index:1050; width:35px; height:35px; font-size:18px;">
    <i class="fas fa-angle-left" id="sidebarIcon"></i>
</button>



<!-- Sidebar ثابت -->
<div id="sidebar" class="bg-light vh-100 p-3 shadow-sm position-fixed"
    style="width:220px; top:56px; right:0; transition: all 0.3s; overflow:auto;">

    <!-- إضافة مساحة من الأعلى للقائمة -->
    <div class="list-group mt-5">
        <a href="{{ route('admin.dashboard') }}"
            class="list-group-item list-group-item-action {{ request()->routeIs('admin.dashboard') ? 'active shadow-sm' : '' }}">
            الرئيسية
        </a>

        <a href="{{ route('admin.team.index') }}"
            class="list-group-item list-group-item-action {{ request()->routeIs('admin.team.*') ? 'active shadow-sm' : '' }}">
            أعضاء الفريق
        </a>

        <a href="{{ route('admin.projects.index') }}"
            class="list-group-item list-group-item-action {{ request()->routeIs('admin.projects.*') ? 'active shadow-sm' : '' }}">
            المشاريع
        </a>

        <a href="{{ route('admin.services.index') }}"
            class="list-group-item list-group-item-action {{ request()->routeIs('admin.services.*') ? 'active shadow-sm' : '' }}">
            الخدمات
        </a>

        <a href="{{ route('admin.contacts.index') }}"
            class="list-group-item list-group-item-action {{ request()->routeIs('admin.contacts.*') ? 'active shadow-sm' : '' }}">
            رسائل التواصل
        </a>

    </div>

</div>