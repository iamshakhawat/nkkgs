<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <div class="header-left">
                <a href="{{ route('admin.dashboard') }}" class="logo">
                    <img src="{{ asset('backend') }}/assets/img/logo1.png" width="40" height="40" alt="">
                    <span class="text-uppercase">NKKGS</span>
                </a>
            </div>
            <ul class="sidebar-ul">
                <li class="menu-title">Menu</li>
                <li class="">
                    <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-1.png"
                            alt="icon"><span>Dashboard</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-10.png" alt="icon"> <span> Admins</span>
                        <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('admin.all.admin') }}"><span> All Admins</span></a></li>
                        <li><a href="{{ route('admin.add.admin') }}"><span> Add Admin</span></a></li>
                        <li><a href="{{ route('admin.trash.admin') }}"><span> Trash</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-2.png" alt="icon"> <span> Teachers</span>
                        <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('admin.all.teacher') }}"><span>View All Teachers</span></a></li>
                        <li><a href="{{ route('admin.add.teacher') }}"><span>Add New Teacher</span></a></li>
                        <li><a href=""><span>Teachers Request</span></a></li>
                        <li><a href="{{ route('admin.teacher.trash') }}"><span>Trash</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-3.png" alt="icon"> <span> Students</span>
                        <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('admin.all.student') }}"><span>All Students</span></a></li>
                        <li><a href="{{ route('admin.add.student') }}"><span>Add a New Student</span></a></li>
                        <li><a href="{{ route('admin.student.trash') }}"><span>Student Trash</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-4.png" alt="icon"> <span> Parents</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('parent.all') }}"><span>All Parents</span></a></li>
                        <li><a href="{{ route('add.parent') }}"><span>Add a new Parent</span></a></li>
                        <li><a href="{{ route('connect.with.student') }}"><span>Connect Student</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-6.png" alt="icon"> <span> Addmission</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href=""><span>List</span></a></li>
                        <li><a href=""><span>Trash</span></a></li>
                    </ul>
                </li>



                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-9.png" alt="icon"> <span> Events</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href=""><span>All Event</span></a></li>
                        <li><a href=""><span>Add a New Event</span></a></li>
                    </ul>
                </li>

                <li class="">
                    <a href=""><img src="{{ asset('backend') }}/assets/img/sidebar/icon-1.png"
                            alt="icon"><span>Backup</span></a>
                </li>





                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-9.png" alt="icon"> <span> Student Meterials</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href=""><span>Routine</span></a></li>
                        <li><a href=""><span>Syllebus</span></a></li>
                        <li><a href=""><span>Admit Card</span></a></li>
                        <li><a href="{{ route('admin.booklist') }}"><span>Book list</span></a></li>
                        <li><a href=""><span>Attendence</span></a></li>
                        <li><a href="{{ route('admin.tc') }}"><span>TC</span></a></li>
                    </ul>
                </li>

                
                <li class="">
                    <a href=""><img src="{{ asset('backend') }}/assets/img/sidebar/icon-1.png"
                            alt="icon"><span>Result</span></a>
                </li>

                <li class="">
                    <a href=""><img src="{{ asset('backend') }}/assets/img/sidebar/icon-10.png"
                            alt="icon"><span>Notice</span></a>
                </li>

                <li class="">
                    <a href=""><img src="{{ asset('backend') }}/assets/img/sidebar/icon-12.png"
                            alt="icon"><span>Fee</span></a>
                </li>

                
            </ul>
        </div>
    </div>
</div>