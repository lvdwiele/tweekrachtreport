<div id="sidebar">
    <div class="sidebar-overlay">

        <div class="sidebar-header bg-transparent">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/regilogowit.png') }}" height="30" class="text-center">
            </a>
        </div>

        <div class="p-3">
            <hr class="bg-white p-0 m-0">
        </div>

        <ul class="p-3">
            <!-- Home -->
            <li class="mb-2 @if(Route::getCurrentRoute()->getName() === 'home') active @endif">
                <a href="{{ route('home') }}">
                    <i class="fas fa-home mr-3"></i>Overzicht
                </a>
            </li>
            <!-- Relations -->
            <li class="mb-2">
                <a href="#relationsSubMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-users mr-3"></i>Relaties
                </a>
                <ul class="collapse list-unstyled @if(Route::getCurrentRoute()->getName() === 'clients' || Route::getCurrentRoute()->getName() === 'companies') show @endif"
                    id="relationsSubMenu">
                    <li class="collapsable-li my-1 ml-auto @if(Route::getCurrentRoute()->getName() === 'clients') active @endif">
                        <a href="{{ route('clients') }}" class="py-2">
                            <i class="fas fa-user mr-3"></i>Clienten
                        </a>
                    </li>
                    <li class="collapsable-li ml-auto @if(Route::getCurrentRoute()->getName() === 'companies') active @endif">
                        <a href="{{ route('companies') }}" class="py-2">
                            <i class="fas fa-building mr-3"></i>Bedrijven
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Reports -->
            <li class="mb-2 @if(Route::getCurrentRoute()->getName() === 'reports') active @endif">
                <a href="{{ route('reports') }}">
                    <i class="fas fa-gem mr-3"></i>Rapporten
                </a>
            </li>
            <!-- Maintain -->
            @if (Auth::user()->role_id == 1)
                <li class="mb-2">
                    <a href="#maintainSubMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-crown mr-3"></i>Beheer
                    </a>
                    <ul class="collapse list-unstyled @if(Route::getCurrentRoute()->getName() === 'users') show @endif"
                        id="maintainSubMenu">
                        <li class="collapsable-li my-1 ml-auto @if(Route::getCurrentRoute()->getName() === 'users') active @endif">
                            <a href="{{ route('users') }}" class="py-2">
                                <i class="fas fa-users mr-3"></i>Gebruikers
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Information -->
                <li class="mb-2 @if(Route::getCurrentRoute()->getName() === 'information') active @endif">
                    <a href="{{ route('information') }}">
                        <i class="far fa-question-circle mr-3"></i>Informatie
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
