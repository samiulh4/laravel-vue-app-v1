
    <a href="{{ url('admin/dashboard') }}"
       class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
        <img src="{{ asset(Auth::user()->photo) }}" class="img-fluid img-thumbnail" style="width: 75px;height: 75px"/>
    </a>
    <ul class="list-unstyled ps-0">
        <li class="mb-1">
            <a href="#" class="btn align-items-center link-dark rounded">Dashboard</a>
        </li>
        {{--    Security & Access--}}
        <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                    data-bs-target="#security_access_collapse" aria-expanded="true">
                Security & Access
            </button>
            <div class="collapse" id="security_access_collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ url('/admin/user/index') }}" class="btn link-dark rounded">Users</a></li>
                    <li><a href="#" class="btn link-dark rounded">Updates</a></li>
                    <li><a href="#" class="btn link-dark rounded">Reports</a></li>
                </ul>
            </div>
        </li>
    </ul>




