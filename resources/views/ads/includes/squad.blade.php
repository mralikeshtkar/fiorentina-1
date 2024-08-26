@php
    use App\Models\Player;
    $players = Player::all();
    $forwards = $players->where('position', 'Attaccante');
    $Midfielders = $players->where('position', 'Centrocampista');
    $Defenders = $players->where('position', 'Difensore');
    $Goalkeepers = $players->where('position', 'Portiere');
@endphp
<div class="accordion" id="playersAccordion">
    <!-- Forwards -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingForwards">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseForwards"
                aria-expanded="true" aria-controls="collapseForwards">
                Forwards
            </button>
        </h2>
        <div id="collapseForwards" class="accordion-collapse collapse show" aria-labelledby="headingForwards"
            data-bs-parent="#playersAccordion">
            <div class="accordion-body">
                <ul>
                    @foreach ($forwards as $forward)
                        <li>{{ $forward->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- Midfielders -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingMidfielders">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseMidfielders" aria-expanded="false" aria-controls="collapseMidfielders">
                Midfielders
            </button>
        </h2>
        <div id="collapseMidfielders" class="accordion-collapse collapse" aria-labelledby="headingMidfielders"
            data-bs-parent="#playersAccordion">
            <div class="accordion-body">
                <ul>
                    @foreach ($Midfielders as $midfielder)
                        <li>{{ $midfielder->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- Defenders -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingDefenders">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseDefenders" aria-expanded="false" aria-controls="collapseDefenders">
                Defenders
            </button>
        </h2>
        <div id="collapseDefenders" class="accordion-collapse collapse" aria-labelledby="headingDefenders"
            data-bs-parent="#playersAccordion">
            <div class="accordion-body">
                <ul>
                    @foreach ($Defenders as $defender)
                        <li>{{ $defender->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- Goalkeepers -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingGoalkeepers">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseGoalkeepers" aria-expanded="false" aria-controls="collapseGoalkeepers">
                Goalkeepers
            </button>
        </h2>
        <div id="collapseGoalkeepers" class="accordion-collapse collapse" aria-labelledby="headingGoalkeepers"
            data-bs-parent="#playersAccordion">
            <div class="accordion-body">
                <ul>
                    @foreach ($Goalkeepers as $goalkeeper)
                        <li>{{ $goalkeeper->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
