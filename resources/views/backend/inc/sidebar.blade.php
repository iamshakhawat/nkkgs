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
                <li class="active">
                    <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-1.png"
                            alt="icon"><span>Dashboard</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-10.png" alt="icon"> <span> Admins</span>
                        <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('admin.all.admin') }}"><span>All Admin</span></a></li>
                        <li><a href="{{ route('admin.add.admin') }}"><span>Add Admin</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-2.png" alt="icon"> <span> Teachers</span>
                        <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="all-teachers.html"><span>All Teachers</span></a></li>
                        <li><a href="add-teacher.html"><span>Add Teacher</span></a></li>
                        <li><a href="edit-teacher.html"><span>Edit Teacher</span></a></li>
                        <li><a href="about-teacher.html"><span>About Teacher</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-3.png" alt="icon"> <span> Students</span>
                        <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="all-students.html"><span>All Students</span></a></li>
                        <li><a href="add-student.html"><span>Add Student</span></a></li>
                        <li><a href="edit-student.html"><span>Edit Student</span></a></li>
                        <li><a href="about-student.html"><span>ABout student</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-4.png" alt="icon"> <span> Parents</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="all-parents.html"><span>All Parents</span></a></li>
                        <li><a href="add-parent.html"><span>Add Parent</span></a></li>
                        <li><a href="edit-parent.html"><span>Edit Parent</span></a></li>
                        <li><a href="about-parent.html"><span>About Parent</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-5.png" alt="icon">
                        <span>Apps</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Email</span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="compose.html"><span>Compose Mail</span></a></li>
                                <li>
                                    <a href="inbox.html"> <span> Inbox</span> </a>
                                </li>
                                <li><a href="mail-view.html"><span>Mailview</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="chat.html"> Chat <span
                                    class="badge badge-pill bg-primary float-right">5</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><span> Calls</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li><a href="voice-call.html"><span>Voice Call</span></a></li>
                                <li><a href="video-call.html"><span>Video Call</span></a></li>
                                <li><a href="incoming-call.html"><span>Incoming Call</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="contacts.html"><span> Contacts</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="calendar.html"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-6.png" alt="icon">
                        <span>Calendar</span></a>
                </li>
                <li>
                    <a href="exam-list.html"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-7.png" alt="icon"> <span>Exam
                            list</span></a>
                </li>
                <li>
                    <a href="holidays.html"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-8.png" alt="icon">
                        <span>Holidays</span></a>
                </li>
                <li>
                    <a href="calendar.html"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-9.png" alt="icon"><span>
                            Events</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-10.png" alt="icon"><span> Accounts </span>
                        <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="invoices.html"><span>Invoices</span></a></li>
                        <li><a href="payments.html"><span>Payments</span></a></li>
                        <li><a href="expenses.html"><span>Expenses</span></a></li>
                        <li><a href="provident-fund.html"><span>Provident Fund</span></a></li>
                        <li><a href="taxes.html"><span>Taxes</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-11.png" alt="icon"><span> Payroll </span>
                        <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="salary.html"><span> Employee Salary </span></a></li>
                        <li><a href="salary-view.html"><span> Payslip </span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-12.png" alt="icon"> <span> Blog</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="blog.html"><span>Blog</span></a></li>
                        <li><a href="blog-details.html"><span>Blog View</span></a></li>
                        <li><a href="add-blog.html"><span>Add Blog</span></a></li>
                        <li><a href="edit-blog.html"><span>Edit Blog</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);" class="noti-dot"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-13.png"
                            alt="icon"> <span>Management </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="submenu">
                            <a href="#"><span> Employees</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li><a href="all-employees.html"><span>All Employees</span></a></li>
                                <li><a href="holidays.html"><span>Holidays</span></a></li>
                                <li><a href="leaves.html"><span>Leave Requests</span> <span
                                            class="badge badge-pill bg-primary float-right">1</span></a></li>
                                <li><a href="attendance.html"><span>Attendance</span></a></li>
                                <li><a href="departments.html"><span>Departments</span></a></li>
                                <li><a href="designations.html"><span>Designations</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="activities.html"><span>Activities</span></a>
                        </li>
                        <li>
                            <a href="users.html"><span>Users</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><span> Reports </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li><a href="expense-reports.html"> <span>Expense Report </span></a></li>
                                <li><a href="invoice-reports.html"> <span>Invoice Report</span> </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="settings.html"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-14.png" alt="icon">
                        <span>Settings</span></a>
                </li>
                <li class="menu-title">UI Elements</li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-15.png" alt="icon"> <span> Components</span>
                        <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="uikit.html"><span>UI Kit</span></a></li>
                        <li><a href="typography.html"><span>Typography</span></a></li>
                        <li><a href="tabs.html"><span>Tabs</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-26.png" alt="icon"> <span> Elements</span>
                        <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="sweetalerts.html">Sweet Alerts</a></li>
                        <li><a href="tooltip.html">Tooltip</a></li>
                        <li><a href="popover.html">Popover</a></li>
                        <li><a href="ribbon.html">Ribbon</a></li>
                        <li><a href="clipboard.html">Clipboard</a></li>
                        <li><a href="drag-drop.html">Drag & Drop</a></li>
                        <li><a href="rangeslider.html">Range Slider</a></li>
                        <li><a href="rating.html">Rating</a></li>
                        <li><a href="toastr.html">Toastr</a></li>
                        <li><a href="text-editor.html">Text Editor</a></li>
                        <li><a href="counter.html">Counter</a></li>
                        <li><a href="scrollbar.html">Scrollbar</a></li>
                        <li><a href="spinner.html">Spinner</a></li>
                        <li><a href="notification.html">Notification</a></li>
                        <li><a href="lightbox.html">Lightbox</a></li>
                        <li><a href="stickynote.html">Sticky Note</a></li>
                        <li><a href="timeline.html">Timeline</a></li>
                        <li><a href="horizontal-timeline.html">Horizontal Timeline</a></li>
                        <li><a href="form-wizard.html">Form Wizard</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-27.png" alt="icon"> <span> Chart</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="chart-apex.html">Apex Charts</a></li>
                        <li><a href="chart-js.html">Chart Js</a></li>
                        <li><a href="chart-morris.html">Morris Charts</a></li>
                        <li><a href="chart-flot.html">Flot Charts</a></li>
                        <li><a href="chart-peity.html">Peity Charts</a></li>
                        <li><a href="chart-c3.html">C3 Charts</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-28.png" alt="icon"> <span>Icons</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
                        <li><a href="icon-feather.html">Feather Icons</a></li>
                        <li><a href="icon-ionic.html">Ionic Icons</a></li>
                        <li><a href="icon-material.html">Material Icons</a></li>
                        <li><a href="icon-pe7.html">Pe7 Icons</a></li>
                        <li><a href="icon-simpleline.html">Simpleline Icons</a></li>
                        <li><a href="icon-themify.html">Themify Icons</a></li>
                        <li><a href="icon-weather.html">Weather Icons</a></li>
                        <li><a href="icon-typicon.html">Typicon Icons</a></li>
                        <li><a href="icon-flag.html">Flag Icons</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-17.png" alt="icon"> <span> Forms</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="basic-inputs.html"><span>Basic Input</span></a></li>
                        <li><a href="form-basic-inputs.html"><span>Basic Inputs</span></a></li>
                        <li><a href="form-input-groups.html"><span>Input Groups</span></a></li>
                        <li><a href="form-horizontal.html"><span>Horizontal Form</span></a></li>
                        <li><a href="form-vertical.html"><span>Vertical Form</span></a></li>
                        <li><a href="form-validation.html"> Form Validation </a></li>
                        <li><a href="form-select2.html">Form Select2 </a></li>
                        <li><a href="form-fileupload.html">File Upload </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-18.png" alt="icon"> <span> Tables</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="tables-basic.html"><span>Basic Tables</span></a></li>
                        <li><a href="tables-datatables.html"><span>Data Table</span></a></li>
                    </ul>
                </li>
                <li class="menu-title"><span>Extras</span></li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-19.png" alt="icon"> <span>Pages</span> <span
                            class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="login.html"> <span>Login </span></a></li>
                        <li><a href="register.html"><span> Register </span></a></li>
                        <li><a href="forgot-password.html"> <span>Forgot Password</span> </a></li>
                        <li><a href="change-password2.html"> <span>Change Password</span> </a></li>
                        <li><a href="lock-screen.html"> <span>Lock Screen </span></a></li>
                        <li><a href="profile.html"> <span>Profile</span> </a></li>
                        <li><a href="gallery.html"> <span>Gallery </span></a></li>
                        <li><a href="error-404.html"><span>404 Error </span></a></li>
                        <li><a href="error-500.html"><span>500 Error </span></a></li>
                        <li><a href="blank-page.html"><span> Blank Page</span> </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ asset('backend') }}/assets/img/sidebar/icon-20.png" alt="icon">
                        <span>Multi Level</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Level 1</span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span> Level 2</span> <span
                                            class="menu-arrow"></span></a>
                                    <ul class="list-unstyled" style="display: none;">
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><span>Level 1</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>