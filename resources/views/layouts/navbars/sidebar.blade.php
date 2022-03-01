<div class="sidebar">
    <div class="sidebar-wrapper">
        <ul class="nav">
            @hasanyrole('admin|laboratorio|operaciones|gerente-general|manejo-minerales')
                <li @if ($pageSlug == 'dashboard') class="active " @endif>
                    <a href="{{ route('home') }}">
                        <i class="tim-icons icon-chart-bar-32"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
            @endhasanyrole
            @hasanyrole('admin|gerente-general')
                <li>
                    <a data-toggle="collapse" href="#transactions" {{ $section  == 'transactions' ? 'aria-expanded=true' : '' }}>
                        <i class="tim-icons icon-bank" ></i>
                        <span class="nav-link-text">Transacciones</span>
                        <b class="caret mt-1"></b>
                    </a>

                    <div class="collapse {{ $section  == 'transactions' ? 'show' : '' }}" id="transactions">
                        <ul class="nav pl-4">
                            {{--<li @if ($pageSlug == 'tstats') class="active " @endif>
                                <a href="{{ route('transactions.stats')  }}">
                                    <i class="tim-icons icon-chart-pie-36"></i>
                                    <p>Estadisticas</p>
                                </a>
                            </li>
                            {{-- <li @if ($pageSlug == 'transactions') class="active " @endif>
                                <a href="{{ route('transactions.index')  }}">
                                    <i class="tim-icons icon-bullet-list-67"></i>
                                    <p>Todas</p>
                                </a>
                            </li> --}}
                            {{-- <li @if ($pageSlug == 'sales') class="active " @endif>
                                <a href="{{ route('sales.index')  }}">
                                    <i class="tim-icons icon-bag-16"></i>
                                    <p>Ventas</p>
                                </a>
                            </li> --}}
                            {{-- <li @if ($pageSlug == 'expenses') class="active " @endif>
                                <a href="{{ route('transactions.type', ['type' => 'expense'])  }}">
                                    <i class="tim-icons icon-coins"></i>
                                    <p>Gastos</p>
                                </a>
                            </li> --}}
                            {{-- <li @if ($pageSlug == 'incomes') class="active " @endif>
                                <a href="{{ route('transactions.type', ['type' => 'income'])  }}">
                                    <i class="tim-icons icon-credit-card"></i>
                                    <p>Ingresos</p>
                                </a>
                            </li> --}}
                            {{-- <li @if ($pageSlug == 'transfers') class="active " @endif>
                                <a href="{{ route('transfer.index')  }}">
                                    <i class="tim-icons icon-send"></i>
                                    <p>Transferencias</p>
                                </a>
                            </li> --}}
                            {{-- <li @if ($pageSlug == 'payments') class="active " @endif>
                                <a href="{{ route('transactions.type', ['type' => 'payment'])  }}">
                                    <i class="tim-icons icon-money-coins"></i>
                                    <p>Pagos</p>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </li>
            @endhasanyrole
            @hasanyrole('admin|gerente-general')
                <li>
                    <a data-toggle="collapse" href="#inventory" {{ $section  == 'inventory' ? 'aria-expanded=true' : '' }}>
                        <i class="tim-icons icon-app"></i>
                        <span class="nav-link-text">Inventario</span>
                        <b class="caret mt-1"></b>
                    </a>

                    <div class="collapse {{ $section  == 'inventory' ? 'show' : '' }}" id="inventory">
                        <ul class="nav pl-4">
                            {{-- <li @if ($pageSlug == 'istats') class="active " @endif>
                                <a href="{{ route('inventory.stats') }}">
                                    <i class="tim-icons icon-chart-pie-36"></i>
                                    <p>Estadisticas</p>
                                </a>
                            </li> --}}
                            <li @if ($pageSlug == 'products') class="active " @endif>
                                <a href="{{ route('products.index') }}">
                                    <i class="tim-icons icon-notes"></i>
                                    <p>Productos</p>
                                </a>
                            </li>
                            <li @if ($pageSlug == 'categories') class="active " @endif>
                                <a href="{{ route('categories.index') }}">
                                    <i class="tim-icons icon-tag"></i>
                                    <p>Categorías</p>
                                </a>
                            </li>
                            {{-- <li @if ($pageSlug == 'receipts') class="active " @endif>
                                <a href="{{ route('receipts.index') }}">
                                    <i class="tim-icons icon-paper"></i>
                                    <p>Recepción</p>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </li>
            @endhasanyrole

            @hasanyrole('admin|gerente-general|manejo-minerales')
                
                <li @if ($pageSlug == 'manejo-minerales') class="active " @endif>
                    <a data-toggle="collapse" href="#manejo-minerales" {{ $section  == 'manejo-minerales' ? 'aria-expanded=true' : '' }}>
                        <i class="tim-icons icon-delivery-fast"></i>
                        <span class="nav-link-text">Manejo de minerales</span>
                        <b class="caret mt-1"></b>
                    </a>
                    <div class="collapse {{ $section  == 'manejo-minerales' ? 'show' : '' }}" id="manejo-minerales">
                        <ul class="nav pl-4">
                            <li @if ($pageSlug == 'mm-control-arenas') class="active " @endif>
                                <a href="{{ route('mm-control-arenas.index') }}">
                                    <p>Control de arenas</p>
                                </a>
                            </li>
                            <li @if ($pageSlug == 'mm-solicitud-analisis') class="active " @endif>
                                <a href="{{ route('analisis-operaciones.index') }}">
                                    <p>Solicitud de analisis de laboratorio</p>
                                </a>
                            </li>
                        </ul>
                    </div>                    
                </li>
            @endhasanyrole

            @hasanyrole('admin|gerente-general|operaciones')
                <li @if ($pageSlug == 'clients') class="active " @endif>
                    <a href="#">
                        <i class="tim-icons icon-single-02"></i>
                        <p>Operaciones</p>
                    </a>
                </li>
            @endhasanyrole

            @hasanyrole('admin|gerente-general|laboratorio')
                <li @if ($pageSlug == 'laboratorio') class="active " @endif>
                    <a data-toggle="collapse" href="#laboratorio" {{ $section  == 'laboratorio' ? 'aria-expanded=true' : '' }}>
                        <i class="tim-icons icon-app"></i>
                        <span class="nav-link-text">Laboratorio</span>
                        <b class="caret mt-1"></b>
                    </a>
                    <div class="collapse {{ $section  == 'laboratorio' ? 'show' : '' }}" id="laboratorio">
                        <ul class="nav pl-4">
                            <li @if ($pageSlug == 'analisis-manejo-minerales') class="active " @endif>
                                <a href="{{ route('analisis-manejo-minerales.index') }}">
                                    <p>Analisis para Manejo de minerales</p>
                                </a>
                            </li>
                            <li @if ($pageSlug == 'analisis-operaciones') class="active " @endif>
                                <a href="{{ route('analisis-operaciones.index') }}">
                                    <p>Analisis para operaciones</p>
                                </a>
                            </li>

                            <li @if ($pageSlug == 'manejo-minerales') class="active " @endif>
                                <a data-toggle="collapse" href="#consultaAnalisis" {{ $section  == 'consultaAnalisis' ? 'aria-expanded=true' : '' }}>
                                    <span class="nav-link-text">Consultas</span>
                                    <b class="caret mt-1"></b>
                                </a>
                                <div class="collapse {{ $section  == 'consultaAnalisis' ? 'show' : '' }}" id="consultaAnalisis">
                                    <ul class="nav pl-1">
                                        <li @if ($pageSlug == 'consulta-analisis-lab') class="active " @endif>
                                            <a href="#">
                                                <p>Analisis de Manejo de minerales</p>
                                            </a>
                                        </li>
                                        <li @if ($pageSlug == 'consulta-analisis-oper') class="active " @endif>
                                            <a href="#">
                                                <p>Analisis de Operaciones</p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>                            
                        </ul>
                    </div>                        
                </li>
            @endhasanyrole

            @hasanyrole('admin')
                <!-- <li>
                    <a data-toggle="collapse" href="#clients">
                        <i class="tim-icons icon-single-02" ></i>
                        <span class="nav-link-text">Clients</span>
                        <b class="caret mt-1"></b>
                    </a>

                    <div class="collapse" id="clients">
                        <ul class="nav pl-4">
                            <li @if ($pageSlug == 'clients-list') class="active " @endif>
                                <a href="{{ route('clients.index')  }}">
                                    <i class="tim-icons icon-notes"></i>
                                    <p>Administrar Clients</p>
                                </a>
                            </li>
                            <li @if ($pageSlug == 'clients-create') class="active " @endif>
                                <a href="{{ route('clients.create')  }}">
                                    <i class="tim-icons icon-simple-add"></i>
                                    <p>New Client</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->
            @endhasanyrole

            @hasanyrole('admin|gerente-general')
                <li>
                    <a data-toggle="collapse" href="#users" {{ $section  == 'users' ? 'aria-expanded=true' : '' }}>
                        <i class="tim-icons icon-badge" ></i>
                        <span class="nav-link-text">Usuarios</span>
                        <b class="caret mt-1"></b>
                    </a>

                    <div class="collapse {{ $section  == 'users' ? 'show' : '' }}" id="users">
                        <ul class="nav pl-4">
                            <li @if ($pageSlug == 'profile') class="active " @endif>
                                <a href="{{ route('profile.edit')  }}">
                                    <i class="tim-icons icon-badge"></i>
                                    <p>Mi perfil</p>
                                </a>
                            </li>
                            <li @if ($pageSlug == 'users-list') class="active " @endif>
                                <a href="{{ route('users.index')  }}">
                                    <i class="tim-icons icon-notes"></i>
                                    <p>Administrar usuarios</p>
                                </a>
                            </li>
                            <li @if ($pageSlug == 'users-create') class="active " @endif>
                                <a href="{{ route('users.create')  }}">
                                    <i class="tim-icons icon-simple-add"></i>
                                    <p>Nuevo usuario</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endhasanyrole
            {{-- @hasanyrole('admin')
                <li @if ($pageSlug == 'manual') class="active " @endif>
                    <a href="#">
                        <i class="tim-icons icon-support-17"></i>
                        <p>Manual de uso</p>
                        <!-- {{ asset('assets/demo/manual_inventario.pdf') }} -->
                    </a>
                </li>
            @endhasanyrole --}}
            @hasanyrole('admin|laboratorio|operaciones|gerente-general|manejo-minerales')
                <li>
                    <a data-toggle="collapse" href="#datosMaestros" {{ $section  == 'datosGenerales' || $section  == 'operaciones' || $section  == 'dlaboratorio' || $section  == 'manejoMinerales'  ? 'aria-expanded=true' : '' }}>
                        <i class="tim-icons icon-bank" ></i>
                        <span class="nav-link-text">Datos maestros</span>
                        <b class="caret mt-1"></b>
                    </a>
                    <div class="collapse {{ $section  == 'datosGenerales' || $section  == 'operaciones' || $section  == 'dlaboratorio' || $section  == 'manejoMinerales'  ? 'show' : '' }}" id="datosMaestros">
                        @hasanyrole('admin|gerente-general')
                            <ul class="nav pl-2">
                                <li @if ($pageSlug == 'datosGenerales') class="active " @endif>
                                    <a data-toggle="collapse" href="#datosGenerales" {{ $section  == 'datosGenerales' ? 'aria-expanded=true' : '' }}>
                                        <i class="tim-icons icon-minimal-right" ></i>
                                        <span class="nav-link-text">Datos Generales</span>
                                        <b class="caret mt-1"></b>
                                    </a>
                                    <div class="collapse {{ $section  == 'datosGenerales' ? 'show' : '' }}" id="datosGenerales">
                                        <ul class="nav pl-2">
                                            <li @if ($pageSlug == 'unidades') class="active " @endif>
                                                <a href="{{ route('unidades.index')  }}">
                                                    <p>Unidades de medida</p>
                                                </a>
                                            </li>
                                            <li @if ($pageSlug == 'secciones') class="active " @endif>
                                                <a href="{{ route('secciones.index')  }}">
                                                    <p>Secciones de los status</p>
                                                </a>
                                            </li>
                                            <li @if ($pageSlug == 'status') class="active " @endif>
                                                <a href="{{ route('status.index') }}">
                                                    <p>Status</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        @endhasanyrole
                        @hasanyrole('admin|gerente-general|manejo-minerales')
                            <ul class="nav pl-2">
                                <li @if ($pageSlug == 'manejo-minerales') class="active " @endif>
                                    <a data-toggle="collapse" href="#manejoMinerales" {{ $section  == 'manejoMinerales' ? 'aria-expanded=true' : '' }}>
                                        <i class="tim-icons icon-delivery-fast" ></i>
                                        <span class="nav-link-text">Manejo de  Minerales</span>
                                        <b class="caret mt-1"></b>
                                    </a>
                                    <div class="collapse {{ $section  == 'manejoMinerales' ? 'show' : '' }}" id="manejoMinerales">
                                        <ul class="nav pl-2">
                                            <li @if ($pageSlug == 'molinos') class="active " @endif>
                                                <a href="{{ route('molinos.index')  }}">
                                                    <p>Molinos Proveedores</p>
                                                </a>
                                            </li>
                                            <li @if ($pageSlug == 'muestreador') class="active " @endif>
                                                <a href="{{ route('muestreador.index')  }}">
                                                    <p>Administrar Muestreadores</p>
                                                </a>
                                            </li>                                            
                                        </ul>
                                    </div>

                                </li>
                            </ul>
                        @endhasanyrole
                        @hasanyrole('admin|gerente-general|laboratorio')
                            <ul class="nav pl-2">
                                <li @if ($pageSlug == 'dlaboratorio') class="active " @endif>
                                    <a data-toggle="collapse" href="#dlaboratorio" {{ $section  == 'dlaboratorio' ? 'aria-expanded=true' : '' }}>
                                        <i class="tim-icons icon-paper" ></i>
                                        <span class="nav-link-text">Laboratorio</span>
                                        <b class="caret mt-1"></b>
                                    </a>
                                    <div class="collapse {{ $section  == 'dlaboratorio' ? 'show' : '' }}" id="dlaboratorio">
                                        <ul class="nav">
                                            <li @if ($pageSlug == 'tipos-analisis') class="active " @endif>
                                                <a href="{{ route('tipos-analisis.index')  }}">
                                                    <p>Tipo de analisis</p>
                                                </a>
                                            </li>
                                            <li @if ($pageSlug == 'valores-analisis') class="active " @endif>
                                                <a href="{{ route('valores-analisis.index')  }}">
                                                    <p>Valores de los analisis</p>
                                                </a>
                                            </li>
                                            <li @if ($pageSlug == 'analisis') class="active " @endif>
                                                <a href="{{ route('analisis.index')  }}">
                                                    <p>Asociar Analisis - Valores</p>
                                                </a>
                                            </li>
                                            <li @if ($pageSlug == 'reactivos-analisis') class="active " @endif>
                                                <a href="{{ route('reactivos-analisis.index')  }}">
                                                    <p>Reactivos para los Analisis </p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        @endhasanyrole
                        @hasanyrole('admin|gerente-general|operaciones')
                            <ul class="nav pl-2">
                                <li @if ($pageSlug == 'operaciones') class="active " @endif>
                                    <a data-toggle="collapse" href="#operaciones" {{ $section  == 'operaciones' ? 'aria-expanded=true' : '' }}>
                                        <i class="tim-icons icon-atom" ></i>
                                        <span class="nav-link-text">Operaciones</span>
                                        <b class="caret mt-1"></b>
                                    </a>
                                    <div class="collapse {{ $section  == 'operaciones' ? 'show' : '' }}" id="operaciones">
                                        <ul class="nav">
                                            <li @if ($pageSlug == 'operaciones') class="active " @endif>
                                                <a href="#">
                                                    <p>Tipo de analisis</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        @endhasanyrole
                    </div>                    
                </li>
            @endhasanyrole
        </ul>
    </div>
</div>
