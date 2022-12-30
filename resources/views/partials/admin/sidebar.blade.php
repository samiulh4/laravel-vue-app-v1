<a href="{{ url('admin/dashboard') }}"
   class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
    <img src="{{ asset(Auth::user()->photo) }}" class="img-fluid img-thumbnail" style="width: 75px;height: 75px"/>
</a>
<ul class="list-unstyled ps-0">
    <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                data-bs-target="#dashboard-collapse" aria-expanded="false">
            Dashboard
        </button>
        <div class="collapse" id="dashboard-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="#" class="link-dark rounded">Overview</a></li>
                <li><a href="#" class="link-dark rounded">Weekly</a></li>
                <li><a href="#" class="link-dark rounded">Monthly</a></li>
                <li><a href="#" class="link-dark rounded">Annually</a></li>
            </ul>
        </div>
    </li>
    <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                data-bs-target="#home-collapse" aria-expanded="true">
            Security & Access
        </button>
        <div class="collapse" id="home-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="{{ url('/admin/user/index') }}" class="link-dark rounded">Users</a></li>
                <li><a href="#" class="link-dark rounded">Updates</a></li>
                <li><a href="#" class="link-dark rounded">Reports</a></li>
            </ul>
        </div>
    </li>

    <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                data-bs-target="#orders-collapse" aria-expanded="false">
            Orders
        </button>
        <div class="collapse" id="orders-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="#" class="link-dark rounded">New</a></li>
                <li><a href="#" class="link-dark rounded">Processed</a></li>
                <li><a href="#" class="link-dark rounded">Shipped</a></li>
                <li><a href="#" class="link-dark rounded">Returned</a></li>
            </ul>
        </div>
    </li>

    <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                data-bs-target="#account-collapse" aria-expanded="false">
            Account
        </button>
        <div class="collapse" id="account-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="#" class="link-dark rounded">New...</a></li>
                <li><a href="#" class="link-dark rounded">Profile</a></li>
                <li><a href="#" class="link-dark rounded">Settings</a></li>
                <li><a href="#" class="link-dark rounded">Sign out</a></li>
            </ul>
        </div>
    </li>
</ul>


