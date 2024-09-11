
    <div class="container">
        @foreach($matchSummary->groupBy('stage_name') as $stageName => $items)
            <div class="stage">
                <h4>{{ $stageName }}
                    @php
                        $firstIncident = $items->first();
                        $participants = json_decode($firstIncident->incident_participants, true);

                    @endphp
                </h4>
                @foreach($items as $item)
                    <div class="incident" style="display: flex; align-items: center; margin-bottom: 10px;">
                        <div class="incident-time" style="width: 50px;">
                            {{ $item->incident_time }}
                        </div>
                        <div class="incident-detail" style="flex: 1;">
                            <span class="{{ $item->incident_type }}">
                                {{ ucfirst(str_replace('_', ' ', $item->incident_type)) }}:

                                @php
                                    $participants = json_decode($item->incident_participants, true);
                                @endphp

                                @if ($participants && is_array($participants))
                                    @foreach($participants as $participant)
                                        <strong>{{ $participant['participant_name'] }}</strong>
                                        @if (!$loop->last)
                                            , 
                                        @endif
                                    @endforeach
                                @endif

                                @if ($item->incident_type === 'GOAL' && isset($participants[0]['home_score']) && isset($participants[0]['away_score']))
                                    <span>({{ $participants[0]['home_score'] }} - {{ $participants[0]['away_score'] }})</span>
                                @endif
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

