
<link href="resources/css/styles.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{url('/admin')}}">
                                <div class="sb-nav-link-icon"><em class="fas fa-tachometer-alt"></em></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="{{url('/admin/charts')}}">
                                <div class="sb-nav-link-icon"><em class="fas fa-chart-area"></em></div>
                                Gráficos
                            </a>
                            <a class="nav-link" href="{{url('/admin/tables')}}">
                                <div class="sb-nav-link-icon"><em class="fas fa-table"></em></div>
                                Tabelas
                            </a>
                        </div>
                    </div>
                </nav>
            </div>