<div class="container">
    @foreach ($matchSummary->groupBy('stage_name') as $stageName => $items)
        <div class="stage mb-4">
            <h4>{{ $stageName }} -
                @php
                    $firstIncident = $items->first();
                    $participants = json_decode($firstIncident->incident_participants, true);
                @endphp

            </h4>
            @foreach ($items as $item)
                @php
                    $participants = json_decode($item->incident_participants, true);
                    $isHomeTeam = $item->incident_team == 1; // Team 1 for home, Team 2 for away
                @endphp

                <div
                    class="incident d-flex align-items-center mb-2 {{ $isHomeTeam ? 'justify-content-start' : 'justify-content-end' }}">
                    @if ($isHomeTeam)
                        <!-- Home Team Incident -->
                        <div class="incident-content d-flex align-items-center">
                            <div class="incident-time mr-2" style="width: 50px;">
                                {{ $item->incident_time }}
                            </div>
                            <div class="incident-icon mr-2">
                                @if ($item->incident_type === 'GOAL')
                                    <i class="fa fa-futbol"></i>
                                @elseif ($item->incident_type === 'YELLOW_CARD')
                                    <i class="fa fa-square text-warning"></i>
                                @elseif ($item->incident_type === 'RED_CARD')
                                    <i class="fa fa-square text-danger"></i>
                                @elseif ($item->incident_type === 'SUBSTITUTION')
                                    <i class="fa fa-exchange-alt"></i>
                                @elseif ($item->incident_type === 'ASSISTANCE')
                                    <i class="fa fa-hands-helping"></i>
                                @endif
                            </div>
                            <div class="incident-detail">
                                @foreach ($participants as $participant)
                                    <strong>{{ $participant['participant_name'] }}</strong>
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                                @if ($item->incident_type === 'GOAL' && isset($participants[0]['home_score']) && isset($participants[0]['away_score']))
                                    <span>({{ $participants[0]['home_score'] }} -
                                        {{ $participants[0]['away_score'] }})</span>
                                @endif
                            </div>
                        </div>
                    @else
                        <!-- Away Team Incident -->
                        <div class="incident-content d-flex align-items-center">
                            <div class="incident-detail text-right mr-2">
                                @foreach ($participants as $participant)
                                    <strong>{{ $participant['participant_name'] }}</strong>
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                                @if ($item->incident_type === 'GOAL' && isset($participants[0]['home_score']) && isset($participants[0]['away_score']))
                                    <span>({{ $participants[0]['home_score'] }} -
                                        {{ $participants[0]['away_score'] }})</span>
                                @endif
                            </div>
                            <div class="incident-icon ml-2">
                                @if ($item->incident_type === 'GOAL')
                                    <i class="fa fa-futbol"></i>
                                @elseif ($item->incident_type === 'YELLOW_CARD')
                                    <i class="fa fa-square text-warning"></i>
                                @elseif ($item->incident_type === 'RED_CARD')
                                    <i class="fa fa-square text-danger"></i>
                                @elseif ($item->incident_type === 'SUBSTITUTION')
                                    <i class="fa fa-exchange-alt"></i>
                                @elseif ($item->incident_type === 'ASSISTANCE')
                                    <i class="fa fa-hands-helping"></i>
                                @endif
                            </div>
                            <div class="incident-time ml-2" style="width: 50px;">
                                {{ $item->incident_time }}
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @endforeach
</div>
