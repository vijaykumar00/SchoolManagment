<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<script src="{{ asset('js/custem.js') }}"></script>
<header class="page-header">
    <nav>
        <h3 style="padding-left:12px">Teacher Dashboard</h3>
        <button class="toggle-mob-menu" aria-expanded="false" aria-label="open menu">
            <svg width="20" height="20" aria-hidden="true">
                <use xlink:href="#down"></use>
            </svg>
        </button>
        <ul class="admin-menu">
            <li class="menu-heading">
                <h3>Teacher</h3>
            </li>
            <li>
                <a href="/show-student">
                    <svg>
                        <use xlink:href="#users"></use>
                    </svg>
                    <span>Students</span>
                </a>
            </li>
            <li>
                <a href="/createAsg">
                    <svg>
                        <use xlink:href="#comments"></use>
                    </svg>
                    <span> Add Assignment</span>
                </a>
            </li>
            <li>
                <a href="/submited-asg">
                    <svg>
                        <use xlink:href="#comments"></use>
                    </svg>
                    <span>See Assignment</span>
                </a>
            </li>
            <li class="menu-heading">
                <h3>Settings</h3>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">Logout</button>
                </form>
            </li>
            <li>
                <div class="switch">
                    <input type="checkbox" id="mode" checked>
                    <label for="mode">
                        <span></span>
                        <span>Dark</span>
                    </label>
                </div>
                <button class="collapse-btn" aria-expanded="true" aria-label="collapse menu">
                    <svg aria-hidden="true">
                        <use xlink:href="#collapse"></use>
                    </svg>
                    <span>Collapse</span>
                </button>
            </li>
        </ul>
    </nav>
</header>