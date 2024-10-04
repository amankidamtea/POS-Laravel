<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html " target="_blank">
        <img src="{{ asset('/assets/new/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Soft UI Dashboard</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="{{ Request::is('dashboard') ? 'active nav-link' : 'nav-link' }}"  href="{{ route('dashboard') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <span class="{{ Request::is('dashboard') ?  'material-symbols-outlined text-white' : 'material-symbols-outlined' }}" style="color: #666666">
                    dashboard
                    </span>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="{{ Request::is('categories') ? 'active nav-link' : 'nav-link' }}" href="/categories">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <span class="{{ Request::is('categories') ?  'material-symbols-outlined text-white' : 'material-symbols-outlined' }}" style="color: #666666">
                category
                </span>
            </div>
            <span class="nav-link-text ms-1">Category Product</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="{{ Request::is('products*') ? 'active nav-link' : 'nav-link' }}" href="/products">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <span class="{{ Request::is('products*') ?  'material-symbols-outlined text-white' : 'material-symbols-outlined' }}" style="color: #666666">
                    box
                    </span>
            </div>
            <span class="nav-link-text ms-1">Products</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="{{ Request::is('stock') ? 'active nav-link' : 'nav-link' }}" href="/stock">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <span class="{{ Request::is('stock') ?  'material-symbols-outlined text-white' : 'material-symbols-outlined' }}" style="color: #666666">
                inventory
                </span>
            </div>
            <span class="nav-link-text ms-1">Stock Management</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">POS pages</h6>
        </li>
        <li class="nav-item">
          <a class="{{ Request::is('pos*') ? 'active nav-link' : 'nav-link' }}" href="{{ route('pos.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <span class="{{ Request::is('pos*') ?  'material-symbols-outlined text-white' : 'material-symbols-outlined' }}" style="color: #666666">
                  <span class="material-symbols-outlined">
                    point_of_sale
                    </span>
                </span>
            </div>
            <span class="nav-link-text ms-1">POS</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="{{ Request::is('customers*') ? 'active nav-link' : 'nav-link' }}" href="{{ route('customers.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <span class="{{ Request::is('customers*') ?  'material-symbols-outlined text-white' : 'material-symbols-outlined' }}" style="color: #666666">
                  <span class="material-symbols-outlined">
                    groups
                    </span>
                </span>
            </div>
            <span class="nav-link-text ms-1">Customers</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="{{ Request::is('suppliers*') ? 'active nav-link' : 'nav-link' }}" href="{{ route('suppliers.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <span class="{{ Request::is('suppliers*') ?  'material-symbols-outlined text-white' : 'material-symbols-outlined' }}" style="color: #666666">
                  <span class="material-symbols-outlined">
                    <span class="material-symbols-outlined">
                      forklift
                      </span>
                    </span>
                </span>
            </div>
            <span class="nav-link-text ms-1">Suppliers</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Permission pages</h6>
        </li>
        <li class="nav-item">
          <a class="{{ Request::is('permission') ? 'active nav-link' : 'nav-link' }}" href="/permission">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <span class="{{ Request::is('permission') ?  'material-symbols-outlined text-white' : 'material-symbols-outlined' }}" style="color: #666666">
                user_attributes
                </span>
            </div>
            <span class="nav-link-text ms-1">Role Controller</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="{{ Request::is('role') ? 'active nav-link' : 'nav-link' }}" href="/role">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <span class="{{ Request::is('role') ?  'material-symbols-outlined text-white' : 'material-symbols-outlined' }}" style="color: #666666">
                supervisor_account
                </span>
            </div>
            <span class="nav-link-text ms-1">Role List</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="{{ Request::is('role/permission') ? 'active nav-link' : 'nav-link' }}" href="/role/permission">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="{{ Request::is('role/permission') ?  'material-symbols-outlined text-white' : 'material-symbols-outlined' }}" style="color: #666666">
                settings_accessibility
                </span>
            </div>
            <span class="nav-link-text ms-1">Role Permission</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Employe pages</h6>
        </li>
        <li class="nav-item">
          <a class="{{ Request::is('employees') ? 'active nav-link' : 'nav-link' }}" href="{{ route('employees.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <span class="{{ Request::is('employees') ?  'material-symbols-outlined text-white' : 'material-symbols-outlined' }}" style="color: #666666">
                person_apron
                </span>
            </div>
            <span class="nav-link-text ms-1">Employees</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="{{ Request::is('advance-salary') ? 'active nav-link' : 'nav-link' }}" href="{{ route('advance-salary.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <span class="{{ Request::is('advance-salary') ?  'material-symbols-outlined text-white' : 'material-symbols-outlined' }}" style="color: #666666">
                paid
                </span>
            </div>
            <span class="nav-link-text ms-1">Advance Salary</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="{{ Request::is('pay-salary') ? 'active nav-link' : 'nav-link' }}" href="{{ route('pay-salary.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <span class="{{ Request::is('pay-salary') ?  'material-symbols-outlined text-white' : 'material-symbols-outlined' }}" style="color: #666666">
                receipt
                </span>
            </div>
            <span class="nav-link-text ms-1">Pay Salary List</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="{{ Request::is('employee/attendence') ? 'active nav-link' : 'nav-link' }}" href="{{ route('attendence.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <span class="{{ Request::is('employee/attendence') ?  'material-symbols-outlined text-white' : 'material-symbols-outlined' }}" style="color: #666666">
                assignment_ind
                </span>
            </div>
            <span class="nav-link-text ms-1">Attendance</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="{{ Request::is('profile') ? 'active nav-link' : 'nav-link' }}" href="{{ route('profile') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <span class="{{ Request::is('profile') ?  'material-symbols-outlined text-white' : 'material-symbols-outlined' }}" style="color: #666666">
                shield_person
                </span>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="{{ Request::is('users*') ? 'active nav-link' : 'nav-link' }}" href="{{ route('users.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <span class="{{ Request::is('users*') ?  'material-symbols-outlined text-white' : 'material-symbols-outlined' }}" style="color: #666666">
                diversity_3
                </span>
            </div>
            <span class="nav-link-text ms-1">Users</span>
          </a>
        </li>
        
      </ul>
    </div>
  </aside>